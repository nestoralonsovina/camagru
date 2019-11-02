<?php


class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPhotoComments($photo_id) {
        $sql = 'SELECT * FROM comments WHERE photo_id = :photo_id';
        $this->db->query($sql);

        $this->db->bind(':photo_id', $photo_id);
        return $this->db->resultSet();
    }
}