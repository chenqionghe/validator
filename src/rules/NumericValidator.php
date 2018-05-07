<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class NumericValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class NumericValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}只能是数字";
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
        return is_numeric($value);
    }

}
