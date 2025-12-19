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
          <?php if (isset($_SESSION['success_message'])): ?>
                <div id="flash-message" class="fixed top-5 right-5 bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-xl z-50 flex items-center justify-between min-w-[300px] transition-opacity duration-500">
                    <span><?= htmlspecialchars($_SESSION['success_message']); ?></span>
                    
                    <button onclick="closeFlash()" class="ml-4 text-green-900 hover:text-green-500 font-bold text-xl">
                        &times;
                    </button>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

        <?php include  $view; ?>
    </main>

    <?php require_once 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
     <script>
        // Function to close the message
        function closeFlash() {
            const el = document.getElementById('flash-message');
            el.style.opacity = '0'; 
            setTimeout(() => el.remove(), 500); 
        }
        setTimeout(closeFlash, 5000);
    </script>
</body>
</html>