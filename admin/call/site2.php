<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$db = "currency";
$con = mysqli_connect($servername, $username, $password, $db); 
    $result=mysqli_query($con,"SELECT a.name as name, a.price as price, a.last as last FROM maket2_data a LEFT JOIN maket3_data b ON a.name = b.name WHERE a.name=b.name ORDER BY a.name ASC;")or die ("query 1 incorrect.....");
    $i=0;
    while(list($name,$price,$last)=mysqli_fetch_array($result))
    {
        $i++;
        $change = round(($last-$price), 3);
        $percent = round((($last-$price)/$price), 3);
      
    if(($change)>0){
      echo "<tr style='background-color: #00800080'><td>$i</td><td>$name</td><td>$price</td><td>$change</td><td>$percent%(+)</td></tr>";}
    else{
      echo "<tr style='background-color: #92212180'><td>$i</td><td>$name</td><td>$price</td><td>$change</td><td>$percent%(-)</td></tr>";
    }
    }
    ?>