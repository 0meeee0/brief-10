<?php
ob_start();
?>
    <form action="index.php?action=update&id=<?php echo $category->getBusimmat() ;?>" method="post">
                    <label class="form-label mb-0">Number:</label>
                    <input name="busnumber" value="<?php echo $category->getBusnumber() ;?>">
                    <br>
                    <label class="form-label mb-0">License:</label>
                    <input name="licenseplate" value="<?php echo $category->getLicenseplate() ;?>">
                    <br>
                    <label class="form-label mb-0">Capacity:</label>
                    <input name="capacity" value="<?php echo $category->getCapacity() ;?>">
                    <br>
                    <label class="form-label mb-0">Company:</label>
                    <input name="companyname" value="<?php echo $category->getCompanyname() ;?>">
                    <br>
                    <button class="btn btn-warning" type="submit" value="Submit" name="add">Submit</button>
            </form>


<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>