<?php
            GetCategoryArticle('https://api.btcturk.com/api/v2/ticker');
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
                $num = count($data['data']);
                for($i=0; $i<=$num-1; $i++){
                  $name = $data['data'][$i]['pair'];
                  $price = $data['data'][$i]['open'];
                  $last = $data['data'][$i]['last'];
                  $date = date('Y-m-d h:i:s');
                  insertdata($name, $price, $last, $date, $con); 
                }
            }
            function insertdata($name, $price, $last, $date, $con){
              $query1 = "DELETE FROM maket3_data WHERE name='$name'";
              mysqli_query($con, $query1);    
              $query = "INSERT INTO maket3_data (name, price, date, last) VALUES ('$name', '$price', '$date', '$last')";
              mysqli_query($con, $query);
            }  
          ?>