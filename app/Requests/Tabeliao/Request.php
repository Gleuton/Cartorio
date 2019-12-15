<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Requests\Tabeliao;

use Cartorio\Request as AbstracRequest;

class Request extends AbstracRequest
{
    protected $data = [
        'nome'          => ['string', 'required', 'max_size:90', 'min_size:8'],
        'cartorio_cnpj' => ['cnpj', 'required']
    ];
}