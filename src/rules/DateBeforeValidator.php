<?php

namespace CQH\Validator\Rules;
use CQH\Validator\Validator;
use DateTime;
use CQH\Validator\Rule;

/**
 * Class DateBeforeValidator
 * @author chenqionghe
 * @package CQH\Validator\Rules
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
