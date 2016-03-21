<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{url('/')}}">Lavadero</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li><a class="btn btn-default" href="{{url('/cliente/agregar')}}">Nuevo cliente</a></li>
            <li><a class="btn btn-default" href="{{url('/tipo_vehiculo/agregar')}}">Nuevo tipo vehiculo</a></li>
            <li><a class="btn btn-default" href="{{url('/vehiculo/formulario')}}">Nuevo vehiculo</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            @yield('encabezado')
        </div>
        <div class="panel-body">
            @yield('contenido')
        </div>
        <div class="panel-footer">
            <span>Calidad de software - 2016 - 2da. Edicion - 3ra. Version</span>
        </div>
    </div>
</div>
</body>
</html>