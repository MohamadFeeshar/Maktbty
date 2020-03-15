@extends('layouts.master')

@section('title')
 Dashboard
@endsection


@section('content')
<?php
     
     $dataPoints = array();
      foreach($profit as $val){
        array_push($dataPoints, array("y" => $val->profit, "label" => date('M j', strtotime($val->date))));
      }
     ?>
     <!DOCTYPE HTML>
     <html>
     <head>
     <script>
     window.onload = function () {
      
     var chart = new CanvasJS.Chart("chartContainer", {
       title: {
         text: "Profit Over a Week"
       },
       axisX: {
         title: "Week",
       },
       axisY: {
         title: "Profit"
       },
       data: [{
         type: "line",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
       }]
     });
     chart.render();
      
     }
     </script>
     </head>
     <body>
     <div id="chartContainer" style="height: 370px; width: 100%;"></div>
     <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     </body>
     </html>  
@endsection




@section('scripts')

@endsection