<?php 
$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
$shuffle1  = substr(str_shuffle($karakter), 0, 32);
$shuffle2  = substr(str_shuffle($karakter), 0, 32);
$mix = $shuffle1.$shuffle2;
echo $mix;
?>