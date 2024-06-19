<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Boshqaruv paneli') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('kelgan-arizalar')" :active="request()->routeIs('kelgan-arizalar')">
                        {{ __("Barcha arizalar ro'yxati") }}
                    </x-nav-link>
                </div>              
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">                  
                    <button id="openModal"  class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ariza qidirish
                    </button>
                </div>
                @if( Auth::id() == '1')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('adminlar')" :active="request()->routeIs('adminlar')">
                        {{ __("Adminlar ro'yxati") }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{-- <x-nav-link :href="route('admin-register')" :active="request()->routeIs('admin-register')">
                        {{ __("Admin qo'shish") }}
                    </x-nav-link> --}}
                    <button id="adminButton" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded">Admin Qo'shish</button>
                </div>
                @endif
            </div>



            <div id="adminModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-gray-500 bg-opacity-75">
                <div class="bg-white rounded-lg p-8 w-[400px]">                   
                    @include('auth.register')
                    <button id="closeButton" type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4">
                        Yopish
                    </button>

                </div>
            </div>
            
            <script>
                // Modalı açmak için düğmeye tıklama olayı
                var adminButton = document.getElementById("adminButton");
                var adminModal = document.getElementById("adminModal");
                var closeButton = document.getElementById("closeButton");

                adminButton.addEventListener("click", function() {
                adminModal.classList.remove("hidden");
                });

                // Modalı kapatmak için kapatma düğmesine tıklama olayı
                closeButton.addEventListener("click", function() {
                adminModal.classList.add("hidden");
                });

                // Modalı kapatmak için modal dışına tıklama olayı
                window.addEventListener("click", function(event) {
                if (event.target === adminModal) {
                    adminModal.classList.add("hidden");
                }
                });
            </script>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Chiqish') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Boshqaruv paneli') }}
            </x-responsive-nav-link>
        </div>
        

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Chiqish') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<div id="modal1" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-gray-500 bg-opacity-75">
    <div class="bg-white rounded-lg p-8 w-[400px]">
        <div class="w-full text-white bg-sky-500 mb-6">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-20 h-20 fill-current">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                        </path>
                    </svg>        
                    <p class="mx-3 text-sm">Quyidagi maydonlardan biriga ariza ma'lumotini yozing va qidirish tugmasini bosing. (Barcha maydonlarni to'ldirish shart emas!)</p>
                </div>       
               
            </div>
        </div>
        <form action="{{ route('arizalarni-qidirish')}}" method="POST" class="flex flex-col">
            @csrf
            @method('POST')
            <h2 class="text-xl font-bold mb-4">Ariza qidirish</h2>
            <input type="text" name="fish" placeholder="F.I.Sh" class="mb-4">
            <input type="text" name="pass_info" placeholder="Passport ma'lumotlari" class="mb-4">
            <input type="text" name="telefon" placeholder="Telefon raqam" class="mb-4">
            <input type="text" name="number_generation" placeholder="ID raqam" class="mb-4">
            <div class="flex justify-between">
                <button id="closeBtn1" type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4">
                    Yopish
                </button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Qidirish
                </button>
                
            </div>
           
        </form>
    </div>
</div>

<script>
    document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('modal1').classList.remove('hidden');
    });

    document.getElementById('closeBtn1').addEventListener('click', function() {
    document.getElementById('modal1').classList.add('hidden');
    });
</script>