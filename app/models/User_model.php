<?php

class User_model {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUserByUsername($username) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }
    public function getUser()
    {
        $this->db->query('SELECT username FROM ' . $this->table);
        return $this->db->single();
    }
    public function updatePassword($user_id, $new_hashed_password)
    {
    $this->db->query('UPDATE users SET password = :password WHERE id = :id');
    $this->db->bind(':password', $new_hashed_password);
    $this->db->bind(':id', $user_id);
    return $this->db->execute();
    }
    public function registerUser($name, $email, $username, $password)
    {
    // Query untuk menambahkan user baru ke dalam tabel users
    $this->db->query('INSERT INTO users (nama, email, username, password) VALUES (:nama, :email, :username, :password)');
    // Bind parameter
    $this->db->bind(':nama', $name);
    $this->db->bind(':email', $email);
    $this->db->bind(':username', $username);
    $this->db->bind(':password', $password);

    // Eksekusi query
    return $this->db->execute();
    }

    

}

