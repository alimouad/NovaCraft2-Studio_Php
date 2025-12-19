

   <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Your Account</h2>
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?= $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
                </div>
            <?php endif; ?>
          <form action="" method="POST" novalidate>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                        class="w-full px-4 py-2 border <?= isset($errors['NameErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg">
                    <?php if (isset($errors["NameErr"])): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $errors["NameErr"] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        class="w-full px-4 py-2 border <?= isset($errors['EmailErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg">
                    <?php if (isset($errors["EmailErr"])): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $errors["EmailErr"] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" 
                        class="w-full px-4 py-2 border <?= isset($errors['PassWordErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg">
                    <?php if (isset($errors["PassWordErr"])): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $errors["PassWordErr"] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <button type="submit" class="w-full cursor-pointer bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700">
                    Register
                </button>
                </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="/login" class="text-indigo-600 hover:text-indigo-500 font-medium">Log in here</a>
                </p>
            </div>
        </div>
    </div>