<div>
    <div class="flex flex-wrap " x-data="handler()">
    {{-- <div class="flex flex-wrap " x-data="{@entangle('nomor_ktp')}"> --}}
        <div class="relative flex-1 flex-grow max-w-full px-4">
            <table class="items-center w-full max-w-full p-1 mb-4 bg-transparent table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Text Feild 1</th>
                        <th>Text Feild 2</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(field, index) in fields" :key="index">
                        {{-- @while (true)
                            <p>I'm looping forever.</p>
                        @endwhile --}}
                        <tr>
                            <td x-text="index + 1"></td>
                            <td>
                                <input @entangle('nomor_ktp') x-model="field.txt1" type="text" name="txt1[]" class="block w-full px-2 py-1 mb-1 text-base leading-normal text-gray-800 bg-white border border-gray-200 rounded appearance-none">
                            </td>
                            <td>
                                <input @entangle('nomor_hp') x-model="field.txt2" type="text" name="txt2[]" class="block w-full px-2 py-1 mb-1 text-base leading-normal text-gray-800 bg-white border border-gray-200 rounded appearance-none">
                            </td>
                            <td>
                                <button type="button" class="inline-block px-3 py-1 font-normal leading-normal text-center text-white no-underline whitespace-no-wrap align-middle bg-red-600 border rounded select-none hover:bg-red-700 btn-small" @click="removeField(index)">
                                    &times;
                                </button>
                            </td>
                        </tr>
                    </template>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right">
                            <button type="button" class="inline-block px-3 py-1 font-normal leading-normal text-center text-white no-underline whitespace-no-wrap align-middle bg-teal-500 border rounded select-none hover:bg-teal-600" @click="addNewField()">
                                + Add Row
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @push('scripts')
    <script>
        function handler() {
            return {
                fields: [
                    {
                        txt1: '',
                        txt2: ''
                    },
                ],
                    addNewField() {
                        this.fields.push({
                            txt1: '',
                            txt2: ''
                        });
                    },
                    removeField(index) {
                    this.fields.splice(index, 1);
                }
            }
        }
    </script>
    @endpush
</div>
