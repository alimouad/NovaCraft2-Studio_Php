<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "NovaCraft Studio - Accueil" ?></title>
</head>
<body>
    <main class="bg-gray-100 flex items-center justify-center min-h-screen">
        <!-- get the absolute path ------- -->
        <?php include $view; ?>
    </main>
   <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
</html>