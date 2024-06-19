<?php

class Auth extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User_model');
    }




    public function login()
    {
        $data = [
            'judul' => 'Login',
            'username' => '',
            'password' => '',
            'error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['username'] = trim($_POST['username']);
            $data['password'] = trim($_POST['password']);

            $user = $this->userModel->getUserByUsername($data['username']);

            if ($user && password_verify($data['password'], $user['password'])) {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['user'] = $data['username'];
                $_SESSION['id'] = $user['user_id'];
                header('Location: ' . BASEURL . '/Home');
                exit;
            } else {
                $data['error'] = 'Invalid Password / Username';
            }
        }
        $data['judul'] = "Login";
        $this->view('templates/header', $data);
        $this->view('auth/login', $data);
        
        $this->view('templates/resource');
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['login']);
        session_destroy();
        header('Location: ' . BASEURL . '/auth/login');
        exit;
    }
    public function changePassword()
{
    $data = [
        'judul' => 'Ubah Password',
        'old_password' => '',
        'new_password' => '',
        'confirm_password' => '',
        'error' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data['old_password'] = trim($_POST['old_password']);
        $data['new_password'] = trim($_POST['new_password']);
        $data['confirm_password'] = trim($_POST['confirm_password']);

        if ($data['new_password'] !== $data['confirm_password']) {
            $data['error'] = 'Password baru dan konfirmasi password tidak cocok.';
        } else {
            session_start();
            $user_id = $_SESSION['id'];
            $user = $this->userModel->getUserById($user_id);

            if ($user && password_verify($data['old_password'], $user['password'])) {
                $new_hashed_password = password_hash($data['new_password'], PASSWORD_BCRYPT);

                if ($this->userModel->updatePassword($user_id, $new_hashed_password)) {
                    Flasher::setFlash('berhasil', 'diubah', 'success');
                    header('Location: ' . BASEURL . '/master');
                    exit;
                } else {
                    Flasher::setFlash('berhasil', 'diubah', 'success');
                    $data['error'] = 'Terjadi kesalahan, coba lagi.';
                }
            } else {
                $data['error'] = 'Password lama salah.';
            }
        }
    }

    $this->view('templates/header', $data);
    $this->view('auth/change_password', $data);
    $this->view('templates/footer');
    $this->view('templates/resource');
}

}
