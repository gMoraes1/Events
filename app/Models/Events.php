<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $primaryKey = 'idEvent';
    protected $fillable = [
        'nameEvent',
        'dateEvent',
        'locationEvent',
        'imageEvent'    
    ];

}
