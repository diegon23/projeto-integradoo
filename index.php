<?php
session_start();
session_destroy();
header("Location: view/anuncio/home.php");
				die();

?>