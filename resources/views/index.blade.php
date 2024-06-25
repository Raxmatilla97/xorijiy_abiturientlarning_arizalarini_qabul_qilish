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
    .mt-4 { margin-top: 1rem; background-color: none; }
  </style>
</head>
<body class="bg-gray-50 min-h-screen bg-[url('/public/assets/wave.svg')] bg-no-repeat bg-bottom bg-fixed">

  @include('modal')
  <div class="flex flex-col justify-center p-6 pb-12">
    <div class="max-w-md mx-auto">
      <img class="h-50 mx-auto" src="{{ asset('/assets/thumb__90_90_0_0_crop.png') }}" alt="">
      <h2 class="mt-2 sm:mt-6 text-2xl sm:text-3xl font-bold text-gray-900 text-center">CHDPU - Xorijiy abiturientlardan onlayn ariza qabul qilish sayti</h2>
    </div>
    <div class="mt-6 bg-white/80 p-6 sm:p-10 backdrop-blur-xl sm:mt-10 mx-auto rounded-xl shadow-xl w-full max-w-xxl">

      {{-- Message --}}
      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
          <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session('success') }}
      </div>
      @endif

      <form action="{{ route('kelgan_arizalar_store')}}" method="POST" autocomplete="off" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('post')

        <h3 class="text-xl font-semibold text-gray-900 text-center">Ma'lumotlaringizni to'ldiring ! </h3>

        <div class="container mx-auto mt-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class=" shadow-lg p-6">
              <div>
                <label for="name" class="block text-sm font-medium @if($errors->has('fish')) text-red-700 @else text-gray-700 @endif">Familya ism sharifingiz</label>
                <div class="relative rounded-md shadow-sm mt-1">
                 
                  <input type="text" id="name" name="fish" value="{{old('fish')}}" required class="w-full pl-5 rounded-md text-sm @if($errors->has('fish')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif" placeholder="F.I.SH">
                </div>
                @if($errors->has('fish'))
                <p class="mt-2 text-sm text-red-600">
                  @error('fish'){{ $message }}@enderror
                </p>
                @endif
              </div>

              <div class="mt-6">
                <label for="passport_place_info" class="block text-sm font-medium @if($errors->has('passport_place_info')) text-red-700 @else text-gray-700 @endif">Passport ma'lumotlari</label>
                <div class="relative rounded-md shadow-sm mt-1">
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" id="input1" name="input1" value="{{ old('input1') }}" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('input1')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif" placeholder="Seriyasi">
                        <input type="text" id="input2" name="input2" value="{{ old('input2') }}" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('input2')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif" placeholder="Raqami">
                        <input type="text" id="input3" name="input3" value="{{ old('input3') }}" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('input3')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif" placeholder="Qachon berilgan">
                    </div>
            
                    @if($errors->has('passport_place_info'))
                    <p class="mt-2 text-sm text-red-600">
                        @error('passport_place_info'){{ $message }}@enderror
                    </p>
                    @endif
                </div>
            </div>
            
            <div class="mt-6">
              <label for="name" class="block text-sm font-medium @if($errors->has('fish')) text-red-700 @else text-gray-700 @endif">Kim tomonidan berilgan</label>
              <div class="relative rounded-md shadow-sm mt-1">
                
                <input type="text" id="name" name="fish" value="{{old('fish')}}" required class="w-full pl-5 rounded-md text-sm @if($errors->has('fish')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif" placeholder="Kim tomonidan berilganligini yozing">
              </div>
              @if($errors->has('fish'))
              <p class="mt-2 text-sm text-red-600">
                @error('fish'){{ $message }}@enderror
              </p>
              @endif
            </div>           
            
            <div class="mt-6">
              <label for="passport_place_info" class="block text-sm font-medium @if($errors->has('passport_place_info')) text-red-700 @else text-gray-700 @endif">Otangiz haqida yozing</label>
              <div class="relative rounded-md shadow-sm mt-1">
                  
                  <textarea id="passport_place_info" name="passport_place_info"  rows="3" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('passport_place_info')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif" placeholder="Familiyasi, ismi va otasining ismi, turar joyi, lavozimi, telefon raqami">{{ old('passport_place_info') }}</textarea>
          
                  @if($errors->has('passport_place_info'))
                  <p class="mt-2 text-sm text-red-600">
                      @error('passport_place_info'){{ $message }}@enderror
                  </p>
                  @endif
              </div>
          </div>

          <div class="mt-6">
            <label for="passport_place_info" class="block text-sm font-medium @if($errors->has('passport_place_info')) text-red-700 @else text-gray-700 @endif">Onangiz haqida yozing</label>
            <div class="relative rounded-md shadow-sm mt-1">
                
                <textarea id="passport_place_info" name="passport_place_info"  rows="3" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('passport_place_info')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif" placeholder="Familiyasi, ismi va otasining ismi, turar joyi, lavozimi, telefon raqami">{{ old('passport_place_info') }}</textarea>
        
                @if($errors->has('passport_place_info'))
                <p class="mt-2 text-sm text-red-600">
                    @error('passport_place_info'){{ $message }}@enderror
                </p>
                @endif
            </div>
        </div>
          

            </div>

            <div class="shadow-lg p-6">
              <div>
                <label for="passport_place_info" class="block text-sm font-medium @if($errors->has('passport_place_info')) text-red-700 @else text-gray-700 @endif">Passport bo'yicha doyimiy yashash joyingiz</label>
                <div class="relative rounded-md shadow-sm mt-1">
                  
                  <input type="text" id="passport_place_info" name="passport_place_info" value="{{old('passport_place_info')}}" class="w-full pl-5 rounded-md text-sm @if($errors->has('passport_place_info')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif" placeholder="Viloyat, Shahar(Tuman)">
                </div>
                @if($errors->has('passport_place_info'))
                <p class="mt-2 text-sm text-red-600">
                  @error('passport_place_info'){{ $message }}@enderror
                </p>
                @endif
              </div>

              <div class="mt-6">
                <label for="passport_place_info" class="block text-sm font-medium @if($errors->has('passport_place_info')) text-red-700 @else text-gray-700 @endif">Yo'nalish shifri va Nomi</label>
                <div class="relative rounded-md shadow-sm mt-1">
                  
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" id="passport_place_info_1" name="passport_place_info_1" value="{{old('passport_place_info_1')}}" class="w-full md:w-sm pl-5 rounded-md text-sm @if($errors->has('passport_place_info_1')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif" placeholder="Shifrni yozing">
                    <input type="text" id="passport_place_info_2" name="passport_place_info_2" value="{{old('passport_place_info_2')}}" class="w-full md:w-auto pl-5 rounded-md text-sm @if($errors->has('passport_place_info_2')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif" placeholder="Yo'nalish nomini yozing">
                  </div>  

                </div>
                @if($errors->has('passport_place_info'))
                <p class="mt-2 text-sm text-red-600">
                  @error('passport_place_info'){{ $message }}@enderror
                </p>
                @endif
              </div>

              <div class="mt-6">
                <label for="passport_place_info" class="block text-sm font-medium @if($errors->has('passport_place_info')) text-red-700 @else text-gray-700 @endif">Ta'lim shaklini va boshqa ma'lumotlarni tanlang</label>
                <div class="relative rounded-md shadow-sm mt-1">
                  
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="col-span-1">
                      <select id="select1" name="select1" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('select1')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                        <option value="">Ta'lim shaklini tanlang</option>
                        <option value="option1" @if(old('select1') == 'option1') selected @endif>Kunduzgi</option>
                        <option value="option2" @if(old('select1') == 'option2') selected @endif>Kechki</option>
                        <option value="option3" @if(old('select1') == 'option3') selected @endif>Sirtqi</option>
                      </select>
                      @if($errors->has('select1'))
                      <p class="mt-2 text-sm text-red-600">
                        @error('select1'){{ $message }}@enderror
                      </p>
                      @endif
                    </div>
                    <div class="col-span-1">
                      <select id="select2" name="select2" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('select2')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                        <option value="">Jinsingizni tanlang</option>
                        <option value="option1" @if(old('select2') == 'option1') selected @endif>Erkak</option>
                        <option value="option2" @if(old('select2') == 'option2') selected @endif>Ayol</option>
                      </select>
                      @if($errors->has('select2'))
                      <p class="mt-2 text-sm text-red-600">
                        @error('select2'){{ $message }}@enderror
                      </p>
                      @endif
                    </div>
                    <div class="col-span-1">
                      <select id="select3" name="select3" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('select3')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                        <option value="">Ma'lumotingizni tanlang</option>
                        <option value="option1" @if(old('select3') == 'option1') selected @endif>O'rta</option>
                        <option value="option2" @if(old('select3') == 'option2') selected @endif>O'rta maxsus</option>
                        <option value="option3" @if(old('select3') == 'option3') selected @endif>Oliy</option>
                      </select>
                      @if($errors->has('select3'))
                      <p class="mt-2 text-sm text-red-600">
                        @error('select3'){{ $message }}@enderror
                      </p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mt-6">
                <label for="passport_place_info" class="block text-sm font-medium @if($errors->has('passport_place_info')) text-red-700 @else text-gray-700 @endif">Suxbatni qaysi tilda olib borilishini istaysiz?</label>
                <div class="relative rounded-md shadow-sm mt-1">
                  
                  <div class="grid grid-cols-1 gap-4">
                    <div class="col-span-1">
                      <select id="select1" name="select1" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('select1')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif">
                        <option value="">Tilni tanlang</option>
                        <option value="option1" @if(old('select1') == 'option1') selected @endif>O'zbek tilida</option>
                        <option value="option2" @if(old('select1') == 'option2') selected @endif>Rus tilida</option>
                        <option value="option3" @if(old('select1') == 'option3') selected @endif>Qoraqalpoq tilida</option>
                      </select>
                      @if($errors->has('select1'))
                      <p class="mt-2 text-sm text-red-600">
                        @error('select1'){{ $message }}@enderror
                      </p>
                      @endif
                    </div>
                   
                  </div>
                </div>
              </div>

              <div class="mt-6">
                <label for="passport_place_info" class="block text-sm font-medium @if($errors->has('passport_place_info')) text-red-700 @else text-gray-700 @endif">Agar sog‘lig‘ingizda muammolar bo‘lsa, iltimos, ma’lumotlarni kiriting</label>
                <div class="relative rounded-md shadow-sm mt-1">
                    
                    <textarea id="passport_place_info" name="passport_place_info"  rows="6" class="w-full rounded-md text-sm border-gray-300 focus:border-green-500 focus:ring-green-500 @if($errors->has('passport_place_info')) border-red-300 focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 @endif" placeholder="Agar sog‘lig‘ingizda muammolar bo‘lsa, bu haqida to'liq yozing">{{ old('passport_place_info') }}</textarea>
            
                    @if($errors->has('passport_place_info'))
                    <p class="mt-2 text-sm text-red-600">
                        @error('passport_place_info'){{ $message }}@enderror
                    </p>
                    @endif
                </div>
            </div>

            </div>

          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
