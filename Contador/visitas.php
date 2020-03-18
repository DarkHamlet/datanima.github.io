<?

//Se guardan en variables los nombres de archivo, día y mes
$fichcontmes = "contar_mes.dat";
$fichdia = "dia.dat";
$fichcontdia = "contar_dia.dat";
$fichmes = "mes.dat";
$arr=getdate();
$dia= $arr["mday"];
$mes= $arr["mon"];


//Se abre el archivo del día para leer su contenido. Si es no es el mismo, se añade el nuevo día.
//Si el día es el mismo, se suma 1 al contador
$abrir_dia = fopen($fichdia, "r+");
$nuevo_dia = fgets($abrir_dia, 255);
fclose($abrir_dia);
if ($nuevo_dia != $dia) 
{
$undia_mas = fopen($fichdia, "w");
fputs($undia_mas, $dia);
fclose($undia_mas);
}

$visit_dia = fopen($fichcontdia, "r+");
$suma_dia = fgets($visit_dia, 255);
$suma_dia++;

//Si el dia del archivo no es el mismo del sistema, se pone el contador a cero
if ($nuevo_dia != $dia) 
{
fclose($visit_dia);
$dia_acero = fopen($fichcontdia, "w");
fputs($dia_acero, "1");
fclose($dia_acero);
}
else
{
fseek($visit_dia,SEEK_SET);
fputs($visit_dia, $suma_dia);
fclose($visit_dia);
}


//Este módulo es idéntico al del día de arriba, pero en este caso solo para el mes.
$abrir_mes = fopen($fichmes, "r+");
$nuevo_mes = fgets($abrir_mes, 255);
fclose($abrir_mes);
if ($nuevo_mes != $mes) 
{
$unmes_mas = fopen($fichmes, "w");
fputs($unmes_mas, $mes);
fclose($unmes_mas);
}

$visit_mes = fopen($fichcontmes, "r+");
$suma_mes = fgets($visit_mes, 255);
$suma_mes++;
if ($nuevo_mes != $mes) 
{
fclose($visit_mes);
$mes_acero = fopen($fichcontmes, "w");
fputs($mes_acero, "1");
fclose($mes_acero);
}
else
{
fseek($visit_mes,SEEK_SET);
fputs($visit_mes, $suma_mes);
fclose($visit_mes);
}

//Se muestran los datos guardados formateados en color verde
echo "<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>
<body STYLE='font-family: Arial, Helvetica, Sans Serif; font-size:12px;font-weight: bold; color:#008000'>
<div align='left'><img border='0' src='logo_visitas.gif'>
Pág. vistas hoy: $suma_dia, Mes: $suma_mes
</div>
</body>
</html>"; 

?>