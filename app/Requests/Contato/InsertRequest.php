<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Requests\Contato;

use Cartorio\Request;

class InsertRequest extends Request
{
    protected $data = [
        'fone'          => ['fone'],
        'email'         => ['email'],
        'cartorio_cnpj' => ['cnpj', 'required']
    ];
}