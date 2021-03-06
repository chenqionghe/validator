<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class CarPlateValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class CarPlateValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}非法";
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
        return (bool)preg_match('/^[\x{4e00}-\x{9fa5}]{1}[a-zA-Z]{1}[a-zA-Z_0-9]{4}[a-zA-Z_0-9_\x{4e00}-\x{9fa5}]$/u', $value);
    }

}
