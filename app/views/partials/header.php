<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<meta name="format-detection" content="telephone=no" />
	<title><?= $this->pageTitle; ?></title>
	<meta name="description" content="<?= $this->seoTags['description']; ?>" />
	<meta name="robots" content="index, follow" />
	<!-- Open Graph data -->
	<meta property="og:title" content="<?= $this->pageTitle; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="<?= SITE_NAME ?>" />
	<meta property="og:url" content="<?= $this->seoTags['canonical']; ?>" />
	<meta property="og:description" content="<?= $this->seoTags['description']; ?>" />
	<!-- Canonical -->
	<link rel="canonical" href="<?= $this->seoTags['canonical']; ?>" />
	<!-- Styles -->
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/build/css/main.css?v=1.0.0" />
</head>
<body>
