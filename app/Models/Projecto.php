<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projecto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'vc_nome',
        'dt_data_inicio',
        'dt_data_conclusao',
        'it_estado',
        'vc_prioridade',
        'it_id_usuario',
        ];

        protected $table ='projectos';

}
