<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courriers extends Model
{  use HasFactory;
    protected $primaryKey =
    'id_courrier';



    protected $fillable = [
        'objet_courrier',
        'nature_courrier',
        'nom_exp',
        'nom_dest',
        'adresse_exp',
        'adresse_dest',
        'date_exp',
        'date_arrive',
        'reception',
        'type_courrier',
        'resume'
    ];
}
