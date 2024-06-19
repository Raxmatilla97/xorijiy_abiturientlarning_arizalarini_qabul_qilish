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

          
            <div class="max-w-2xl overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <img class="object-cover w-full h-64" src="{{ asset('assets/complite.gif')}}" alt="Article">
            
                <div class="p-6">
                    <div>
                        <span class="text-xs font-medium text-blue-600 uppercase dark:text-blue-400">Ariza joylandi!</span>
                        <p class="block mt-2 pb-4 text-center text-xl font-semibold normal-case text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline" tabindex="0" role="link">
                           <b id="nameSpan" style="font-size: 25px;"></b> <br> sizning arizangiz tez orada ko'rib chiqiladi!
                        </p>
                        
                         <script>
                            window.onload = function() {
                                var urlParams = new URLSearchParams(window.location.search);
                                var code = urlParams.get('code');
                                var name = urlParams.get('name');
                            
                                document.getElementById('myInput').value = code;
                                document.getElementById('nameSpan').textContent = name;
                            }
                        </script>             
                        
                        <p class="mt-2 text-md text-gray-600 dark:text-gray-400">
                            Hurmatli talaba siz jo'natgan ariza bizgacha yetib keldi, uni tez kunda ko'rib chiqib bu haqda izoh qoldiramiz, arizangizni holatini tekshirish uchun ID raqamdan foydalanishingiz mumkin. <p class="text-gray-800 text-xl text-center mt-3">ID raqamni esdan chiqarmang!</p>
                        </p>
                    </div>

                    <div class="flex items-center justify-between w-full mt-5 gap-x-2">
                         <input type="text" onclick="copyText()" id="myInput" disabled value="" class="flex-1 block h-10 px-4 text-xl text-gray-700 text-center bg-white border border-gray-200 rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />
                        
                        <button id="copyBtn"  onclick="copyText()" class="rounded-md hidden sm:block p-1.5 text-gray-700 bg-white border border-gray-200 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring transition-colors duration-300 hover:text-blue-500 dark:hover:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-4 text-center sm:flex sm:items-center sm:justify-between sm:mt-6 sm:-mx-2">
                        <a href="{{ '/' }}"  class="px-4 sm:mx-2 block w-full py-2.5 text-sm font-medium dark:text-gray-200  dark:border-gray-700 dark:hover:bg-gray-800 tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                            Ariza sahifasiga qaytish
                        </a>
    
                        <a  href="https://t.me/tvchdpi2017" class="px-4 sm:mx-2 block w-full py-2.5 mt-3 sm:mt-0 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                              OTM telegram kanali
                        </a>
                    </div>  
                    
                    
                </div>
            </div>
          

       
          
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

    {{-- <script>
      function copyText() {
        var input = document.getElementById("myInput");
        input.select();
        input.setSelectionRange(0, 99999); // Katta raqamlar uchun
      
        navigator.clipboard.writeText(input.value)
          .then(function() {
            alert("Matn nusxa olindi: " + input.value);
          })
          .catch(function(error) {
            console.error("Matn nusxa ololmadi: ", error);
          });
      }
      
      var input = document.getElementById("myInput");
      input.addEventListener("input", function() {
        input.removeAttribute("readonly");
      });
      </script> --}}

      

      <script>
       function copyText() {
        var input = document.getElementById("myInput");
        input.select();
        input.setSelectionRange(0, 99999); // Katta raqamlar uchun

        navigator.clipboard.writeText(input.value)
            .then(function() {
                var copiedText = document.getElementById("copiedText");
                copiedText.textContent = input.value;
                openModal();
            })
            .catch(function(error) {
                console.error("Matn nusxa olinmadi: ", error);
            });
    }

    function openModal() {
        var modal = document.getElementById('modal');
        modal.classList.remove('hidden');
    }

    function closeModal() {
        var modal = document.getElementById('modal');
        modal.classList.add('hidden');
    }
    </script>

<div id="modal" class="hidden fixed inset-0 flex items-center justify-center z-50">
  <div class="fixed z-1 inset-0 bg-black opacity-50"></div>
  <div class="bg-white z-0 rounded-lg p-4">   
    <div class="flex w-50 max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
      <div class="flex items-center justify-center w-12 bg-emerald-500">
          <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
          </svg>
      </div>
  
      <div class="px-4 py-2 -mx-3">
          <div class="mx-3">
              <span class="font-semibold text-emerald-500 dark:text-emerald-400">Nusxa olindi: <span id="copiedText"></span></span>
              <p class="text-sm text-gray-600 dark:text-gray-200">ID raqamni saqlab qo'ying!</p>
          </div>
      </div>
    </div>
    <button class="mt-4 px-4 w-full py-2 flex items-center justify-center bg-blue-500 text-white rounded hover:bg-blue-600" onclick="closeModal()">Yopish</button>
  </div>
</div>

  </body>
</html>
