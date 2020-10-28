<?php

declare(strict_types=1);

namespace Kryshtalovich\Luhn;

class Calculator
{
    /**
     * Calculating check digit
     *
     * @param string $number
     * @return int
     */
    public function checkDigit(string $number): int
    {
        return 10 - ($this->digitsSum($number) % 10 ?: 10);
    }

    /**
     * Doubles digits at even positions from the end and sum all digits in the number
     * @param string $number
     * @return int
     */
    private function digitsSum(string $number): int
    {
        $reversedArrayOfDigits = array_reverse(str_split($number));

        for ($index = 0, $sum = 0; $index < count($reversedArrayOfDigits); $index++) {
            $digit = (int)$reversedArrayOfDigits[$index];
            $sum += ($index % 2 === 0) ? $this->doubleTheDigit($digit) : $digit;
        }

        return $sum;
    }

    /**
     * Multiplies a digit by 2
     *
     * @param int $digit
     * @return int
     */
    private function doubleTheDigit(int $digit): int
    {
        $result = $digit * 2;

        return ($result > 9) ? $result - 9 : $result;
    }
}