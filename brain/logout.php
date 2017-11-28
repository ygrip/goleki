<?php
	session_start();
     session_unset($_SESSION['user_session']);
     header("Location: ../index.php?p=home");
?>