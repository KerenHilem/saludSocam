// If you want to suggest a new language you can use this file as a template.
// To reduce the file size you should remove the comment lines (the ones that start with // )
if(!window.calendar_languages) {
	window.calendar_languages = {};
}
// Here you define the language and Country code. Replace en-US with your own.
// First letters: the language code (lower case). See http://www.loc.gov/standards/iso639-2/php/code_list.php
// Last letters: the Country code (upper case). See http://www.iso.org/iso/home/standards/country_codes/country_names_and_code_elements.htm
window.calendar_languages['es-MX'] = {
	error_noview:     'Calendar: Vista {0} no encontrada',
	error_dateformat: 'Calendar: Formato de Fecha Inválido {0}. Debe ser "now" o con el formato "yyyy-mm-dd"',
	error_loadurl:    'Calendar: URL de datos no definida',
	error_where:      'Calendar: Dirección de navegación errónea {0}. Valores válidos: "next" o "prev" o "today"',
	error_timedevide: 'Calendario: parámetro para el separador de hora debe dividir 60 por un entero. Por ejemplo 10, 15, 30',

	title_year:  'Año {0}',
	title_month: '{0} año {1}',
	title_week:  '{0} semana del año {1}',
	title_day:   '{0} {1} {2} año {3}',

	week:        'Semana {0}',
	all_day:     'Todo el día',
	time:        'Tiempo',
	events:      'Desarrollos',
	before_time: 'Tiempo antes de la cinta final',
	after_time:  'Fin después de una cinta temporal',


	m0:  'Enero',
	m1:  'Febrero',
	m2:  'Marzo',
	m3:  'Abril',
	m4:  'Mayo',
	m5:  'Junio',
	m6:  'Julio',
	m7:  'Agosto',
	m8:  'Septiembre',
	m9:  'Octubre',
	m10: 'Noviembre',
	m11: 'Diciembre',

	ms0:  'Ene',
	ms1:  'Feb',
	ms2:  'Mar',
	ms3:  'Abr',
	ms4:  'May',
	ms5:  'Jun',
	ms6:  'Jul',
	ms7:  'Ago',
	ms8:  'Sep',
	ms9:  'Oct',
	ms10: 'Nov',
	ms11: 'Dic',

	d0: 'Domingo',
	d1: 'Lunes',
	d2: 'Martes',
	d3: 'Miércoles',
	d4: 'Jueves',
	d5: 'Viernes',
	d6: 'Sábado',

	easter:       'Pascuas',
	easterMonday: 'Lunes de Pascuas',

	first_day: 2,

	holidays: {
		'01-01': "Año Nuevo",
		'05-02': "Día de la Constitución",
		'21-03': "Natalicio de Benito Juárez",
		'01-05': "Día del Trabajo",
		'16-09': "Día de la Independencia",
		'20-11': "Día de la Revolución",
		'01-12': "Transmisión del Poder Ejecutivo Federal",
		'25-12': "Navidad"
};
