<?php
    include "Controller\ControllerCity.php" ; 
    include "Controller\ControllerUser.php" ; 
    include "Controller\ControllerRoad.php" ; 
    include "Controller\ControllerBus.php" ; 
    include "Controller\ControllerCompany.php" ; 
    include "Controller\ControllerSchedule.php" ; 

    $user = new controlleruser();

    if (isset($_GET["action"])){
        $action = $_GET["action"];

        switch ($action){
            case "log_in":
            $user->log_in_view();
            break;

            case "login":
                $user->log_in();
                break;

            case "signup":
                include "view/register.php";
                break;

            case "register":
                $user->sign_up();
                break;
        }
    }
    else{
        // header("location:?action=home");
        include "view/home.php";
        exit;
    }

?>
