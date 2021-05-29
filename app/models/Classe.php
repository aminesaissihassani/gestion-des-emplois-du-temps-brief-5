<?php

class Classe
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function save($group, $room, $date, $hour_begin, $hour_end)
    {
        $this->db->query('INSERT INTO classes (id_teacher, id_room, id_group, date, hour_begin, hour_end) 
        VALUES (:id_teacher, :room, :group, :date, :hour_begin, :hour_end)');
        $this->db->bind(':id_teacher', $_SESSION['teacher_id']);
        $this->db->bind(':group', $group);
        $this->db->bind(':room', $room);
        $this->db->bind(':date', $date);
        $this->db->bind(':hour_begin', $hour_begin);
        $this->db->bind(':hour_end', $hour_end);

        $this->db->execute();
    }

    // public function edit($id)
    // {
    //     $this->db->query('SELECT groups.name as "group_name",
    //     rooms.name as "room_name",
    //     classes.date as "class_date", 
    //     classes.hour_begin as "class_hour_begin", 
    //     classes.hour_end as "class_hour_end" 
    //     FROM classes, rooms, groups, users
    //     WHERE :id = classes.id');
    //     $this->db->bind(':id', $id);

    //     $row = $this->db->single();
        
    //     return $row;
    // }

    public function getGroupsByTeacher($teacher_id)
    {
        $this->db->query('SELECT * FROM groups 
        INNER JOIN teachers_groups ON teachers_groups.id_teacher = :teacher_id AND teachers_groups.id_groupe = groups.id');
        $this->db->bind(':teacher_id', $teacher_id);

        return $this->db->resultSet();
    }

    public function getGroups()
    {
        $this->db->query('SELECT * FROM groups');
        
        return $this->db->resultSet();
    }

    public function getRooms()
    {
        $this->db->query('SELECT * FROM rooms');
        
        return $this->db->resultSet();
    }

    public function update()
    {
        
    }

    public function delete($class_id)
    {
        $this->db->query('DELETE FROM classes WHERE classes.id = :class_id');
        $this->db->bind(':class_id', $class_id);

        $this->db->execute();
    }

    public function show($user_id)
    {
        $this->db->query('SELECT teachers.id as "id_teacher" FROM teachers,users WHERE teachers.id_user = :user_id and users.id = teachers.id_user');
        $this->db->bind(':user_id', $user_id);

        $teacher_id = $this->db->single();
        // die(print_r($teacher_id));
        // die($teacher_id->id_teacher);

        if (!empty($teacher_id))
        {
            $this->db->query('SELECT classes.id as "id_class",
            groups.name as "group_name",
            rooms.name as "room_name",
            classes.date as "class_date", 
            classes.hour_begin as "class_hour_begin", 
            classes.hour_end as "class_hour_end" 
            FROM classes, rooms, groups, users
            WHERE :teacher_id = classes.id_teacher 
            AND users.id = :user_id
            AND groups.id = classes.id_group');
            $this->db->bind(':teacher_id', $teacher_id->id_teacher);
            $this->db->bind(':user_id', $user_id);

            $row = $this->db->resultSet();

            return $row;
        }
    }
}