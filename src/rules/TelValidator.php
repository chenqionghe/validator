<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class TelValidator
 * @author chenqionghe
 * @package chenqionghe\Validator\Rules
 */
class TelValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}不是有效的大陆电话";
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
        return preg_match('/(\d{4}-|\d{3}-)?(\d{8}|\d{7})/', $value);
    }

}
