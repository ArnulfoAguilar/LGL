<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- jQuery 2.1.4 -->
<script  src="{{ asset('/plugins/jquery-2.2.3.min.js') }}"></script>
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
{{-- Mas scrips --}}
@yield('JSx')
<script>
	var d = new Date();
	var daysArrayES = ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
	var dayName = daysArrayES[d.getDay()];
	var day = d.getDate();
	var monthArrayES = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
	var month = monthArrayES[d.getMonth()];
	var hour = d.getHours();
	var minute = d.getMinutes();
	document.getElementById("reloj").innerHTML = dayName + ' ' + day + ' de ' + month + ' -- ' + hour + ':' + minute;
</script>
