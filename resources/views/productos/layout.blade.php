<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Main Layout</title>

    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  </head>
  <body>

    <div class="jumbotron text-center">
  <h1>Productos</h1>
  <p>By: Camilo</p>
</div>

<div class="container">
    @yield('content')
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

  </body>
</html>
