    <?php
    
    if(isset($_POST['chipid']) && isset($_POST['temperatura'])):

    $chipid = $_POST ['chipid'];
    $temperatura = $_POST ['temperatura'];

    $link = new mysqli('localhost','root','','tutorial');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql = "INSERT INTO tabla(id, chipid, fecha, temperatura) VALUES(NULL,'$chipid', CURRENT_TIMESTAMP, 
    '$temperatura')";

    //echo $sql;    

    $result = $link->query($sql); 

    if($result > 0):
        echo 'Successfully posted';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    endif; 
    ?>
