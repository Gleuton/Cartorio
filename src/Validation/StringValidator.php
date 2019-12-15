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
        if (!empty($value) && !is_string($this->value)) {
            $this->addErrors('string');
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function max_size(int $length): StringValidator
    {
        if (mb_strlen($this->value) > $length) {
            $this->addErrors('max_size');
        }
        return $this;
    }

    public function min_size(int $length): StringValidator
    {
        if (mb_strlen($this->value) < $length) {
            $this->addErrors('min_size');
        }
        return $this;
    }
}