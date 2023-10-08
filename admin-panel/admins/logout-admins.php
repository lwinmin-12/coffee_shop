<?php

require_once dirname(__DIR__)."../../core/connection.php";


session_start();
session_unset();
session_destroy();

header('location:'.url('admin-panel/admins/login-admins.php'));
