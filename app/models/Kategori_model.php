<?php
class Kategori_model{
    private $tabel = 'kategori_project';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM '.$this->tabel);
        return $this->db->resultSet();
    }
    public function tambahDataKategori($data)
    {
        $query = "INSERT INTO $this->tabel (`id`,`nama_kategori`) VALUES ('',:nama_kategori)";
        $this->db->query($query);
        $this->db->bind('nama_kategori',clean_data($data['nama_kategori']));
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDataKategori($id)
    {
        $query = "DELETE FROM $this->tabel WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',clean_data($id));
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataKategori($data)
    {
        $query = "UPDATE $this->tabel SET nama_kategori=:nama_kategori WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('nama_kategori',clean_data($data['nama_kategori']));
        $this->db->bind('id',clean_data($data['id']));
        $this->db->execute();
        return $this->db->rowCount();
    }
}