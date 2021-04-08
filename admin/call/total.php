                          <?php 
                          $servername = "localhost";
                          $username = "root";
                          $password = "root";
                          $db = "currency";
                          $con = mysqli_connect($servername, $username, $password, $db); 
                          $result=mysqli_query($con,"SELECT a.name as name, a.price as aprice, b.price as bprice, c.price as cprice FROM maket1_data a, maket2_data b, maket3_data c WHERE a.name=b.name AND b.name=c.name ORDER BY a.name ASC");
  
                          while(list($name,$aprice,$bprice,$cprice)=mysqli_fetch_array($result))
                          {	
                            $min = 0;
                            if($aprice<$bprice){
                              $min = $aprice;
                              $maket = 'www.paribu.com';
                              if($min>$cprice){
                                $min = $cprice;
                                $maket='api.btcturk.com';
                              }
                              else{
                                $min=$aprice;
                                $maket='www.paribu.com';
                              }
                            }
                            else{
                              $min = $bprice;
                              $maket = 'api.binance.com';
                              if($min>$cprice){
                                $min = $cprice;
                                $maket='api.btcturk.com';
                              }
                              else{
                                $min=$bprice;
                                $maket='api.binance.com';
                              }
                            }
                            $apercent = round(($aprice-$min)/$min, 3);
                            $bpercent = round(($bprice-$min)/$min, 3);
                            $cpercent = round(($cprice-$min)/$min, 3);
                          echo "<tr style='background-color:#202940'><td>$name</td><td>$aprice</td><td>$apercent%</td><td>$bprice</td><td>$bpercent%</td><td>$cprice</td><td>$cpercent%</td><td>$min</td><td>$maket</td>
  
                          </tr>";
                          }
                          ?>