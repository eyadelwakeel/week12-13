<?php


$str1 = "Hello, wrd!";
$str2 = "Helo";

$matchLength = strspn($str2, $str1); //4

$matchLength = strspn($str1, $str2);   //5

echo  $matchLength ;
