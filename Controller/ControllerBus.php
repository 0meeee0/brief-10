<?php
require_once("Model\Bus\BusDao.php");

class BusController {
    private $busDAO;
    
    public function __construct(){
        $this->busDAO = new BusDao(); 
    }

    public function getBuses(){
        return $bus=$this->busDAO->get_bus();
        require_once 'views/adminbus.php';
    }

    public function addBus($bus){
        $bus=$this->busDAO->insert_bus($bus);
        require_once 'view/AddBus.php';
    }
    function storeBusAction(){
        $newBus = new Bus(0,
        $_POST["busnumber"],
        $_POST["licenseplate"],
        $_POST["capacity"],
        $_POST["companyname"]);
        $this->busDAO->insert_bus($newBus);
    
    
        header('location:index.php');
        exit();
    }

    function editBusAction(){
        $bus_imat = $_GET['immat'];
        $this->busDAO->getBusByIm($bus_imat);
        require_once 'view/editbus.php';
    }
    public function updateBus($bus){
        $newBus = new Bus(0,
        $_POST["busnumber"],
        $_POST["licenseplate"],
        $_POST["capacity"],
        $_POST["companyname"]);
        $this->busDAO->update_bus($bus);
    }

    function deleteBusAction(){
        $bus_imat = $_GET['immat'];
        $this->busDAO->getBusByIm($bus_imat);
        require_once 'view/deletebus.php';
    }
    public function destroyBus(){
        $bus_imat = $_GET['immat'];
        $this->busDAO->delete_bus($bus_imat);
    }
}
?>
