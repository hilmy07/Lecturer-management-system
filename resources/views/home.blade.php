@extends('layout.template')

@section('content')
<html>
  <center>
    <h1>Manajemen Data Dosen MKU - UPN Veteran Jawa Timur</h1> <br>
  </center>


<div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Mata Kuliah Umum', 'Jumlah Kelas'],
          ['Pendidikan Pancasila',     34],
          ['Pendidikan Bela Negara',   66],
          ['Pendidikan Agama',     11],
          ['Kepemimpinan',  16],
          ['Kewirausahaan',  38],
          ['Bahasa Indonesia', 7],
          ['Bahasa Inggris',    18]
        ]);

        var options = {
          title: 'Data Mata Kuliah Umum UPN Jawa Timur '
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 1257px; height: 500px;"></div>
    </div>
    <br>
  </br>
  <!-- Akhir Pie Chart -->



    <div class="info-box bg-yellow">
              <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
              <div class="info-box-content">
                
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
              <h3 class="box-title">Calendar</h3>
              <a href="/full-calender/" class="btn btn-primary btn-sm">View Calender</a>
              </div>
            <!-- /.box-body -->
     </div>










  </body>
    

     
</html>

@stop