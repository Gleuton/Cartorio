<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\Validation;

class WordsValidator extends Validator
{
    protected $value;
    protected $valid = true;


    public function __construct($value)
    {
        $this->value = $value;
        if (!preg_match('/[\p{L}]+/', $this->value))  {
            $this->addErrors('words');
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function max_size(int $length): WordsValidator
    {
        if (mb_strlen($this->value) > $length) {
            $this->addErrors('max_size');
        }
        return $this;
    }

    public function min_size(int $length): WordsValidator
    {
        if (mb_strlen($this->value) < $length) {
            $this->addErrors('min_size');
        }
        return $this;
    }
}