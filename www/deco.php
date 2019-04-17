<?php
  	if (isset($_SESSION['login'])){
  		unset($_SESSION['login']);
  		 session_unset();
  	}
    header('Location: index.php');
?>