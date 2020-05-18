<?php

class Auth extends Databases
{

    public function checkSession()
    {
        if (isset($_SESSION['auth'])) {
            return header('Location: ' . BASEURL . '/dashboard');
            exit();
        }
    }

    public function index()
    {
        $this->checkSession();
        $this->view('templates/header', $data = ['title' => 'Sign In']);
        $this->view('auth/login');
        $this->view('templates/footer');
    }

    public function middleware()
    {
        $this->checkSession();
        $query = $this->dbh->prepare("SELECT * FROM user WHERE username = :usr");
        $query->execute([
            'usr' => htmlentities($_POST['username'])
        ]);

        if ($query->rowCount() > 0) {

            $data_user = $query->fetch(PDO::FETCH_ASSOC);
            if (password_verify($_POST['password'], $data_user['password'])) {
                $_SESSION['auth'] = [
                    'username' => base64_encode($data_user['username']),
                    'id_user' => base64_encode($data_user['id_user'])
                ];
                header('Location: ' . BASEURL . '/dashboard');
                exit();
            } else {
                Flasher::setFlash('Username atau password salah!', 'error');
                header('Location: ' . BASEURL . '/auth');
                exit();
            }
        } else {
            Flasher::setFlash('Username atau password salah!', 'error');
            header('Location: ' . BASEURL . '/auth');
            exit();
        }
    }
}
