<?php
require_once("Model\Schedule\ScheduleDao.php");

class ScheduleController {
    private $scheduleDAO;

    public function __construct(){
        $this->scheduleDAO = new ScheduleDao(); 
    }

    public function showAllSchedules(){
        $schedules = $this->scheduleDAO->get_schedule();
        return $schedules;
        require_once 'views/schedule.php';
    }

    public function addSchedule($schedule){
        $this->scheduleDAO->insert_schedule($schedule);
    }
    // function storeArticleAction(){
    //     $newArticle = new Schedule(
    //             $_POST["id"],
    //             $_POST["date"],
    //             $_POST["departuretime"],
    //             $_POST["arrivaltime"],
    //             $_POST["availableseats"],
    //             $_POST["price"],
    //             $_POST["busnumber"],
    //             $_POST["startcity"],
    //             $_POST["endcity"]);
    //     $this->scheduleDAO->insert_schedule($schedule);
    
    
    //     header('location:index.php');
    //     exit();
    // }

    function editScheduleAction(){
        $id = $_GET['id'];
        $this->scheduleDAO->getScheduleById($id);
        require_once 'view/editschedule.php';
    }

    public function updateSchedule($schedule){
        $newArticle = new Schedule(
            $_POST["id"],
            $_POST["date"],
            $_POST["departuretime"],
            $_POST["arrivaltime"],
            $_POST["availableseats"],
            $_POST["price"],
            $_POST["busnumber"],
            $_POST["startcity"],
            $_POST["endcity"]);
        $this->scheduleDAO->update_schedule($schedule);
    }

    public function deleteSchedule($id){
        $id = $_GET['id'];
        $this->scheduleDAO->getScheduleById($id);
        require_once 'view/deleteschedule.php';
    }
    public function destroySchedule(){
        $id = $_GET['id'];
        $this->scheduleDAO->delete_schedule($id);
    }
}


?>
