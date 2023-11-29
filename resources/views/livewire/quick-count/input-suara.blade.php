<div>
    <div class="antialiased bg-gray-200 sans-serif">
        <div {{-- x-data="app()" --}} x-data="{
            step: $persist(1),

            {{-- kategoriPemilu: $persist(''), --}}
            {{-- dapilActive: $persist(''), --}}
            {{-- kabKotaActive: $persist(@entangle('kabKotaActive')), // passing livewire variable to localstorage --}}
            suaraPartai: $persist(''),
            suaraBacaleg: $persist(''),
            {{-- todos: $persist(JSON.parse('po' || '[]')) --}}
            todos: JSON.parse(localStorage.getItem('todos') || '[]'),
            {{-- hasDelete: false, --}}
            image: 'data:image/jpeg;base64+ABEIAdoB2gMBIgACEQEDEQHZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8T19vf4+fr5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/+JQA7c3rSbm9aSigBdzetG4+tJRQAZPrRuPrSUUALub1/+++/wAmk/pSFAC0VTlv4EyEBc+3C/nVSS9uX6MEHonX8zQBrEqvLEAe5AnUTXVqvWVfwyf5VjFmY5Ykn3JP86SmBrGtB3cRTTf7QtvST8hWXRQBqi/te+8f8AAc09by0b/loB/vAiseigDeV43+66t9CDTq5p04+lTJdXMfSQkej+lAB1pKKP60AFFFFACUHjNHePLlI8rH0Jib60AWp72KLKph3wH5eUP3lPQSgDaoqOKaOZdyHeB6qfepKQBRRRQAlFFFABSUUUAFFFFABRRSf5NABxR6e1FJQAcUUUnP6UALSf5+FAB06d6KT6UGgA96kyf8moHr7mgBLi5edu4QH5V/++kAUhoooAKKKKACij/JpKACj++XGT5CHgf6w++9DE33k5X/AHf/+lFFITntQAelHAoz0oz+wqLPt8AWqTj1P5GgCZuppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArJvpd8uwH5Y++++NFFJQAc0f5+tHFJQAUUUepoAP/+lSZPotR55qTJyKAJm6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAKWoPiNE/+Z5qpTAKKKKACiiigAooooAKKKKACiiigAooooAKKKSgAooooAKKKSgBaSiigAooooAKKKSgC3YPtmKdpFI+Wa3PSgAoozzSflSAWkNBo/nQAlH9aPr60envQAf5NJS0noaADNFH+fYUH/61ACUetFJnGaADgAK6ONJ6fhRz0PrQAHCpefVfzqI46ZNS8UATN1NJSt1NJQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAYt0d1xOf9rAAYqGnzHMsx+lYVbUBcwHuY1JoAkz+dGTR2pP5UgAn+lFFHNABSfjzS0nFABn2+lFFIfQj6UAB6c0elH+eKT/JoAPUwD6qOaPUe1HpQAho++lJ8AqoAOPXrT8H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',
        }" x-init="$watch(
            'todos', (val) => localStorage.setItem('todos', JSON.stringify(val)),
        )" x-cloak>
            {{-- <form wire:submit="store"> --}}
            <main>
                <div class="px-4 py-10 mx-auto">

                    <div x-show.transition="step === 'complete'">
                        <div class="flex items-center justify-between p-10 bg-white rounded-lg shadow">
                            <div>
                                <svg class="w-20 h-20 mx-auto mb-4 text-green-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>

                                <h2 class="mb-4 text-2xl font-bold text-center text-gray-800">Registration Success</h2>

                                <div class="mb-8 text-gray-600">
                                    Thank you. We have sent you an email to demo@demo.test. Please click the link in the
                                    message to activate your account.
                                </div>

                                <button @click="step = 1"
                                    class="block w-40 px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">Back
                                    to home</button>
                            </div>
                        </div>
                    </div>

                    <div x-show.transition="step != 'complete'">
                        <!-- Top Navigation -->
                        <div class="py-4 border-b-2">
                            <div class="mb-1 text-xs font-bold leading-tight tracking-wide text-gray-500 uppercase"
                                x-text="`Step: ${step} of 5`"></div>
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                <div class="flex-1">
                                    <div x-show="step === 1">
                                        <div class="text-lg font-bold leading-tight text-gray-700">Your Profile</div>
                                    </div>
                                    <div x-show="step === 2">
                                        <div class="text-lg font-bold leading-tight text-gray-700">Your Password</div>
                                    </div>
                                    <div x-show="step === 3">
                                        <div class="text-lg font-bold leading-tight text-gray-700">Tell me about
                                            yourself
                                        </div>
                                    </div>
                                    <div x-show="step === 4">
                                        <div class="text-lg font-bold leading-tight text-gray-700">Tell me about
                                            yourself
                                        </div>
                                    </div>
                                    <div x-show="step === 5">
                                        <div class="text-lg font-bold leading-tight text-gray-700">Tell me about
                                            yourself
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center md:w-64">
                                    <div class="w-full mr-2 bg-white rounded-full">
                                        <div class="h-2 text-xs leading-none text-center text-white bg-green-500 rounded-full"
                                            :style="'width: '+ parseInt(step / 5 * 100) +'%'"></div>
                                    </div>
                                    <div class="w-10 text-xs text-gray-600" x-text="parseInt(step / 5 * 100) +'%'">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Top Navigation -->

                        <!-- Step Content -->
                        <div class="py-10">
                            <div x-show.transition.in="step === 1">
                                @include('livewire.quick-count.steps.step-1')
                            </div>
                            <div x-show.transition.in="step === 2">
                                @include('livewire.quick-count.steps.step-2')
                            </div>
                            <div x-show.transition.in="step === 3">
                                @include('livewire.quick-count.steps.step-3')
                            </div>
                            <div x-show.transition.in="step === 4">
                                @include('livewire.quick-count.steps.step-4')
                            </div>
                            <div x-show.transition.in="step === 5">
                                @include('livewire.quick-count.steps.step-5')
                            </div>
                        </div>
                        <!-- / Step Content -->
                    </div>
                </div>

                <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md" x-show="step != 'complete'">
                    <div class="max-w-3xl px-4 mx-auto">
                        <div class="flex justify-between">
                            <div class="w-1/2">
                                <button x-show="step > 1" @click="step--"
                                    class="w-32 px-5 py-2 font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">Kembali</button>
                            </div>

                            <div class="w-1/2 text-right">
                                <template x-if="step === 1">
                                    <button x-show="step <= 4" @click="step++"
                                        class="w-32 px-5 py-2 font-medium text-center text-white bg-blue-500 border border-transparent rounded-lg shadow-sm disabled:border-gray-200 disabled:bg-white disabled:text-gray-600 disabled:cursor-not-allowed focus:outline-none hover:bg-blue-600"
                                        {{-- @disabled(empty($kabKotaActive) || empty($kecamatanActive) || empty($kelDesaActive) --}}
                                        @disabled(empty($kelDesaActive) || empty($tpsActive))
                                        {{-- {{ empty($kabKotaActive) || empty($kecamatanActive) || empty($kelDesaActive) ||empty($tpsActive) ? 'disabled' : '' }}
                                        --}}>
                                        Lanjut
                                    </button>
                                </template>
                                <template x-if="step === 2">
                                    <button x-show="step <= 4" @click="step++"
                                        class="w-32 px-5 py-2 font-medium text-center text-white bg-blue-500 border border-transparent rounded-lg shadow-sm disabled:border-gray-200 disabled:bg-white disabled:text-gray-600 disabled:cursor-not-allowed focus:outline-none hover:bg-blue-600">
                                        Lanjut
                                    </button>
                                </template>
                                <template x-if="step === 3">
                                    <button x-show="step <= 4" @click="step++"
                                        class="w-32 px-5 py-2 font-medium text-center text-white bg-blue-500 border border-transparent rounded-lg shadow-sm disabled:border-gray-200 disabled:bg-white disabled:text-gray-600 disabled:cursor-not-allowed focus:outline-none hover:bg-blue-600"
                                        @disabled(empty($kelDesaActive) || empty($tpsActive) ||
                                        empty($kategoriPemiluActive) || empty($dapilActive))>
                                        Lanjut
                                    </button>
                                </template>
                                <template x-if="step === 4">
                                    <button x-show="step <= 4" @click="step++"
                                        class="w-32 px-5 py-2 font-medium text-center text-white bg-blue-500 border border-transparent rounded-lg shadow-sm disabled:border-gray-200 disabled:bg-white disabled:text-gray-600 disabled:cursor-not-allowed focus:outline-none hover:bg-blue-600" {{-- @disabled(empty($kelDesaActive) || empty($tpsActive) || empty($kategoriPemiluActive)
                                        || empty($dapilActive)) --}}>
                                        Lanjut
                                    </button>
                                </template>

                                <button @click="step = 'complete'" x-show="step === 5" wire:click="store"
                                    class="w-32 px-5 py-2 font-medium text-center text-white bg-blue-500 border border-transparent rounded-lg shadow-sm focus:outline-none hover:bg-blue-600">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

{{-- @push('scripts')
            <script>
                document.addEventListener('livewire:init', () => {
                    // $wire.$get('kabKotaActive')
                    // $wire.$set('kabKotaActive', 999)
                    let $wire = {
                        // All component public properties are directly accessible on $wire...
                        // kabKotaActive: 999,
                        $set(name, value, live = true) {
                            'kabKotaActive',
                            999
                        },
                    }
                    Livewire.hook('component.init', ({ component, cleanup }) => {
                        let $wire = {
                            $set(name, value, live = true) {
                                'kabKotaActive',
                                999
                            },
                        }
                    })
                    Livewire.hook('element.init', ({ el, component }) => {
                        let $wire = {
                            $set(name, value, live = true) {
                                'kabKotaActive',
                                999
                            },
                        }
                    }) 
                })
            </script>
        @endpush --}}

{{-- @push('scripts')
        <script>
            function app() {
                return {
                    step: 1,
                    passwordStrengthText: '',
                    togglePassword: false,
                    firstName: $persist(''),
                    lastName: $persist(''),
                    hasDelete: false,
                    password: '',
                    gender: 'Male',

                    image: 'data:image/jpeg;base64+ABEIAdoB2gMBIgACEQEDEQHZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8T19vf4+fr5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/+JQA7c3rSbm9aSigBdzetG4+tJRQAZPrRuPrSUUALub1/+++/wAmk/pSFAC0VTlv4EyEBc+3C/nVSS9uX6MEHonX8zQBrEqvLEAe5AnUTXVqvWVfwyf5VjFmY5Ykn3JP86SmBrGtB3cRTTf7QtvST8hWXRQBqi/te+8f8AAc09by0b/loB/vAiseigDeV43+66t9CDTq5p04+lTJdXMfSQkej+lAB1pKKP60AFFFFACUHjNHePLlI8rH0Jib60AWp72KLKph3wH5eUP3lPQSgDaoqOKaOZdyHeB6qfepKQBRRRQAlFFFABSUUUAFFFFABRRSf5NABxR6e1FJQAcUUUnP6UALSf5+FAB06d6KT6UGgA96kyf8moHr7mgBLi5edu4QH5V/++kAUhoooAKKKKACij/JpKACj++XGT5CHgf6w++9DE33k5X/AHf/+lFFITntQAelHAoz0oz+wqLPt8AWqTj1P5GgCZuppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArJvpd8uwH5Y++++NFFJQAc0f5+tHFJQAUUUepoAP/+lSZPotR55qTJyKAJm6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAKWoPiNE/+Z5qpTAKKKKACiiigAooooAKKKKACiiigAooooAKKKSgAooooAKKKSgBaSiigAooooAKKKSgC3YPtmKdpFI+Wa3PSgAoozzSflSAWkNBo/nQAlH9aPr60envQAf5NJS0noaADNFH+fYUH/61ACUetFJnGaADgAK6ONJ6fhRz0PrQAHCpefVfzqI46ZNS8UATN1NJSt1NJQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAYt0d1xOf9rAAYqGnzHMsx+lYVbUBcwHuY1JoAkz+dGTR2pP5UgAn+lFFHNABSfjzS0nFABn2+lFFIfQj6UAB6c0elH+eKT/JoAPUwD6qOaPUe1HpQAho++lJ8AqoAOPXrT8H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',
                    

                    checkPasswordStrength() {
                        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                        var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

                        let value = this.password;

                        if (strongRegex.test(value)) {
                            this.passwordStrengthText = "Strong password";
                        } else if(mediumRegex.test(value)) {
                            this.passwordStrengthText = "Could be stronger";
                        } else {
                            this.passwordStrengthText = "Too weak";
                        }
                    }
                }
            }
        </script>
        @endpush --}}

{{-- <div x-data="{ firstName: $persist(''), lastName: $persist(''), hasDelete: false }"
        x-init="$watch('hasDelete', () => setTimeout(() => (hasDelete = false), 3000))"
        @persist:delete="hasDelete = true"
        class="space-y-2">
        <div class="flex items-center gap-2">
            <input type="text" x-model="firstName" placeholder="First name..." class="w-full" />

            <button @click="alert($persistGet('firstName'))" class="underline">
                Alert
            </button>

            <button @click="$persistDelete('firstName')" class="underline">
                Delete
            </button>
        </div>

        <div class="flex items-center gap-2">
            <input type="text" x-model="lastName" placeholder="Last name..." class="w-full" />
            <button @click="alert($persistGet('lastName'))" class="underline">
                Alert
            </button>

            <button @click="$persistDelete('lastName')" class="underline">
                Delete
            </button>
        </div>

        <div x-cloak x-show="hasDelete" role="alert" class="text-red-600">
            Deleted from storage!
        </div>
    </div> --}}