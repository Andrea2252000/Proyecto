<html>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/4.3.1/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Grafica</title>

</head>

<body style="background-image:url('../img/fondos/<?php echo rand(4, 4); ?>.png'" class="fondo">
    <script src="../../js/jquery-3.5.1-jquery.min.js"></script>
    <script src="../../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../../js/4.3.1/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel='stylesheet prefetch' href='../../css/3.2.0/bootstrap.min.css'>
    <script src="js/carousel-slider.js"></script>
    
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
          <div class="container-fluid">

            <a class="navbar-brand" href="../catalogo.php">Volver</a>
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

          </div>
        </nav>
        <br>
  
  <style type="text/css">

    #chart-container {
      width: 100%;
      height: auto;
    }
    .card {
      position: relative;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -ms-flex-direction: column;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #F0FFFF;
      background-clip: border-box;
      border: 1px solid rgba(2, 2, 2, 0.130);
      border-radius: 0.25rem;
    }

    .card-body {
      -webkit-box-flex: 1;
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      padding: 1.25rem;
    }
  </style>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>

<body>
  <div class="card-body" >
  <h3><strong><p>Precio de Cerveza</p></strong></h3>
    <div id="chart-container" >
      <canvas id="graphCanvas"></canvas>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
        url: "conexion-grafica.php",
        method: "GET",
        success: function(data){
          console.log(data);
          var Producto = [];
          var Precio = [];

          for (var i in data){
            Producto.push(data[i].Producto);

            Precio.push(data[i].Precio);
          }
          var chartdata = {
            labels: Producto,
            datasets: [{
              label: 'Student Marks',
              backgroundColor : ['#E9967A', '#00FFFF', '#8A2BE2', '#98FB98', '#FFC0CB' ],
              hoverBackgroundColor: 'rgba(235, 206, 230, 0.80)',
              hoverBorderColor: 'rgba(235, 206, 230, 0.80)',
              data: Precio

            }]
          };
          var graphTarget = $("#graphCanvas");
          var barGraph = new Chart(graphTarget, {
            type: 'pie',
            data: chartdata,

          });
        },
        error: function(data) {
          console.log(data);
        }

      });
    });
  </script>

</body>   
<br><br><br><br><br><br>

</html>