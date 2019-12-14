<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Models;

class Tabeliao extends Model
{

    protected $table = 'tb_tabeliao';
    protected $primaryKey = 'id_tabeliao';

    protected $fillable = [
        'id_tabeliao',
        'nome',
        'cartorio_cnpj',
        'ativo'
    ];
}