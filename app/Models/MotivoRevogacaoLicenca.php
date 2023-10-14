<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MotivoRevogacaoLicenca extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'vc_descricao',
        'it_estado',
        ];
}
