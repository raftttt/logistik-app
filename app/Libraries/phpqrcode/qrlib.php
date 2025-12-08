<?php
/*
 * Minimal PHP QR Code encoder (standalone version)
 * Made for lightweight QR generation without dependencies
 */

class QRcode
{
    public static function png($text, $outfile = false, $level = QR_ECLEVEL_L, $size = 4, $margin = 2)
    {
        require_once __DIR__ . '/qrmatrix.php'; // matrix generator file

        $qr = QRmatrix::encode($text, $level);

        $image = self::matrixToPng($qr, $size, $margin);

        if ($outfile) {
            imagepng($image, $outfile);
        } else {
            header('Content-type: image/png');
            imagepng($image);
        }

        imagedestroy($image);
    }

    private static function matrixToPng($matrix, $scale, $margin)
    {
        $rows = count($matrix);
        $cols = count($matrix[0]);

        $imgSize = ($rows + 2 * $margin) * $scale;
        $image = imagecreatetruecolor($imgSize, $imgSize);

        $white = imagecolorallocate($image, 255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);

        imagefill($image, 0, 0, $white);

        for ($r = 0; $r < $rows; $r++) {
            for ($c = 0; $c < $cols; $c++) {
                $color = $matrix[$r][$c] ? $black : $white;
                imagefilledrectangle(
                    $image,
                    ($c + $margin) * $scale,
                    ($r + $margin) * $scale,
                    ($c + $margin + 1) * $scale,
                    ($r + $margin + 1) * $scale,
                    $color
                );
            }
        }

        return $image;
    }
}

// ===== Error Correction Levels =====
define('QR_ECLEVEL_L', 0); // lowest
define('QR_ECLEVEL_M', 1);
define('QR_ECLEVEL_Q', 2);
define('QR_ECLEVEL_H', 3);

?>
