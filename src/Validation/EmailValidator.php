<?php
/**
 * Author: gleuton.dutra
 */

namespace Cartorio\Validation;

class EmailValidator extends Validator
{

    protected $value;
    protected $valid = true;

    public function __construct($value)
    {
        $this->value = $value;
        if (!empty($value)
            && !preg_match(
                '/^([\w.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/',
                $this->value
            )
        ) {
            $this->addErrors('email');
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }
}