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
}