<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Requests\Contato;

use Cartorio\Request;

class UpdateRequest extends Request
{
    protected $data = [
        'fone'          => ['fone'],
        'email'         => ['email'],
        'cartorio_cnpj' => ['cnpj', 'required']
    ];
}