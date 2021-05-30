<?php
class DashboardModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getGroups()
    {
        $this->db->query('SELECT * FROM groups');

        return $this->db->resultSet();
    }
    
    public function saveGroups($name, $number)
    {
        $this->db->query('INSERT INTO groups (name, number) VALUES (:name, :number)');

        $this->db->bind(':name', $name);
        $this->db->bind(':number', $number);

        $this->db->execute();
    }

    public function editGroups($id, $name, $number)
    {
        $this->db->query('UPDATE groups SET name = :name, number = :number WHERE groups.id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':number', $number);

        $this->db->execute();
    }
    
    public function deleteGroups($id)
    {
        $this->db->query('DELETE FROM groups WHERE groups.id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }

    public function getRooms()
    {
        $this->db->query('SELECT * FROM rooms');

        return $this->db->resultSet();
    }

    public function saveRooms($name)
    {
        $this->db->query('INSERT INTO rooms (name) VALUES (:name)');

        $this->db->bind(':name', $name);

        $this->db->execute();
    }

    public function editRooms($id, $name)
    {
        $this->db->query('UPDATE rooms SET name = :name WHERE rooms.id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);

        $this->db->execute();
    }

    public function deleteRooms($id)
    {
        $this->db->query('DELETE FROM rooms WHERE rooms.id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }

    public function getSubjects()
    {
        $this->db->query('SELECT * FROM subjects');
        
        return $this->db->resultSet();
    }

    public function saveSubjects($name)
    {
        $this->db->query('INSERT INTO subjects (name) VALUES (:name)');

        $this->db->bind(':name', $name);

        $this->db->execute();
    }

    public function editSubjects($id, $name)
    {
        $this->db->query('UPDATE subjects SET name = :name WHERE subjects.id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);

        $this->db->execute();
    }

    public function deleteSubjects($id)
    {
        $this->db->query('DELETE FROM subjects WHERE subjects.id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }
}