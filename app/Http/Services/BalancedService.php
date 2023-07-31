<?php

namespace App\Http\Services;

class BalancedService
{
    private function pairs()
    {
        return ['{' => '}', '[' => ']', '(' => ')'];
    }

    public function checkStack(string $stack)
    {

        if (strlen($stack) == 1 || strlen($stack) % 2 != 0) {
            return false;
        }

        $pairs = $this->pairs();
        $stackToArray = str_split($stack);

        $open = [];

        foreach ($stackToArray as $char) {
            if ($char == '(' || $char == '[' || $char == '{') {
                array_push($open, $char);
            } else {
                $last = end($open);

                if (empty($open) || $pairs[$last] != $char) {
                    return false;
                }

                array_pop($open);
            }
        }

        return empty($open) ? true : false;
    }
}
