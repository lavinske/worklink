<?php

if(isset($_SESSION['companyid'])) header('location:home');
else header('location:login');

?>s