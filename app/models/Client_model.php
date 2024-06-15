<?php
class Client_model{
    private $tabel = 'client';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllClient()
    {
        $this->db->query('SELECT * FROM '.$this->tabel);
        return $this->db->resultSet();
    }
    public function getSumClient()
    {
        $this->db->query("SELECT COUNT(DISTINCT id_client) AS jumlah_client
        FROM transaksi2
        WHERE YEAR(tanggal) = YEAR(CURDATE());");
        return $this->db->single();
    }
    public function tambahDataClient($data)
    {
        $query = "INSERT INTO $this->tabel
                VALUES
                ('', :nama_client, :alamat, :kategori_project, :nama_pic, :no_pic, :npwp, :alamat_npwp)";
                $this->db->query($query);
                $this->db->bind('nama_client', clean_data($data['nama_client']));
                $this->db->bind('alamat', $data['alamat']);
                $this->db->bind('kategori_project', $data['kategori_project']);
                $this->db->bind('nama_pic', $data['nama_pic']);
                $this->db->bind('no_pic', $data['no_pic']);
                $this->db->bind('npwp', $data['npwp']);
                $this->db->bind('alamat_npwp', $data['alamat_npwp']);
                $this->db->execute();
                return $this->db->rowCount();
    }
    public function hapusDataClient($id)
    {
        $query = "DELETE FROM $this->tabel WHERE id_client = :id_client";
        $this->db->query($query);
        $this->db->bind('id_client', $id);
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
    public function ubahDataClient($data) 
    {
        $query = "UPDATE $this->tabel SET 
                nama_client = :nama_client, 
                alamat = :alamat, 
                kategori_project = :kategori_project, 
                nama_pic = :nama_pic, 
                no_pic = :no_pic, 
                npwp = :npwp,
                alamat_npwp = :alamat_npwp 
                WHERE id_client = :id_client";
            $this->db->query($query);
            $this->db->bind('id_client', $data['id_client']);
            $this->db->bind('nama_client', $data['nama_client']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->bind('kategori_project', $data['kategori_project']);
            $this->db->bind('nama_pic', $data['nama_pic']);
            $this->db->bind('no_pic', $data['no_pic']);
            $this->db->bind('npwp', $data['npwp']);
            $this->db->bind('alamat_npwp', $data['alamat_npwp']);
            $this->db->execute();
            return $this->db->rowCount();
    }
}