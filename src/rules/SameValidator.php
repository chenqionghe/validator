<?php

namespace CQH\Validator\Rules;

use CQH\Validator\Validator;
use CQH\Validator\Rule;

/**
 * Class SameValidator
 * @author chenqionghe
 * @package CQH\Validator\Rules
 */
class SameValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}必须和%s相同";
    }

    /**
     * @param $field
     * @param $value
     * @param array $params
     * @param Validator $validator
     * @return bool
     */
    public static function validate($field, $value, $params = [], Validator $validator)
    {
        $field2 = $params[0];
        return $value == $validator->$field2;
    }
}
