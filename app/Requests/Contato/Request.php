<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Requests\Contato;

use Cartorio\Request as AbstractRequest;

class Request extends AbstractRequest
{
    protected $data = [
        'fone'          => ['fone'],
        'email'         => ['email'],
        'cartorio_cnpj' => ['cnpj', 'required']
    ];
}