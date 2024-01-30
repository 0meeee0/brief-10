<?php
require_once "config\Connection.php";
require_once("Model\Schedule\ClassSchedule.php");

class ScheduleDao {
    private $db;

    public function __construct(){
        $this->db = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function get_schedule(){
        $query = "SELECT * FROM Schedule";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $scheduleData = $stmt->fetchAll();
        $schedules = array();
        foreach ($scheduleData as $schedule) {
            $schedules[] = new Schedule(
                $schedule["id"],
                $schedule["date"],
                $schedule["departuretime"],
                $schedule["arrivaltime"],
                $schedule["availableseats"],
                $schedule["price"],
                $schedule["busnumber"],
                $schedule["startcity"],
                $schedule["endcity"]
            );
        }
        return $schedules;
    }

    public function insert_schedule($schedule){
        $query = "INSERT INTO Schedule (date, departuretime, arrivaltime, availableseats, price, busnumber, startcity, endcity) VALUES (
            '" . $schedule->getDate() . "',
            '" . $schedule->getDepartureTime() . "',
            '" . $schedule->getArrivalTime() . "',
            " . $schedule->getAvailableSeats() . ",
            " . $schedule->getPrice() . ",
            " . $schedule->getBusNumber() . ",
            '" . $schedule->getStartCity() . "',
            '" . $schedule->getEndCity() . "'
        )";
        $stmt = $this->db->query($query);
        $stmt->execute();
    }
    public function getScheduleById($id)
    {
        $query = "SELECT * FROM article WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Schedule($ $result["id"],
            $result["date"],
            $result["departuretime"],
            $result["arrivaltime"],
            $result["availableseats"],
            $result["price"],
            $result["busnumber"],
            $result["startcity"],
            $result["endcity"]);
        } else {
            return null;
        }
    }
    public function update_schedule($schedule){
        $query = "UPDATE Schedule SET 
            date = '" . $schedule->getDate() . "',
            departuretime = '" . $schedule->getDepartureTime() . "',
            arrivaltime = '" . $schedule->getArrivalTime() . "',
            availableseats = " . $schedule->getAvailableSeats() . ",
            price = " . $schedule->getPrice() . ",
            busnumber = " . $schedule->getBusNumber() . ",
            startcity = '" . $schedule->getStartCity() . "',
            endcity = '" . $schedule->getEndCity() . "'
            WHERE id = " . $schedule->getId();
        $stmt = $this->db->query($query);
        $stmt->execute();
    }

    public function delete_schedule($id){
        $query = "DELETE FROM Schedule WHERE id = " . $id;
        $stmt = $this->db->query($query);
        $stmt->execute();
    }
}
?>