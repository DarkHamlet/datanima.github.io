
<?php

//Obtenemos la IP del visitante y la hora actual.
$ip=$_SERVER['REMOTE_ADDR'];
$hora=time();
$existe=0;

//Tiempo que tardará en actualizarse el contador (60=1 minuto, 1800=media hora)
$sesion=$hora-1800;

$archivo="contar_usuarios.dat";
$ar=@file($archivo);

//Se abre el archivo de texto para eliminar ips expiradas y crear nuevo array con las vigentes.
//Se crea un buqle para recorrer el archivo y leer su contenido
foreach($ar as $pet){
	$ele=explode(":",$pet);
	$ai=trim($ele[1]);
	
	if(trim($ele[1]) == $ip && trim($ele[0]) > $sesion)
	{
		
		$existe=1;
	}
	if(trim($ele[0]) > $sesion)
	{
	$array[]=implode(":",$ele);
	
	}
}

//Se abre el archivo para guardar los datos nuevos.
//Se crea un buqle para recorrer el archivo y leer su contenido
$p=@fopen($archivo,"w+");
if($existe == 0){
$array[]=$hora.":".$ip."\n";
}

foreach($array as $eoeo){
	
	$grabar.=trim($eoeo)."\n";
}

@fwrite($p,$grabar);
@fclose($p);

$con=@file($archivo);

//Se guarda en una variable el número de usuarios únicos visitando la web
$n_usuarios=count($con);


//Se muestran los datos formateados en color rojo
echo "<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>
<body STYLE='font-family: Arial, Helvetica, Sans Serif; font-size:12px;font-weight: bold;color:#FF0000'>
<div align='left'><img border='0' src='logo_useronline.gif'>
$n_usuarios usuarios en línea
</div>
</body>
</html>"; 

?>
