<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Boshqaruv paneli') }}
        </h2>
    </x-slot>
{{--
    <div id="toast-top-right" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow top-5 right-5   space-x " role="alert">
        <div class="text-sm font-normal">Top right positioning.</div>
    </div> --}}

    @if(session('toast'))
    <div id="toast-top-right" class="fixed flex items-center w-full max-w-xs p-1 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow top-5 right-5   space-x " role="alert">
        <div class="flex items-center p-4 mb-1 text-md text-blue-800 border border-blue-300 rounded-lg bg-blue-50   " role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Yaratildi</span>
            <div>
              <span class="font-medium">Bildirish xati!</span> {{session('toast')}}
            </div>
          </div>
    </div>
    <script>
        // Otomatik olarak Toast mesajının kaybolmasını sağlama
        setTimeout(function() {
            var toastElement = document.getElementById('toast-top-right');
            if (toastElement) {
                toastElement.remove();
            }
        }, 10000); // 10 saniye (10000 milisaniye) sonra kaybolacak
    </script>
    @endif

    <div class="py-12">
        <div class="max-w-[1568px] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900 ">

                <h3 class="mb-5 text-lg font-medium text-gray-900 ">Kelib tushgan arizalar bo'yicha ma'lumotlar</h3>

                    <div id="alert-additional-content-1" class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50   " role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">Eslatma!</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Talabalar tomonidan kelib tushgan arizlarni ko'rib chiqqanda kerakli tartibda rad etish yoki maqullash talab etiladi va bu haqda arizaga izoh yozib o'tish lozim.
                        </div>

                    </div>
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <a href="{{ route('kelgan-arizalar')}}">
                                <label for="hosting-small" class="inline-flex items-center justify-between w-full p-5 text-blue-500 bg-blue border border-blue-200 rounded-lg cursor-pointer    peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-blue-600 hover:bg-blue-100   ">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Umumiy {{ $arizalar_count}} ta ariza kelib tushgan</div>
                                        <div class="w-full">Umumiy kelib tushgan arizalar ro'yxati</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('maqullangan-arizalar')}}">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-green-500 bg-green border border-green-200 rounded-lg cursor-pointer    peer-checked:border-green-600 peer-checked:text-green-600 hover:text-green-600 hover:bg-green-100   ">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">{{ $arizalar_maqullangan }} ta ariza maqullangan</div>
                                        <div class="w-full">Maqullangan arizalar ro'yxati</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('rad-etilgan-arizalar')}}">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-red-500 bg-red border border-red-200 rounded-lg cursor-pointer    peer-checked:border-red-600 peer-checked:text-red-600 hover:text-red-600 hover:bg-red-100   ">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">{{ $arizalar_rad_etildi }} ta ariza rad etilgan</div>
                                        <div class="w-full">Rad etilgan arizalar ro'yxati</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('korilmagan-arizalar')}}">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-indigo-500 bg-red border border-indigo-200 rounded-lg cursor-pointer    peer-checked:border-indigo-600 peer-checked:text-indigo-600 hover:text-indigo-600 hover:bg-indigo-100   ">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">{{ $arizalar_korilmagan }} ta arizaga javob berilmagan</div>
                                        <div class="w-full">Hali ko'rilmagan yoki ko'rib chiqilayogan arizalar ro'yxati</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>
                    </ul>



                </div>
            </div>
        </div>

        <div class="pt-6 pb-12">
            <div class="max-w-[1568px] mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" p-6 text-gray-900 ">
                        <!-- list -->
                        <section class="container px-4 mx-auto">
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-800 ">Javob berilmagan arizalar soni</h2>

                                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full  ">{{ count($arizalar)}} ta</span>
                            </div>

                            @if(session('name'))
                                <div class="bg-green-500 mt-4 text-white font-bold px-4 py-2 rounded-md">
                                    <p>{{ session('name') }}ning arizasi o'zgartirildi!</p>
                                </div>
                            @endif

                            @if (session()->has('status'))
                                <div id="alert-border-3" class="flex items-center p-4 mt-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50   " role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium">
                                        {{ session()->get('status') }}
                                    </div>

                                </div>
                            @endif

                            <div class="flex flex-col mt-6">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div class="overflow-hidden border border-gray-200  md:rounded-lg">

                                            <table class="min-w-full divide-y divide-gray-200 ">
                                                <thead class="bg-gray-50 ">
                                                    <tr>
                                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                            <div class="flex items-center gap-x-3">

                                                                <span>F.I.SH</span>
                                                            </div>
                                                        </th>

                                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                            <button class="flex items-center gap-x-2">
                                                                <span>Ariza holati</span>
                                                            </button>
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                            <button class="flex items-center gap-x-2">
                                                                <span>Passport seryasi</span>

                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                </svg>
                                                            </button>
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">Kafedra nomi</th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">Ariza yuborgan vaqti</th>

                                                        <th scope="col" class="relative py-3.5 px-4">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200  ">
                                                @if ($arizalar)

                                                    @foreach ($arizalar as $ariza)
                                                    <tr>
                                                        {{-- {{dd($arizalar)}} --}}
                                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                            <div class="inline-flex items-center gap-x-3">
                                                                {{-- <input type="checkbox" class="text-blue-500 border-gray-300 rounded   "> --}}

                                                                <div class="flex items-center gap-x-2">
                                                                    <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('assets/avatar.png')}}" alt="">
                                                                    <div>
                                                                        <h2 class="font-medium text-gray-800  ">{{ $ariza->fish }}</h2>
                                                                        <p class="text-sm font-normal text-gray-600 ">+{{ $ariza->telefon }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                            @if ($ariza->holat == 'korib_chiqilmoqda')
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-indigo-100/60 ">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
                                                                <h2 class="text-sm font-normal text-indigo-500">Ariza ko'rilmagan!</h2>
                                                            </div>
                                                            @elseif ($ariza->holat == "rad_etildi")
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-red-100/60 ">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                                <h2 class="text-sm font-normal text-red-500">Ariza rad etilgan!</h2>
                                                            </div>
                                                            @elseif ($ariza->holat == "maqullandi")
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 ">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                                <h2 class="text-sm font-normal text-emerald-500">Ariza maqullangan!</h2>
                                                            </div>
                                                            @endif

                                                        </td>
                                                        <td class="px-4 py-4 text-sm text-gray-500  whitespace-nowrap">{{ $ariza->pass_info }}</td>
                                                        <td class="px-4 py-4 text-sm text-gray-500  whitespace-nowrap">{{ $ariza->yonalish }}</td>
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <div class="flex items-center gap-x-2">
                                                                <p class="px-3 py-1 text-xs text-indigo-500 rounded-full  bg-indigo-100/60">{{ $ariza->created_at->diffForHumans() }}</p>

                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <div class="flex items-center gap-x-6">
                                                                <form action="{{ route('kelgan-arizalarni-ochirish', $ariza->id) }}" method="POST"
                                                                    style="display: inline-block;">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <button  onclick="event.preventDefault(); openModal()" type="button" class="text-gray-500 transition-colors duration-200   hover:text-red-500 focus:outline-none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                        </svg>
                                                                    </button>

                                                                    <div id="modal" class="fixed inset-0 flex items-center justify-center  hidden">
                                                                        <!-- Modal backdrop -->
                                                                        <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                                                                        <!-- Modal content -->
                                                                        <div class="bg-white p-6 rounded shadow-lg z-0">
                                                                            <p class=" text-xl text-center">Arizani o'chirishni <br> istaysizmi?</p>
                                                                            <div class="flex justify-end mt-4">
                                                                                <button type="submit" class="px-4 py-2 text-white bg-red-700 rounded" >O'chirish</button>
                                                                                <button type="button" class="px-4 py-2 text-gray-500 rounded ml-4" onclick="closeModal()">Yopish</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <script>
                                                                        function openModal() {
                                                                            document.getElementById('modal').classList.remove('hidden');
                                                                        }

                                                                        function closeModal() {
                                                                            document.getElementById('modal').classList.add('hidden');
                                                                        }
                                                                    </script>
                                                                </form>

                                                                <a href="{{ route('arizani-korish',$ariza->id) }}" class="text-gray-500 transition-colors duration-200   hover:text-yellow-500 focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <h1 class="text-center text-xl p-6 text-gray-700">Bu yerda hali ma'lumot yo'q!</h1>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" items-center justify-between mt-6">
                                {{ $arizalar->links()}}
                            </div>
                        </section>
                        <!-- /list -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
