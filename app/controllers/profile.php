<?php
class Profile extends Controller {
    public function __construct() 
    {
        Middleware::auth();
    }
    public function index()
    {
        $data['method'] = 'User Profile';
        $data['subjudul'] = 'User Profile';
        $data['judul'] = 'Profile';
        $data['collapsed'] = 'collapsed';
        $data['class'] = 'active';
        $this->view('templates/header',$data);
        $this->view('templates/navbar',$data);
        $this->view('Profile/index');
        $this->view('templates/footer');
        $this->view('templates/resource');    }
}