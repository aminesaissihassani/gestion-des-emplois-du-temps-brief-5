<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        # Check if he is already loged in
        if(isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }

        # Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            # Process form

            # Init data

            $data = 
            [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                # Error messages
                'first_name_error' => '',
                'last_name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
            ];

            # Validate First Name

            if(empty($data['first_name']))
            {
                $data['first_name_error'] = 'Please enter your first name';
            }

            # Validate Last Name

            if(empty($data['last_name']))
            {
                $data['last_name_error'] = 'Please enter last name';
            }

            # Validate Email

            if(empty($data['email']))
            {
                $data['email_error'] = 'Please enter email';
            }
            else
            {
                # Check email

                if($this->userModel->findUserByEmail($data['email']))
                {
                $data['email_error'] = 'Email is already taken';
                }
            }

            # Validate Password

            if(empty($data['password']))
            {
                $data['password_error'] = 'Please enter password';
            }
            elseif(strlen($data['password']) < 8)
            {
                $data['password_error'] = 'Password must be at least 8 characters';
            }

            # Validate Confirm Password

            if(empty($data['confirm_password']))
            {
                $data['confirm_password_error'] = 'Please confirm your password';
            }
            elseif($data['confirm_password'] != $data['password'])
            {
                $data['confirm_password_error'] = 'Password do not match';
            }

            # Make sure errors are empty


            if(empty($data['first_name_error']) && empty($data['last_name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error']))
            {
                # Validated
                
                # Hash Password

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                # Register User

                if($this->userModel->register($data))
                {
                    redirect('users/login');
                }
                else
                {
                    die('Error');
                }
            }
            else
            {
                // var_dump($data);
                # Load view with errors
                $this->view('users/register', $data);
            }
        }

        else
        {
            # Init data
            $data = 
            [
                'first_name' => '',
                'last_name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                # Error messages
                'first_name_error' => '',
                'last_name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
            ];

            # Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        # Check if he is already loged in
        if(isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }

        # Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            # Process form

            # Init data

            $data = 
            [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                # Error messages
                'email_error' => '',
                'password_error' => '',
            ];

            # Validate Email

            if(empty($data['email']))
            {
                $data['email_error'] = 'Please enter email';
            }

            # Validate Password

            if(empty($data['password']))
            {
                $data['password_error'] = 'Please enter password';
            }

            # Check for user/email
            if($this->userModel->findUserByEmail($data['email']))
            {
                # User found
            }
            else
            {
                # Email not found
                $data['email_error'] = 'Email is not correct';
            }

            # Make sure errors are empty

            if(empty($data['email_error']) && empty($data['password_error']))
            {
                # Validated
                # Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if($loggedInUser)
                {
                    # Create Session
                    $_SESSION['user_id'] = $loggedInUser->id;
                    $_SESSION['user_first_name'] = $loggedInUser->first_name;
                    $_SESSION['user_last_name'] = $loggedInUser->last_name;
                    $_SESSION['user_email'] = $loggedInUser->email;
                    $_SESSION['user_type'] = $loggedInUser->type;
                    if($_SESSION['user_type'] == 1)
                    {
                        $_SESSION['teacher_id'] = $this->userModel->getTeacherId($_SESSION['user_id']);
                        if($_SESSION['teacher_id'] == false)
                        {
                            redirect('dashboard/profile');
                            return;
                        }
                        $_SESSION['teacher_id']= $_SESSION['teacher_id']->id;
                    }
                    redirect('pages/index');
                }
                else
                {
                    $data['password_error'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            }
            else
            {
                // var_dump($data);
                # Load view with errors
                $this->view('users/login', $data);
            }
        }
        else
        {
            # Init data
            $data = 
            [
                'email' => '',
                'password' => '',
                # Error messages
                'email_error' => '',
                'password_error' => '',
            ];

            # Load view
            $this->view('users/login', $data);
        }
    }

    public function logout()
    {
        if(!isset($_SESSION['user_id']))
        {
            redirect('pages/index');
            return;
        }

        unset($_SESSION['user_id']);
        unset($_SESSION['user_first_name']);
        unset($_SESSION['user_last_name']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_type']);
        unset($_SESSION['teacher_id']);
        session_destroy();

        redirect('users/login');
    }

    public function isLoggedIn()
    {
        if(isset($_SESSION['user_id']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function profile()
    {
        
    }
}