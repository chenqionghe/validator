<?php

namespace CQH\Validator\Rules;

use CQH\Validator\Validator;
use CQH\Validator\Rule;

/**
 * Class AlphaNumValidator
 * @author chenqionghe
 * @package CQH\Validator\Rules
 */
class AlphaNumValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}只能包括英文字母(a-z)和数字(0-9)";
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
        return preg_match('/^([a-z0-9])+$/i', $value);
    }
}
