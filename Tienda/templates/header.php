   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   </head>

   <body>
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
           <a class="navbar-brand" href="index.php">Brand</a>
           <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div id="my-nav" class="collapse navbar-collapse">
               <ul class="navbar-nav mr-auto">
                   <li class="nav-item active">
                       <a class="nav-link" href="../Slider Jquery/index.php">Home<span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="../Tienda/catalogo.php">Catalogo<span class="sr-only"></span></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="../Tienda/mostrarCarrito.php" tabindex="-1" aria-disabled="true">Carrito(<?php
                                                                                                                            echo (empty($_SESSION['carrito'])) ? 0 : count($_SESSION['carrito']);                                                                                                    ?>)</a>
                   </li>
               </ul>
</div>
       </nav>
       <br><br>

       <div class="container">