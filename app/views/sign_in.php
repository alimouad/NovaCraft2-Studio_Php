

<div class="w-full max-w-sm">
    <div class="bg-white shadow-xl rounded-xl p-8 sm:p-10 border border-gray-100">
        <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-8">Welcome Back</h2>
        
        <?php if (isset($errors["loginError"])): ?>
            <div class="mb-4 p-3 rounded bg-red-50 text-red-700 text-sm border border-red-200">
                <?= $errors["loginError"]; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" novalidate>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" 
                    value="<?= htmlspecialchars($_POST["email"] ?? '') ?>"
                    placeholder="you@example.com" 
                    class="w-full px-4 py-2 border <?= isset($errors['EmailErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 transition">
                
                <?php if (isset($errors["EmailErr"])): ?>
                    <span class="text-red-600 text-xs mt-1"><?= $errors["EmailErr"]; ?></span>
                <?php endif; ?>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" 
                    class="w-full px-4 py-2 border <?= isset($errors['PassWordErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 transition">
                
                <?php if (isset($errors["PassWordErr"])): ?>
                    <span class="text-red-600 text-xs mt-1"><?= $errors["PassWordErr"]; ?></span>
                <?php endif; ?>
            </div>

            <button type="submit"
                class="w-full flex justify-center cursor-pointer py-2.5 px-4 rounded-lg shadow-md text-base font-semibold text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-200">
                Sign In
            </button>
        </form>

        <div class="mt-8 text-center border-t pt-6">
            <p class="text-sm text-gray-600">
                Don't have an account yet?
                <a href="/register" class="font-semibold text-purple-600 hover:text-purple-500">Sign Up</a>
            </p>
        </div>
    </div>
</div>
