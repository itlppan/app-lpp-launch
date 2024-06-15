<?php
class Master extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }
    public function index()
    {

        $data['method'] = 'App Settings';
        $data['subjudul'] = 'App Settings';
        $data['judul'] = MASTER;
        $data['appsetting'] = $this->model('AppSettings_model')->getAppSetting();

        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('Master/index', $data);
        $this->view('templates/footer');
        $this->view('templates/resource');
    }
    public function editcompany()
    {
        if ($this->model('AppSettings')->editsetting($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Master');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/Master');
            exit;
        }
    }
}
