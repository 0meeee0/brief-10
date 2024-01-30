<?php
ob_start();
?>
    <form action="index.php?action=updateroad&startcity&endcity=<?php echo $category->getRoadByCity() ;?>" method="post">
                    <label class="form-label mb-0">Distance:</label>
                    <input name="distance" value="<?php echo $road->getDistance() ;?>">
                    <br>
                    <label class="form-label mb-0">Duration:</label>
                    <input name="duration" value="<?php echo $road->getDuration() ;?>">
                    <br>
                    <label class="form-label mb-0">Start:</label>
                    <input name="startcity" value="<?php echo $road->getStartcity() ;?>">
                    <br>
                    <label class="form-label mb-0">End:</label>
                    <input name="endcity" value="<?php echo $road->getEndcity() ;?>">
                    <br>
                    <button class="btn btn-warning" type="submit" value="Submit" name="add">Submit</button>
            </form>


<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>