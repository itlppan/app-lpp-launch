<?php
class Data extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }
    public function index()
    {
        $data['method'] = 'Daftar Entitas';
        $data['subjudul'] = 'Data Entitas';
        $data['judul'] = CLIENT;
        $data['data-nav'] = "nav-link";
        $data['data-link'] = "active";
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $data['client'] = $this->model('Client_model')->getAllClient();
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('data/index', $data);
        $this->view('templates/footer');
        $this->view('templates/resource');
    }
    public function project()
    {

        $data['method'] = 'Daftar Project';
        $data['subjudul'] = 'Daftar Project';
        $data['judul'] = PROJECT;
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $data['project'] = $this->model('Project_model')->getAll();
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('data/project', $data);
        $this->view('templates/footer');
        $this->view('templates/resource');
    }
    public function kategori()
    {
        $data['method'] = 'Daftar Kategori';
        $data['subjudul'] = 'Daftar Kategori';
        $data['judul'] = KATEGORI;
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('templates/header',$data);
        $this->view('templates/navbar',$data);
        $this->view('data/kategori',$data);
        $this->view('templates/footer');
        $this->view('templates/resource');


    }
    public function inputClient()
    {
        if ($this->model('Client_model')->tambahDataClient($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/data');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/data');
            exit;
        }
    }
    public function inputproject()
    {
        if ($this->model('Project_model')->tambahDataProject($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/data/project');
            exit;
        } else 
        {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/data/project');
            exit;
        }
    }
    public function inputkategori()
    {
        if ($this->model('Kategori_model')->tambahDataKategori($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/data/kategori');
            exit;
        } else 
        {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/data/kategori');
            exit;
        }
    }
    public function deleteclient($id)
    {
        if ($this->model('Client_model')->hapusDataClient($id) > 0) {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: ' . BASEURL . '/data');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Hapus', 'danger');
            header('Location: ' . BASEURL . '/data');
            exit;
        }
    }

    public function deleteProject($id)
    {
        if ($this->model('Project_model')->hapusDataProject($id) > 0) {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: ' . BASEURL . '/data/project');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/data/project');
            exit;
        }
    }
    public function deleteKategori($id)
    {
        if ($this->model('Kategori_model')->hapusDataKategori($id) > 0) {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: ' . BASEURL . '/data/kategori');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/data/kategori');
            exit;
        }
    }
    public function editproject()
    {
        if ($this->model('Project_model')->ubahDataProject($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/data/project');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/data/project');
            exit;
        }
    }
    public function editkategori()
    {
        if ($this->model('Kategori_model')->ubahDataKategori($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/data/kategori');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/data/kategori');
            exit;
        }
    }
    public function editclient()
    {
        if ($this->model('Client_model')->ubahDataClient($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/data');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/data');
            exit;
        }
    }
   
}
