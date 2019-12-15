<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Models;

class Cartorio extends Model
{

    protected $table = 'tb_cartorio';
    protected $primaryKey = 'cnpj';

    protected $fillable = [
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'ativo'
    ];
}