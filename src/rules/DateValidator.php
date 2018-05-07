<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use DateTime;
use chenqionghe\Validator\Rule;

/**
 * Class DateValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class DateValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}是无效的日期格式";
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
        if ($value instanceof DateTime) {
            return true;
        }
        return strtotime($value) !== false;
    }

}
