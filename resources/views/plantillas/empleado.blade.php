<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Empleado abonos</title>

	<link rel="stylesheet" href="tabla.css">
</head>
<style>
    body{
	background-color: #632432;
	font-family: Arial;
}

#main-container{
	margin: 150px auto;
	width: 600px;
}

table{
	background-color: white;
	text-align: left;
	border-collapse: collapse;
	width: 100%;
}

th, td{
	padding: 20px;
}

thead{
	background-color: #246355;
	border-bottom: solid 5px #0F362D;
	color: white;
}

tr:nth-child(even){
	background-color: #ddd;
}

tr:hover td{
	background-color: #369681;
	color: white;
}
</style>
<body>
	<div id="main-container">
		@yield('contenido')
	</div>
    
</body>
</html>