<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Requests\Endereco;

use Cartorio\Request as AbstractRequest;

class Request extends AbstractRequest
{
    protected $data = [
        'cep'           => ['cep'],
        'endereco'      => ['string', 'required', 'max_size:100', 'min_size:15'],
        'bairro'        => ['string', 'required', 'max_size:100', 'min_size:15'],
        'cartorio_cnpj' => ['cnpj', 'required'],
        'cidade_id'     => ['ibge']
    ];
}