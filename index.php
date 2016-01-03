<?php
include("functions/autorun.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php
        include( "templates/headers.php" );
    ?>
</head>
<body>

<?php
include( "templates/header.php" );
include( "templates/menu.php" );
?>
<div id="content">
    <?php
        include( "templates/leftpanel.php" );
        include( "templates/content.php" );
        include( "templates/rightpanel.php" );
        ?>
    <div style="clear: both;">&nbsp;</div>
</div>
<?php
include( "templates/footer.php" );
?>

</body>
</html>
