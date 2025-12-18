<?php

require_once __DIR__ . '/../Core/Auth.php';

Auth::requireLogin(); 

$title = "NovaCraft Studio - Accueil";
$view = __DIR__ . '/../views/home.php';

require __DIR__ . '/../templates/layout.php';