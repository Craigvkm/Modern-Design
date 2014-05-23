<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modern Design | Furnature</title>
    <link rel="stylesheet" href="/CSS/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/CSS/styles.css">
    <link rel="stylesheet" href="/CSS/responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <header>
      <a href="/" id="logo">
        <h1>Modern Design</h1>
        <h2>A&C Co.</h2>
      </a>

      <nav>
        <ul>
          <li><a href="/index.php" class='<?php if($section=="index"){echo "selected";} ?>' >Home</a></li>
          <li>|</li>
          <li><a href="/about.php" class='<?php if($section=="about"){echo "selected";} ?>' >The Designers</a></li>
          <li>|</li>
          <li><a href="/contact.php" class='<?php if($section=="contact"){echo "selected";} ?>' >Contact</a></li>
          <li>|</li>
          <li><a href="/store.php" class='<?php if($section=="store"){echo "selected";} ?>'>Store</a></li>
        </ul>
      </nav>

    </header>

    <div id="wrapper">
      <div class="bodyContainer">
