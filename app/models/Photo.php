<?php


class Photo
{
    private $db;

    const RANDOM = 1;
    const FROM_USER = 2;
    const LATEST = 3;
    const ALL_PHOTOS = -1;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function add($filename, $user_id) {
        $sql = 'INSERT INTO photos (likes, user_id, photo_url) VALUES(0, :userId, :filename)';
        $this->db->query($sql);

        // bind values
        $this->db->bind(':userId', $user_id);
        $this->db->bind(':filename', $filename);

        // execute
        return $this->db->execute();
    }

    public function getPhotoById($id) {
        $sql = 'SELECT * FROM photos WHERE photos.id = :id';
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }


    public function getPhotos($amount, $type, $user_id = null) {
        $sql = '';
        $limited = $amount == Photo::ALL_PHOTOS ? false : true;

        if ($type == Photo::RANDOM) {
            $sql = 'SELECT * FROM photos ORDER BY RAND()' . ($limited ? ' LIMIT :amount' : '');
        }

        if ($type == Photo::FROM_USER) {
            if (!$user_id) {
                error_log('No user_id passed when required');
                die('No user_id passed when required');
            }
            $sql = 'SELECT * FROM photos WHERE user_id = :user_id' . ($limited ? ' LIMIT :amount' : '');
        }

        if ($type == Photo::LATEST) {
            $sql = 'SELECT * FROM photos ORDER BY photos.creation_date DESC' . ($limited ? ' LIMIT :amount' : '');
        }

        $this->db->query($sql);
        if ($limited) {
            $this->db->bind(':amount', $amount);
        }
        if ($type == Photo::FROM_USER) {
            $this->db->bind(':user_id', $user_id);
        }
        return $this->db->resultSet();
    }
}