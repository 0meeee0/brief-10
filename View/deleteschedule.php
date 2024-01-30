<?php
ob_start();
?>
    <p>Realy?</p>
    
    <a href="index.php?action=destroyschedule&id=<?= $category->getScheduleById();?>">Yes</a>

    <a href="index.php?">No</a>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>