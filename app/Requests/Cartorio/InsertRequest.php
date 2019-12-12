<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Requests\Cartorio;

use Cartorio\Request;

class InsertRequest extends Request
{

    protected $data = [
        'nome_fantasia' => ['string', 'required', 'max_size:100', 'min_size:15'],
        'razao_social'  => ['string', 'required', 'max_size:100', 'min_size:15'],
        'cnpj'          => ['cnpj', 'required']
    ];
}