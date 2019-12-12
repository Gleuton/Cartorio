<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Requests\Cartorio;

use Cartorio\Request;

class InsertRequest extends Request
{
    protected $data = [
        'nome_fantasia' => ['integer', 'max:6', 'min:1'],
        'senha'         => ['words', 'required', 'max_size:10', 'min_size:10']
    ];
}