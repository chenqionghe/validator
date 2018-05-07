<?php

namespace CQH\Validator\Rules;

use CQH\Validator\Validator;
use CQH\Validator\Rule;

/**
 * Class BoolValidator
 * @author chenqionghe
 * @package CQH\Validator\Rules
 */
class BoolValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return '{field}必须是布尔值';
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
        return is_bool($value);
    }

}
