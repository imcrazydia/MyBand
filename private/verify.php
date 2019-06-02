<?php
session_start();

open_connection();

ini_set('display_errors', 1);

verify();

session_destroy();
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Verify</title>
   </head>
   <body>
     <script> history.forward(); </script>
   </body>
 </html>
