<?php
    include "Controller\ControllerCity.php" ; 
    include "Controller\ControllerUser.php" ; 
    include "Controller\ControllerRoad.php" ; 
    include "Controller\ControllerBus.php" ; 
    include "Controller\ControllerCompany.php" ; 
    include "Controller\ControllerSchedule.php" ; 

    $user = new controlleruser();
    $controllerbus = new BusController();
    $controllerroad = new RoadController();
    $controllerschedule = new ScheduleController();

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

            case "resetpass":
                include "view/rp.php";
                break;

            case "reset":
                $user->resetPassword();
                break;
        //bus
        case 'create':
            $controllerbus-> addBus($bus);
             break;
         case 'destroy':
            $controllerbus->destroyBus();
             break;
         case 'edit':
             $controllerbus->editBusAction();
             break;
         case 'store':
             $controllerbus-> storeBusAction();
             break;
         case 'update':
             $controllerbus->updateBus($bus);
             break;
         case 'delete':
            $controllerbus->deleteBusAction();
             break;
         //schedulecrud
         case 'createschedule':
            $controllerschedule-> addSchedule($schedule);
             break;
         case 'destroyschedule':
            
            $controllerschedule->destroySchedule();
             break;
         case 'editschedule':
             $controllerschedule->editScheduleAction();
             break;
         case 'storeschedule':
             $controllerschedule-> storeArticleAction();
             break;
         case 'updateschedule':
             $controllerschedule->updateSchedule($id);
             break;
         case 'deleteschedule':
            $controllerschedule->deleteSchedule($id);
             break;
             //road
             case 'createroad':
            $controllerroad-> addRoad($road);
             break;
         case 'destroyroad':
            
            $controllerroad->destroyRoad($startCity, $endCity);
             break;
         case 'editroad':
             $controllerroad->editBusAction();
             break;
         case 'storeroad':
             $controllerroad-> storeRoadAction();
             break;
         case 'updateroad':
             $controllerroad->updateRoad($road);
             break;
         case 'deleteroad':
            $controllerroad->deleteArticleAction();
             break;
    }
}   else{
        // header("location:?action=home");
        include "view/home.php";
        exit;
    }

?>
