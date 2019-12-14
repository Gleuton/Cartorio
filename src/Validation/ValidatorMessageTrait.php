<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\Validation;


trait ValidatorMessageTrait
{
    protected $message = [
        'required' => 'Campo Obrigatorio',
        'integer'  => 'Campo deve ser um valor inteiro',
        'min'      => 'Valor menor que o esperado',
        'max'      => 'Valor maior que o esperado',
        'words'    => 'Campo não deve conter valores numéricos',
        'max_size' => 'Campo muito longo',
        'min_size' => 'Campo muito curto',
        'cnpj'     => 'CNPJ invalido'
    ];
}