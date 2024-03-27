<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa_user extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'it_id_usuario',
        'it_id_tarefa',
        'dt_data_atribuicao',

    ];


    protected $table = 'tarefa_user';
}
