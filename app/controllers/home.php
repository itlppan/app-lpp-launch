<?php

class Home extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }
    public function index()
    {
        $data['method'] = 'Dashboard';
        $data['subjudul'] = 'Dashboard';
        $data['judul'] = HOME;
        $data['dashboard-link'] = "nav-link";
        $data['recentsales'] = $this->model('Project_model')->getRecentSales();
        $data['sumsales'] = $this->model('Project_model')->getSumSales();
        $data['countsales'] = $this->model('Project_model')->getCountSales();
        $data['countclient'] = $this->model('Client_model')->getSumClient();

        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
        $this->view('templates/resource');
    }
}
