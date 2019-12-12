<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Requests\Cartorio;

use Cartorio\Request;

class InsertRequest extends Request
{
    protected $data = [
        'nome_fantasia' => ['integer','max:2'],
        'senha' => ['string','required']
    ];
}