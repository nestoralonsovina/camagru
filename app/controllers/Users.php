<?php

class Users extends Controller
{
    private $userModel;
    private $photoModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->photoModel = $this->model('Photo');
    }

    public function index() {
        redirect('');
    }

    public function register()
    {
        // Prepare the data array to the User view
        $data = ['name' => '', 'email' => '',
            'password' => '', 'confirm_password' => '',
            'name_error' => '', 'email_error' => '',
            'password_error' => '', 'confirmed_password_error' => ''];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data['name'] = trim($_POST['name']);
            $data['password'] = trim($_POST['password']);
            $data['email'] = trim($_POST['email']);
            $data['confirm_password'] = trim($_POST['confirm_password']);

            // Validate mail
            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter email';
            } else if ($this->userModel->findUserByEmail($data['email'])) {
                $data['email_error'] = 'Email is already registered.';
            }

            // validate name
            if (empty($data['name'])) {
                $data['name_error'] = 'Please enter name';
            }

            // validate Password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter password';
            } else if (preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%&*()]).{8,}/', $data['password']) == 0) {
                $data['password_error'] = 'Password must be at least 8 characters, have an upper case letter and a symbol';
            }

            // validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirmed_password_error'] = "Please enter confirm password";
            } else if ($data['password'] != $data['confirm_password']) {
                $data['confirmed_password_error'] = 'Passwords don\'t match';
            }

            // if no errors proceed to registration
            if (empty($data['confirmed_password_error']) and empty($data['password_error'])
                and empty($data['name_error']) and empty($data['email_error'])) {
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
//                die(print_r($data, true));
                if ($this->userModel->register($data)) {
                    flash('register_success', 'Your are registered and can login');
                    redirect('users/login');
                }
                die('Something went wrong');
            }
        }

        $this->view('users/register', $data);
    }

    public function login()
    {
        $data = ['email' => '', 'password' => '',
            'email_error' => '', 'password_error' => ''];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data['password'] = trim($_POST['password']);
            $data['email'] = trim($_POST['email']);

            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter email';
            }

            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter password';
            }

            if (!$this->userModel->findUserByEmail($data['email'])) {
                $data['email_error'] = 'No user with this mail.';
            }

            if (empty($data['password_error']) and empty($data['email_error'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser !== false) {
                    $this->createUserSession($loggedInUser);
                    redirect('galleries');
                } else {
                    $data['password_error']  = 'Password Incorrect';
                }
            }
        }
        $this->view('users/login', $data);
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function profile($id) {
        $data = [
            'photos' => array_reverse($this->photoModel->getPhotos(Photo::ALL_PHOTOS, Photo::FROM_USER, $id)),
            'user' => $this->userModel->getUserById($id)
        ];

        $this->view('users/profile', $data);
    }

    private function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->username;
    }

}