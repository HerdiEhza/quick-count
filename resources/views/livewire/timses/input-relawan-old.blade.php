<div x-data="{
    newTodo: '',
    relawans: JSON.parse(localStorage.getItem('relawans') || '[]')
}" x-init="$watch('relawans', (val) => localStorage.setItem('relawans', JSON.stringify(val)))">

    {{-- <div class="mt-96">
        <div>
            <code>localStorage.getItem('relawans')</code>:
            <code x-text="localStorage.getItem('relawans')"></code>
        </div>
        <div>
            <button @click="relawans = []; localStorage.removeItem('relawans');">
                Clear
            </button>
        </div>

        <form @submit.stop.prevent="
            relawans = [].concat({ id: badId(), text: newTodo }, relawans);
            newTodo = '';
        ">
            <input x-model="newTodo" />
            <button>Add</button>
        </form>

        <ul>Relawans:
            <template x-for="todo in relawans" :key="todo.id">
                <li>
                    <span x-text="todo.text"></span>
                    <button @click="relawans = relawans.filter(t => t.id !== todo.id)">x</button>
                </li>
            </template>
        </ul>
    </div> --}}

    @push('scripts')
    <script>
        function badId() {
          return (Math.random() * 100).toFixed(0);
        }
    </script>
    @endpush


    <div
        class="fixed bottom-0 left-0 z-50 w-full h-auto bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600">
        <form class="p-4" 
            @submit.stop.prevent="
            relawans = [].concat({ id: badId(), text: newTodo }, relawans);
            newTodo = '';"
        >
            <div class="mb-6 space-y-3">
                {{-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label> --}}
                <select wire:model="tps_id.0" wire:key="tps_id.0"
                    class="flex w-full rounded-md border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="">Harap Pilih TPS</option>
                    <option value="1">TPS 001</option>
                    <option value="2">TPS 002</option>
                    <option value="3">TPS 003</option>
                    <option value="4">TPS 004</option>
                    <option value="5">TPS 005</option>
                    <option value="6">TPS 006</option>
                    <option value="7">TPS 007</option>
                </select>
                <input type="text" id="text"
                    x-model="newTodo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama">
                <input type="telp" id="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nomor HP">
            </div>
            <div class="space-y-2">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>

    <div class="flex flex-col items-center max-w-lg mx-auto mb-96">
        <ul>
            <template x-for="todo in relawans" :key="todo.id">
                <li class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h5 x-text="todo.text" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"></h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"></p>
                    <button @click="relawans = relawans.filter(t => t.id !== todo.id)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Remove
                        {{-- <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg> --}}
                    </button>
                </li>
            </template>
        </ul>

    </div>

</div>

