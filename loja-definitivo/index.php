<?php
$url = $_SERVER['REQUEST_URI'] . 'public';
header('Location: ' . $url );
exit;
?>