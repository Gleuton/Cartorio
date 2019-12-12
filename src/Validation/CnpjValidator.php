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
        if (!preg_match('/^\d{3}\d{3}\d{3}\d{2}$/', $this->value)) {
            $this->addErrors('integer');
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }
}