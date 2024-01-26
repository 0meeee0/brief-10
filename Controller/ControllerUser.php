<?php
    include 'Model\User\userDAO.php';

        class controlleruser{
            function log_in_view() {
            include('View\login.php');
        }
        function log_in(){
            extract($_POST);
            $usersDAO = new UserDao();
            $usersDAO->login($email,$password);
        }
        function sign_up(){
            extract($_POST);
            $usersDAO = new UserDao();
            $usersDAO->singup($login, $email, $password);
            include 'view/register.php';
        }
    }

?>