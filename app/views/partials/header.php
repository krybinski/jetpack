<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<meta name="format-detection" content="telephone=no" />
	<title><?= $this->pageTitle; ?></title>
	<meta name="description" content="<?= $this->pageDescription; ?>" />
	<meta name="robots" content="index, follow" />
	<!-- Open Graph data -->
	<meta property="og:title" content="<?= $this->pageTitle; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="<?= config('app.name') ?>" />
	<meta property="og:url" content="<?= $this->seoTags['canonical']; ?>" />
	<meta property="og:description" content="<?= $this->pageDescription; ?>" />
	<!-- Canonical -->
	<link rel="canonical" href="<?= $this->canonical; ?>" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="/favicon.ico">
	<!-- Styles -->
    <link rel="stylesheet" href="/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="/build/css/main.css?v=1.0.0" />
</head>
<body>
