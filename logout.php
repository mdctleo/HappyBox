<?php
session_start();
session_unset(); 
session_destroy();
ob_start();

$url = 'index.html';

while (ob_get_status()) 
{
    ob_end_clean();
}

header( "Location: $url" );
?>