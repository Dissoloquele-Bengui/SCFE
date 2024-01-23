<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Frequencia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'dt_data',
        'tm_hora_entrada',
        'tm_hora_saida',
        'it_id_usuario',
        'vc_tipo',

    ];

    protected $table = 'frequencias';
}
