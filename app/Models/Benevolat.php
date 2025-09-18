<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benevolat extends Model
{
    use HasFactory;

    protected $table = 'benevs';

    protected $fillable = [
        'lieu',
        'date',
        'heure',
        'idRole',
        'idBene',
        'idEme',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
