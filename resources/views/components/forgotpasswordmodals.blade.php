<!-- Modal Forgot Password -->
<div id="forgotPasswordModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden p-4 sm:p-6">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
        <h2 class="text-xl font-bold mb-4">Forgot Password</h2>
        <p class="text-sm text-gray-600 mb-4">Enter your email to reset your password.</p>
        
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="email" name="email" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Enter your email">
            </div>
            <div class="flex justify-between">
                <button type="button" onclick="closeModal()" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-200">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-500">
                    Send Reset Link
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript untuk Modal -->
<script>
    function openModal() {
        document.getElementById('forgotPasswordModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('forgotPasswordModal').classList.add('hidden');
    }
</script>