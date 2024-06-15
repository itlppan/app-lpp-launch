<?php

class Transaksi_model{
    private $tabel = 'transaksi2';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllTransaksi() 
    {
        $this->db->query('SELECT * FROM '.$this->tabel);
        return $this->db->resultSet();
    }
    public function getTransaksiUnpaid() 
    {
        $this->db->query("SELECT * FROM $this->tabel WHERE status_pembayaran = 'unpaid'");
        return $this->db->resultSet();
    }
    public function getTransaksipaid() 
    {
        $this->db->query("SELECT * FROM $this->tabel WHERE status_pembayaran = 'paid'");
        return $this->db->resultSet();
    }
    public function getTransaksiproccess() 
    {
        $this->db->query("SELECT * FROM $this->tabel WHERE status_pembayaran = 'process'");
        return $this->db->resultSet();
    }
    public function getTransaksiCanceled() 
    {
        $this->db->query("SELECT * FROM $this->tabel WHERE status_pembayaran = 'canceled'");
        return $this->db->resultSet();
    }
    public function tambahDataTransaksi($data)
    {
        $query = "INSERT INTO transaksi2 (id_transaksi,id_client,id_project,qty,tanggal) 
                VALUES
                ('', :id_client, :id_project, :qty, :tanggal)";
                $this->db->query($query);
                $this->db->bind('id_client', $data['id_client']);
                $this->db->bind('id_project', $data['id_project']);
                $this->db->bind('qty', $data['qty']);
                $this->db->bind('tanggal', $data['tanggal']);
                $this->db->execute();
                return $this->db->rowCount();
    }
    public function hapusDataTransaksi($id)
    {
        $query = "DELETE FROM transaksi2 WHERE id_transaksi = :id_transaksi";
        $this->db->query($query);
        $this->db->bind('id_transaksi', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getTransaksiById($id)
    {
        $this->db->query('SELECT * FROM '.$this->tabel.'WHERE id= :id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function ubahDataTransaksi($data)
    {
        $query = "UPDATE transaksi2 SET
                    id_client = :id_client,
                    id_project = :id_project,
                    no_invoice = :no_invoice,
                    nama_client = :nama_client,
                    nama_item = :nama_item,
                    alamat = :alamat,
                    qty = :qty,
                    jenis = :jenis,
                    harga = :harga,
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
                $this->db->bind('harga', $data['harga']);
                $this->db->bind('pajak', $data['pajak']);
                $this->db->bind('total', $data['total']);
                $this->db->bind('tanggal', $data['tanggal']);
                $this->db->bind('nama_pic', $data['nama_pic']);
                $this->db->bind('no_pic', $data['no_pic']);
                $this->db->bind('id_transaksi', $data['id_transaksi']);
                $this->db->execute();
                return $this->db->rowCount();
    }
    public function ubahstatus($data)
    {
        $query = "UPDATE `transaksi2` SET 
                `status_pembayaran` = :status_pembayaran 
                WHERE `transaksi2`.`id_transaksi` = :id_transaksi";
                $this->db->query($query);
                $this->db->bind('status_pembayaran', $data['status_pembayaran']);
                $this->db->bind('id_transaksi', $data['id_transaksi']);
                $this->db->execute();
                return $this->db->rowCount();
    }
}
