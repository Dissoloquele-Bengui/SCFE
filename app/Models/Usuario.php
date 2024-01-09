<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
    'vc_nome',
    'vc_email',
    'vc_password',
    'vc_classe',
    'vc_tipo',
    ];

    protected $table ='usuarios';
}
