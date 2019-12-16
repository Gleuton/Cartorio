<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\Validation;

use App\Models\Cartorio;
use Cartorio\DataBase\Builder;
use Cartorio\DataBase\Connection;

class CnpjValidator extends Validator
{

    protected $value;
    protected $valid = true;

    public function __construct($value)
    {
        $this->value = $value;
        if (!empty($value) && !preg_match('/^[0-9]{14}$/', $this->value)) {
            $this->addErrors('cnpj');
        }
    }

    public function unique()
    {
        $cartorio = new Cartorio();
        if (!empty($this->value)) {
            if ($cartorio->find($this->value)) {
                $this->addErrors('unique');
            }
        }
    }

    public function isValid(): bool
    {
        return $this->valid;
    }
}