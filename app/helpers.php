<?php

use Akaunting\Money\Money;

if (! function_exists('convertToMoney')) {
    function convertToMoney($value) {
        return Money::RUB(number_format($value, 2, '.', ''));
    }
}