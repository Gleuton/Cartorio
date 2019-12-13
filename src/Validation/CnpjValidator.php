<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\Validation;

class CnpjValidator extends Validator
{

    protected $value;
    protected $valid = true;

    public function __construct($value)
    {
        $this->value = $value;
        if (!preg_match('/^[0-9]{14}$/', $this->value)) {
            $this->addErrors('cnpj');
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }
}