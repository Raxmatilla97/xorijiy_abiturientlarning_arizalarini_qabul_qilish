<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <title>CHDPU - Yotoqhona uchun ariza berish</title>
  <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen bg-[url('/public/assets/wave.svg')] bg-no-repeat bg-bottom bg-fixed">


  @include('modal')
  <div class="flex flex-col justify-center p-6 pb-12">
    <div class="max-w-md mx-auto">
      <!-- <svg class="h-12 text-green-600 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>               -->
      <img class="h-50 mx-auto" src="{{ asset('/assets/thumb__90_90_0_0_crop.png') }}" alt="">
      <h2 class="mt-2 sm:mt-6 text-2xl sm:text-3xl font-bold text-gray-900 text-center">CHDPU - Talabalar Turar Joyiga
        Online Ariza To'ldirish</h2>
    </div>
    <div class="mt-6 bg-white/80 p-6 sm:p-10 backdrop-blur-xl sm:mt-10 mx-auto rounded-xl shadow-xl w-full max-w-xl">

      {{-- Message --}}
      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
          <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session('success') }}
      </div>
      @endif

      <form action="{{ route('kelgan_arizalar_store')}}" method="POST" autocomplete="off" enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        @method('post')

        <h3 class="text-xl font-semibold text-gray-900  text-center">Ma'lumotlaringizni to'ldiring ! </h3>

        <div>
          <label for="name"
            class="block text-sm font-medium @if($errors->has('fish')) text-red-700 @else text-gray-700 @endif">F.I.SH</label>
          <div class="relative rounded-md shadow-sm mt-1">
            <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
              <svg class="h-5 w-5 @if($errors->has('fish')) text-red-400 @else text-gray-400 @endif"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
            </div>
            <input type="text" id="name" name="fish" value="{{old('fish')}}" required
              class="w-full pl-10 rounded-md text-sm @if($errors->has('fish')) border-red-300
                    focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
              placeholder="Talabaning F.I.SH">
          </div>
          @if($errors->has('fish'))
          <p class="mt-2 text-sm text-red-600">
            @error('fish'){{ $message }}@enderror
          </p>
          @endif
        </div>
        <div>
          <label for="passport_info"
            class="block text-sm font-medium @if($errors->has('pass_info')) text-red-700 @else text-gray-700 @endif">Passport
            ma'lumotlaringiz</label>
          <div class="relative rounded-md shadow-sm mt-1">
            <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
              <svg class="h-5 w-5 @if($errors->has('pass_info')) text-red-400 @else text-gray-400 @endif"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M4.5 3.75a3 3 0 00-3 3v10.5a3 3 0 003 3h15a3 3 0 003-3V6.75a3 3 0 00-3-3h-15zm4.125 3a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zm-3.873 8.703a4.126 4.126 0 017.746 0 .75.75 0 01-.351.92 7.47 7.47 0 01-3.522.877 7.47 7.47 0 01-3.522-.877.75.75 0 01-.351-.92zM15 8.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15zM14.25 12a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H15a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15z"
                  clip-rule="evenodd" />
              </svg>
            </div>
            <input type="text" id="passport_info"
              onkeydown="if (event.key === '-' || event.key === ' ') event.preventDefault();" name="pass_info"
              value="{{old('pass_info')}}"
              class=" w-full pl-10 rounded-md text-sm @if($errors->has('pass_info')) border-red-300
                    focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif uppercase"
              placeholder="Talabaning passport Seryasi va raqami">
          </div>
          <style>
            #passport_info[type="text"]::placeholder {
              text-transform: none;
            }
          </style>
          @if($errors->has('pass_info'))
          <p class="mt-2 text-sm text-red-600">
            @error('pass_info'){{ $message }}@enderror
          </p>
          @endif
        </div>
        <div>
          <label for="phone_number"
            class="block text-sm font-medium @if($errors->has('telefon')) text-red-700 @else text-gray-700 @endif">Bog'lanish
            uchun telefon raqamiz (shaxsiy)</label>
          <div class="relative rounded-md shadow-sm mt-1">
            <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
              <svg class="h-5 w-5 @if($errors->has('telefon')) text-red-400 @else text-gray-400 @endif"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M19.5 9.75a.75.75 0 01-.75.75h-4.5a.75.75 0 01-.75-.75v-4.5a.75.75 0 011.5 0v2.69l4.72-4.72a.75.75 0 111.06 1.06L16.06 9h2.69a.75.75 0 01.75.75z"
                  clip-rule="evenodd" />
                <path fill-rule="evenodd"
                  d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                  clip-rule="evenodd" />uni
              </svg>
            </div>
            <input type="number" id="phone_number"
              onkeydown="if (event.key === '-' || event.key === ',' || event.key === 'E' || event.key === 'e' || event.key === '.') event.preventDefault();"
              name="telefon" value="{{old('telefon')}}"
              class="w-full pl-10 rounded-md text-sm @if($errors->has('telefon')) border-red-300
                  focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
              placeholder="+998(00 000 00 00)">
          </div>
          @if($errors->has('telefon'))
          <p class="mt-2 text-sm text-red-600">
            @error('telefon'){{ $message }}@enderror
          </p>
          @endif
        </div>

        <div>
          <label for="fakultetlar"
            class="block text-sm font-medium @if($errors->has('fakultet')) text-red-700 @else text-gray-700 @endif">Tahsil
            olayotgan fakultetingiz</label>
          <div class="relative rounded-md shadow-sm mt-1">
            <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
              <svg class="h-5 w-5 @if($errors->has('fakultet')) text-red-400 @else text-gray-400 @endif"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
              </svg>
            </div>
            <select id="fakultetlar" name="fakultet" value="{{old('fakultet')}}"
              class="w-full pl-10 rounded-md text-sm normal-case @if($errors->has('fakultet')) border-red-300
                    focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif">
              <option value="" selected>Fakultet nomini tanlang</option>
              <option value="gumanitar" {{ "gumanitar"===old('fakultet') ? 'selected' : '' }}>Gumanitar fanlar fakulteti
              </option>
              <option value="pedagogika" {{ "pedagogika"===old('fakultet') ? 'selected' : '' }}>Pedagogika fakulteti
              </option>
              <option value="fizika" {{ "fizika"===old('fakultet') ? 'selected' : '' }}>Fizika va kimyo fakulteti
              </option>
              <option value="boshlangich" {{ "boshlangich"===old('fakultet') ? 'selected' : '' }}>Boshlang'ich ta'lim
                fakulteti</option>
              <option value="maktabgacha" {{ "maktabgacha"===old('fakultet') ? 'selected' : '' }}>Maktabgacha ta’lim
                fakulteti</option>
              <option value="turizm" {{ "turizm"===old('fakultet') ? 'selected' : '' }}>Turizm fakulteti</option>
              <option value="tabiiy" {{ "tabiiy"===old('fakultet') ? 'selected' : '' }}>Tabiiy fanlar fakulteti</option>
              <option value="matematika" {{ "matematika"===old('fakultet') ? 'selected' : '' }}>Matematika va
                informatika fakulteti</option>
              <option value="sport" {{ "sport"===old('fakultet') ? 'selected' : '' }}>Sport va chaqiriqqacha harbiy
                ta’lim fakulteti</option>
              <option value="sanatshunoslik" {{ "sanatshunoslik"===old('fakultet') ? 'selected' : '' }}>San'atshunoslik
                fakulteti</option>
            </select>
          </div>
          @if($errors->has('fakultet'))
          <p class="mt-2 text-sm text-red-600">
            @error('fakultet'){{ $message }}@enderror
          </p>
          @endif
        </div>

        <div>
          <label for="department"
            class="block text-sm font-medium @if($errors->has('yonalish')) text-red-700 @else text-gray-700 @endif">Tahsil
            olayotgan yo'nalishingiz</label>
          <div class="relative rounded-md shadow-sm mt-1">
            <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
              <svg class="h-5 w-5  @if($errors->has('yonalish')) text-red-400 @else text-gray-400 @endif"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
              </svg>

            </div>
            <select id="department" name="yonalish"
              class="w-full pl-10 rounded-md text-sm normal-case @if($errors->has('yonalish')) border-red-300
                  focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif">

              @if (old('yonalish'))
              <option value="{{old('yonalish')}}" selected>
                @if (old('yonalish') == 'ozbek-tilshunosligi-yonalishi')
                O‘zbek tilshunosligi yo'nalishi
                @elseif (old('yonalish') == 'ozbek-adabiyotshunosligi-yonalishi')
                O‘zbek adabiyotshunosligi yo'nalishi
                @elseif (old('yonalish') == 'fakultetlararo-rus-tili-yonalishi')
                Fakultetlararo rus tili yo'nalishi
                @elseif (old('yonalish') == 'rus-adabiyoti-va-talim-metodikasi-yonalishi')
                Rus adabiyoti va ta'lim metodikasi yo'nalishi
                @elseif (old('yonalish') == 'fakultetlar-aro-ijtimoiy-fanlar-yonalishi')
                Fakultetlar aro Ijtimoiy fanlar yo'nalishi
                @elseif (old('yonalish') == 'ozbekiston-tarixi-yonalishi')
                O'zbekiston tarixi yo'nalishi
                @elseif (old('yonalish') == 'jahon-tarixi-yonalishi')
                Jahon tarixi yo'nalishi
                @elseif (old('yonalish') == 'milliy-goya-manaviyat-asoslari-va-huquq-talimi-yonalishi')
                Milliy g'oya, ma'naviyat asoslari va huquq ta'limi yo'nalishi
                @elseif (old('yonalish') == 'rus-tili-va-talim-metodikasi-yonalishi')
                Rus tili va ta'lim metodikasi yo'nalishi
                @elseif (old('yonalish') == 'pedagogika-yonalishi')
                Pedagogika yo'nalishi
                @elseif (old('yonalish') == 'maktab-menejmenti-yonalishi')
                Maktab menejmenti yo'nalishi
                @elseif (old('yonalish') == 'psixologiya-yonalishi')
                Psixologiya yo'nalishi
                @elseif (old('yonalish') == 'umumiy-pedagogika-yonalishi')
                Umumiy pedagogika yo'nalishi
                @elseif (old('yonalish') == 'maxsus-pedagogika-yonalishi')
                Maxsus pedagogika yo'nalishi
                @elseif (old('yonalish') == 'fizika-yonalishi')
                Fizika yo'nalishi
                @elseif (old('yonalish') == 'kimyo-yonalishi')
                Kimyo yo'nalishi
                @elseif (old('yonalish') == 'fizika-va-astronomiya-oqitish-metodikasi-yonalishi')
                Fizika va astronomiya o'qitish metodikasi yo'nalishi
                @elseif (old('yonalish') == 'ilmiy-va-metodologik-kimyo-yonalishi')
                Ilmiy va metodologik kimyo yo'nalishi
                @elseif (old('yonalish') == 'boshlangich-talim-nazariyasi')
                Boshlang'ich ta'lim nazariyasi
                @elseif (old('yonalish') == 'boshlangich-talim-metodikasi-yonalishi')
                Boshlang'ich ta'lim metodikasi yo'nalishi
                @elseif (old('yonalish') == 'maktabgacha-talim-metodikasi-yonalishi')
                Maktabgacha ta'lim metodikasi yo'nalishi
                @elseif (old('yonalish') == 'bolalar-sporti-yonalishi')
                Bolalar sporti yo'nalishi
                @elseif (old('yonalish') == 'umumkasbiy-va-ihtisoslik-fanlari-yonalishi')
                Umumkasbiy va ihtisoslik fanlari yo'nalishi
                @elseif (old('yonalish') == 'ingliz-tili-yonalishi')
                Ingliz tili yo'nalishi
                @elseif (old('yonalish') == 'nemis-tili-yonalishi')
                Nemis tili yo'nalishi
                @elseif (old('yonalish') == 'fakultetlararo-chet-tillar-yonalishi')
                Fakultetlararo chet tillar yo'nalishi
                @elseif (old('yonalish') == 'biologiya-yonalishi')
                Biologiya yo'nalishi
                @elseif (old('yonalish') == 'geografiya-yonalishi')
                Geografiya yo'nalishi
                @elseif (old('yonalish') == 'genetika-va-evolutsion-biologiya-yonalishi')
                Genetika va evolutsion biologiya yo'nalishi
                @elseif (old('yonalish') == 'informatika-va-axborot-texnoligiyalari-yonalishi')
                Informatika va axborot texnoligiyalari yo'nalishi
                @elseif (old('yonalish') == 'algebra-va-matematik-analiz-yonalishi')
                Algebra va matematik analiz yo'nalishi
                @elseif (old('yonalish') == 'matematika-oqitish-metodikasi-va-geometriya-yonalishi')
                Matematika o'qitish metodikasi va geometriya yo'nalishi
                @elseif (old('yonalish') == 'informatika-oqitish-metodikasi-yonalishi')
                Informatika o'qitish metodikasi yo'nalishi
                @elseif (old('yonalish') == 'texnologik-talim-yonalishi')
                Texnologik talim yo'nalishi
                @elseif (old('yonalish') == 'jismoniy-madaniyat-metodikasi-yonalishi')
                Jismoniy madaniyat metodikasi yo'nalishi
                @elseif (old('yonalish') == 'jismoniy-madaniyat-nazariyasi')
                Jismoniy madaniyat nazariyasi
                @elseif (old('yonalish') == 'tasviriy-sanat-va-dizayn-yonalishi')
                Tasviriy sanat va dizayn yo'nalishi
                @elseif (old('yonalish') == 'muhandislik-va-kompyuter-grafikasi-yonalishi')
                Muhandislik va kompyuter grafikasi yo'nalishi
                @elseif (old('yonalish') == 'musiqa-yonalishi')
                Musiqa yo'nalishi
                @endif
              </option>
              @else
              <option value="" selected>Yo'nalish nomini tanlang</option>
              @endif
            </select>
          </div>
          @if($errors->has('yonalish'))
          <p class="mt-2 text-sm text-red-600">
            @error('yonalish'){{ $message }}@enderror
          </p>
          @endif
        </div>

        <div>
          <label for="kurs"
            class="block text-sm font-medium @if($errors->has('kurs_nomeri')) text-red-700 @else text-gray-700 @endif">Tahsil
            olayotgan bosqichingiz</label>
          <div class="relative rounded-md shadow-sm mt-1">
            <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
              <svg class="h-5 w-5 @if($errors->has('kurs_nomeri')) text-red-400 @else text-gray-400 @endif"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
              </svg>
            </div>
            <select id="kurs" name="kurs_nomeri"
              class="w-full pl-10 rounded-md text-sm normal-case @if($errors->has('kurs_nomeri')) border-red-300
                  focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif">
              <option value="" selected>Kursingizni tanlang</option>
              <option value="1-kurs" {{ "1-kurs"===old('kurs_nomeri') ? 'selected' : '' }}>1-Kurs</option>
              <option value="2-kurs" {{ "2-kurs"===old('kurs_nomeri') ? 'selected' : '' }}>2-Kurs</option>
              <option value="3-kurs" {{ "3-kurs"===old('kurs_nomeri') ? 'selected' : '' }}>3-Kurs</option>
              <option value="4-kurs" {{ "4-kurs"===old('kurs_nomeri') ? 'selected' : '' }}>4-Kurs</option>
              <option value="5-kurs" {{ "5-kurs"===old('kurs_nomeri') ? 'selected' : '' }}>5-Kurs</option>
            </select>
          </div>
          @if($errors->has('kurs_nomeri'))
          <p class="mt-2 text-sm text-red-600">
            @error('kurs_nomeri'){{ $message }}@enderror
          </p>
          @endif
        </div>
        <div>
          <label for="guruh"
            class="block text-sm font-medium @if($errors->has('guruhi')) text-red-700 @else text-gray-700 @endif">Tahsil
            olayotgan guruhingiz</label>
          <div class="relative rounded-md shadow-sm mt-1">
            <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
              <svg class="h-5 w-5 @if($errors->has('guruhi')) text-red-400 @else text-gray-400 @endif"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
              </svg>

            </div>
            <input type="text" id="guruh" name="guruhi" value="{{old('guruhi')}}" required
              class="w-full pl-10 rounded-md text-sm @if($errors->has('guruhi')) border-red-300
            focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif"
              placeholder="Tahsil olayotgan guruhingizni yozing">
          </div>
          @if($errors->has('guruhi'))
          <p class="mt-2 text-sm text-red-600">
            @error('guruhi'){{ $message }}@enderror
          </p>
          @endif
        </div>

        <div>
          <h3 class="mb-4 text-md font-semibold text-gray-900  text-center">Quyidagi qaysi me’zonlarga mos kelasiz?</h3>
          <div class="relative rounded-md shadow-sm mt-1">
            <ul
              class="w-full text-sm font-medium rounded-lg  bg-white border @if($errors->has('mezon'))  text-red-900  border-red-600  @else  text-gray-900  border-gray-200 rounded-lg   @endif">
              <li
                class="w-full border-b  rounded-t-lg @if($errors->has('mezon')) border-red-700 @else border-gray-200 @endif">
                <div class="flex items-center pl-3">
                  <input id="mehribonlik_uylari_tarbiyalanuvchilari" type="radio"
                    @if(old('mezon')=='mehribonlik_uylari_tarbiyalanuvchilari' ) checked @endif
                    value="mehribonlik_uylari_tarbiyalanuvchilari" name="mezon"
                    class="w-4 h-4 focus:ring-2  text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="mehribonlik_uylari_tarbiyalanuvchilari"
                    class="w-full py-3 ml-2 text-sm font-medium @if($errors->has('mezon')) text-red-700  @else text-gray-900  @endif">“Mehribonlik
                    uylari” tarbiyalanuvchilari, yetim va ota-ona qaramog‘idan mahrum bo‘lgan talabalar</label>
                </div>
              </li>
              <li
                class="w-full border-b rounded-t-lg @if($errors->has('mezon')) border-red-600 @else border-gray-200 @endif">
                <div class="flex items-center pl-3">
                  <input id="bir_oiladan" type="radio" @if(old('mezon')=='bir_oiladan' ) checked @endif
                    value="bir_oiladan" name="mezon"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                  <label for="bir_oiladan"
                    class="w-full py-3 ml-2 text-sm font-medium @if($errors->has('mezon')) text-red-700  @else text-gray-900  @endif">Bir
                    oiladan bakalavriat bosqichi kunduzgi ta’lim shaklida ikki yoki undan ortiq to‘lov-shartnoma asosida
                    o‘qiyotgan oilalar farzandlari</label>
                </div>
              </li>
              <li
                class="w-full border-b  rounded-t-lg @if($errors->has('mezon')) border-red-600 @else border-gray-200 @endif">
                <div class="flex items-center pl-3">
                  <input id="nogironligi_bor" type="radio" @if(old('mezon')=='nogironligi_bor' ) checked @endif
                    value="nogironligi_bor" name="mezon"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                  <label for="nogironligi_bor"
                    class="w-full py-3 ml-2 text-sm font-medium @if($errors->has('mezon')) text-red-700  @else text-gray-900  @endif">I
                    va II guruh nogironligi bo‘lgan talabalar</label>
                </div>
              </li>
              <li
                class="w-full border-b  rounded-t-lg @if($errors->has('mezon')) border-red-600 @else border-gray-200 @endif">
                <div class="flex items-center pl-3">
                  <input id="ijtimoiy_himoya" type="radio" @if(old('mezon')=='ijtimoiy_himoya' ) checked @endif
                    value="ijtimoiy_himoya" name="mezon"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                  <label for="ijtimoiy_himoya"
                    class="w-full py-3 ml-2 text-sm font-medium @if($errors->has('mezon')) text-red-700  @else text-gray-900  @endif">“Ijtimoiy
                    himoya yagona reyestri”, “Temir daftar” va “Ayollar daftari”ga kiritilgan ijtimoiy himoyaga muhtoj
                    oilalarning farzandlari hamda “Yoshlar daftari”da turadigan talabalar</label>
                </div>
              </li>
              <li
                class="w-full border-b  rounded-t-lg @if($errors->has('mezon')) border-red-600 @else border-gray-200 @endif">
                <div class="flex items-center pl-3">
                  <input id="xalqaro_fan_olimpiadalari" type="radio" @if(old('mezon')=='xalqaro_fan_olimpiadalari' )
                    checked @endif value="xalqaro_fan_olimpiadalari" name="mezon"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                  <label for="xalqaro_fan_olimpiadalari"
                    class="w-full py-3 ml-2 text-sm font-medium @if($errors->has('mezon')) text-red-700  @else text-gray-900  @endif">Xalqaro
                    fan olimpiadalari, Oliy ta’lim, fan va innovatsiyalar vazirligi tomonidan o‘tkaziladigan respublika
                    fan olimpiadalarida g‘olib bo‘lgan talabalar</label>
                </div>
              </li>
              <li
                class="w-full border-b  rounded-t-lg @if($errors->has('mezon')) border-red-600 @else border-gray-200 @endif">
                <div class="flex items-center pl-3">
                  <input id="yil_talabasi" type="radio" @if(old('mezon')=='yil_talabasi' ) checked @endif
                    value="yil_talabasi" name="mezon"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                  <label for="yil_talabasi"
                    class="w-full py-3 ml-2 text-sm font-medium @if($errors->has('mezon')) text-red-700  @else text-gray-900  @endif">“Yil
                    talabasi” va “Talabalar teatr studiyalari” ko‘rik tanlovlarining respublika bosqichida g‘olib
                    bo‘lgan talabalar</label>
                </div>
              </li>
              <li
                class="w-full border-b  rounded-t-lg @if($errors->has('mezon')) border-red-600 @else border-gray-200 @endif">
                <div class="flex items-center pl-3">
                  <input id="otm_talabalari" type="radio" @if(old('mezon')=='otm_talabalari' ) checked @endif
                    value="otm_talabalari" name="mezon"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                  <label for="otm_talabalari"
                    class="w-full py-3 ml-2 text-sm font-medium @if($errors->has('mezon')) text-red-700  @else text-gray-900  @endif">OTM
                    talabalari o‘rtasida o‘tkazilgan “Zakovat” intellektual o‘yinining respublika bosqichida g‘oliblikni
                    qo‘lga kiritgan talabalar</label>
                </div>
              </li>
              <li
                class="w-full border-b  rounded-t-lg @if($errors->has('mezon')) border-red-600 @else border-gray-200 @endif">
                <div class="flex items-center pl-3">
                  <input id="kengash_raisi" type="radio" @if(old('mezon')=='kengash_raisi' ) checked @endif
                    value="kengash_raisi" name="mezon"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                  <label for="kengash_raisi"
                    class="w-full py-3 ml-2 text-sm font-medium @if($errors->has('mezon')) text-red-700  @else text-gray-900  @endif">Talabalar
                    turar joyida talabalar kengashi raisi, qavat sardori bo‘lgan talabalar</label>
                </div>
              </li>
            </ul>

          </div>
          @if($errors->has('mezon'))
          <p class="mt-2 text-sm text-red-600">
            @error('mezon'){{ $message }}@enderror
          </p>
          @endif
        </div>

        <div>
          <div class="flex items-center justify-center max-w-full mb-7">
            <div class="relative text-center hidden md:block">
              <h2
                class="shadow-sm relative rounded-md text-md border  border-gray-200   rounded-t-lg  font-medium px-1 py-3 right-2 ">
                Yuqoridagi me'zonlarni asoslovchi hujjatingizni yuklang.
              </h2>

            </div>
            <svg class="w-12 mr-2 h-12 mt-2 hidden md:block text-gray-600" aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>

            <label for="document"
              class=" w-full h-57 border-2 @if($errors->has('document')) border-red-300 border-dashed rounded-lg cursor-pointer bg-red-50  hover:bg-red-100  @else border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100  @endif ">


              <input type="file" class="text-md" value="{{ old('document')}}" name="document"
                data-max-file-size="5MB" />

            </label>
          </div>

          @if($errors->has('document'))
          <p class="mt-[-15px] mb-5 text-sm text-red-600">
            @error('document'){{ $message }}@enderror
          </p>
          @endif

          <div class="mb-7 ml-4">
            <div class="flex items-center">
              <input id="link-checkbox" type="checkbox" value=""
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   focus:ring-2 ">
              <label for="link-checkbox" class="ml-7 text-sm font-medium text-gray-900 ">Barcha ma'lumotlaringiz
                to'grimi? <a href="#" class="text-blue-600  hover:underline">Qayta tekshirish</a>.</label>
            </div>
          </div>
          @if(config('services.recaptcha.key'))
          <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
          @endif
         
         
           
          <div>
            <!-- <a
            href="#"
            class="justify-center items-center flex rounded-md bg-green-600 py-2 px-4 text-white font-semibold shadow-lg hover:shadow-xl 
              focus:shadow-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 
              focus:ring-offset-2 transition duration-150 ease-in-out"
            >Jo'natish</a> -->
            <button class="w-full justify-center items-center flex rounded-md bg-green-600 py-2 px-4 text-white font-semibold shadow-lg hover:shadow-xl 
              focus:shadow-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 
              focus:ring-offset-2 transition duration-150 ease-in-out opacity-50" id="submit-button" disabled
              type="submit">Jo'natish</button>
          </div>


      </form>
      <div class="flex relative justify-center items-center mt-6">
        <div class="absolute inset-y-0 left-1 flex items-center top-[-20px]">

          <svg class="h-7 w-7 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
          </svg>

        </div>
        <p class="font-medium text-sm pl-8 text-gray-600 hover:gray-500 text-center">Sahifa test holatida! Foydalanishda
          hatoliklar chiqsa bu haqda <a href="https://t.me/Raxmatilla_Fayziyev"
            class="font-bold text-cyan-400 hover:text-cyan-700">yozishingiz mumkin.</a></p>
      </div>
    </div>

    <script>
      var departments = {
              "none": ["Yo'nalish nomini tanlang"],
              "fizika": ['Fizika yo\'nalishi', 'Kimyo yo\'nalishi', "Fizika va astronomiya o'qitish metodikasi yo\'nalishi", "Ilmiy va metodologik kimyo yo\'nalishi"],
              "matematika": ['Informatika va axborot texnoligiyalari yo\'nalishi', 'Algebra va matematik analiz yo\'nalishi', "Matematika o'qitish metodikasi va geometriya yo\'nalishi", "Informatika o'qitish metodikasi yo\'nalishi"],
              "tabiiy": ['Biologiya yo\'nalishi', 'Geografiya yo\'nalishi', 'Genetika va evolutsion biologiya yo\'nalishi'],
              "gumanitar": ["O'zbek tilshunosligi yo\'nalishi", "O'zbek adabiyotshunosligi yo\'nalishi", 'Fakultetlararo rus tili yo\'nalishi', "Rus adabiyoti va ta'lim metodikasi yo\'nalishi", "Fakultetlar aro Ijtimoiy fanlar yo\'nalishi", "O'zbekiston tarixi yo\'nalishi", "Jahon tarixi yo\'nalishi", "Milliy g'oya, ma'naviyat asoslari va huquq ta'limi yo\'nalishi", "Rus tili va ta'lim metodikasi yo\'nalishi"],
              "pedagogika": ['Pedagogika yo\'nalishi', 'Maktab menejmenti yo\'nalishi', 'Psixologiya yo\'nalishi', "Umumiy pedagogika yo\'nalishi", "Maxsus pedagogika yo\'nalishi"],
              "maktabgacha": ['Maktabgacha ta\'lim metodikasi yo\'nalishi', 'Bolalar sporti yo\'nalishi'],
              "boshlangich": ["Boshlang'ich ta'lim nazariyasi", "Boshlang'ich ta'lim metodikasi yo\'nalishi"],
              "turizm": ['Umumkasbiy va ihtisoslik fanlari yo\'nalishi', 'Ingliz tili yo\'nalishi', 'Nemis tili yo\'nalishi', 'Fakultetlararo chet tillar yo\'nalishi'],
              "sport": ["Texnologik talim yo\'nalishi", "Jismoniy madaniyat metodikasi yo\'nalishi", "Jismoniy madaniyat nazariyasi"],
              "sanatshunoslik": ["Tasviriy san\at va dizayn yo\'nalishi", "Muhandislik va kompyuter grafikasi yo\'nalishi", "Musiqa yo\'nalishi"],
              
            };
            
            var faculty = document.getElementById('fakultetlar');
            var department = document.getElementById('department');
            
            faculty.addEventListener('change', function() {
              var selectedFaculty = faculty.value;
              var departmentOptions = '';
            
              for (var i = 0; i < departments[selectedFaculty].length; i++) {
                departmentOptions += '<option value="' + departments[selectedFaculty][i].toLowerCase().replace(/\s+/g, '-').replace(/['‘,]/g, '') + '">' + departments[selectedFaculty][i] + '</option>';
                
              }

              // departmentOptions += '<option value="' + departments[selectedFaculty][i].split(' ')[0].toLowerCase().replace(/[\'‘]/g, '') + '">' + departments[selectedFaculty][i] + '</option>';
            
              department.innerHTML = departmentOptions;
            });

            // document.getElementById('link-checkbox').addEventListener('change', function() {
            //     document.getElementById('submit-button').disabled = !this.checked;       
             
            // });

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





    <div class="font-bold">
      <hr class="my-6 border-gray-400 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://cspi.uz/"
          class="hover:underline">CSPU</a>. All Rights Reserved. Fayziyev.R | Laravel v{{
        Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</span>

    </div>

    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js">
    </script>
    <script src="{{ asset('file-size.js')}}"></script>
    <script src="{{ asset('filepond.js')}}"></script>
    <script>
      // Register the plugins
        FilePond.registerPlugin(FilePondPluginFileValidateSize, FilePondPluginFileValidateType);

        // Set options
        FilePond.setOptions({
            acceptedFileTypes: ['image/png', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/x-zip-compressed', 'application/x-rar-compressed', 'image/jpeg', 'image/jpg'],
            server: {
                process: {
                    url: '/tmp-upload',
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                    }
                }
            },
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => {
                    // Do custom MIME type detection here and return with promise
                    resolve(type);
                }),
        });

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[name="document"]');

        // Create the FilePond instance
        const pond = FilePond.create(inputElement);

    </script>


</body>

</html>