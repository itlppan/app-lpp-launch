<?php
class Project_model{
    private $tabel = 'project';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProject()
    {
        $this->db->query('SELECT * FROM '.$this->tabel);
        return $this->db->resultSet();
    }
    public function getAll()
    {
        $this->db->query("SELECT * FROM project");
        return $this->db->resultSet();
    }
    public function getRecentSales()
    {
        $this->db->query("SELECT 
        p.nama_item,
        p.jenis,
        COUNT(t.id_project) AS jumlah_penjualan,
        SUM(CAST(t.total AS DECIMAL(15, 2))) AS total_penjualan
        FROM 
        transaksi2 t
        JOIN 
        project p ON t.id_project = p.id_project
        WHERE 
        YEAR(t.tanggal) = YEAR(CURDATE())
        GROUP BY 
        t.id_project, p.nama_item, p.jenis
        ORDER BY 
        jumlah_penjualan DESC;");
        return $this->db->resultSet();
    }
    public function getSumSales()
    {
        $this->db->query("SELECT SUM(CAST(total AS DECIMAL(15, 2))) AS total_penjualan
        FROM transaksi2
        WHERE YEAR(tanggal) = YEAR(CURDATE());");
        return $this->db->single();
    }
    public function getCountSales()
    {
        $this->db->query("SELECT COUNT(*) AS jumlah_transaksi
        FROM transaksi2
        WHERE tanggal >= DATE_FORMAT(CURDATE(), '%Y-01-01') 
        AND tanggal < DATE_FORMAT(CURDATE() + INTERVAL 1 YEAR, '%Y-01-01')");
        return $this->db->single();
    }
    public function tambahDataProject($data)
    {
        // INSERT INTO `project` (`id_project`, `id_kategori`, `nama_item`, `jenis`, `pajak`, `tanggal_mulai`, `tanggal_selesai`, `jpl`, `harga`, `lokasi`)
        $query = "INSERT INTO $this->tabel (`id_project`, `id_kategori`,`nama_item` ,`jenis`, `pajak`, `tanggal_mulai`, `tanggal_selesai`,`jpl`, `harga`, `lokasi` )
                VALUES
                ('', :id_kategori,:nama_item,'', :pajak, :tanggal_mulai, :tanggal_selesai, :jpl, :harga, :lokasi )";
                $this->db->query($query);
                $this->db->bind('nama_item', clean_data($data['nama_item']));
                $this->db->bind('id_kategori', clean_data($data['id_kategori']));
                $this->db->bind('pajak', clean_data($data['pajak']));
                $this->db->bind('tanggal_mulai', clean_data($data['tanggal_mulai']));
                $this->db->bind('tanggal_selesai', clean_data($data['tanggal_selesai']));
                $this->db->bind('jpl', clean_data($data['jpl']));
                $this->db->bind('harga', clean_data($data['harga']));
                $this->db->bind('lokasi', clean_data($data['lokasi']));
                $this->db->execute();
                return $this->db->rowCount();
    }
    public function hapusDataProject($id)
    {
        $query = "DELETE FROM $this->tabel WHERE id_project = :id_project";
        $this->db->query($query);
        $this->db->bind('id_project', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataProject($data)
    {
        $query ="UPDATE `project` SET 
                `nama_item` = :nama_item, 
                `jenis` = :jenis, 
                `pajak` = :pajak, 
                `tanggal_mulai` = :tanggal_mulai, 
                `tanggal_selesai` = :tanggal_selesai, 
                `jpl` = :jpl, 
                `harga` = :harga, 
                `lokasi` = :lokasi 
        WHERE `id_project` = :id_project;";
    
        $this->db->query($query);
        $this->db->bind('nama_item', $data['nama_item']);
        $this->db->bind('jenis', $data['jenis']);
        $this->db->bind('pajak', $data['pajak']);
        $this->db->bind('tanggal_mulai', $data['tanggal_mulai']);
        $this->db->bind('tanggal_selesai', $data['tanggal_selesai']);
        $this->db->bind('jpl', $data['jpl']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('id_project', $data['id_project']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    }
