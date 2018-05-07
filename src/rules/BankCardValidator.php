<?php

namespace chenqionghe\Validator\Rules;

use chenqionghe\Validator\Validator;
use chenqionghe\Validator\Rule;

/**
 * Class BankcardValidator
 * @package libs\Validate\rules
 */
class BankCardValidator implements Rule
{
    /**
     * @return string
     */
    public static function message()
    {
        return "{field}不是有效的银行卡格式";
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
        if (strlen($value) > 19 || strlen($value) < 12) return false;
        return !empty($value) ? preg_match('/^[0-9][0-9]{11}[0-9]*$/', $value) : false;
    }

}
