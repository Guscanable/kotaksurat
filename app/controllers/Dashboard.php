<?php

class Dashboard extends Databases
{

    public function checkSession()
    {
        if (!isset($_SESSION['auth'])) {
            return header('Location: ' . BASEURL . '/auth');
            exit();
        }
    }

    public function edit()
    {
        $this->checkSession();
        if (isset($_GET['id'])) {
            $query = $this->dbh->prepare("SELECT * FROM surat WHERE id_surat = :id");
            $query->execute([
                'id' => $_GET['id']
            ]);
            $data = json_encode($query->fetch(PDO::FETCH_ASSOC));
            echo $data;
        }
    }

    public function add()
    {
        date_default_timezone_set('Asia/Makassar');
        $date = date('Y-m-d H:i:s');
        $id = md5(rand(0, 1000000000000));

        $insert = $this->dbh->prepare("INSERT INTO surat (nomor_kiriman,date,pengirim,alamat_pengirim,penerima,alamat_penerima) VALUES (
            :nk,
            :dt,
            :pnr,
            :almt,
            :pnrm,
            :almtr
        )");
        $exec = $insert->execute([
            'nk' => $id,
            'dt' => $date,
            'pnr' => $_POST['pengirim'],
            'almt' => $_POST['alamat_pengirim'],
            'pnrm' => $_POST['penerima'],
            'almtr' => $_POST['alamat_penerima']
        ]);
        if ($exec) {
            header('Location: ' . BASEURL . '/dashboard/kotaksurat');
            exit();
        }
    }

    public function addlap()
    {

        date_default_timezone_set('Asia/Makassar');
        $date = date('Y-m-d H:i:s');
        $pw = $_POST['datang'] / $_POST['layan'];
        $pangkat = $_POST['datang'] * $_POST['datang'];
        $kurang1 = $_POST['layan'] * $_POST['layan'];
        $kurang2 = $_POST['layan'] * $_POST['datang'];
        $lq = substr($pangkat / ($kurang1 - $kurang2), 0, 7);
        $ls = substr($_POST['datang'] / ($_POST['layan'] - $_POST['datang']), 0, 7);
        $wq = substr($_POST['datang'] / ($kurang1 - $kurang2), 0, 7);
        $ws =  substr(1 / ($_POST['layan'] - $_POST['datang']), 0, 7);

        $insert = $this->dbh->prepare("INSERT INTO laporan (pw,lq,ls,wq,ws,datang,layan,tanggal) VALUES (
            :xpw,
            :xlq,
            :xls,
            :xwq,
            :xws,
            :dtg,
            :lyn,
            :tgl
        )");
        $exec = $insert->execute([
            'xpw' => $pw,
            'xlq' => $lq,
            'xls' => $ls,
            'xwq' => $wq,
            'xws' => $ws,
            'dtg' => $_POST['datang'],
            'lyn' => $_POST['layan'],
            'tgl' => $date
        ]);
        if ($exec) {
            header('Location: ' . BASEURL . '/dashboard/laporan');
            exit();
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $query = $this->dbh->prepare("DELETE FROM surat WHERE id_surat = :id");
            $exec = $query->execute([
                'id' => $_GET['id']
            ]);
            if ($exec) {
                header('Location: ' . BASEURL . '/dashboard/kotaksurat');
                exit();
            }
        }
    }

    public function index()
    {
        $this->checkSession();
        $data = ['title' => 'Dashboard'];
        $data_surat = $this->model('Surat_model')->getSurat();
        $this->view('templates/header', $data);
        $this->view('dashboard/home', $data_surat);
        $this->view('templates/footer');
    }
    public function kotaksurat()
    {
        $this->checkSession();
        $data = ['title' => 'Kotak Surat'];
        $data_surat = $this->model('Surat_model')->getSurat();
        $this->view('dashboard/kotaksurat', $data_surat);
    }
    public function laporan()
    {
        $this->checkSession();
        $data = ['title' => 'Laporan'];
        $laporan = [$this->model('Surat_model')->getLaporan(), $this->model('Surat_model')->getManual(),];
        $this->view('templates/header', $data);
        $this->view('dashboard/laporan', $laporan);
        $this->view('templates/footer');
    }

    public function prosesedit()
    {
        $id = $_POST['id_surat'];
        $pengirim = $_POST['pengirim'];
        $alamatp = $_POST['alamat_pengirim'];
        $penerima = $_POST['penerima'];
        $alamatp2 = $_POST['alamat_penerima'];
        $query = $this->dbh->prepare("UPDATE surat SET pengirim = :pr, alamat_pengirim = :alp, penerima = :pnr, alamat_penerima = :pnrm WHERE id_surat = :id");
        $exec = $query->execute([
            'pr' => $pengirim,
            'alp' => $alamatp,
            'pnr' => $penerima,
            'pnrm' => $alamatp2,
            'id' => $id
        ]);

        if ($exec) {
            // unset($_POST);
            header('Location: ' . BASEURL . '/dashboard/kotaksurat');
            exit();
        }
    }

    public function logout()
    {
        $this->checkSession();
        unset($_SESSION['auth']);
        session_destroy();
        $this->dbh = null;
        header('Location: ' . BASEURL . '/auth');
        exit();
    }
}
