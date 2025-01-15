<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtype extends Model
{
    use HasFactory;

    protected $table = 'subtype';

    protected $fillable = [
        'id',
        'name',
        'description',
        'type_id',
        'created_at'
    ];
}
