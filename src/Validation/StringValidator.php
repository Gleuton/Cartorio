<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\Validation;

class StringValidator extends Validator
{
    protected $value;
    protected $valid = true;

    public function __construct($value)
    {
        $this->value = $value;
        if (!is_string($this->value)) {
            $this->valid = false;
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function size(int $length): StringValidator
    {
        if (strlen($this->value) != $length) {
            $this->valid = false;
        }
        return $this;
    }

    public function max_size(int $length): StringValidator
    {
        if (strlen($this->value) > $length) {
            $this->valid = false;
        }
        return $this;
    }

    public function min_size(int $length): StringValidator
    {
        if (strlen($this->value) < $length) {
            $this->valid = false;
        }
        return $this;
    }
}