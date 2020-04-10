<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name') ?></title>

  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="<?php !is_admin_bar_showing() ?: print "padding-top: 32px"  ?>" >
<nav>
  <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">Auge Tecnologia</span>
  </nav>
</nav>