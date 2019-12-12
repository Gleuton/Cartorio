<?php
/**
 * Author: gleuton.dutra
 */

namespace Cartorio\Validation;


abstract class Validator
{
    protected $value;
    protected $valid;

    abstract public function isValid(): bool;

    public function required()
    {
        if (is_null($this->value) || empty($this->value)) {
            $this->valid = false;
        }
    }
}