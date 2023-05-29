<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    /* Estilos para el body */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Estilos para el header */
    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    /* Estilos para el contenedor principal */
    .container {
      display: flex;
      flex-wrap: wrap;
      margin: 20px;
    }

    /* Estilos para los widgets */
    .widget {
      background-color: #f2f2f2;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin: 10px;
      padding: 20px;
      width: calc(33.33% - 40px);
    }

    /* Estilos para los títulos de los widgets */
    .widget h2 {
      color: #333;
      font-size: 18px;
      margin: 0;
    }

    /* Estilos para las opciones desplegables */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-content li {
      padding: 10px;
      cursor: pointer;
    }

    .dropdown-content li:hover {
      background-color: #ddd;
    }
  </style>
</head>
<body>
  <header>
    <h1>Dashboard</h1>
  </header>
  <div class="container">
    <div class="widget">
      <h2>Widget 1</h2>
      <ul class="dropdown">
        <li>Opción 1</li>
        <li>Opción 2</li>
        <li>Opción 3</li>
        <li>Opción 4</li>
      </ul>
    </div>
    <div class="widget">
      <h2>Widget 2</h2>
      <ol class="dropdown">
        <li>Elemento 1</li>
        <li>Elemento 2</li>
        <li>Elemento 3</li>
        <li>Elemento 4</li>
      </ol>
    </div>
    <div class="widget">
      <h2>Widget 3</h2>
      <ul class="dropdown">
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
        <li>Item 4</li>
      </ul>
    </div>
  </div>
</body>
</html>
