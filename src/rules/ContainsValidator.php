<?php

namespace CQH\Validator\Rules;

use CQH\Validator\Validator;
use CQH\Validator\Rule;

/**
 * Class ContainsValidator
 * @author chenqionghe
 * @package CQH\Validator\Rules
 */
class ContainsValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}必须包含%s, 非法值{value}";
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
        if (!isset($params[0])) {
            return false;
        }
        if (!is_string($params[0]) || !is_string($value)) {
            return false;
        }

        $strict = true;
        if (isset($params[1])) {
            $strict = (bool)$params[1];
        }

        if ($strict) {
            return mb_strpos($value, $params[0]) !== false;
        } else {
            return mb_stripos($value, $params[0]) !== false;
        }
    }
}
