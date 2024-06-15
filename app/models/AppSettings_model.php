<?php
class AppSettings_model {
    private $db;
    private $table = 'settingapp';
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAppSetting()
    {
        $this->db->query('SELECT *FROM '.$this->table);
        return $this->db->single();
    }
    public function editsetting($data)
    {
        $query = "UPDATE $this->table SET
                    id_client = :id_client,
                    id_project = :id_project,
                    no_invoice = :no_invoice,
                    nama_client = :nama_client,
                    nama_item = :nama_item,
                    alamat = :alamat,
                    qty = :qty,
                    jenis = :jenis,
                    hpp = :hpp,
                    pajak = :pajak,
                    total = :total,
                    tanggal = :tanggal,
                    nama_pic = :nama_pic,
                    no_pic = :no_pic
                WHERE id_transaksi = :id_transaksi";

                $this->db->query($query);
                $this->db->bind('id_client', $data['id_client']);
                $this->db->bind('id_project', $data['id_project']);
                $this->db->bind('no_invoice', $data['no_invoice']);
                $this->db->bind('nama_client', $data['nama_client']);
                $this->db->bind('nama_item', $data['nama_item']);
                $this->db->bind('alamat', $data['alamat']);
                $this->db->bind('qty', $data['qty']);
                $this->db->bind('jenis', $data['jenis']);
                $this->db->bind('hpp', $data['hpp']);
                $this->db->bind('pajak', $data['pajak']);
                $this->db->bind('total', $data['total']);
                $this->db->bind('tanggal', $data['tanggal']);
                $this->db->bind('nama_pic', $data['nama_pic']);
                $this->db->bind('no_pic', $data['no_pic']);
                $this->db->bind('id_transaksi', $data['id_transaksi']);
                $this->db->execute();
                return $this->db->rowCount();
    }
}