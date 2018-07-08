<!DOCTYPE html>
<html>
<head>
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
<header>
<h1><a href="<?php echo home_url('/'); ?>">
<?php bloginfo('name'); ?></a>
</h1>
<p><?php bloginfo('description'); ?></p>
</header>
