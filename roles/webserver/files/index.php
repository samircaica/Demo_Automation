<html>
 <head>
  <title>Ansible Application</title>
 </head>
 <body>
 </br>
 Hello, World! I am a web server configured using Ansible and I am : 
<?php 
 echo exec('hostname');
?>
<p>
    <strong>Lista de Bases de Datos:</strong> <br/>
    <?php 

    //No es la forma correcta de hacer la conexion
    $dbobj = mysql_connect('localhost', 'test', 'test');
    if (!$dbobj) { die('No se pudo conectar a la BD: ' . mysql_error()); }

    $result = mysql_query("SHOW DATABASES");
    while ($res = mysql_fetch_assoc($result)){
        echo $res['Database'] . "<br/>";
    }

    ?>
    </p>
    <p>
        <strong>Lista de Usuarios: </strong> <br/>
    <?php
        $result = mysql_query("SELECT SUBSTRING_INDEX(host, ':', 1) AS host_short,
            GROUP_CONCAT(DISTINCT user) AS users,
            COUNT(*) AS threads
            FROM information_schema.processlist
            GROUP BY host_short
            ORDER BY COUNT(*), host_short");

        while ($res = mysql_fetch_assoc($result)){
            echo $res['host_short'] . " ". $res['users']. " " . $res['threads'] ."<br/>";
        }
    ?>
    </p>
    <p>
        <strong>Contenido tabla demo.test:</strong> <br/>
    <?php
        $result = mysql_query("SELECT * from demo.test");

        while ($res = mysql_fetch_assoc($result)){
            echo $res['aid'] . " ". $res['user']. " " . $res['pass'] ."<br/>";
        }
    ?>
    </p>
</body>
</html>