<?php
define('BASE_URL','http://localhost:8080/company/');
function URL( $var = null)
{
    return BASE_URL .$var;
}


// instead of using header() function as it may cuz fatal errors
function path($var = null)
{
   $location = BASE_URL .$var;

   echo
 "
     <script>
     window.location.replace ('$location')
     </script>
   ";
}
?>