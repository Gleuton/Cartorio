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
            'WHERE cartorio_cnpj = ' . $cnpj .
            ' AND ativo = 1'
        );
    }

    public function insert(array $data)
    {
        $data['nome'] = trim($data['nome']);
        $data['nome'] = strtolower($data['nome']);
        $data['nome'] = ucwords($data['nome']);
        $tabeliao = $this->findBy("WHERE nome = '{$data['nome']}'");

        if ($tabeliao) {
            $data['ativo'] = 1;
            return $this->update($tabeliao->id_tabeliao, $data);
        }
        return parent::insert($data);
    }
}