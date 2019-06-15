<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<meta name="format-detection" content="telephone=no" />
	<title>TITLE</title>
	<meta name="description" content="DESCRIPTION" />
	<meta name="robots" content="index, follow" />
	<!-- Open Graph data -->
	<meta property="og:title" content="TITLE" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="<?= config('app.name') ?>" />
	<meta property="og:url" content="CANONICAL" />
	<meta property="og:description" content="DESCRIPTION" />
	<!-- Canonical -->
	<link rel="canonical" href="CANONICAL" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="/favicon.ico">
	<!-- Styles -->
    <link rel="stylesheet" href="/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="/build/css/main.css?v=1.0.0" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="/"><?= config('app.name') ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="/">Home</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<!-- begin::Header -->
		<header class="header mt-2">
			<div class="jumbotron">
				<h1 class="display-4">Home</h1>
				<p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut illo facere perspiciatis similique reprehenderit hic repellendus. Tempore adipisci vel corporis.</p>
				<p class="lead">
					Put link
				</p>
			</div>
		</header>
		<!-- end::Header -->
	</div>

	<footer class="site-footer">
        <div class="small-container">
        </div>
    </footer>

    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="/build/js/main.js?v=<?= config('app.version') ?>"></script>
</body>
</html>
