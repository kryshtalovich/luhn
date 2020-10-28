<?php

declare(strict_types=1);

namespace Luhn;

class Generate
{
    private const CHECK_DIGIT_LENGTH = 1;

    /**
     * Generate valid card number with Luhn's algorithm
     *
     * @param int $length
     * @param string|null $prefix
     * @return string
     */
    public function generateCardNumber(int $length = 16, string $prefix = null): string
    {
        $prefixLength = $prefix ? strlen($prefix) : 0;
        $number = $prefix . $this->getRandomNumber($length - $prefixLength - self::CHECK_DIGIT_LENGTH);

        return $number . (new Calculator())->checkDigit($number);
    }

    /**
     * Generate random number with pre-defined length
     *
     * @param int $length
     * @return int
     */
    private function getRandomNumber(int $length): int
    {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;

        return mt_rand($min, $max);
    }
}