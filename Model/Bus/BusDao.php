<?php
require_once("config\Connection.php");
require_once("Model\Bus\ClassBus.php");

class BusDao {
    private $db;
    
    public function __construct(){
        $this->db = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function get_bus(){
        $query = "SELECT * FROM bus";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $busData = $stmt->fetchAll();
        $buses = array();
        foreach ($busData as $bus) {
            $buses[] = new Bus($bus["immat"],$bus["busnumber"], $bus["licenseplate"], $bus["capacity"], $bus["companyname"]);
        }
        return $buses;
    }

    public function insert_bus($bus){
        $query = "INSERT INTO bus VALUES (" . $bus->getBusNumber() . ", '" . $bus->getLicensePlate() . "', " . $bus->getCapacity() . ", '" . $bus->getCompanyName() . "')";
        $stmt = $this->db->query($query);
        $stmt->execute();
    }
    public function getBusByIm($bus_imat)
    {
        $query = "SELECT * FROM bus WHERE immat = :immat";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':immat', $bus_imat);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Bus($result['article_id'], $result['article_name'], $result['creation_date'],$result['article_main'], $result['archived'], $result['fk_cat'],$result['fk_email']);
        } else {
            return null;
        }
    }

    public function update_bus($bus){
        $query = "UPDATE bus SET licenseplate = '" . $bus->getLicensePlate() . "', capacity = " . $bus->getCapacity() . ", companyname = '" . $bus->getCompanyName() . "' WHERE busnumber = " . $bus->getBusNumber();
        $stmt = $this->db->query($query);
        $stmt->execute();
    }

    public function delete_bus($busnumber){
        $query = "DELETE FROM bus WHERE busnumber = " . $busnumber;
        $stmt = $this->db->query($query);
        $stmt->execute();
    }
}
?>