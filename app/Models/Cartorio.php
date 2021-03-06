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

    public function all(string $filter = '')
    {
        $tabeliao = new Tabeliao();
        $cartorios = array_reverse(parent::all($filter . ' ORDER BY create_dt'));
        foreach ($cartorios as $cartorio) {
            $cartorio->tabeliao = $tabeliao->findByCartorio($cartorio->cnpj)->nome ?? '';
        }
        return $cartorios;
    }
}