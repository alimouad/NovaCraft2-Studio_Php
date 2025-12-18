<?php

require_once __DIR__ . '/../Core/Auth.php';

Auth::requireLogin(); 

$title = "NovaCraft Studio - Services";
$view = __DIR__ . '/../views/services.php';

require __DIR__ . '/../templates/layout.php';
