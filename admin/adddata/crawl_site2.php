<?php
            GetCategoryArticle('https://api.binance.com/api/v3/ticker/price');
            function GetCategoryArticle($link){
                $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => $link,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'GET',
                ));   
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $db = "currency";
                $con = mysqli_connect($servername, $username, $password, $db); 
                $response = curl_exec($curl);
                $data = json_decode($response, true);
                $num = count($data);
                for($i=0; $i<=$num-1; $i++){
                  $name = $data[$i]['symbol'];
                  $price = $data[$i]['price'];
                  $date = date('y-m-d h:i:m');
                  insertdata($name, $price, $date, $con); 
                }
            }
            function insertdata($name, $price, $date, $con){
              $sql = "SELECT * FROM maket2_data WHERE name='$name'";
              $result = mysqli_query($con, $sql);
              $row = $result->fetch_assoc();
              $last = $row['price'];
              $sql1 = "DELETE FROM maket2_data WHERE name='$name'";
              mysqli_query($con, $sql1);
              $query = "INSERT INTO maket2_data (name, price, date, last) VALUES ('$name', '$price', '$date', '$last')";
              mysqli_query($con, $query);
            }  
          ?>