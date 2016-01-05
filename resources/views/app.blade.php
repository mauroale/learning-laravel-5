<!doctype html>
<html>
	
	<head>
		<title>
			Document
		</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />

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

	
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

	@yield('footer')
	
	</body>
</html>

