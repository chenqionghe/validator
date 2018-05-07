<?php

namespace CQH\Validator\Rules;

use CQH\Validator\Validator;
use CQH\Validator\Rule;

/**
 * Class RequiredValidator
 * @author chenqionghe
 * @package CQH\Validator\Rules
 */
class RequiredValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return '{field}不能为空';
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
        if (isset($params['skipEmpty']) && $params['skipEmpty']) {
            $attributes = $validator->attributes;
            if (isset($attributes[$field])) {
                return true;
            }
        }
        if (is_null($value)) {
            return false;
        } elseif (is_string($value) && trim($value) === '') {
            return false;
        }

        return true;
    }
}
