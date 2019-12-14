<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\Validation;

class IntegerValidator extends Validator
{

    protected $value;
    protected $valid = true;

    public function __construct($value)
    {
        $this->value = $value;
        if (!preg_match('/[0-9]+/', $this->value)) {
            $this->addErrors('integer');
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }


    public function max(int $max): IntegerValidator
    {
        if ($this->value > $max) {
            $this->addErrors('max');
        }
        return $this;
    }

    public function min(int $min): IntegerValidator
    {
        if ($this->value < $min) {
            $this->addErrors('min');
        }
        return $this;
    }
}