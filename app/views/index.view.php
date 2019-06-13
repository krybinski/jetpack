<?php include __DIR__ . '/partials/header.php'; ?>

<?php include __DIR__ . '/components/navigation.view.php'; ?>

<div class="container">
	<!-- begin::Header -->
	<header class="header mt-2">
		<div class="jumbotron">
			<h1 class="display-4">Home</h1>
			<p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut illo facere perspiciatis similique reprehenderit hic repellendus. Tempore adipisci vel corporis.</p>
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="<?= route(url('contact')) ?>" role="button">Show contact - normal</a>
			</p>
		</div>
	</header>
	<!-- end::Header -->
</div>
