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
// text filtering function
function filterString($inputvalue)
{
 $inputvalue = trim($inputvalue);
 $inputvalue = strip_tags($inputvalue);
 $inputvalue = htmlspecialchars($inputvalue);
 $inputvalue = stripslashes($inputvalue);
 return $inputvalue;
}
// validate string is not empty and not small
function stringvalidation($inputvalue , $min)
{
  $empty = empty($inputvalue);
  $length = strlen($inputvalue) < $min ;
  if($empty || $length)
  {
    return true ;
  }
  else{
    return false ;
  }
}
function imagevalidation($name , $size,$limit)
{
  $imgsize = ($size/1024)/1024;
  $isbigger = $imgsize>$limit;
  $imgname = empty($name);
  if($isbigger || $imgname)
  {
    return true;
  }
  else 
  {
    return false ;
  }

}
?>