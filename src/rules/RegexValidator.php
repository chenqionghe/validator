<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class RegexValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class RegexValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}格式无效";
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
        return preg_match($params[0], $value);
    }

}
