<?php
            GetCategoryArticle('https://www.paribu.com/ticker');
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
                  $name = explode('},', $response)[$i];
                  $name = explode('"', $name)[1];
                  $name = explode('"', $name)[0];
                  $name1 = str_replace('_TL', 'TRY', $name);
                  $name1 = str_replace('_USDT', 'USDT', $name1);
                  $price = $data[$name]['last'];
                  $date = date('Y-m-d h:i:m');
                  $lowestAsk = $data[$name]['lowestAsk'];
                  $highestBid = $data[$name]['highestBid'];
                  $low24hr = $data[$name]['low24hr'];
                  $high24hr = $data[$name]['high24hr'];
                  $avg24hr = $data[$name]['avg24hr'];
                  $volume = $data[$name]['volume'];
                  $change = $data[$name]['change'];
                  $percentChange = $data[$name]['percentChange'];
                insertdata($name1, $price, $date, $lowestAsk, $highestBid, $low24hr, $high24hr, $avg24hr, $volume, $change, $percentChange, $con); 
                }
            }
            function insertdata($name, $price, $date, $lowestAsk, $highestBid, $low24hr, $high24hr, $avg24hr, $volume, $change, $percentChange, $con){
                  $query1 = "DELETE FROM maket1_data WHERE name='$name'";
                  mysqli_query($con, $query1);   
                  $query = "INSERT INTO maket1_data (name, price, date, lowestAsk, highestBid, low24hr, high24hr, avg24hr, volume, changevalue, percentChange) VALUES ('$name', '$price', '$date', '$lowestAsk', '$highestBid', $low24hr, $high24hr, $avg24hr, $volume, $change, $percentChange)";
                  mysqli_query($con, $query);
              
            }  
          ?>