<html>
    <head><title>Iniciar proyecto</title></head>
    <body>
        
<?php
    $host="localhost";
    $port="5432";
    $user="smart";
    $pass="smart";
    $dbname="smartwater";

//$connect = pg_connect  ("host=".$host." user=".$user." dbname=".$dbname." password=".$passw." ");

$connect = "host=127.0.0.1 port=5432 dbname=smartwater user=smart password=smart";
$dbconn4 = pg_connect($connect );

    if (!$connect) {
            echo "<p><i>No me conecte</i></p>";
                       
        } else {
            echo "<p><i>Me conecte</i></p>";
        }

$query = "select * from sensors";

$resultado = pg_query($dbconn4, $query) or die("Error en la Consulta SQL");

$numReg = pg_num_rows($resultado);

if($numReg>0){
echo "<table border='1' align='center'>
<tr bgcolor='skyblue'>
<th>ID</th>
<th>Usuario</th>
<th>ubicación</th></tr>";
while ($fila=pg_fetch_array($resultado)) {
echo "<tr><td>".$fila['id']."</td>";
echo "<td>".$fila['name']."</td>";
echo "<td>".$fila['ubicacion']."</td></tr>";
}
                echo "</table>";
}else{
                echo "No hay Registros";
}

pg_close($conexion);

?>  
        
        
    </body>
</html>
