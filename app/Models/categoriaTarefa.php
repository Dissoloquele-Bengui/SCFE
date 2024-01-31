<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class categoriaTarefa extends Model
{
    use HasFactory;
    use softDeletes;

  protected $fillable =[

   'it_id_nome',
   'dt_descricao',
   'vc_prioridade',
   'it_tempo_estimado',
   'vc_tipo',
  ];
  protected $table = 'categoria_tarefas';


}
