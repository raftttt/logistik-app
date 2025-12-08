<?php

class QRmatrix
{
    public static function encode($text, $level)
    {
        $binary = self::toBinary($text);

        $size = ceil(sqrt(strlen($binary))) + 4;
        $matrix = array_fill(0, $size, array_fill(0, $size, 0));

        $x = 2; $y = 2;
        foreach (str_split($binary) as $bit) {
            $matrix[$y][$x] = (int)$bit;
            $x++;
            if ($x >= $size - 2) {
                $x = 2;
                $y++;
            }
        }

        return $matrix;
    }

    private static function toBinary($text)
    {
        $binary = '';
        foreach (str_split($text) as $char) {
            $binary .= sprintf('%08b', ord($char));
        }
        return $binary;
    }
}
?>
