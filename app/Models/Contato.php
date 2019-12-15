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

    public function findByCartorio($cnpj)
    {
        $contato = $this->findBy(
            'WHERE cartorio_cnpj = ' . $cnpj.
            ' AND ativo = 1'
        );
        if(!$contato){
            return 'false';
        }
        return $contato;
    }
}