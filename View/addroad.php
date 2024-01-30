<?php
ob_start();
?>
    
            <form action="/index.php?action=storeroad" method="post">
                    <label for="exampleInputEmail2" class="form-label mb-0">Disctance:</label>
                    <input  class="form-control border-0"  name="distance" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Duration:</label>
                    <input  class="form-control border-0"  name="duration" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Start:</label>
                    <input  class="form-control border-0"  name="startcity" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">End:</label>
                    <input  class="form-control border-0"  name="endcity" required>
                    <br>
                    <input class="btn btn-warning" type="submit" value="Submit" name="add">
            </form>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>