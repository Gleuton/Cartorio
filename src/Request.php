<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio;


use Cartorio\Validation\Validator;

abstract class Request
{
    protected $data = [];

    public function post()
    {
        $field = [];
        foreach ($this->data as $value => $type) {
            $field[$value] = trim(filter_input(INPUT_POST, $value));

            if (!$this->validator($type, $field[$value])->isValid()) {
                var_dump('invalido');
            }
        }
        return $field;
    }

    /**
     * @param array $validators
     * @param       $value
     *
     * @return Validator
     */
    public function validator(array $validators, $value): Validator
    {
        $validatorClass = '\\Cartorio\\Validation\\' .
            ucfirst($validators[0])
            . 'Validator';
        /**
         * @var $validator Validator
         */
        $validator = new $validatorClass($value);

        for ($i = 1; $i < count($validators); $i++) {
            $event = explode(':', $validators[$i]);
            $validator->{$event[0]}($event[1] ?? null);
        }


        return $validator;
    }
}