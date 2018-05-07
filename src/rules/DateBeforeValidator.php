<?php

namespace chenqionghe\Validator\Rules;
use chenqionghe\Validator\Validator;
use DateTime;
use chenqionghe\Validator\Rule;

/**
 * Class DateBeforeValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class DateBeforeValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "日期必须在%s之前";
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
        $time = ($value instanceof DateTime) ? $value->getTimestamp() : strtotime($value);
        $beforeTime = ($params[0] instanceof DateTime) ? $params[0]->getTimestamp() : strtotime($params[0]);

        return $time < $beforeTime;
    }

}
