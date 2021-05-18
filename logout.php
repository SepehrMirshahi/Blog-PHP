<?php
include __DIR__.'/include/init.php';
unset($_SESSION['id']);
redirect('login.php');