<?php

class Teachers extends Controller
{
    public function __construct()
    {
        $this->teacherModel = $this->model('Teacher');
    }

    public function save()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }

        $this->teacherModel->save($_SESSION['user_id'], $_POST['subject']);

        redirect('users/logout');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}