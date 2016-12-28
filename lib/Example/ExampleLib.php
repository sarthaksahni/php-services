<?php
namespace Lib\Example;

class ExampleLib
{
    public function exampleMethod()
    {
        return "testing string";
    }

    public function joinStrings($string_one, $string_two)
    {
        sleep(rand(1,2));
        return $string_one." ".$string_two;
    }

    public function someMethod()
    {
        return [
            "bool_value" => true,
            "integer_value" => 23,
            "string_value" => "88",
            "nested" => [
                "nested" => [
                    "string" => "Hello World",
                    "float" => 78.3
                ]
            ]
        ];
    }
}
