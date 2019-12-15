<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Models;

class Contato extends Model
{

    protected $table = 'tb_contato';
    protected $primaryKey = 'id_contato';

    protected $fillable = [
        'id_contato',
        'fone',
        'email',
        'cartorio_cnpj',
        'ativo'
    ];
}