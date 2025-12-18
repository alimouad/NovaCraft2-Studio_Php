
<header class="bg-white shadow-xl">
  <nav class="container mx-auto flex justify-between items-center py-4">
    <h1 class="text-2xl font-bold text-purple-600">DigitalWave</h1>
    <!-- get the url path ------  -->
    <?php $current = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
    <ul class="flex space-x-6">
        <li>
            <a href="/" class="<?= $current === '/' ? 'text-purple-600 font-medium' : 'hover:text-blue-600' ?>">Home</a>
        </li>

        <li>
            <a href="/services" class="<?= $current === '/services' ? 'text-purple-600 font-medium' : 'hover:text-blue-600' ?>">Services</a>
        </li>

        <li>
            <a href="/about" class="<?= $current === '/about' ? 'text-purple-600 font-medium' : 'hover:text-blue-600' ?>">About</a>
        </li>

        <li>
            <a href="/contact" class="<?= $current === '/contact' ? 'text-purple-600 font-medium' : 'hover:text-blue-600' ?>">Contact</a>
        </li>
    </ul>

  <?php if (Auth::isLoggedIn()): ?>
       <div class="flex items-center gap-6">
            <a href="/account" class="w-10 h-10 bg-purple-100 text-purple-600 cursor-pointer rounded-full flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </a>
        
        <span class="text-gray-700">
            Hello, <span class="font-semibold text-purple-600"><?= htmlspecialchars($_SESSION["name"] ?? 'User') ?></span>
        </span>

        <a href="/logout" class="text-red-500 hover:text-red-700 font-medium transition">Log out</a>
</div>
    <?php else: ?>
        <div class="flex gap-4">
            <a href="/login" class="py-2 px-6 rounded-lg shadow-md text-base font-semibold text-white bg-purple-600 hover:bg-purple-700 transition duration-200">
                Sign In
            </a>
            <a href="/register" class="py-2 px-6 rounded-lg border-2 border-purple-600 text-base font-semibold text-purple-600 hover:bg-purple-50 transition duration-200">
                Sign Up
            </a>
        </div>
    <?php endif; ?>
    

  </nav>
</header>