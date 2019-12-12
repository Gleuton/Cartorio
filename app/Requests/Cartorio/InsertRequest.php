<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Requests\Cartorio;

use Cartorio\Request;

class InsertRequest extends Request
{
    protected $data = [
        'nome_fantasia' => ['string', 'max_size:100', 'min:15'],
        'razao_social'  => ['string', 'max_size:100', 'min:15'],
        'cnpj' => ['cnpj']
    ];
}