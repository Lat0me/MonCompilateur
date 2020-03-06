<?php

namespace Console;

class Tokenisation
{
    const BLANK = "*";
    const OPEN_ACOLADE = "{";
    const CLOSE_ACOLADE = "}";
    const OPEN_PARENTHESE = "(";
    const CLOSE_PARENTHESE = ")";
    const POINT = ".";
    const COMA = ",";
    const POINT_COMA = ";";
    const SIMPLE_GUILLEMET = "'";
    const DOUBLE_GUILLEMET = '"';
    const ASSIGNATION = ' = ';
    const OPERATOR_EQUAL = ' == ' || ' === ';
    const OPERATOR_MIN = ' < ';
    const OPERATOR_MAX = ' > ';
    const OPERATOR_EQUAL_MAX = ' >= ';
    const OPERATOR_EQUAL_MIN = ' <= ';

    public function token($fileContent)
    {
        $fileContent = $this->replaceByToken($fileContent);

        $token = explode(" ", $fileContent);

        foreach ($token as $key => $value) {
            if (empty($value)) {
                unset($token[$key]);
            } else {
                $trimValue = trim($value);

                $token[$key] = $this->defineTokenType($trimValue);
            }
        }

        var_dump($token);
    }

    private function replaceByToken($fileContent)
    {
        $fileContent = str_replace(" ", " " . $this::BLANK . " ", $fileContent);
        $fileContent = str_replace(" * * * * ", " tab ", $fileContent);
        $fileContent = str_replace($this::OPEN_PARENTHESE, " OPEN_PARENTHESE ", $fileContent);
        $fileContent = str_replace($this::CLOSE_PARENTHESE, " CLOSE_PARENTHESE ", $fileContent);
        $fileContent = str_replace($this::OPEN_ACOLADE, " OPEN_ACOLADE ", $fileContent);
        $fileContent = str_replace($this::CLOSE_ACOLADE, " CLOSE_PARENTHESE ", $fileContent);
        $fileContent = str_replace($this::POINT, " POINT ", $fileContent);
        $fileContent = str_replace($this::COMA, " COMA ", $fileContent);
        $fileContent = str_replace($this::POINT_COMA, " POINT_COMA ", $fileContent);
        $fileContent = str_replace($this::SIMPLE_GUILLEMET, " SIMPLE_GUILLEMET ", $fileContent);
        $fileContent = str_replace($this::DOUBLE_GUILLEMET, " DOUBLE_GUILLEMET ", $fileContent);
        $fileContent = str_replace($this::ASSIGNATION, " ASSIGNATION ", $fileContent);
        $fileContent = str_replace($this::OPERATOR_EQUAL, " OPERATOR_EQUAL ", $fileContent);
        $fileContent = str_replace($this::OPERATOR_MIN, " OPERATOR_MIN ", $fileContent);
        $fileContent = str_replace($this::OPERATOR_MAX, " OPERATOR_MAX ", $fileContent);
        $fileContent = str_replace($this::OPERATOR_EQUAL_MAX, " OPERATOR_EQUAL_MAX ", $fileContent);
        $fileContent = str_replace($this::OPERATOR_EQUAL_MIN, " OPERATOR_EQUAL_MIN ", $fileContent);

        return $fileContent;
    }

    private function defineTokenType($value)
    {
        if ($value == "*") {
            return 'BLANK';
        } elseif ($value === "tab" || $value === "OPEN_ACOLADE" || $value === "CLOSE_PARENTHESE" || $value === "OPEN_PARENTHESE" || $value === "CLOSE_ACOLADE" || $value === "CLOSE_PARENTHESE" || $value === "POINT" || $value === "COMA" || $value === "POINT_COMA" || $value === "SIMPLE_GUILLEMET" || $value === "DOUBLE_GUILLEMET" || $value === "ASSIGNATION" || $value === "OPERATOR_EQUAL" || $value === "OPERATOR_MIN" || $value === "OPERATOR_EQUAL_MAX" || $value === "OPERATOR_EQUAL_MIN" || $value === "OPERATOR_MAX") {
            return $value;
        } else {
            $firstElement = substr($value, 0, 1);
            print $firstElement;

            if ($firstElement === "$") {
                return ['Object' => $value];
            }

            return ['UNDEFINED' => $value];
        }
    }
}
