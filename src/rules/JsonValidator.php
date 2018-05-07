<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class JsonValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class JsonValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}不是合法的json结构";
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
        return is_array(json_decode($value, true));
    }

}
