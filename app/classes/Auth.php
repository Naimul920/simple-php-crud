<?php


namespace App\classes;


class Auth
{
    public $email;
    public $password;
    public $link;
    public $sql;
    public $result;
    public $user;

    public function __construct($data = null)
    {
        $this->email=$data['email'];
        $this->password=md5($data['password']);
    }


    public function login()
    {

        $this->link=mysqli_connect('localhost','root', '', 'login_system_with_database');
        $this->sql="SELECT * FROM `users` WHERE email='$this->email' AND password='$this->password'";

        if (mysqli_query($this->link, $this->sql))
        {
            $this->result=mysqli_query($this->link, $this->sql);
            $this->user=mysqli_fetch_assoc($this->result);
            if ($this->user)
            {
                session_start();
                $_SESSION['id']=$this->user['id'];
                $_SESSION['name']=$this->user['name'];
                header('Location:action.php?page=dashboard');
            }
            else
            {
                return 'You are trying to wrong user id and password';
            }
        }

    }
    public function logout()
    {
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location:action.php?page=home');
    }
}