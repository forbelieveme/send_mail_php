<?php 
session_start();
session_unset();
session_destroy();

header('Location: /primer_taller_bd');
?>