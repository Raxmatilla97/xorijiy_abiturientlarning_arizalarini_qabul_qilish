<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Boshqaruv paneli') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900 ">
                    <!-- show -->
                    <section class="container px-4 mx-auto">

                        <span
                            class="px-3 py-1 mb-4 text-xs flex justify-center text-blue-600 bg-blue-100 rounded-full  ">{{ $ariza->created_at->diffForHumans() }}
                            arizasini yuborgan | Aniq vaqti: {{ $ariza->created_at->format('Y-M-d H:i') }}</span>
                        <div class="flex items-center mt-4 gap-x-3">
                            <h2 class="text-lg font-medium text-gray-800 ">Ariza raqami:</h2>
                            <span
                                class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full  ">ID-{{ $ariza->id }}
                            </span>

                        </div>


                        <div class="sm:flex sm:items-center sm:justify-between">

                            <div class="flex items-center gap-x-3">
                                <h2 class="text-sm font-medium text-gray-800 ">Arizachiga generatsiya qilingan ID raqam:
                                </h2>

                                <span
                                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full  ">G-{{ $ariza->number_generation }}</span>
                            </div>


                            <div class="flex items-center mt-4 gap-x-3">

                                <a href="{{ route('pdf-yuklash', $ariza->id) }}">
                                    <button
                                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600  ">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3098_154395)">
                                                <path
                                                    d="M13.3333 13.3332L9.99997 9.9999M9.99997 9.9999L6.66663 13.3332M9.99997 9.9999V17.4999M16.9916 15.3249C17.8044 14.8818 18.4465 14.1806 18.8165 13.3321C19.1866 12.4835 19.2635 11.5359 19.0351 10.6388C18.8068 9.7417 18.2862 8.94616 17.5555 8.37778C16.8248 7.80939 15.9257 7.50052 15 7.4999H13.95C13.6977 6.52427 13.2276 5.61852 12.5749 4.85073C11.9222 4.08295 11.104 3.47311 10.1817 3.06708C9.25943 2.66104 8.25709 2.46937 7.25006 2.50647C6.24304 2.54358 5.25752 2.80849 4.36761 3.28129C3.47771 3.7541 2.70656 4.42249 2.11215 5.23622C1.51774 6.04996 1.11554 6.98785 0.935783 7.9794C0.756025 8.97095 0.803388 9.99035 1.07431 10.961C1.34523 11.9316 1.83267 12.8281 2.49997 13.5832"
                                                    stroke="currentColor" stroke-width="1.67" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3098_154395">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                        <span>Yuklab olish</span>
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="flex flex-col mt-6">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden border border-gray-200  md:rounded-lg">
                                        <form action="{{ route('kelgan-arizalarni-tahrirlash') }}" method="POST">
                                            @csrf
                                            @method('post')
                                            <input type="hidden" name="id" value="{{ $ariza->id }}">
                                            <table class="min-w-full divide-y divide-gray-200 ">
                                                <thead class="bg-gray-50 ">
                                                    <tr>
                                                        <th scope="col"
                                                            class="w-[300px] py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                            <div class="flex items-center gap-x-3">

                                                                <span>Savollar mazmuni:</span>
                                                            </div>
                                                        </th>

                                                        <th scope="col"
                                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                            Savollarga berilgan javoblar:

                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200  ">
                                                    <tr>
                                                        <td
                                                            class="border-r  px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap w-30">
                                                            <div class="inline-flex items-center gap-x-3">

                                                                <div class="flex items-center gap-x-2">
                                                                    <div
                                                                        class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="font-normal text-gray-800  ">
                                                                            Arizachining F.I.Sh:</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-12 py-4  text-gray-700 whitespace-nowrap font-normal text-lg">
                                                            <span class="font-semibold text-gray-900 font-medium text-lg">F.I.SH:</span>
                                                            <b class="font-normal text-lg">{{ $ariza->fish }}</b> <br>
                                                            <span class="font-semibold text-gray-900 mt-5">Jinsi:</span>
                                                            {{ $ariza->gender }} <br>
                                                            <span class="font-semibold text-gray-900 mt-5">Ma'lumoti:</span>
                                                            {{ $ariza->education_level }}<br>
                                                            <span class="font-semibold text-gray-900 mt-5">Tug'ulgan kun/oy/yil:</span>
                                                            {{ $ariza->brith_day }}.{{ $ariza->brith_moth }}.{{ $ariza->brith_year }} <br>
                                                            <span class="font-semibold text-gray-900 mt-5">Tug'ulgan joyi:</span>
                                                            {{ $ariza->passport_place_info }}<br>

                                                            <span class="font-semibold text-gray-900 mt-5">Telefon raqami:</span>
                                                            {{ $ariza->telefon }}<br>

                                                            <span class="font-semibold text-gray-900 mt-5">Yashash manzili:</span>
                                                            {{ $ariza->residence_to_passport }}<br>


                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td
                                                            class="border-r  px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap w-30">
                                                            <div class="inline-flex items-center gap-x-3">

                                                                <div class="flex items-center gap-x-2">
                                                                    <div
                                                                        class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="font-normal text-gray-800  ">Passport
                                                                            ma'lumotlari:</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-12 py-4 text-lg font-normal text-gray-700 whitespace-nowrap">
                                                            <span class="font-semibold text-gray-900">Seriya:</span>
                                                            {{ $ariza->passport_seriya }} -
                                                            <span class="font-semibold text-gray-900">Raqam:</span>
                                                            {{ $ariza->passport_number }} -
                                                            <span class="font-semibold text-gray-900">Qachon
                                                                berilgan:</span> {{ $ariza->passport_berilgan_sana }}
                                                            <hr class="my-4 border-gray-300">
                                                            <p class="text-lg text-gray-600">{{ $ariza->passport_kim_bergan }}</p>
                                                        </td>


                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="border-r px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap w-30">
                                                            <div class="inline-flex items-center gap-x-3">

                                                                <div class="flex items-center gap-x-2">
                                                                    <div
                                                                        class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="font-normal text-gray-800  ">Ta'im yo'nalishi ma'lumtolari</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-12 py-4 text-lg font-normal text-gray-700 whitespace-wrap">
                                                            <span class="font-semibold text-gray-900">Yo'nnalish shifri:</span>
                                                            {{ $ariza->ignition_code }} -
                                                            <span class="font-semibold text-gray-900">Yo'nalish nomi:</span>
                                                            {{ $ariza->ignition_name }}
                                                            <hr class="my-4 border-gray-300">

                                                            <span class="font-semibold text-gray-900">Ta'lim shakli:</span>
                                                            {{ $ariza->educational_form }}
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="border-r px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap w-30">
                                                            <div class="inline-flex items-center gap-x-3">

                                                                <div class="flex items-center gap-x-2">
                                                                    <div
                                                                        class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="font-normal text-gray-800  ">Otasi haqida ma'lumot:</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-12 py-4 font-medium font-normal text-gray-700 whitespace-wrap">
                                                            {{ $ariza->father_about }}
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="border-r px-4 py-4  font-medium text-gray-700 whitespace-nowrap w-30">
                                                            <div class="inline-flex items-center gap-x-3">

                                                                <div class="flex items-center gap-x-2">
                                                                    <div
                                                                        class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="font-normal text-gray-800  ">Onasi haqida ma'lumot:</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-wrap">
                                                            {{ $ariza->mather_about }}
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="border-r px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap w-30">
                                                            <div class="inline-flex items-center gap-x-3">

                                                                <div class="flex items-center gap-x-2">
                                                                    <div
                                                                        class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="font-normal text-gray-800  ">Sog'lig'i haqida ma'lumot:</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-12 py-4 font-medium font-normal text-gray-700 whitespace-wrap">
                                                            {{ $ariza->about_health }}
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="border-r  px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap w-30">
                                                            <div class="inline-flex items-center gap-x-3">

                                                                <div class="flex items-center gap-x-2">
                                                                    <div
                                                                        class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="font-normal text-gray-800  ">
                                                                            Asoslovchi hujjatlar:</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-12 py-4 flex justify-center text-sm font-normal text-gray-700 whitespace-nowrap">
                                                            {{-- <span class="text-[10px]">{{$ariza->document}}</span> --}}
                                                            <a href="{{ url('storage/uploads', $ariza->passport_file_upload) }}"
                                                                target="_blank" download>
                                                                <button type="button"
                                                                    class="inline-flex items-center px-3 py-1.5 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md mx-2">
                                                                    <span>Passport nusxasi</span>
                                                                </button>
                                                            </a>

                                                            <a href="{{ url('storage/uploads', $ariza->education_level_file) }}"
                                                                target="_blank" download>
                                                                <button type="button"
                                                                    class="inline-flex items-center px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-md mx-2">
                                                                    <span>Ma'lumotliligini tasdiqlovchi hujjat</span>
                                                                </button>
                                                            </a>
                                                        </td>

                                                    </tr>

                                                    <tr class="bg-blue-50">
                                                        <td
                                                            class="border-t border-r border-l border-blue-500 px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap w-30">
                                                            <div class="inline-flex items-center gap-x-3">

                                                                <div class="flex items-center gap-x-2">
                                                                    <div
                                                                        class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="font-normal text-gray-800  ">
                                                                            Arizaning holati:</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="border-t border-r border-blue-500 px-12 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">

                                                            <label for="large"
                                                                class="block mb-2 text-base font-medium text-gray-900 ">Arizani
                                                                maqullanganligi yoki rad etilganligini
                                                                belgilang.</label>
                                                            <select id="large" name="holat"
                                                                class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500      ">
                                                                <option selected>Tanlang</option>
                                                                <option
                                                                    value="korib_chiqilmoqda"{{ 'korib_chiqilmoqda' === old('holat') || $ariza->holat === 'korib_chiqilmoqda' ? 'selected' : '' }}>
                                                                    Ko'rib chiqilmoqda</option>
                                                                <option value="maqullandi"
                                                                    {{ 'maqullandi' === old('holat') || $ariza->holat === 'maqullandi' ? 'selected' : '' }}>
                                                                    Maqullandi!</option>
                                                                <option value="rad_etildi"
                                                                    {{ 'rad_etildi' === old('holat') || $ariza->holat === 'rad_etildi' ? 'selected' : '' }}>
                                                                    Rad etildi!</option>
                                                            </select>
                                                        </td>
                                                    </tr>


                                                    <tr class="bg-blue-50">
                                                        <td
                                                            class="border-r border-l border-t border-b border-blue-500 px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap w-30">
                                                            <div class="inline-flex items-center gap-x-3">

                                                                <div class="flex items-center gap-x-2">
                                                                    <div
                                                                        class="flex items-center justify-center w-8 h-8 text-blue-500 bg-blue-100 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor"
                                                                            class="w-5 h-5">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h2 class="font-normal text-gray-800">
                                                                            Arizachiga xabar qoldirish.</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="border-r border-b border-t border-blue-500 px-12 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                                            <label for="message"
                                                                class="block mb-2 text-sm font-medium text-gray-900 ">Sizning
                                                                arizachiga javobingiz:</label>
                                                            <textarea id="message" name="message" value="{{ old('message') }}" rows="8"
                                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                                placeholder="Assalomu alaykum, hurmatli.....">{{ $ariza->message }}
                                                                </textarea>
                                                        </td>

                                                    </tr>
                                                    <script>
                                                        var textarea = document.getElementById('message'); // textarea elementini identifikator orqali tanlash
                                                        var text = textarea.value; // textarea'dagi matnni olish

                                                        // Ortqicha satr va boshlang'ich/oxirgi bo'shliklarni olib tashlash
                                                        text = text.trim();

                                                        // Yangi qiymatni textarea'ga qaytaring
                                                        textarea.value = text;
                                                    </script>
                                                </tbody>

                                            </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ url()->previous() }}"
                                class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100    ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                </svg>

                                <span>
                                    Orqaga
                                </span>
                            </a>


                            <button type="submit"
                                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-green-500 rounded-lg sm:w-auto gap-x-2 hover:bg-green-600  ">

                                <span>Anketaga javobni saqlash</span>
                            </button>
                        </div>
                        </form>
                    </section>

                    <div class=" items-center justify-between mt-6">

                    </div>
                    </section>
                    <!-- /show -->
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div id="modal1" class="fixed inset-0 flex items-center justify-center z-10 hidden bg-gray-500 bg-opacity-75">
        <div class="bg-white rounded-lg p-8">
            <h2 class="text-xl font-bold mb-4">Chop etish ishlab chiqilmagan!</h2>
            <p>Chop etish funksiyasi dasturlash davomida ishga tushuriladi!</p>
            <button id="closeBtn1"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4">
                Yopish
            </button>
        </div>
    </div>


    <!-- Modal 2 -->
    <div id="modal2" class="fixed inset-0 flex items-center justify-center z-10 hidden bg-black bg-opacity-75">
        <div class="bg-white rounded-lg p-8">
            <h2 class="text-xl font-bold mb-4">Yuklab olish ishlab chiqimlagan!</h2>
            <p>Yuklab olish funksiyasi dasturlash davomida ishga tushuriladi!</p>
            <button id="closeBtn2"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4 ">
                Yopish
            </button>
        </div>
    </div>

    <script>
        // Tugmalarni tanlang
        const btn1 = document.getElementById('btn1');
        const btn2 = document.getElementById('btn2');

        // Modalni tanlang
        const modal1 = document.getElementById('modal1');
        const modal2 = document.getElementById('modal2');

        // Yopish tugmalarni tanlang
        const closeBtn1 = document.getElementById('closeBtn1');
        const closeBtn2 = document.getElementById('closeBtn2');

        // Tugmalarga bosganda modallarni ko'rsatish
        btn1.addEventListener('click', () => {
            modal1.classList.remove('hidden');
        });

        btn2.addEventListener('click', () => {
            modal2.classList.remove('hidden');
        });

        // Yopish tugmalarga bosganda modallarni yashirish
        closeBtn1.addEventListener('click', () => {
            modal1.classList.add('hidden');
        });

        closeBtn2.addEventListener('click', () => {
            modal2.classList.add('hidden');
        });
    </script>


</x-app-layout>
