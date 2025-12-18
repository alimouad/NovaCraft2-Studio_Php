<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? "NovaCraft Studio - Accueil" ?></title>
</head>
<body>

    <?php require_once 'header.php'; ?>

    <main class="min-h-screen bg-purple-300">
        <?php include  $view; ?>
    </main>

    <?php require_once 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
</html>