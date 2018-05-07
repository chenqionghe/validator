<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class InValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class InValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return '{field}必须在%s范围内';
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
        $isAssoc = array_values($params[0]) !== $params[0];
        if ($isAssoc) {
            $params[0] = array_keys($params[0]);
        }
        $strict = false;
        if (isset($params[1])) {
            $strict = $params[1];
        }
        return in_array($value, $params[0], $strict);
    }
}
