<?php
class Teacher
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function save($id_user, $id_subject)
    {
        $this->db->query('INSERT INTO teachers (id_user, id_subject) VALUES (:id_user, :id_subject)');

        $this->db->bind(':id_user', $id_user);
        $this->db->bind(':id_subject', $id_subject);

        $this->db->execute();
    }
}