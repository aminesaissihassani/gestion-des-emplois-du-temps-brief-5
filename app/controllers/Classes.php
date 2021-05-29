<?php

class Classes extends Controller
{
    public function __construct()
    {
        $this->classeModel = $this->model('Classe');
    }

    public function save()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['teacher_id'] == false)
        {
            redirect('dashboard/profile');
            return;
        }

        $group = $_POST['group_name'];
        $room = $_POST['room_name'];
        $date = $_POST['class_date'];
        $hour_begin = $_POST['class_hour_begin'];
        $hour_end = $_POST['class_hour_end'];

        $this->classeModel->save($group, $room, $date, $hour_begin, $hour_end);

        redirect('dashboard/classes');
    }

    public function delete($id)
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['teacher_id'] == false)
        {
            redirect('dashboard/profile');
            return;
        }

        $this->classeModel->delete($id);

        redirect('dashboard/classes');

    }

    // public function edit($id)
    // {
    //     // die($id);
    //     if(!isset($_SESSION['user_id']))
    //     {
    //         redirect('pages/index');
    //         return;
    //     }
    //     if($_SESSION['teacher_id'] == false)
    //     {
    //         redirect('dashboard/profile');
    //         return;
    //     }

    //     $data = $this->classeModel->edit($id);
    //     $groups = $this->classeModel->getGroupsByTeacher($_SESSION['teacher_id']);

    //     $this->view('dashboard/editClasses', $data);
    //     $this->view('dashboard/editClasses', $groups);
    //     $this->view('dashboard/editClasses', $rooms);
    // }

    // public function update()
    // {
    //     if(!isset($_SESSION['user_id']))
    //     {
    //         redirect('pages/index');
    //         return;
    //     }
    //     if($_SESSION['teacher_id'] == false)
    //     {
    //         redirect('dashboard/profile');
    //         return;
    //     }

    // }
}