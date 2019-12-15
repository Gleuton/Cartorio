<?php
/**
 * Author: gleuton.dutra
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

    public function findByCartorio(string $cnpj)
    {
        return $this->findBy(
            'WHERE cartorio_cnpj = ' . $cnpj.
            ' AND ativo = 1'
        );
    }
}