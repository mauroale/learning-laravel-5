<!doctype html>
<html>
	
	<head>
		<title>
			Document
		</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		
		<div class="container">
			@include('partials/flash')
			
			@yield('content')
		</div>
	

	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">

	$('div.alert').not('.alert-important').delay(3000).slideUp(300) ;

	</script>
	@yield('footer')
	
	</body>
</html>

