<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>CHDPU - Yotoqhona uchun ariza berish</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body
    class="bg-gray-50 min-h-screen bg-[url('/public/assets/wave.svg')] bg-no-repeat bg-bottom bg-fixed"
  >
    @include('modal') 
    <div class="flex flex-col justify-center p-6 pb-12">
        <div class="max-w-md mx-auto">
            <!-- <svg class="h-12 text-green-600 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>               -->
            <img class="h-50 mx-auto" src="{{ asset('/assets/thumb__90_90_0_0_crop.png') }}" alt="">
            <h2 class="mt-2 sm:mt-6 text-2xl sm:text-3xl font-bold text-gray-900 text-center">CHDPU - Talabalar Turar Joyiga Online Ariza To'ldirish</h2>
        </div>
        <div class="mt-6 bg-white/80 p-4 sm:p-5 backdrop-blur-xl sm:mt-10 mx-auto rounded-xl shadow-xl w-full max-w-xl">
            @if($topilmadi == false)
            <div class="max-w-2xl overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <img class="object-cover w-full h-64" 
                    @if ($hulosa['holat'] == "maqullandi")
                        src="{{ asset('assets/success.gif')}}"
                    @elseif($hulosa['holat'] == "rad_etildi")                
                        src="{{ asset('assets/fail.gif')}}"
                    @else
                        src="{{ asset('assets/hali-tekshiruvda.gif')}}"
                    @endif                
                alt="Article">            
                <div class="p-6">
                    <div>
                        <span class="text-xs font-medium text-blue-600 uppercase dark:text-blue-400">
                            @if ($hulosa['holat'] == "maqullandi" || $hulosa['holat'] == "rad_etildi")
                                Arizangizga javob berilgan!
                            @else
                                Arizangizga javob berilmagan! 
                            @endif                            
                        </span>
                        <p class="block mt-2 pb-4 text-center text-[24px] font-semibold capitalize text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline" tabindex="0" role="link">
                           @if ($hulosa)
                                {{ $hulosa['fish']}}
                           @endif
                           <br> 
                           @if ($hulosa['holat'] == "maqullandi" || $hulosa['holat'] == "rad_etildi")
                                <b class="normal-case">sizning arizangiz ko'rib chiqildi!</b>
                           @else
                                <b class="normal-case">sizning arizangiz ko'rib chiqilmoqda!</b>
                           @endif

                            <hr>
                            @if($hulosa['holat'] == "maqullandi")
                                <h2 class="text-center normal-case text-green-700 text-xl font-bold mt-3">Ariza natijasi: <b>Sizga TTJdan joy ajratiladi.</b></h2>
                            @elseif($hulosa['holat'] == "rad_etildi")
                                <h2 class="text-center normal-case text-red-700 text-xl font-bold mt-3">Ariza natijasi: <b>Sizning arizangiz rad etildi.</b></h2>
                            @endif
                        </p>
                        <p class="mt-6 p-4 text-md border border-gray-200 rounded-md text-gray-600 dark:text-gray-400">
                           
                            @if ($hulosa['message'] == null)
                                Hurmatli talaba {{ $hulosa['fish']}} sizning arizangiz ayni damda tekshirish jarayonida va tez orada arizangiz ko'rib chiqiladi!
                            @else
                                {{ $hulosa['message']}}
                            @endif
                           
                        </p>
                    </div>
                    <div class="mt-4 sm:flex sm:items-center sm:justify-between sm:mt-6 sm:-mx-2">
                        <a href="{{ '/' }}">
                            <button  class="px-4 sm:mx-2 w-full py-2.5 text-sm font-medium dark:text-gray-200  dark:border-gray-700 dark:hover:bg-gray-800 tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                            Ariza sahifasiga qaytish
                            </button>
                        </a>
                      
                    </div>  
                    
                    
                </div>
            </div>
            @else
            <div class="max-w-2xl overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <img class="object-cover w-full h-64" src="{{ asset('assets/fail.gif')}}" alt="Article">            
                <div class="p-6">
                    <div>                       
                        <p class="block mt-2 pb-4 text-center text-[24px]  font-semibold capitalize text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline" tabindex="0" role="link">
                           Bunday ID raqamdagi ariza topilmadi!                           
                        </p>
                        <p class="mt-2 p-4 text-md text-gray-600 dark:text-gray-400">
                            Kechirasi siz qidirgan ID raqam bo'yicha ariza topilmadi! ID raqam to'g'riligini tekshirib ko'ring.                           
                        </p>
                    </div>
                    <div class="mt-4 sm:flex sm:items-center sm:justify-between sm:mt-6 sm:-mx-2">
                        <a href="{{ '/' }}">
                            <button  class="px-4 sm:mx-2 w-full py-2.5 text-sm font-medium dark:text-gray-200  dark:border-gray-700 dark:hover:bg-gray-800 tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                            Ariza sahifasiga qaytish
                            </button>
                        </a>
                      
                    </div>  
                    
                </div>
            </div>
            @endif

       
          
          <div class="flex relative justify-center items-center mt-6">
                <div class="absolute inset-y-0 left-1 flex items-center top-[-20px]">
              
                    <svg class="h-7 w-7 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
              
                </div>
                <p class="font-medium text-sm pl-8 text-gray-600 hover:gray-500 text-center">Sahifa test holatida! Foydalanishda hatoliklar chiqsa bu haqda <a href="https://t.me/Raxmatilla_Fayziyev" class="font-bold text-cyan-400 hover:text-cyan-700">yozishingiz mumkin.</a></p>
            </div>
        </div>
    </div>

    

    <div class="font-bold">
      <hr class="my-6 border-gray-400 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://cspi.uz/" class="hover:underline">CSPU</a>. All Rights Reserved. Fayziyev.R | Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</span>
     
    </div>



  </body>
</html>
