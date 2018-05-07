<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class BoolValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
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
