<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class tarefa extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'vc_nome',
        'it_id_projecto',
        ];
        protected $table = 'tarefas';
}
