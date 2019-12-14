<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Requests\Cartorio;

use Cartorio\Request;

class UpdateRequest extends Request
{

    protected $data = [
        'nome_fantasia' => ['string', 'required', 'max_size:100', 'min_size:15'],
        'razao_social'  => ['string', 'required', 'max_size:100', 'min_size:15']
    ];
}