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

    public function findByCartorio(string $cnpj)
    {
        $modelCidade = new Cidade();
        $endereco = $this->findBy(
            'WHERE cartorio_cnpj = ' . $cnpj.
            ' AND ativo = 1'
        );
        if(!$endereco){
            return 'false';
        }
        $cidade = $modelCidade->find($endereco->cidade_id);
        $endereco->cidade = $cidade->cidade;
        $endereco->uf = $cidade->estado_uf;

        return $endereco;
    }
}