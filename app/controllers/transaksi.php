<?php

class Transaksi extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }
    public function index()
    {
        $data['method'] = 'Daftar Transaksi';
        $data['subjudul'] = 'Daftar Transaksi';
        $data['judul'] = TRANSAKSI;
        $data['transaksi'] = $this->model('Transaksi_model')->getAllTransaksi();
        $data['unpaid'] = $this->model('Transaksi_model')->getTransaksiUnpaid();
        $data['paid'] = $this->model('Transaksi_model')->getTransaksipaid();
        $data['proccess'] = $this->model('Transaksi_model')->getTransaksiproccess();
        $data['canceled'] = $this->model('Transaksi_model')->getTransaksiCanceled();
        $data['client'] = $this->model('Client_model')->getAllClient();
        $data['project'] = $this->model('Project_model')->getAllProject();
        $data['link'] = $data['judul'];

        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
        $this->view('templates/resource');
    }
    public function tambah()
    {
        if ($this->model('Transaksi_model')->tambahDataTransaksi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->model('Transaksi_model')->hapusDataTransaksi($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }
    public function ubah()
    {
        if ($this->model('Transaksi_model')->ubahDataTransaksi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }
    public function status()
    {
        if ($this->model('Transaksi_model')->ubahstatus($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }
    public function cetakInvoice()
    {    
        require_once 'vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'nama_client' => htmlspecialchars($_POST["nama_client"]),
                'no_invoice' => htmlspecialchars($_POST["no_invoice"]),
                'alamat' => htmlspecialchars($_POST["alamat"]),
                'nama_pic' => htmlspecialchars($_POST["nama_pic"]),
                'no_pic' => htmlspecialchars($_POST["no_pic"]),
                'jenis' => htmlspecialchars($_POST["jenis"]),
                'tanggal' => htmlspecialchars($_POST["tanggal"]),
                'nama_item' => htmlspecialchars($_POST["nama_item"]),
                'qty' => htmlspecialchars($_POST["qty"]),
                'harga' => htmlspecialchars($_POST["harga"]),
                'pajak' => htmlspecialchars($_POST["pajak"]),
                'total' => htmlspecialchars($_POST["total"]),
                'subTotal' => htmlspecialchars($_POST["sub_total"]),
                'amountInWords' => terbilang($_POST["total"])
            ];
            // $data['query'] = $this->model('Appsettings')->getAppSetting();
            $data['formattedDate'] = date("d F Y", time());
            $data['city'] = "Yogyakarta";
            $data['nama_perusahaan_lpp'] = "PT LPP Agro Nusantara";
            $data['alamat_lpp'] = "Jalan LPP No.1 Yogyakarta";
            $data['no_telp_lpp'] = "(0274)-586201,551927";
            $data['npwplpp'] = "02.264.723.4.541.000";
            $data['email_lpp'] = "info@lpp.co.id";
            $data['bomName'] = "Pugar Indrawan";
            $data['namajabatan'] = "SEVP OPERATION";
            $data['paymentBank'] = "Mandiri";
            $data['paymentAccountName'] = "PT LPP Agro Nusantara";
            $data['paymentAccountNumber'] = "1370011483563";

            // Load view dan ambil output
            $html = $this->view('transaksi/invoice', $data, true);
            $nama = $_POST["no_invoice"];
            // Cetak menggunakan mPDF
            $mpdf->WriteHTML($html);
            $mpdf->Output($nama, 'I');
        }
    }

}
