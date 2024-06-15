<?php
class Operasional extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }
    public function index()
    {
        $apiurl = APIURL;
        $response = file_get_contents($apiurl);
        
        $data['api'] = json_decode($response, true);
        $data['method'] = 'Realisasi Project';
        $data['subjudul'] = 'Realisasi Project';
        $data['judul'] = OPERASIONAL;
      
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('operasional/index', ['data' => $data]);
        $this->view('templates/footer');
        $this->view('templates/resource');
    }
    public function import()
    {
        $data['method'] = 'Import Data';
        $data['subjudul'] = 'Import Data';
        $data['judul'] = 'Import Transaksi';
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('Operasional/import');
        $this->view('templates/footer');
        $this->view('templates/resource');
    }
    // public function presensi()
    // {
    //     $data['method'] = 'Presensi Project';
    //     $data['subjudul'] = 'Presensi Project';
    //     $data['judul'] = 'Operasional';
    //     $this->view('templates/header', $data);
    //     $this->view('templates/navbar', $data);
    //     $this->view('operasional/presensi', $data);
    //     $this->view('templates/footer');
    //     $this->view('templates/resource');
    // }
    // public function registeredproject()
    // {
    //     $data['method'] = 'Rencana Project';
    //     $data['subjudul'] = 'Rencana Project';
    //     $data['judul'] = 'Operasional';
    //     $data['realisasi'] = $this->model('Realisais_model')->fetchData();
    //     $this->view('templates/header', $data);
    //     $this->view('templates/navbar', $data);
    //     $this->view('operasional/registeredproject', $data);
    //     $this->view('templates/footer');
    //     $this->view('templates/resource');
    // }
}
