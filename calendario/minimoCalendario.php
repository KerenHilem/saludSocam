	<!DOCTYPE html>
	<html>
	<head>
		<title>Minimum Setup</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/calendar.css">
	</head>
	<body>
	<div class="hero-unit">
		<h1>Citologias</h1>

		<p>Calendario de Citologias.</p>

	</div>

		<div class="page-header">

		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
				<button class="btn" data-calendar-nav="today">Hoy</button>
				<button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Año</button>
				<button class="btn btn-warning active" data-calendar-view="month">Mes</button>
				<button class="btn btn-warning" data-calendar-view="week">Semana</button>
				<button class="btn btn-warning" data-calendar-view="day">Día</button>
			</div>
		</div>

		<h3></h3>
		<small>To see example with events navigate to march 2013</small>
	</div>

		<div class="span12">
			<div id="calendar"></div>
		</div>

		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="js/vendor/underscore-min.js"></script>
		<script type="text/javascript" src="js/calendar.js"></script>
		<script type="text/javascript">
			var calendar = $("#calendar").calendar(
				{
					tmpl_path: "/tmpls/",
					events_source: function () { return []; }
				});			
		</script>
		<script type="text/javascript" src="js/app.js"></script>
	</body>
	</html>