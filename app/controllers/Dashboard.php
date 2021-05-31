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
        $this->view('dashboard/classes', $this->classeModel->getGroupsByTeacher($_SESSION['teacher_id']));
        $this->view('dashboard/classes', $this->classeModel->getRooms());
    }

    # Display The Profile Page For The New Teachers So They Can Choose The Subject They Will Teach
    public function profile()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['teacher_id'] || $_SESSION['user_type'] == 0)
        {
            redirect('pages/index');
            return;
        }
        
        $data = $this->dashboardModel->getSubjects();

        $this->view('dashboard/profile', $data);
    }

    # Display Groups
    public function groups()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $data = $this->dashboardModel->getGroups();

        $this->view('dashboard/groups', $data);
    }

    # Add A Group
    public function saveGroups()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $name = $_POST['name'];
        $number = $_POST['number'];

        $this->dashboardModel->saveGroups($name, $number);

        redirect('dashboard/groups');
    }

    # Edit A Group
    public function editGroups()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }
        
        // die(print_r($_POST));

        $id = $_POST['id'];
        $name = $_POST['name-'. $id];
        $number = $_POST['number-'. $id];

        $this->dashboardModel->editGroups($id, $name, $number);

        redirect('dashboard/groups');
    }

    # Delete A Group
    public function deleteGroups($id)
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $data = $this->dashboardModel->deleteGroups($id);

        redirect('dashboard/groups');
    }

    # Display Rooms
    public function rooms()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $data = $this->dashboardModel->getRooms();

        $this->view('dashboard/rooms', $data);
    }

    # Add A Room
    public function saveRooms()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $name = $_POST['name'];

        $data = $this->dashboardModel->saveRooms($name);

        redirect('dashboard/rooms');
    }

    # Edit A Room
    public function editRooms()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $id = $_POST['id'];
        $name = $_POST['name-'. $id];

        $this->dashboardModel->editRooms($id, $name);

        redirect('dashboard/rooms');
    }

    # Delete A Room
    public function deleteRooms($id)
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $data = $this->dashboardModel->deleteRooms($id);

        redirect('dashboard/rooms');
    }

    # Display Subjects
    public function subjects()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $data = $this->dashboardModel->getSubjects();

        $this->view('dashboard/subjects', $data);
    }

    # Add A Subject
    public function saveSubjects()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $name = $_POST['name'];

        $data = $this->dashboardModel->saveSubjects($name);

        redirect('dashboard/subjects');
    }

    # Edit A Subject
    public function editSubjects()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $id = $_POST['id'];
        $name = $_POST['name-'. $id];

        $this->dashboardModel->editSubjects($id, $name);

        redirect('dashboard/subjects');
    }

    # Delete A Subject
    public function deleteSubjects($id)
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }
        if($_SESSION['user_type'] != 0)
        {
            redirect('pages/index');
            return;
        }

        $data = $this->dashboardModel->deleteSubjects($id);

        redirect('dashboard/subjects');
    }
}