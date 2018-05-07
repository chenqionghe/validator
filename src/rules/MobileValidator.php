<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class MobileValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class MobileValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}不是有效的手机号码";
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
        return preg_match('/^(\+?86-?|0)?1[0-9]{10}$/', $value);
    }
}
