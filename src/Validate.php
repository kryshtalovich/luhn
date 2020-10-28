<?php

declare(strict_types=1);

namespace Kryshtalovich\Luhn;

class Validate
{
    /**
     * Check card number validation with Luhn's algorithm
     *
     * @param string $number
     * @return bool
     */
    public function isValid(string $number): bool
    {
        $number = preg_replace("/[^0-9]/", "", $number);
        $numberLength = strlen($number);
        if ($numberLength < 13 || $numberLength > 19) {
            return false;
        }
        $sumOfDigits = 0;
        for ($i = $numberLength - 1, $flag = 0; $i >= 0; $i--, ++$flag) {
            $digit = $flag & 1 ? $number[$i] * 2 : $number[$i];
            $sumOfDigits += $digit > 9 ? $digit - 9 : $digit;
        }

        return $sumOfDigits % 10 === 0;
    }
}