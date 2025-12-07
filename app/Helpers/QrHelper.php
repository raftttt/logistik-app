<?php

use QRcode;

function generateQR_local($text): string
{
    require_once APPPATH . 'Libraries/phpqrcode/qrlib.php';

    $tempDir = FCPATH . 'uploads/qrcodes/';

    if (!is_dir($tempDir)) {
        mkdir($tempDir, 0777, true);
    }

    $fileName = md5($text) . '.png';

    QRcode::png($text, $tempDir . $fileName, QR_ECLEVEL_L, 5);

    return base_url('uploads/qrcodes/' . $fileName);
}



