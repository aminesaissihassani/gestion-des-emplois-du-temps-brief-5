<?php
class DashboardModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSubjects()
    {
        $this->db->query('SELECT * FROM subjects');
        
        return $this->db->resultSet();
    }
}