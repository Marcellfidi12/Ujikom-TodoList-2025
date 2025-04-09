<div id="task-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden p-4 sm:p-6">
    <div class="bg-white rounded-lg p-6 w-96">
      <h3 class="text-lg font-bold mb-4">Tambah Tugas Baru</h3>
      <form id="add-task-form" method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-4">
          <label for="task-name-input" class="text-sm font-semibold block">Nama Tugas</label>
          <input
            id="task-name-input"
            name="name"
            type="text"
            class="border border-gray-300 rounded-lg w-full p-2 text-sm"
            required
          />
        </div>
        <div class="mb-4">
          <label for="task-priority-input" class="text-sm font-semibold block">Prioritas</label>
          <select
              id="task-priority-input"
              name="priority"
              class="border border-gray-300 rounded-lg w-full p-2 text-sm"
              required
          >
              <option value="high">High</option>
              <option value="medium">Medium</option>
              <option value="normal">Normal</option>
          </select>
        </div>      
        <div class="mb-4">
          <label for="task-deadline-input" class="text-sm font-semibold block">Deadline</label>
          <input
            id="task-deadline-input"
            name="deadline"
            type="date"
            class="border border-gray-300 rounded-lg w-full p-2 text-sm"
            min="{{ date('Y-m-d') }}"
            required
          />
        </div>
        <div class="flex justify-end space-x-4">
          <button
              type="button"
              onclick="closeTaskModal()"
              class="border border-gray-500 bg-gray-100 text-gray-500 px-4 py-2 rounded-lg shadow hover:bg-gray-500 hover:text-white"
          >
              Batal
          </button>

          <button
              type="submit"
              class="border border-blue-500 bg-blue-100 text-blue-500 px-4 py-2 rounded-lg shadow hover:bg-blue-500 hover:text-white"
          >
              Simpan
          </button>

        </div>
      </form>
    </div>
</div>