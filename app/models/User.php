<?php

class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register(array $data) {
        $sql = 'INSERT INTO users (username, email, password, photo) VALUES(:username, :email, :password, NULL)';
        $this->db->query($sql);
        // bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':username', $data['name']);
        $this->db->bind(':password', $data['password']);

        // execute
        return $this->db->execute();
    }

    public function findUserByEmail($email) {

        $sql = 'SELECT *  FROM users WHERE email = :email';
        $this->db->query($sql);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function getUserById($user_id) {
        $sql = 'SELECT * FROM users WHERE id = :user_id';
        $this->db->query($sql);
        $this->db->bind(':user_id', $user_id);

        return $this->db->single();
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if (password_verify($password, $row->password)) {
            return $row;
        }
        return false;
    }
}
