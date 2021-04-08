<?php 
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";   
else  
$url = "http://";   
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode("?",$url);
$c_name = $url[1];
$date_start = $url[2];
$date_end = $url[3];
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "currency";
    $con = mysqli_connect($servername, $username, $password, $db); 
    
        $result=mysqli_query($con,"select * from total_data WHERE name='$c_name' AND date BETWEEN '$date_start' AND '$date_end'")or die ("query 1 incorrect.....");
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        echo json_encode($emparray);
?>