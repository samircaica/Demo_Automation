
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      
    </nav>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Orquestación de Procesos automatizados.</h1>
          <p>Demo de Configuration Management</p>
          <p></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Lista de Bases de Datos Disponibles</h2>
            <p>
              <?php 

                //No es la forma correcta de hacer la conexion
                $dbobj = mysql_connect('localhost', 'test', 'test');
                if (!$dbobj) { die('No se pudo conectar a la BD: ' . mysql_error()); }

                $result = mysql_query("SHOW DATABASES");
                while ($res = mysql_fetch_assoc($result)){
                    echo "Base de Datos: ".$res['Database'] . "<br/>";
                }

              ?>
            </p>
            <p></p>
          </div>
          <div class="col-md-4">
            <h2>Lista de Usuarios</h2>
            <p>
              <?php
                  $result = mysql_query("SELECT SUBSTRING_INDEX(host, ':', 1) AS host_short,
                      GROUP_CONCAT(DISTINCT user) AS users,
                      COUNT(*) AS threads
                      FROM information_schema.processlist
                      GROUP BY host_short
                      ORDER BY COUNT(*), host_short");

                  while ($res = mysql_fetch_assoc($result)){
                      echo "Usuario: ". $res['users']. " Threads: " . $res['threads'] ."<br/>";
                  }
              ?>
            </p>
            <p></p>
          </div>
          <div class="col-md-4">
            <h2>Contenido tabla demo.test</h2>
            <p>
              <?php
                  $result = mysql_query("SELECT * from demo.test");

                  while ($res = mysql_fetch_assoc($result)){
                      echo "AID: ".$res['aid'] . " Usuario: ". $res['user']. " Passw: " . $res['pass'] ."<br/>";
                  }
              ?>
            </p>
            <p></p>
          </div>
        </div>

        <hr>

      </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>&copy; Inmetrics 2018</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
