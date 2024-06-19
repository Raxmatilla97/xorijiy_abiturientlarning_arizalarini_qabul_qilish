    <div class="flex justify-between p-6 items-center">
        <a href="{{'/'}}" class="flex items-center gap-2">
          <svg class="h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
          </svg>
          <span class="text-xl font-black uppercase">Online Ariza</span>
        </a>
        <div class="">
          <button
            id="btn5"
            class="text-sm rounded-md bg-green-600 py-2 px-4 text-white font-semibold shadow-lg hover:shadow-xl 
              focus:shadow-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 
              focus:ring-offset-2 transition duration-150 ease-in-out"
            >Ariza holati</>
        </div>
    </div>
    
    <!-- Modal -->
    <div id="modal5" class="fixed inset-0 flex  items-center justify-center z-10 hidden bg-gray-500 bg-opacity-75">
        <div class="bg-white rounded-lg p-8 w-[400px]">
            <form action="{{ route('arizani-tekshirish') }}" method="POST" class="flex flex-col">
                @csrf
                @method('post') 
                <h2 class="text-xl font-bold mb-4 text-center">Ariza holatini tekshirish</h2>
                <p>Arizangiz holatini tekshirish uchun sizga berilgan ID raqamni bu yerga yozing.</p>
                <b class="mt-3">Yuborilgan arizalar soni: @php echo $users = DB::table('applications')->whereNull('deleted_at')->count(); @endphp ta</b>
                <b class="mt-1">Maqullangan arizalar soni: @php echo $users = DB::table('applications')->where('holat', '=', 'maqullandi')->whereNull('deleted_at')->count(); @endphp ta</b> 
                <b class="mt-1">Rad etilgan arizalar soni: @php echo $users = DB::table('applications')->where('holat', '=', 'rad_etildi')->whereNull('deleted_at')->count(); @endphp ta</b> 
                <div class="relative rounded-md shadow-sm mt-1">
                    <div class="absolute inset-y-0 flex  items-center left-0 pl-3">
                       
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 @if($errors->has('fish')) text-red-400 @else text-gray-400 @endif">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                          </svg>
                                                    
                    </div>
                    <input type="number" required name="number_generation" onkeydown="if (event.key === '-' || event.key === ',' || event.key === '+' || event.key === 'E' || event.key === 'e' || event.key === '.') event.preventDefault();" class="mb-5 mt-5 w-full pl-10 rounded-md text-sm @if($errors->has('fish')) border-red-300
                    focus:border-red-500 focus:ring-red-500 text-red-900 placeholder-red-300 @else border-gray-300 focus:border-green-500 focus:ring-green-500 @endif">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tekshirish
                </button>
                <button id="closeBtn5" type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4">
                    Yopish
                </button>
            </form>
        </div>
    </div>

    
    <script>
       // Tugmalarni tanlang
        const btn5 = document.getElementById('btn5');
       

        // Modalni tanlang
        const modal5 = document.getElementById('modal5');
   

        // Yopish tugmalarni tanlang
        const closeBtn5 = document.getElementById('closeBtn5');
      

        // Tugmalarga bosganda modallarni ko'rsatish
        btn5.addEventListener('click', () => {
            modal5.classList.remove('hidden');
        });

      
        // Yopish tugmalarga bosganda modallarni yashirish
        closeBtn5.addEventListener('click', () => {
            modal5.classList.add('hidden');
        });

        
    </script>