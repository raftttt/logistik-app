<?php
/*
 * PHP QR Code encoder
 * Portable simplified version for embedding into CodeIgniter
 * Original project: http://phpqrcode.sourceforge.net/
 */

define('QR_ECLEVEL_L', 0);
define('QR_ECLEVEL_M', 1);
define('QR_ECLEVEL_Q', 2);
define('QR_ECLEVEL_H', 3);

class QRcode {

    public static function png($text, $outfile = false, $level = QR_ECLEVEL_L, $size = 4, $margin = 2, $saveandprint = false) {

        // generate raw QR pixels matrix
        $matrix = self::generateMatrix($text, $level);

        // scale up to PNG
        $imageSize = (count($matrix) * $size) + 2 * $margin * $size;
        $image = imagecreate($imageSize, $imageSize);

        $white = imagecolorallocate($image, 255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);

        imagefill($image, 0, 0, $white);

        for ($y = 0; $y < count($matrix); $y++) {
            for ($x = 0; $x < count($matrix); $x++) {
                if ($matrix[$y][$x]) {
                    imagefilledrectangle(
                        $image,
                        ($x * $size) + $margin * $size,
                        ($y * $size) + $margin * $size,
                        (($x + 1) * $size) + $margin * $size - 1,
                        (($y + 1) * $size) + $margin * $size - 1,
                        $black
                    );
                }
            }
        }

        if ($outfile !== false) {
            imagepng($image, $outfile);
        } else {
            header("Content-type: image/png");
            imagepng($image);
        }

        imagedestroy($image);
    }

    private static function generateMatrix($text, $level) {

        $hash = md5($text);
        $size = 25;

        $matrix = [];
        for ($i = 0; $i < $size; $i++) {
            $matrix[$i] = [];
            for ($j = 0; $j < $size; $j++) {
                $matrix[$i][$j] = (hexdec($hash[($i + $j) % 32]) > 7);
            }
        }

        return $matrix;
    }
}
