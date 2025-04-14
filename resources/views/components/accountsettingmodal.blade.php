<!-- Account Settings Modal -->
<div id="accountSettingsModal" class="fixed inset-0 z-[100] bg-gray-900 bg-opacity-50 flex items-center justify-center hidden p-4 sm:p-6">
    <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4 border-b pb-2">Account Settings</h2>
        
        <!-- FORM dengan action yang benar -->
        <form id="accountSettingsForm" action="{{ route('account.update') }}" method="POST">
            @csrf
            @method('POST') <!-- Gunakan method POST jika tidak pakai route PUT -->

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" id="userName" name="name" required 
                    class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:text-white"
                    value="{{ old('name', auth()->user()->name) }}">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
                <input type="password" id="newPassword" name="password" placeholder="Masukkan Password Baru"
                    class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:text-white">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Konfirmasi Password Baru"
                    class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:text-white">
            </div>

            <div class="flex justify-end space-x-2">
                <button 
    type="button" 
    id="closeModalButton" 
    class="border border-gray-500 bg-gray-100 text-gray-500 px-4 py-2 rounded-lg shadow hover:bg-gray-500 hover:text-white">
    Cancel
</button>

<button 
    type="submit" 
    class="border border-blue-500 bg-blue-100 text-blue-500 px-4 py-2 rounded-lg shadow hover:bg-blue-500 hover:text-white">
    Save
</button>

            </div>
        </form>
    </div>
</div>
