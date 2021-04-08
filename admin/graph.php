<?php
 session_start();
include("./includes/db.php");
if (isset($_POST['re_password']))
  {
    $email=$_SESSION['admin_email'];

  $old_pass = $_POST['old_pass'];
  $op = md5($old_pass);
  $new_pass = $_POST['new_pass'];
  $re_pass = $_POST['re_pass'];
  $password_query = mysqli_query($con,"select * from admin_info where admin_email='$email'");
  $password_row = mysqli_fetch_array($password_query);
  $database_password = $password_row['admin_password'];
  if ($database_password == $op)
    {
    if ($new_pass == $re_pass)
      {
        $pass = md5($re_pass);
      $update_pwd = mysqli_query($con,"UPDATE admin_info set admin_password='$pass' where admin_id='6'");
      echo "<script>alert('Update Sucessfully'); </script>";
      }
      else
      {
      echo "<script>alert('Your new and Retype Password is not match'); </script>";
      }
    }
    else
    {
    echo "<script>alert('Your old password is wrong'); </script>";
    }
  }
 
include "sidenav.php";
include "topheader.php";
?>

  <div class="content row" style="margin-top:0px">
            <style>
            @import url("https://fonts.googleapis.com/css?family=Nunito");
            * {
              font-family: inherit;
              outline: none;
            }

            body nav {
              padding: 15px;
              background: #2B2E3D;
              display: flex;
              flex-direction: column;
              margin: 15px;
            }
            body nav label {
              font-size: 85%;
              font-weight: bold;
              text-transform: uppercase;
            }
            body nav input, body nav select {
              flex-shrink: 0;
              border: none;
              border-radius: 2px;
              background: #363D57;
              color: white;
              padding: 5px;
            }
            body nav input:not(:last-child), body nav select:not(:last-child) {
              margin-bottom: 15px;
            }
            body nav .select-multi {
              flex-grow: 1;
            }
            </style>

         
    <nav class="col-sm-2">
        <select id="currency-name" name="currency-name" class="select-multi" multiple>
            <?php $con = mysqli_connect($servername, $username, $password, $db); 
                $result=mysqli_query($con,"select name from total_data GROUP BY name")or die ("query 1 incorrect.....");
                $i=0;
                while(list($name)=mysqli_fetch_array($result))
                {
                  echo "<option value='$name'>$name</option>";}
            ?>
        </select>
        <label for="date-start">Start period</label>
        <input name="date-start" type="date" id="date-start" />

        <label for="date-end">End period</label>
        <input name="date-end" type="date" id="date-end" />
        <button class="btn btn-primary pull-right" name="view_graph" id="view_graph" onclick="view_graph()">VIEW GRAPH</button>            
        <input id="graph_data" type="hidden">
  </nav>
  <div class="col-sm-9">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
          <style>
          #line-chart,
          {
            min-height: 350px;
          }
          </style>

            
            <div class="row">
            <span id="label_name" class="label label-success"></span>
              <div class="col-sm-12 text-center">
                <div id="line-chart"></div>
              </div>
            </div>
        
          <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
          <script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js'></script>
          <script src='https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js'></script>
          <script>
              var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("graph_data").value = this.responseText;
                  }
                };
                xhttp.open("GET", "call/graph_data.php", true);
                xhttp.send();
            setTimeout(() => {
              var data = document.getElementById("graph_data").value;
              var json = JSON.parse(data);
              document.getElementById('label_name').innerHTML = json[1]['name'];
              var data = json,
              config = {
                data: data,
                xkey: 'date',
                ykeys: ['apercent', 'bpercent', 'cpercent'],
                labels: ['www.paribu.com', 'api.binance.com', 'api.btcturk.com'],
                fillOpacity: 0.6,
                hideHover: 'auto',
                behaveLikeLine: true,
                resize: true,
                pointFillColors: ['#ffffff'],
                pointStrokeColors: ['black'],
                lineColors: ['green', 'red', 'yellow'] };

              config.element = 'line-chart';
              Morris.Line(config);
            }, 2000);
            function view_graph(){
              var currency_name = document.getElementById('currency-name').value;
              var date_start = document.getElementById('date-start').value;
              var date_end = document.getElementById('date-end').value;
              if(date_start==''||date_end==''||currency_name=='')
              {
                alert('insert filter value');
                return;
              }
              let canvas = document.getElementById('line-chart');
              canvas.removeChild(canvas.childNodes[0]);
              canvas.removeChild(canvas.childNodes[0]);
              var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("graph_data").value = this.responseText;
                  }
                };
                xhttp.open("GET", "call/graph_search.php?"+currency_name+"?"+date_start+"?"+date_end, true);
                xhttp.send();
                setTimeout(() => {
                var data = document.getElementById("graph_data").value;
                var json = JSON.parse(data);
                document.getElementById('label_name').innerHTML = ""+json[1]['name']+"    ("+date_start+"~"+date_end+")";
                var data = json,
                config = {
                  data: data,
                  xkey: 'date',
                  ykeys: ['apercent', 'bpercent', 'cpercent'],
                  labels: ['www.paribu.com', 'api.binance.com', 'api.btcturk.com'],
                  fillOpacity: 0.6,
                  behaveLikeLine: true,
                  resize: true,
                  pointFillColors: ['#ffffff'],
                  pointStrokeColors: ['black'],
                  lineColors: ['green', 'red', 'yellow'] };

                config.element = 'line-chart';
                Morris.Line(config);
              }, 2000);
            }

              //# sourceURL=pen.js
           </script>

 
  </div>

</div>
  
  <?php
include "footer.php";
?>