<?php
use chenqionghe\Validator\Validator;
use PHPUnit\Framework\TestCase;


/**
 * Validator验证器使用示例
 *
 * @author chenqionghe
 */
class ValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function demo()
    {
        $data = [
            'name' => 'chenqionghe',
            'age' => '十八',
            'email' => 'abc',
            'money' => "abc",
            'address' => 'beijing',
            'sex' => 'man',
            'lang' => 'php',
            'domain' => 'www.baidu.cc'
        ];
        $validator = new  Validator($data);
        $validator->rules([
            ['required', 'name'],
            ['email', 'email'],
            ['numeric', 'age'],
            ['length', 'address', ">=", 20],
            ['in', 'sex', ['男', '女']],
            ['notIn', 'lang', ['php', 'go', 'java']],
            ['domain','domain']
        ]);
        //验证触发方法
        $res = $validator->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($validator->errors());//打印所有错误(返回数组)
            var_dump($validator->errorString());//打印错误字符串
        }
    }


    /**
     * @test
     * 自定义错误消息
     */
    public function customerMessage()
    {
        var_dump("自定义错误消息");
        $data = ['name' => '', 'age' => 'a',];
        $label = ['name' => '姓名'];
        $val = new Validator($data, $label);
        $val->rules([
            ['required', "name", 'message' => "姓名不能为空！"],
            ['numeric', "age", 'message' => '{fields}不能为空，年龄必须是数字，非法值{value}！'],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     */
    public function required()
    {
        var_dump("requied：skipEmpty可以跳过空验证，但是必传字段");

        $data = [
            'name' => '',
            'name_isset' => '',
        ];
        $val = new Validator($data);
        $val->rules([
            ['required', "name", 'message' => '姓名不能为空',],
            ['required', "name_isset", 'message' => 'name_isset字段必须有，可以为空', 'skipEmpty' => false],
        ]);

        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 测试url规则
     */
    public function url()
    {
        $data = ['url1' => 'abcdef', 'url2' => 'http://www.baidu.com'];
        $val = new Validator($data);
        $val->rules([
            ['url', "url1"],
            ['url', "url2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }


    /**
     * @test
     * 测试必须是邮箱
     */
    public function email()
    {
        $data = ['email1' => 'abcdef', 'email2' => 'chenqionghe@sina.com'];
        $val = new Validator($data);
        $val->rules([
            ['email', "email1"],
            ['email', "email2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }


    /**
     * @test
     * 验证必须是数字
     */
    public function numeric()
    {
        $data = ['number1' => '123', 'number2' => 'abcd'];
        $val = new Validator($data);
        $val->rules([
            ['numeric', "number1"],
            ['numeric', "number2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }


    /**
     * @test
     * 测试必须是英文字母
     */
    public function alpha()
    {
        $data = ['name1' => '123', 'name2' => 'abcd'];
        $val = new Validator($data);
        $val->rules([
            ['alpha', "name1"],
            ['alpha', "name2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证只能是英文字母和数字
     */
    public function alphaNum()
    {
        $data = ['name1' => '123abc___', 'name2' => '123abc'];
        $val = new Validator($data);
        $val->rules([
            ['alphaNum', "name1"],
            ['alphaNum', "name2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证只能是英文字母、数字、下划线、破折号
     */
    public function slug()
    {
        $data = ['name1' => '123abc___', 'name2' => '123abc...'];
        $val = new Validator($data);
        $val->rules([
            ['slug', "name1"],
            ['slug', "name2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证只能是有效的时间格式
     */
    public function date()
    {
        $data = ['date1' => '123abc___', 'date2' => '20180201', 'date3' => '20180201 12:00'];
        $val = new Validator($data);
        $val->rules([
            ['date', "date1"],
            ['date', "date2"],
            ['date', "date3"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证必须是有效的大陆电话
     */
    public function tel()
    {
        $data = ['tel1' => '1234abcd', 'tel2' => '089862222222'];
        $val = new Validator($data);
        $val->rules([
            ['tel', "tel1"],
            ['tel', "tel2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证必须是手机号
     */
    public function mobile()
    {
        $data = ['mobile1' => '1234abcd', 'mobile2' => '13188888888'];
        $val = new Validator($data);
        $val->rules([
            ['mobile', "mobile1"],
            ['mobile', "mobile2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证必须是合法的json
     */
    public function json()
    {
        $data = ['json1' => 'abcdef', 'mobile2' => '{"name":"chenqionghe","age":18}'];
        $val = new Validator($data);
        $val->rules([
            ['json', "json1"],
            ['json', "json2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证必须是ip地址
     */
    public function ip()
    {
        $data = ['ip1' => 'abcdef', 'ip2' => '127.0.0.1'];
        $val = new Validator($data);
        $val->rules([
            ['ip', "ip1"],
            ['ip', "ip2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证必须是布尔值
     */
    public function bool()
    {
        $data = ['eq' => 'abcdef', 'mobile2' => false];
        $val = new Validator($data);
        $val->rules([
            ['bool', "bool1"],
            ['bool', "bool2"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, true);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证指定字段必须相同
     */
    public function same()
    {
        $data = ['name1' => 'abc', 'name2' => 'abcd'];
        $val = new Validator($data);
        $val->rules([
            ['same', "name1", 'name2'],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证指定字段必须相同
     */
    public function diff()
    {
        $data = ['name1' => 'abc', 'name2' => 'abc'];
        $val = new Validator($data);
        $val->rules([
            ['diff', "name1", 'name2'],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }


    /**
     * @test
     * 验证长度
     */
    public function length()
    {
        $data = ['name' => 'a'];
        $val = new Validator($data);
        $val->rules([
            ['length', 'name', ">", 18],//name长度 > 18
            ['length', 'name', ">=", 18],//name长度 >= 18
            ['length', 'name', "<", 18],//name长度 < 18
            ['length', 'name', "<=", 18],//name长度 <= 18
            ['length', 'name', "==", 18],//name长度 == 18
            ['length', 'name', "===", 18],//name长度 === 18
            ['length', 'name', "!=", 18],//name长度 != 18
            ['length', 'name', "!==", 18],//name长度 !== 18
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 对比验证
     */
    public function compare()
    {
        $data = ['age' => 18];
        $val = new Validator($data);
        $val->rules([
            ['compare', 'age', ">", 18],
            ['compare', 'age', ">=", 18],
            ['compare', 'age', "<", 18],
            ['compare', 'age', "<=", 18],
            ['compare', 'age', "==", 18],
            ['compare', 'age', "===", 18],
            ['compare', 'age', "!=", 18],
            ['compare', 'age', "!==", 18],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 包含验证
     */
    public function testContains()
    {
        $data = ['name1' => "abcd", 'name2' => 'cqhabc'];
        $val = new Validator($data);
        $val->rules([
            ['contains', ['name1', 'name2'], "cqh"],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证必须在某个范围
     */
    public function in()
    {
        $data = ['name' => "abc", 'lang' => 'abcd'];
        $val = new Validator($data);
        $val->rules([
            ['in', "name", ['jack', 'rose', 'james']],
            ['in', "lang", ['php', 'java', 'go']],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 验证必须不在某个范围
     */
    public function notIn()
    {
        $data = ['name' => "abc", 'lang' => 'php'];
        $val = new Validator($data);
        $val->rules([
            ['notIn', "name", ['jack', 'rose', 'james']],
            ['notIn', "lang", ['php', 'java', 'go']],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 正则验证
     */
    public function regex()
    {
        $data = ['name1' => "abc", 'name2' => 'cqhabc'];
        $val = new Validator($data);
        $val->rules([
            ['regex', ['name1', 'name2'], '/^cqh.*/'],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }


    /**
     * @test
     * 闭包验证
     */
    public function closure()
    {
        $data = ['name1' => "abc"];
        $val = new Validator($data);
        $val->rules([
            [function ($field, $value) {
                return $value == 'helloWorld';
            }, 'name1', 'message' => '名字不是helloWorld'],

        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }
    }

    /**
     * @test
     * 自定义php函数验证
     */
    public function func()
    {
        $data = ['name' => "abc"];
        $val = new Validator($data);
        $val->rules([
            ['func', 'name', 'is_array'],
            ['func', 'name', [\chenqionghe\Utils\Arrays::class, 'isMultidim']],
        ]);
        $res = $val->validate();
        $this->assertEquals($res, false);
        if (!$res) {
            var_dump($val->errorString());//打印错误字符串
        }

    }

    /**
     * @test
     * 验证数组内部元素
     */
    public function array()
    {
        $data = [
            'a' => 'b',
            'demo' => [
                'name' => '',
                'age' => '十八'
            ]
        ];
        $validator = new  Validator($data);
        $validator->rules([
            ['required', 'demo.name'],//$data['demo']['name']必传
            ['numeric', 'demo.age', 'message' => "哈哈"],//$data['demo']['age']必须是整数
        ]);
        $res = $validator->validate();
        $this->assertEquals($res, false);
        if ($res) {
            //验证成功
        } else {
            var_dump($validator->errorString());
        }
    }


}
