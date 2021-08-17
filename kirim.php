<?php


ini_set( 'display_errors', 1 );   
    error_reporting( E_ALL );    
    $from = "monekulm@monekulmpunj.web.id";    
    $to = "rjackly21@gmail.com";    
    $subject = $_POST['judul'];    
    $message = $_POST['pesan'];   
    $headers = "From:" . $from;    
    mail($to,$subject,$message, $headers);    
    echo "Pesan email sudah terkirim.";

?>