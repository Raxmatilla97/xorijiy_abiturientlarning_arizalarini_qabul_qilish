<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>CHDPU - Xorijiy abiturientlardan onlayn ariza qabul qilish sayti</title>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .mt-4 {
            margin-top: 1rem;
            background-color: none;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen bg-[url('/public/assets/wave.svg')] bg-no-repeat bg-bottom bg-fixed">

    @include('modal')
    <div class="flex flex-col justify-center p-6 pb-12">
        <div class="max-w-md mx-auto">
            <img class="h-50 mx-auto" src="{{ asset('/assets/thumb__90_90_0_0_crop.png') }}" alt="">
            <h2 class="mt-2 sm:mt-6 text-2xl sm:text-3xl font-bold text-gray-900 text-center">CHDPU - Xorijiy
                abiturientlardan onlayn ariza qabul qilish sayti</h2>
        </div>
        <div
            class="mt-6 bg-white/80 p-6 sm:p-10 backdrop-blur-xl sm:mt-10 mx-auto rounded-xl shadow-xl w-full max-w-xxl">

            {{-- Message --}}
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Success !</strong> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('kelgan_arizalar_store') }}" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('post')

                <h3 class="text-xl font-semibold text-gray-900 text-center">Ma'lumotlaringizni to'ldiring ! </h3>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <div class="container mx-auto mt-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class=" shadow-lg p-6">
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium @if ($errors->has('fish')) text-red-700 @else text-gray-700 @endif">F.I.SH
                                    (familya, ism, sharifingizni to'liq yozing)</label>
                                <div class="relative rounded-md shadow-sm mt-1">
                                    <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
                                        <svg class="h-5 w-5 @if ($errors->has('fish')) text-red-400 @else text-gray-400 @endif"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="name" name="fish" value="{{ old('fish') }}"
                                        required
                                        class="w-full pl-10 rounded-md text-sm @if ($errors->has('fish')) border-red-300
                                      focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
                                        placeholder="F.I.SH">
                                </div>
                                @if ($errors->has('fish'))
                                    <p class="mt-2 text-sm text-red-600">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($errors->get('fish') as $message)
                                            {{ $i++ }}. {{ $message }}<br>
                                        @endforeach
                                    </p>
                                @endif
                            </div>


                            <div class="mt-6">
                                <label for="brith_day"
                                    class="block text-sm font-medium @if ($errors->has('brith_day')) text-red-700 @else text-gray-700 @endif">Qaysi
                                    sanada tug'ulgansiz?</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                        <div class="grid grid-cols-1 gap-4">
                                            <div class="col-span-1">
                                                <select id="brith_day" name="brith_day" required
                                                    class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('brith_day')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                                                    <option value="">Kunlarni tanlang</option>
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <option value="{{ $i }}"
                                                            @if (old('brith_day') == $i) selected @endif>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>

                                                @if ($errors->has('brith_day'))
                                                    <p class="mt-2 text-sm text-red-600">
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($errors->get('brith_day') as $message)
                                                            {{ $i++ }}. {{ $message }}<br>
                                                        @endforeach
                                                    </p>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="grid grid-cols-1 gap-4">
                                            <div class="col-span-1">
                                                <select id="brith_moth" name="brith_moth" required
                                                    class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('months')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                                                    <option value="">Oylarni tanlang</option>
                                                    <option value="1"
                                                        @if (old('brith_moth') == '1') selected @endif>
                                                        Yanvar</option>
                                                    <option value="2"
                                                        @if (old('brith_moth') == '2') selected @endif>
                                                        Fevral</option>
                                                    <option value="3"
                                                        @if (old('brith_moth') == '3') selected @endif>
                                                        Mart</option>
                                                    <option value="4"
                                                        @if (old('brith_moth') == '4') selected @endif>
                                                        Aprel</option>
                                                    <option value="5"
                                                        @if (old('brith_moth') == '5') selected @endif>
                                                        May</option>
                                                    <option value="6"
                                                        @if (old('brith_moth') == '6') selected @endif>
                                                        Iyun</option>
                                                    <option value="7"
                                                        @if (old('brith_moth') == '7') selected @endif>
                                                        Iyul</option>
                                                    <option value="8"
                                                        @if (old('brith_moth') == '8') selected @endif>
                                                        Avgust</option>
                                                    <option value="9"
                                                        @if (old('brith_moth') == '9') selected @endif>
                                                        Sentyabr</option>
                                                    <option value="10"
                                                        @if (old('brith_moth') == '10') selected @endif>
                                                        Oktyabr</option>
                                                    <option value="11"
                                                        @if (old('brith_moth') == '11') selected @endif>
                                                        Noyabr</option>
                                                    <option value="12"
                                                        @if (old('brith_moth') == '12') selected @endif>
                                                        Dekabr</option>
                                                </select>

                                                @if ($errors->has('brith_moth'))
                                                    <p class="mt-2 text-sm text-red-600">
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($errors->get('brith_moth') as $message)
                                                            {{ $i++ }}. {{ $message }}<br>
                                                        @endforeach
                                                    </p>
                                                @endif
                                            </div>

                                        </div>


                                        <div class="grid grid-cols-1 gap-4">
                                            <div class="col-span-1">
                                                <select id="brith_year" name="brith_year" required
                                                    class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('brith_year')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                                                    <option value="">Yil ni tanlang</option>
                                                    @for ($year = 1975; $year <= 2015; $year++)
                                                        <option value="{{ $year }}"
                                                            @if (old('brith_year') == $year) selected @endif>
                                                            {{ $year }}</option>
                                                    @endfor
                                                </select>


                                                @if ($errors->has('brith_year'))
                                                    <p class="mt-2 text-sm text-red-600">
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($errors->get('brith_year') as $message)
                                                            {{ $i++ }}. {{ $message }}<br>
                                                        @endforeach
                                                    </p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="mt-6">
                                <label for="passport_place_info"
                                    class="block text-sm font-medium @if ($errors->has('passport_place_info')) text-red-700 @else text-gray-700 @endif">Tug'ulgan
                                    joyingiz (To'liq holda yozing!)</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <input type="text" id="passport_place_info" name="passport_place_info"
                                        value="{{ old('passport_place_info') }}" required
                                        class="w-full pl-5 rounded-md text-sm @if ($errors->has('passport_place_info')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
                                        placeholder="Qaysi davlat, viloyat va shaxarligini yozing">
                                </div>
                                @if ($errors->has('passport_place_info'))
                                    <p class="mt-2 text-sm text-red-600">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($errors->get('passport_place_info') as $message)
                                            {{ $i++ }}. {{ $message }}<br>
                                        @endforeach
                                    </p>
                                @endif
                            </div>

                            <div class="mt-6">
                                <label for="passport_seriya"
                                    class="block text-sm font-medium @if ($errors->has('passport_seriya')) text-red-700 @else text-gray-700 @endif">Passport
                                    ma'lumotlari</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <input type="text" id="passport_seriya" name="passport_seriya" required
                                            value="{{ old('passport_seriya') }}"
                                            class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('passport_seriya')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif"
                                            placeholder="Seriyasi">
                                        <input type="text" id="passport_number" name="passport_number" required
                                            value="{{ old('passport_number') }}"
                                            class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('passport_number')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif"
                                            placeholder="Raqami">
                                        <input type="text" id="passport_berilgan_sana"
                                            name="passport_berilgan_sana" required
                                            value="{{ old('passport_berilgan_sana') }}"
                                            class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('passport_berilgan_sana')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif"
                                            placeholder="Qachon berilgan">
                                    </div>

                                    @if ($errors->has('passport_berilgan_sana'))
                                        <p class="mt-2 text-sm text-red-600">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($errors->get('passport_berilgan_sana') as $message)
                                                {{ $i++ }}. {{ $message }}<br>
                                            @endforeach
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="passport_kim_bergan"
                                    class="block text-sm font-medium @if ($errors->has('passport_kim_bergan')) text-red-700 @else text-gray-700 @endif">Kim
                                    tomonidan berilgan</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <input type="text" id="passport_kim_bergan" name="passport_kim_bergan"
                                        value="{{ old('passport_kim_bergan') }}" required
                                        class="w-full pl-5 rounded-md text-sm @if ($errors->has('passport_kim_bergan')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
                                        placeholder="Kim tomonidan berilganligini yozing">
                                </div>
                                @if ($errors->has('passport_kim_bergan'))
                                    <p class="mt-2 text-sm text-red-600">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($errors->get('passport_kim_bergan') as $message)
                                            {{ $i++ }}. {{ $message }}<br>
                                        @endforeach
                                    </p>
                                @endif
                            </div>

                            <div class="mt-6">
                                <label for="father_about"
                                    class="block text-sm font-medium @if ($errors->has('father_about')) text-red-700 @else text-gray-700 @endif">Otangiz
                                    haqida yozing</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <textarea id="father_about" name="father_about" rows="3" required
                                        class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('father_about')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif"
                                        placeholder="Familiyasi, ismi va otasining ismi, turar joyi, lavozimi, telefon raqami">{{ old('father_about') }}</textarea>

                                    @if ($errors->has('father_about'))
                                        <p class="mt-2 text-sm text-red-600">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($errors->get('father_about') as $message)
                                                {{ $i++ }}. {{ $message }}<br>
                                            @endforeach
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="mather_about"
                                    class="block text-sm font-medium @if ($errors->has('mather_about')) text-red-700 @else text-gray-700 @endif">Onangiz
                                    haqida yozing</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <textarea id="mather_about" name="mather_about" rows="3" required
                                        class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('mather_about')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif"
                                        placeholder="Familiyasi, ismi va otasining ismi, turar joyi, lavozimi, telefon raqami">{{ old('mather_about') }}</textarea>

                                    @if ($errors->has('mather_about'))
                                        <p class="mt-2 text-sm text-red-600">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($errors->get('mather_about') as $message)
                                                {{ $i++ }}. {{ $message }}<br>
                                            @endforeach
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="about_health"
                                    class="block text-sm font-medium @if ($errors->has('about_health')) text-red-700 @else text-gray-700 @endif">Agar
                                    sog‘lig‘ingizda muammolar bo‘lsa, iltimos, ma’lumotlarni kiriting</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <textarea id="about_health" name="about_health" rows="6" required
                                        class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('about_health')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif"
                                        placeholder="Agar sog‘lig‘ingizda muammolar bo‘lsa, bu haqida to'liq yozing">{{ old('about_health') }}</textarea>


                                    @if ($errors->has('about_health'))
                                        <p class="mt-2 text-sm text-red-600">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($errors->get('about_health') as $message)
                                                {{ $i++ }}. {{ $message }}<br>
                                            @endforeach
                                        </p>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="shadow-lg p-6">


                            <div >
                                <label for="phone_number"
                                    class="block text-sm font-medium @if ($errors->has('telefon')) text-red-700 @else text-gray-700 @endif">Bog'lanish
                                    uchun telefon raqamiz (shaxsiy)</label>
                                <div class="relative rounded-md shadow-sm mt-1">
                                    <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
                                        <svg class="h-5 w-5 @if ($errors->has('telefon')) text-red-400 @else text-gray-400 @endif"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M19.5 9.75a.75.75 0 01-.75.75h-4.5a.75.75 0 01-.75-.75v-4.5a.75.75 0 011.5 0v2.69l4.72-4.72a.75.75 0 111.06 1.06L16.06 9h2.69a.75.75 0 01.75.75z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                                clip-rule="evenodd" />uni
                                        </svg>
                                    </div>
                                    <input type="number" id="phone_number" required
                                        onkeydown="if (event.key === '-' || event.key === ',' || event.key === 'E' || event.key === 'e' || event.key === '.') event.preventDefault();"
                                        name="telefon" value="{{ old('telefon') }}"
                                        class="w-full pl-10 rounded-md text-sm @if ($errors->has('telefon')) border-red-300
                                      focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
                                        placeholder="+998(00 000 00 00)">
                                </div>
                                @if ($errors->has('telefon'))
                                    <p class="mt-2 text-sm text-red-600">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($errors->get('telefon') as $message)
                                            {{ $i++ }}. {{ $message }}<br>
                                        @endforeach
                                    </p>
                                @endif
                            </div>


                            <div class="mt-6">
                                <label for="residence_to_passport"
                                    class="block text-sm font-medium @if ($errors->has('residence_to_passport')) text-red-700 @else text-gray-700 @endif">Passport
                                    bo'yicha doyimiy yashash manzilingiz</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <input type="text" id="residence_to_passport" name="residence_to_passport"
                                        required value="{{ old('residence_to_passport') }}"
                                        class="w-full pl-5 rounded-md text-sm @if ($errors->has('residence_to_passport')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
                                        placeholder="Viloyat, Shahar(Tuman)">

                                </div>
                                @if ($errors->has('residence_to_passport'))
                                    <p class="mt-2 text-sm text-red-600">
                                        @error('residence_to_passport')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                @endif
                            </div>

                            <div class="mt-4 bg-gray-100 p-4 rounded-md">
                                <label for="passport_file_upload" class="block text-sm font-medium ">Passportingiz
                                    suratini yuklang (Iloji bo'lsa bir suratda oldi va orqa taraflari bilan)</label>
                                <div class="relative rounded-md shadow-sm mt-1">
                                    <input type="file" id="passport_file_upload" name="passport_file_upload"
                                        required
                                        class="w-full pl-5 rounded-md mt-4 text-sm border-gray-300 focus:border-green-500 focus:ring-green-500">
                                </div>
                                @if ($errors->has('passport_file_upload'))
                                    <p class="mt-2 text-sm text-red-600">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($errors->get('passport_file_upload') as $message)
                                            {{ $i++ }}. {{ $message }}<br>
                                        @endforeach
                                    </p>
                                @endif
                            </div>

                            <div class="mt-6">
                                <label for="ignition_code"
                                    class="block text-sm font-medium @if ($errors->has('ignition_code')) text-red-700 @else text-gray-700 @endif">Yo'nalish
                                    shifri va Nomi</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <input type="text" id="ignition_code" name="ignition_code" required
                                            value="{{ old('ignition_code') }}"
                                            class="w-full md:w-sm pl-5 rounded-md text-sm @if ($errors->has('ignition_code')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
                                            placeholder="Shifrni yozing">
                                        <input type="text" id="ignition_name" name="ignition_name" required
                                            value="{{ old('ignition_name') }}"
                                            class="w-full md:w-auto pl-5 rounded-md text-sm @if ($errors->has('ignition_name')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
                                            placeholder="Yo'nalish nomini yozing">
                                    </div>

                                </div>
                                @if ($errors->has('ignition_code'))
                                    <p class="mt-2 text-sm text-red-600">
                                        @error('ignition_code')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                @endif
                            </div>

                            <div class="mt-6">
                                <label for="educational_form"
                                    class="block text-sm font-medium @if ($errors->has('educational_form')) text-red-700 @else text-gray-700 @endif">Ta'lim
                                    shaklini va boshqa ma'lumotlarni tanlang</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="col-span-1">
                                            <select id="educational_form" name="educational_form" required
                                                class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('select1')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                                                <option value="">Ta'lim shaklini tanlang</option>
                                                <option value="kunduzgi"
                                                    @if (old('educational_form') == 'kunduzgi') selected @endif>Kunduzgi
                                                </option>
                                                <option value="kechki"
                                                    @if (old('educational_form') == 'kechki') selected @endif>Kechki</option>
                                                <option value="sirtqi"
                                                    @if (old('educational_form') == 'sirtqi') selected @endif>Sirtqi</option>
                                            </select>
                                            @if ($errors->has('educational_form'))
                                                <p class="mt-2 text-sm text-red-600">
                                                    @error('educational_form')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-span-1">
                                            <select id="gender" name="gender" required
                                                class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('select2')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                                                <option value="">Jinsingizni tanlang</option>
                                                <option value="erkak"
                                                    @if (old('gender') == 'erkak') selected @endif>Erkak</option>
                                                <option value="ayol"
                                                    @if (old('gender') == 'ayol') selected @endif>Ayol</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <p class="mt-2 text-sm text-red-600">
                                                    @error('gender')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-span-1">
                                            <select id="education_level" name="education_level" required
                                                class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('select3')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                                                <option value="">Ma'lumotingizni tanlang</option>
                                                <option value="orta"
                                                    @if (old('education_level') == 'orta') selected @endif>O'rta</option>
                                                <option value="orta_maxsus"
                                                    @if (old('education_level') == 'orta_maxsus') selected @endif>O'rta maxsus
                                                </option>
                                                <option value="oliy"
                                                    @if (old('education_level') == 'oliy') selected @endif>Oliy</option>
                                            </select>
                                            @if ($errors->has('education_level'))
                                                <p class="mt-2 text-sm text-red-600">
                                                    @error('education_level')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="mt-4 bg-gray-100 p-4 rounded-md">
                                        <label for="education_level_file"
                                            class="block text-sm font-medium ">Ma'lumotizni
                                            tasdiqlaydigan xujjatingizni yuklang</label>
                                        <div class="relative rounded-md shadow-sm mt-1">
                                            <input type="file" id="education_level_file" required
                                                name="education_level_file"
                                                class="w-full pl-5 rounded-md mt-4 text-sm border-gray-300 focus:border-green-500 focus:ring-green-500">
                                        </div>
                                        @if ($errors->has('education_level_file'))
                                            <p class="mt-2 text-sm text-red-600">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($errors->get('education_level_file') as $message)
                                                    {{ $i++ }}. {{ $message }}<br>
                                                @endforeach
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="lang_prompt "
                                    class="block text-sm font-medium @if ($errors->has('lang_prompt')) text-red-700 @else text-gray-700 @endif">Suxbatni
                                    qaysi tilda olib borilishini istaysiz?</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <div class="grid grid-cols-1 gap-4">
                                        <div class="col-span-1">
                                            <select id="lang_prompt" name="lang_prompt" required
                                                class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('select1')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                                                <option value="">Tilni tanlang</option>
                                                <option value="uz"
                                                    @if (old('lang_prompt') == 'uz') selected @endif>O'zbek tilida
                                                </option>
                                                <option value="rus"
                                                    @if (old('lang_prompt') == 'rus') selected @endif>Rus tilida
                                                </option>
                                                <option value="karakalpak"
                                                    @if (old('lang_prompt') == 'karakalpak') selected @endif>Qoraqalpoq
                                                    tilida</option>
                                            </select>
                                            @if ($errors->has('lang_prompt'))
                                                <p class="mt-2 text-sm text-red-600">
                                                    @error('lang_prompt')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <hr>

                            <div class="mt-6">
                                <label for="name_of_educational"
                                    class="block text-sm font-medium @if ($errors->has('name_of_educational')) text-red-700 @else text-gray-700 @endif">
                                Qaysi ta'lim muassasasini bitirgansiz?
                                </label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <input type="text" id="name_of_educational" name="name_of_educational"
                                        value="{{ old('name_of_educational') }}" required
                                        class="w-full pl-5 rounded-md text-sm @if ($errors->has('name_of_educational')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
                                        placeholder="O'zingiz bitirgan ta'lim muassasasini nomini yozing...">
                                </div>
                                @if ($errors->has('name_of_educational'))
                                    <p class="mt-2 text-sm text-red-600">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($errors->get('name_of_educational') as $message)
                                            {{ $i++ }}. {{ $message }}<br>
                                        @endforeach
                                    </p>
                                @endif
                            </div>

                            <div class="mt-6">
                                <label for="ignition_code"
                                    class="block text-sm font-medium @if ($errors->has('ignition_code')) text-red-700 @else text-gray-700 @endif">Ta'lim muassasasini qaysi yili va qaysi yo'nalishda bitirgansiz?</label>
                                <div class="relative rounded-md shadow-sm mt-1">

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="grid grid-cols-1 gap-4">
                                            <div class="col-span-1">
                                                <select id="year_of_educational" name="year_of_educational" required
                                                    class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if ($errors->has('year_of_educational')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                                                    <option value="">Bitirgan yilizni tanlang</option>
                                                    @for ($year = 1975; $year <= 2024; $year++)
                                                        <option value="{{ $year }}"
                                                            @if (old('year_of_educational') == $year) selected @endif>
                                                            {{ $year }}</option>
                                                    @endfor
                                                </select>


                                                @if ($errors->has('year_of_educational'))
                                                    <p class="mt-2 text-sm text-red-600">
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($errors->get('year_of_educational') as $message)
                                                            {{ $i++ }}. {{ $message }}<br>
                                                        @endforeach
                                                    </p>
                                                @endif
                                            </div>

                                        </div>
                                        <input type="text" id="direction_of_educational" name="direction_of_educational" required
                                            value="{{ old('direction_of_educational') }}"
                                            class="w-full md:w-auto pl-5 rounded-md text-sm @if ($errors->has('direction_of_educational')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
                                            placeholder="Yo'nalish nomini yozing">
                                    </div>

                                </div>
                                @if ($errors->has('direction_of_educational'))
                                    <p class="mt-2 text-sm text-red-600">
                                        @error('direction_of_educational')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                @endif
                            </div>


                            <div class="mt-9">

                                <div class="mb-7 ml-4">
                                    <div class="flex items-center">
                                        <input id="link-checkbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2 ">
                                        <label for="link-checkbox"
                                            class="ml-7 text-sm font-medium text-gray-900 ">Barcha ma'lumotlaringiz
                                            to'grimi? <a href="#" class="text-blue-600  hover:underline">Qayta
                                                tekshirish</a>.</label>
                                    </div>
                                </div>
                                <!-- <a
                                        href="#"
                                        class="justify-center items-center flex rounded-md bg-green-600 py-2 px-4 text-white font-semibold shadow-lg hover:shadow-xl
                                        focus:shadow-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500
                                        focus:ring-offset-2 transition duration-150 ease-in-out"
                                        >Jo'natish</a> -->
                                <button
                                    class="w-full justify-center items-center flex rounded-md bg-green-600 py-4 px-4 text-white font-semibold shadow-lg hover:shadow-xl
                                    focus:shadow-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500
                                    focus:ring-offset-2 transition duration-150 ease-in-out opacity-50"
                                    id="submit-button" disabled type="submit">Jo'natish</button>
                            </div>

                            <div class="flex relative justify-center items-center mt-8">
                                <div class="absolute inset-y-0 left-1 flex items-center top-[-20px]">

                                    <svg class="h-7 w-7 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>

                                </div>
                                <p class="font-medium text-sm pl-8 text-gray-600 hover:gray-500 text-center">Sahifa
                                    test holatida! Foydalanishda
                                    hatoliklar chiqsa bu haqda <a href="https://t.me/Raxmatilla_Fayziyev"
                                        class="font-bold text-cyan-400 hover:text-cyan-700">yozishingiz mumkin.</a></p>
                            </div>
                        </div>

                    </div>



                </div>
        </div>
        </form>
    </div>
    </div>

    <script>
        document.getElementById('link-checkbox').addEventListener('change', function() {
            var submitButton = document.getElementById('submit-button');
            if (this.checked) {
                submitButton.classList.remove('opacity-50');
            } else {
                submitButton.classList.add('opacity-50');
            }
            submitButton.disabled = !this.checked;
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
