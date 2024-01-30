<?php
ob_start();
?>
    <form action="index.php?action=updateschedule&id=<?php echo $schedule->getScheduleById() ;?>" method="post">
                    <label for="exampleInputEmail2" class="form-label mb-0">Date:</label>
                    <input  class="form-control border-0" type="datetime-local" id="datetime" name="date" value="<?php echo $schedule->getDate() ;?>" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Departure:</label>
                    <input  class="form-control border-0" type="datetime-local" id="datetime" name="departuretime" value="<?php echo $schedule->getDeparturetime() ;?>" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Arrival:</label>
                    <input  class="form-control border-0" type="datetime-local" id="datetime" name="arrivaletime" value="<?php echo $schedule->getArrivaltime() ;?>" required>
                    <br>
                    <label class="form-label mb-0">Seats:</label>
                    <input name="availableseats" value="<?php echo $schedule->getAvailableseats() ;?>">
                    <br>
                    <label class="form-label mb-0">Price:</label>
                    <input name="price" value="<?php echo $schedule->getPrice() ;?>">
                    <br>
                    <label class="form-label mb-0">Bus:</label>
                    <input name="busnumber" value="<?php echo $schedule->getBusnumber() ;?>">
                    <br>
                    <label class="form-label mb-0">Start:</label>
                    <input name="startcity" value="<?php echo $schedule->getStartcity() ;?>">
                    <br>
                    <label class="form-label mb-0">End:</label>
                    <input name="endcity" value="<?php echo $schedule->getEndcity() ;?>">
                    <br>
                    <button class="btn btn-warning" type="submit" value="Submit" name="add">Submit</button>
            </form>


<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>