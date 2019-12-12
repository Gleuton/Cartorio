<?php
/**
 * Author: gleuton.dutra
 */

namespace Cartorio\Validation;


abstract class Validator
{
    protected $value;
    protected $valid;
    private $errors = [];

    abstract public function isValid(): bool;

    public function required()
    {
        if (is_null($this->value) || empty($this->value)) {
            $this->addErrors('required');
        }
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function addErrors(string $type)
    {
        $this->errors[] = $type;
        $this->valid = false;
    }
}