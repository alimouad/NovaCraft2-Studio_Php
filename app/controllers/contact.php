<?php

require_once __DIR__ . '/../Core/Auth.php';

Auth::requireLogin(); 

$title = "NovaCraft Studio - Contact";
$view = __DIR__ . '/../views/contact.php';

require __DIR__ . '/../templates/layout.php';