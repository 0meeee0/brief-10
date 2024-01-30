<?php
ob_start();
?>
    <p>Realy?</p>
   <!--questionable idkl help pls????????????-->
    <a href="index.php?action=destroycity&startcity&endcity=<?= $category->getRoadByCity();?>">Yes</a>

    <a href="index.php?">No</a>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>