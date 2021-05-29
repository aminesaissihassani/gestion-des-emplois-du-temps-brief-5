<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->teacherModel = $this->model('Teacher');
        $this->classeModel = $this->model('Classe');
        $this->dashboardModel = $this->model('DashboardModel');
    }

    # Display the classes for the teacher
    public function classes()
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

        $data = $this->classeModel->show($_SESSION['user_id']);
        $groups = $this->classeModel->getGroups();
        $rooms = $this->classeModel->getRooms();

        $this->view('dashboard/classes', $data);
        $this->view('dashboard/classes', $this->classeModel->getGroups());
        $this->view('dashboard/classes', $this->classeModel->getRooms());
    }

    public function profile()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['teacher_id'])
        {
            redirect('pages/index');
            return;
        }
        
        $data = $this->dashboardModel->getSubjects();

        $this->view('dashboard/profile', $data);
    }
}