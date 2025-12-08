<?php

require_once APPPATH.'Libraries/phpqrcode/qrlib.php';

function generateQR($text)
{
    $qrName = md5($text).'.png';
    $savePath = FCPATH.'uploads/qrcodes/';

    if (!is_dir($savePath)) {
        mkdir($savePath, 0777, true);
    }

    \QRcode::png($text, $savePath.$qrName, QR_ECLEVEL_L, 5);

    return 'uploads/qrcodes/'.$qrName;
}

