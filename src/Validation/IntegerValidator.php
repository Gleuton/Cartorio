<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\Validation;

class IntegerValidator extends Validator
{

    protected $value;
    protected $valid = true;

    private $message = [
        'integer' => 'Integer required'
    ];

    public function __construct($value)
    {
        $this->value = $value;
        if (!preg_match('/[0-9]+/', $this->value)) {
            $this->valid = false;
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }


    public function max(int $max): IntegerValidator
    {
        if ($this->value > $max) {
            $this->valid = false;
        }
        return $this;
    }

    public function min(int $min): IntegerValidator
    {
        if ($this->value < $min) {
            $this->valid = false;
        }
        return $this;
    }

    public function getMessage(string $index)
    {
        return $this->message[$index];
    }
}