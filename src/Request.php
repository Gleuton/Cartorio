<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio;


use Cartorio\Validation\Validator;
use Cartorio\Validation\ValidatorMessageTrait;

abstract class Request
{
    use ValidatorMessageTrait;

    protected $data = [];

    public function post()
    {
        $value = [];
        foreach ($this->data as $field => $type) {
            $value[$field] = trim(filter_input(INPUT_POST, $field));
            $validator = $this->validator($type, $value[$field]);

            if (!$validator->isValid()) {
                $validate['errors'][$field] = $this->getMessages(
                    $validator->getErrors(),
                    $field
                );
            }
        }

        return $validate ?? $value;
    }

    /**
     * @param array  $validators
     * @param        $value
     *
     * @return Validator
     */
    private function validator(
        array $validators,
        $value
    ): Validator {
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

    private function getMessages(array $errors, $field): string
    {
        return $this->message[$errors[0]] ?? "Campo {$field} Invalido";
    }

}