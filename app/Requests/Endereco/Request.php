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
        'endereco'      => ['string', 'required', 'max_size:90', 'min_size:2'],
        'bairro'        => ['string', 'required', 'max_size:10', 'min_size:2'],
        'cartorio_cnpj' => ['cnpj', 'required'],
        'cidade_id'     => ['string', 'required', 'max_size:7', 'min_size:7'],
    ];
}