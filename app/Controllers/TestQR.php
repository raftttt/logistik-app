<?php

namespace App\Controllers;

class TestQR extends BaseController
{
    public function index()
    {
        echo generateQR_local("TESTING");
    }
}
