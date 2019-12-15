<?php
/**
 * Author: gleuton.dutra
 */

namespace Cartorio\Validation;

class FoneValidator extends Validator
{

    protected $value;
    protected $valid = true;

    public function __construct($value)
    {
        $this->value = $value;
        if (!empty($value) && !preg_match('/^[0-9]{10,11}$/', $this->value)) {
            $this->addErrors('fone');
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }
}