<footer class="footer">
        <div class="container-fluid">
          
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i>made by
            <a href="" target="_blank">Aleksandr Danilevich</a>.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->

<!--  Import data in database  -->  
<script>
  setInterval(function(){
    var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        }
      };
      xhttp.open("GET", "adddata/crawl_site1.php", true);
      xhttp.send();
    }, 60000);
    setInterval(function(){
    var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
      };
      xhttp.open("GET", "adddata/crawl_site2.php", true);
      xhttp.send();
    }, 60000);
    setInterval(function(){
    var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
      };
      xhttp.open("GET", "adddata/crawl_site3.php", true);
      xhttp.send();
    }, 60000);
    setInterval(function(){
    var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
      };
      xhttp.open("GET", "adddata/add_total.php", true);
      xhttp.send();
    }, 60000);
</script>


  <script src="js/core/jquery.min.js"></script>
  <script src="js/core/popper.min.js"></script>
  <script src="js/core/bootstrap-material-design.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='js/datatable.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
  <script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
  <script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
  <script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>

  <script src=""></script>
  <script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src=""></script>
  <!--  Google Maps Plugin    -->
  <script src=""></script>
  <!-- Chartist JS -->
  <script src="js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
      <script id="rendered-js" >
$(document).ready(function () {
  //Only needed for the filename of export files.
  //Normally set in the title tag of your page.
  document.title = 'Simple DataTable';
  // DataTable initialisation
  
  
  // $('#site1').DataTable(
  // {
  //   "dom": '<"dt-buttons"Bf><"clear">lirtp',
  //   "paging": false,
  //   "autoWidth": true,
  //   "columnDefs": [
  //   { "orderable": true, "targets": 4 }],

  //   "buttons": [
  //   'copyHtml5',
  //   'csvHtml5',
  //   'excelHtml5',
  //   'pdfHtml5',
  //   'print']
  //  });
  // $('#site2').DataTable(
  // {
  //   "dom": '<"dt-buttons"Bf><"clear">lirtp',
  //   "paging": false,
  //   "autoWidth": true,
  //   "columnDefs": [
  //   { "orderable": true, "targets": 4 }],

  //   "buttons": [
  //   'copyHtml5',
  //   'csvHtml5',
  //   'excelHtml5',
  //   'pdfHtml5',
  //   'print'] 
  // });
  // $('#site3').DataTable(
  // {
  //   "dom": '<"dt-buttons"Bf><"clear">lirtp',
  //   "paging": false,
  //   "autoWidth": true,
  //   "columnDefs": [
  //   { "orderable": true, "targets": 4 }],

  //   "buttons": [
  //   'copyHtml5',
  //   'csvHtml5',
  //   'excelHtml5',
  //   'pdfHtml5',
  //   'print'] 
  // });
  $('#total').DataTable(
  {
    "dom": '<"dt-buttons"Bf><"clear">lirtp',
    "paging": false,
    "autoWidth": true,
    "columnDefs": [
    { "orderable": true, "targets": 8 }],

    // "buttons": [
    // 'copyHtml5',
    // 'csvHtml5',
    // 'excelHtml5',
    // 'pdfHtml5',
    // 'print'] 
  });
 
  //Edit row buttons
});

//# sourceURL=pen.js
    </script>
</body>

</html>