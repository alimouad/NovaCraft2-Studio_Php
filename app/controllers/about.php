<?php
require_once __DIR__ . '/../Core/Auth.php';

Auth::requireLogin(); 

$title = "NovaCraft Studio - About Us";
$view = __DIR__ . '/../views/about.php';

require __DIR__ . '/../templates/layout.php';