

<div class="min-h-screen bg-purple-300 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">My Account</h2>
            <p class="mt-2 text-sm text-gray-600">Manage Your Account</p>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg border border-gray-200">
            <div class="px-4 py-5 sm:px-6 bg-purple-50">
                <h3 class="text-lg leading-6 font-medium text-purple-800">Personnal Information</h3>
            </div>
            
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-b border-gray-100">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 flex items-center">
                            <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded-md mr-2">
                                <i class="fas fa-user text-xs"></i>
                            </span>
                            <?= htmlspecialchars($user["name"] ?? 'Non renseigné') ?>
                        </dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-b border-gray-100">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <?= htmlspecialchars($user["email"] ?? 'Non renseigné') ?>
                        </dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Account Status</dt>
                        <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="mt-8 flex justify-end space-x-4">
            <a href="/" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition">
                Retour
            </a>
        </div>
    </div>
</div>