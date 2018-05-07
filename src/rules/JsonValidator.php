<?php

namespace CQH\Validator\Rules;

use CQH\Validator\Validator;
use CQH\Validator\Rule;

/**
 * Class JsonValidator
 * @author chenqionghe
 * @package CQH\Validator\Rules
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
