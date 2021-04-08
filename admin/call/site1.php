                          <?php 
                          $servername = "localhost";
                          $username = "root";
                          $password = "root";
                          $db = "currency";
                          $con = mysqli_connect($servername, $username, $password, $db); 
                          $result=mysqli_query($con,"select name, price, changevalue, percentChange, avg24hr, high24hr, low24hr from maket1_data GROUP BY name")or die ("query 1 incorrect.....");
                          $i=0;
                          while(list($name,$price,$change, $percentChange, $avg24hr, $high24hr, $low24hr)=mysqli_fetch_array($result))
                          {
                              $i++;
                          if($change>0){
                            echo "<tr style='background-color: #00800080'><td>$i</td><td>$name</td><td>$price</td><td>$change</td><td>$percentChange%(+)</td></tr>";}
                          else{
                            echo "<tr style='background-color: #92212180'><td>$i</td><td>$name</td><td>$price</td><td>$change</td><td>$percentChange%(-)</td></tr>";
                          }
                          }
                          ?>