<!-- Modal untuk Account Settings -->
<div id="accountSettingsModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Account Settings</h2>
        <form id="accountSettingsForm">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" id="userName" class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:text-white" value="{{ auth()->user()->name }}">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
                <input type="password" id="newPassword" class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:text-white">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                <input type="password" id="confirmPassword" class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-600 dark:text-white">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" id="closeModalButton" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>