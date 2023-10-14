<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicoLicenciado extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'vc_servico',
        'it_estado',
        ];
}