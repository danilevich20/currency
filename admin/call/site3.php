                          <?php 
                          $servername = "localhost";
                          $username = "root";
                          $password = "root";
                          $db = "currency";
                          $con = mysqli_connect($servername, $username, $password, $db); 
                              $result=mysqli_query($con,"select name, price, last from maket3_data GROUP BY name")or die ("query 1 incorrect.....");
                              $i=0;
                              while(list($name,$price,$last)=mysqli_fetch_array($result))
                              {
                                  $i++;
                                  $change = round(($last-$price), 3);
                                  $percent = round(($change/$price), 3);
                              if(($change)>0){
                                echo "<tr style='background-color: #00800080'><td>$i</td><td>$name</td><td>$price</td><td>$change</td><td>$percent%(+)</td></tr>";}
                              else{
                                echo "<tr style='background-color: #92212180'><td>$i</td><td>$name</td><td>$price</td><td>$change</td><td>$percent%(-)</td></tr>";
                              }
                              }
                              ?>