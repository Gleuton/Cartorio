<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\Validation;

class CepValidator extends Validator
{

    protected $value;
    protected $valid = true;

    public function __construct($value)
    {
        $this->value = $value;
        if (!empty($value) && !preg_match('/^[0-9]{8}$/', $this->value)) {
            $this->addErrors('cep');
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }
}