
    <?php
session_start();
include("db.php");

include "sidenav.php";
include "topheader.php";

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="panel-body">
		      <a>
            <?php  //success message
                if(isset($_POST['success'])) {
                $success = $_POST["success"];
                echo "<div class='col-md-12 col-xs-12' id='product_msg'>
              <div class='alert alert-success'>
                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
                <b>Product is Added..!</b>
              </div>
            </div>";
                }
            ?></a>
                </div>
                <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Total Compare</h4>
              </div>
              <div class="card-body">
                  <table id="total" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead class="text-primary">
                        <tr style="background-color:#105420"><td>NAME</td><td colspan="2" rowspan="1">www.paribu.com</td><td colspan="2" rowspan="1">api.binance.com</td><td colspan="2" rowspan="1">api.btcturk.com</td><td colspan="2" rowspan="1">Lowest</td></tr>
                        <tr style="background-color:#105420"><td><td>Price</td><td>percent</td><td>Price</td><td>percent</td><td>Price</td><td>Percent</td><td>Price</td><td>Market Name</td></tr>
                    </thead>
                    <tbody id="total_compare">
                    <script>
                        setInterval(function(){
                          var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                              if (this.readyState == 4 && this.status == 200) {
                              document.getElementById("total_compare").innerHTML = this.responseText;
                              }
                            };
                            xhttp.open("GET", "call/total.php", true);
                            xhttp.send();
                          }, 3000);
                      </script>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">www.paribu.com</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive ps">
                    <table id="site1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="text-primary">
                            <tr style="background-color:yellow">
                              <th>No</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Change</th>
                              <th>Percent</th>
                        </tr></thead>
                        <tbody id="tbody_site1">
                        <script>
                          setInterval(function(){
                            var xhttp = new XMLHttpRequest();
                              xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("tbody_site1").innerHTML = this.responseText;
                                }
                              };
                              xhttp.open("GET", "call/site1.php", true);
                              xhttp.send();
                            }, 3000);
                        </script>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">api.binance.com</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive ps">
                      <table id="site2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead class="text-primary">
                              <tr style="background-color:yellow">
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Change</th>
                                <th>Percent</th>
                          </tr></thead>
                          <tbody id="tbody_site2">
                          <script>
                            setInterval(function(){
                              var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                  document.getElementById("tbody_site2").innerHTML = this.responseText;
                                  }
                                };
                                xhttp.open("GET", "call/site2.php", true);
                                xhttp.send();
                              }, 3000);
                          </script> 
                          </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">api.btcturk.com</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive ps">
                      <table id="site3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead class="text-primary">
                              <tr style="background-color:yellow">
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Change</th>
                                <th>Percent</th>
                          </tr></thead>
                          <tbody id="tbody_site3">
                          <script>
                            setInterval(function(){
                              var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                  document.getElementById("tbody_site3").innerHTML = this.responseText;
                                  }
                                };
                                xhttp.open("GET", "call/site3.php", true);
                                xhttp.send();
                              }, 3000);
                          </script>
                          </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>         
          </div>
     </div>
      <?php
include "footer.php";
?>