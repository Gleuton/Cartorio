<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Models;

class Endereco extends Model
{

    protected $table = 'tb_endereco';
    protected $primaryKey = 'id_endereco';

    protected $fillable = [
        'id_endereco',
        'endereco',
        'cep',
        'bairro',
        'cartorio_cnpj',
        'cidade_id',
        'ativo'
    ];
}