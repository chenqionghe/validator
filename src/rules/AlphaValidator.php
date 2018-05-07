<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class AlphaValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class AlphaValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}只能包括英文字母(a-z)";
    }

    /**
     * @param $field
     * @param $value
     * @param array $params
     * @param Validator $validator
     * @return mixed
     */
    public static function validate($field, $value, $params = [], Validator $validator)
    {
        return preg_match('/^([a-z])+$/i', $value);
    }

}
