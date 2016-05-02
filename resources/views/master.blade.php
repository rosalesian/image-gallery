<!DOCTYPE html>
<html>
<head>
	<title>My Gallery App</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
	<script type="text/javascript">
		var base_url = {{ url('/') }};
	</script>
</head>
<body>
	<div class="container">
	@yield('content')
	</div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script type="text/javascript" src="{{ asset('js/material.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ripples.js') }}"></script>

</html>
