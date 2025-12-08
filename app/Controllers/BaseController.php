<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $request;

    protected $helpers = ['qr'];


    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // preload session jika mau
        // $this->session = service('session');
    }

    // ========= LETAKKAN DI SINI — SELESAI initController =========
    protected function cekLogin()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->send();
        }
    }
}
