<?php
require_once 'Model\Road\RoadDao.php';

class RoadController {
    private $roadDao;

    public function __construct(){
        $this->roadDao = new RoadDao(); 
    }

    public function showAllRoads(){
        $roads = $this->roadDao->get_road();
        return $roads;
        require_once 'views/roads.php';
    }

    public function addRoad($road){
        $this->roadDao->insert_road($road);
        require_once 'view/addroad.php';
    }
    function storeRoadAction(){
        $newRoad = new Road($_POST["distance"], $_POST["duration"], $_POST["startcity"], $_POST["endcity"]);
    
    
        header('location:index.php');
        exit();
    }
    function editBusAction(){
        $city = $_GET['startcity'];
        $city_ = $_GET['endcity'];
        $this->roadDao->getRoadByCity($city,$city_);
        require_once 'view/editroad.php';
    }
    public function updateRoad($road){
        $newRoad = new Road($_POST["distance"], $_POST["duration"], $_POST["startcity"], $_POST["endcity"]);
        $this->roadDao->update_road($road);
    }

    function deleteArticleAction(){
        $city = $_GET['startcity'];
        $city_ = $_GET['endcity'];
        $this->roadDao->getRoadByCity($city, $city_);
        require_once 'view/deleteroad.php';
    }
    public function destroyRoad($startCity, $endCity){
        $city = $_GET['startcity'];
        $city_ = $_GET['endcity'];
        $this->roadDao->delete_road($startCity, $endCity);
    }
}

?>
