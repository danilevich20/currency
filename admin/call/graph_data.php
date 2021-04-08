<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "currency";
    $con = mysqli_connect($servername, $username, $password, $db); 
    
        $result=mysqli_query($con,"select * from total_data WHERE name='BTCTRY'")or die ("query 1 incorrect.....");
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        echo json_encode($emparray);
?>