<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\courriers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CourriersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $courriers = courriers::orderBy('type_courrier', 'asc')
        ->orderByRaw("CASE
                       WHEN type_courrier = 'entrant' THEN date_arrive
                       ELSE date_exp
                      END DESC")
        ->get();

        return view('admin.index', [
            'courriers' => courriers::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courriers = new courriers();

        return view('admin.create', compact('courriers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'objet_courrier' => ['required'],
        'nature_courrier' => ['required'],
        'nom_exp' => ['required'],
        'adresse_exp' => ['required'],
        'nom_dest' => ['required'],
        'adresse_dest' => ['required'],
        'reception' =>  ['required', Rule::in(['reçu', 'non reçu'])],
        'type_courrier' => ['required', Rule::in(['entrant', 'sortant'])],
        'date_exp' => ['nullable', 'date'],
        'date_arrive' => ['nullable', 'date'],
        ]);

        $validator->sometimes('date_exp', 'required|date', function ($input) {
            return $input->type_courrier === 'sortant';
        });

        $validator->sometimes('date_arrive', 'required|date', function ($input) {
            return $input->type_courrier === 'entrant';
        });

        $validator->validate();


        $courrier = new courriers($request->all());
        $courrier->save();

        return redirect()->route('courriers.courriers.index')->with('success', 'Courrier créé avec succès.');
    }

    public function show($id)
    {
        $courriers = Courriers::findOrFail($id);
        return view('admin.index', compact('courriers'));
    }

    public function search(Request $request)
    {
        $query = Courriers::query();

        if ($request->has('id_courrier') && !empty($request->id_courrier)) {
            $query->where('id', $request->id_courrier);
        }
        if ($request->has('nom') && !empty($request->nom)) {
            $query->Where('nom_exp', 'like', '%' . $request->nom . '%')
                ->orWhere('nom_dest', 'like', '%' . $request->nom . '%');
        }
        if ($request->has('adresse') && !empty($request->adresse)) {
            $query->where('adresse_exp', 'like', '%' . $request->adresse . '%')
                ->orWhere('adresse_dest', 'like', '%' . $request->adresse . '%');
        }

        $courriers = $query->orderBy('created_at', 'desc')->paginate(25);

        return view('admin.index', compact('courriers'));
    }





    public function edit($id)
    {
        $courrier = courriers::findOrFail($id);
        return view('admin.edit', compact('courrier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'objet_courrier' => ['required'],
            'nature_courrier' => ['required'],
            'nom_exp' => ['required'],
            'nom_dest' => ['required'],
            'adresse_exp' => ['required'],
            'adresse_dest' => ['required'],
            'date_exp' => ['nullable', 'date'],
            'date_arrive' => ['nullable', 'date'],
            'reception' => ['required', 'boolean'],
        ]);

        $courrier = courriers::findOrFail($id);
        $courrier->update($request->all());

        return redirect()->route('courriers.courriers.index')->with('success', 'Courrier mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $courrier = courriers::findOrFail($id);
        if ($courrier->file_path) {
            Storage::delete($courrier->file_path);
        }
        $courrier->delete();

        return redirect()->route('courriers.courriers.index')->with('success', 'Courrier supprimé avec succès.');
    }
}
