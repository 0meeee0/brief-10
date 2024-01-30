<?php
require_once "config\Connection.php";
require_once("Model\Road\ClassRoad.php");

class RoadDao {
    private $db;

    public function __construct(){
        $this->db = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function get_road(){
        $query = "SELECT * FROM Road";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $roadData = $stmt->fetchAll();
        $roads = array();
        foreach ($roadData as $road) {
            $roads[] = new Road($road["distance"], $road["duration"], $road["startcity"], $road["endcity"]);
        }
        return $roads;
    }

    public function insert_road($road){
        $query = "INSERT INTO Road VALUES (" . $road->getDistance() . ", '" . $road->getDuration() . "', '" . $road->getStartCity() . "', '" . $road->getEndCity() . "')";
        $stmt = $this->db->query($query);
        $stmt->execute();
    }
    public function getRoadByCity($startCity, $endCity)
    {
        $query = "SELECT * FROM road WHERE startcity = :startcity AND endcity = :endcity";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':startcity', $startCity);
        $stmt->bindParam(':endcity', $endCity);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Road($result["distance"], $result["duration"], $result["startcity"], $result["endcity"]);
        } else {
            return null;
        }
    }

    public function update_road($road){
        $query = "UPDATE Road SET distance = " . $road->getDistance() . ", duration = '" . $road->getDuration() . "', startcity = '" . $road->getStartCity() . "', endcity = '" . $road->getEndCity() . "' WHERE startcity = '" . $road->getStartCity() . "' AND endcity = '" . $road->getEndCity() . "'";
        $stmt = $this->db->query($query);
        $stmt->execute();
    }

    public function delete_road($startCity, $endCity){
        $query = "DELETE FROM Road WHERE startcity = '" . $startCity . "' AND endcity = '" . $endCity . "'";
        $stmt = $this->db->query($query);
        $stmt->execute();
    }
}
?>