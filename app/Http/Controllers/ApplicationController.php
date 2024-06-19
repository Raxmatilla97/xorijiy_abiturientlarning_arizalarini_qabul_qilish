<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreapplicationRequest;
use App\Http\Requests\UpdateapplicationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use PDF;

class ApplicationController extends Controller
{

    public function arizalarniYuborish()
    {   
        return view('index');
    }


    /**
     * Resurs ro'yxatini ko'rsatish.
     */
    public function index()
    {
        $arizalar = Application::orderBy('created_at', 'desc')->paginate(15);
        $arizalar = $this->filterArizalar($arizalar);  

        return view('dashboard.kelgan_arizalar.list')->with([
            'arizalar' => $arizalar,
        ]);
    }   

    /**
     * Yangi yaratilgan resursni saqlash.
     */
    public function store(StoreapplicationRequest $request)
    {
        
        $tmp_file = TemporaryFile::where('folder', $request->document)->first();

        do {
            $code = random_int(1000000, 9999999);
        } while (Application::where('number_generation', $code)->exists());

        $request->validate([
            'g-recaptcha-response' => 'required|recaptcha',           
        ]);

        $validatedData = $request->validated();

        $validatedData['pass_info'] = preg_replace('/[^a-zA-Z0-9]/', '', $request['pass_info']);
        $validatedData['telefon'] = preg_replace('/[^0-9]/', '', $request['telefon']);
        $validatedData['document'] = $tmp_file->folder . '/' . $tmp_file->filename . $tmp_file->file;        
        $validatedData['number_generation'] = $code;
        $validatedData['holat'] = 'korib_chiqilmoqda';
        $name = $validatedData['fish'];       
               
        Application::create($validatedData);         
        
        return redirect(route('confirm', ['code' => $code, 'name' => $name,]));

    }


    public function tahrirlash(UpdateapplicationRequest $request)
    {   
        $data = $request->all();
        $data['tekshirgan_user_id'] = Auth::id();
        $application = Application::find($data['id']);
        $name = $application->fish;
        
        $application->update($data);

        return redirect()->route('korilmagan-arizalar')->with(
        [
            // 'status' => true,
            'name' => $name
        
        ]);
      

    }

    /**
     * Arizani tekshirish
     */
    public function arizaniTekshirish(Request $request)
    {
        $data = $request->all();
        $hulosa = ""; // $hulosa o'zgaruvchisini e'lon qilingan joydan o'zgartirdik      
        
        if (is_numeric($data['number_generation'])) {

            $application = Application::where('number_generation', $data['number_generation'])->first();        
            if (!$application) {
                $topilmadi = true;
                $hulosa = [];
            } else {
                $topilmadi = false;
                $hulosa = [
                    'fish' => $application->fish,
                    'holat' => $application->holat,
                    'number' => $application->number_generation,
                    'message' => $application->message
                ];
            }
        } else {
            $topilmadi = true;
            $hulosa = [];           
        }        
       
        
        return view('javob')->with([
            'hulosa' => $hulosa,
            'topilmadi' => $topilmadi
        ]);
    }

  

    /**
     * Arizani mazmunini ko'rsatish
     */
    public function arizaniKorish($ariza)
    {
       
        $ariza = Application::where('id', $ariza )->first();   
       
        $ariza = $this->singleItem($ariza);
       
        return view('dashboard.kelgan_arizalar.show')->with([
            'ariza' => $ariza,
        ]);;
    }
  
    /**
     * Arizani o'chirish.
     */
    public function destroy($id)
    {
        $application = Application::find($id);
        
        if (!$application) {
            return redirect()->back()->with('error', 'Ariza topilmadi'); // Ariza topilmadi xabarini qaytarish
        }
        
        $application->delete();
        
        return redirect()->back()->with('status', "Ro'yxatdan ariza o'chirildi!");
    }

    /**
     * Maqullangan arizalar uchun
     */
    public function maqullanganArizalar()
    {
        $arizalar = Application::where('holat', 'maqullandi')->orderBy('created_at', 'desc')->paginate(15);
       
        $arizalar = $this->filterArizalar($arizalar);

        return view('dashboard.kelgan_arizalar.list')->with([
            'arizalar' => $arizalar,
        ]);
    }

    /**
     * Rad etilgan arizalar ro'yxati.
     */
    public function radEtilganArizalar()
    {
        $arizalar = Application::where('holat', 'rad_etildi')->orderBy('created_at', 'desc')->paginate(15);

        $arizalar = $this->filterArizalar($arizalar);

        return view('dashboard.kelgan_arizalar.list')->with([
            'arizalar' => $arizalar,
        ]);
    }

    /**
     * Ko'rilmagan yoki tekshirish jarayonidagi arizalar.
     */
    public function korilmaganArizalar()
    {
        $arizalar = Application::where('holat', 'korib_chiqilmoqda')->orderBy('created_at', 'desc')->paginate(15);

        $arizalar = $this->filterArizalar($arizalar);

        return view('dashboard.kelgan_arizalar.list')->with([
            'arizalar' => $arizalar,
        ]);
    }

    /**
     * Boshqaruv panelidagi asosiy sahifa.
     */
    public function dashboard()
    {
        $arizalar_count = Application::count();
        $arizalar_maqullangan = Application::where('holat', 'maqullandi')->count();
        $arizalar_rad_etildi = Application::where('holat', 'rad_etildi')->count();
        $arizalar_korilmagan = Application::where('holat', 'korib_chiqilmoqda' )->count();

        $arizalar = Application::where('holat', 'korib_chiqilmoqda')->orderBy('created_at', 'desc')->paginate(10);
        $arizalar = $this->filterArizalar($arizalar);  


        return view('dashboard')->with([
            'arizalar' => $arizalar,
            'arizalar_count' => $arizalar_count,
            'arizalar_maqullangan' => $arizalar_maqullangan,
            'arizalar_rad_etildi' => $arizalar_rad_etildi,
            'arizalar_korilmagan' => $arizalar_korilmagan
        ]);
    }

     /**
     * Boshqaruv panelida arizani qidirish controlleri
     */
    public function arizalarniQidrish(Request $request)
    {
        $fish = $request->input('fish');
        $passInfo = $request->input('pass_info');
        $telefon = $request->input('telefon');
        $numberGeneration = $request->input('number_generation');
    
        $query = Application::query();
    
        if ($fish) {
            $query->where('fish', 'like', '%' . $fish . '%');
        }
    
        if ($passInfo) {          
            $query->where('pass_info', 'like', '%' . $passInfo . '%');
        }
    
        if ($telefon) {
            $query->where('telefon', 'like', '%' . $telefon . '%');          
        }
    
        if ($numberGeneration) {
            $query->where('number_generation', $numberGeneration);
        }
    
        $arizalar = $query->paginate(10);

        return view('dashboard.kelgan_arizalar.list', compact('arizalar'));
    }

    /**
     * Listda Fakultetlar va Yo'nalishlarni tushunarli so'zlarga o'girish qismi.
     */
    public function filterArizalar($arizalar)
    {
        foreach ($arizalar as $ariza) {
            // Asosiy ro'yxatni singleItem() funksiyasidan oladi!
            $ariza = $this->singleItem($ariza);           
        }
        
        return $arizalar;
    }

    /**
     * Showda Fakultetlar va Yo'nalishlarni tushunarli so'zlarga o'girish qismi.
     */
    public function singleItem($ariza)
    {
        // Fakultetlarni aniqlash
        if ($ariza->fakultet === 'gumanitar') {
            $ariza->fakultet = 'Gumanitar fanlar fakulteti';
        } elseif ($ariza->fakultet === 'pedagogika') {
            $ariza->fakultet = "Pedagogika fakulteti";
        }elseif ($ariza->fakultet === 'fizika') {
            $ariza->fakultet = "Fizika va kimyo fakulteti";
        }elseif ($ariza->fakultet === 'boshlangich') {
            $ariza->fakultet = "Boshlang'ich ta'lim fakulteti";
        }elseif ($ariza->fakultet === 'maktabgacha') {
            $ariza->fakultet = "Maktabgacha ta’lim fakulteti";
        }elseif ($ariza->fakultet === 'turizm') {
            $ariza->fakultet = "Turizm fakulteti";
        }elseif ($ariza->fakultet === 'tabiiy') {
            $ariza->fakultet = "Tabiiy fanlar fakulteti";
        }elseif ($ariza->fakultet === 'matematika') {
            $ariza->fakultet = "Matematika va informatika fakulteti";
        }elseif ($ariza->fakultet === 'sport') {
            $ariza->fakultet = "Sport va chaqiriqqacha harbiy ta’lim fakulteti";
        }elseif ($ariza->fakultet === 'sanatshunoslik') {
            $ariza->fakultet = "San'atshunoslik fakulteti";
        } else {
            $ariza->fakultet = "Fakulteti topilmadi!";
        }

        // Yo'nalishlarni aniqlash
        if ($ariza->yonalish === 'ozbek-tilshunosligi-yonalishi') {
            $ariza->yonalish = "O‘zbek tilshunosligi yo'nalishi";            
        }elseif($ariza->yonalish === 'ozbek-adabiyotshunosligi-yonalishi') {
            $ariza->yonalish = "O‘zbek adabiyotshunosligi yo'nalishi";
        }elseif($ariza->yonalish === 'fakultetlararo-rus-tili-yonalishi') {
            $ariza->yonalish = "Fakultetlararo rus tili yo'nalishi";
        }elseif($ariza->yonalish === 'rus-adabiyoti-va-talim-metodikasi-yonalishi') {
            $ariza->yonalish = "Rus adabiyoti va ta'lim metodikasi yo'nalishi";
        }elseif($ariza->yonalish === 'fakultetlar-aro-ijtimoiy-fanlar-yonalishi') {
            $ariza->yonalish = "Fakultetlar aro Ijtimoiy fanlar yo'nalishi";
        }elseif($ariza->yonalish === 'ozbekiston-tarixi-yonalishi') {
            $ariza->yonalish = "O'zbekiston tarixi yo'nalishi";
        }elseif($ariza->yonalish === 'jahon-tarixi-yonalishi') {
            $ariza->yonalish = "Jahon tarixi yo'nalishi";
        }elseif($ariza->yonalish === 'milliy-goya-manaviyat-asoslari-va-huquq-talimi-yonalishi') {
            $ariza->yonalish = "Milliy g'oya, ma'naviyat asoslari va huquq ta'limi yo'nalishi";
        }elseif($ariza->yonalish === 'rus-tili-va-talim-metodikasi-yonalishi') {
            $ariza->yonalish = "Rus tili va ta'lim metodikasi yo'nalishi";
        }elseif($ariza->yonalish === 'pedagogika-yonalishi') {
            $ariza->yonalish = "Pedagogika yo'nalishi";
        }elseif($ariza->yonalish === 'maktab-menejmenti-yonalishi') {
            $ariza->yonalish = "Maktab menejmenti yo'nalishi";
        }elseif($ariza->yonalish === 'psixologiya-yonalishi') {
            $ariza->yonalish = "Psixologiya yo'nalishi";
        }elseif($ariza->yonalish === 'umumiy-pedagogika-yonalishi') {
            $ariza->yonalish = "Umumiy pedagogika yo'nalishi";
        }elseif($ariza->yonalish === 'maxsus-pedagogika-yonalishi') {
            $ariza->yonalish = "Maxsus pedagogika yo'nalishi";
        }elseif($ariza->yonalish === 'fizika-yonalishi') {
            $ariza->yonalish = "Fizika yo'nalishi";
        }elseif($ariza->yonalish === 'kimyo-yonalishi') {
            $ariza->yonalish = "Kimyo yo'nalishi";
        }elseif($ariza->yonalish === 'fizika-va-astronomiya-oqitish-metodikasi-yonalishi') {
            $ariza->yonalish = "Fizika va astronomiya o'qitish metodikasi yo'nalishi";
        }elseif($ariza->yonalish === 'ilmiy-va-metodologik-kimyo-yonalishi') {
            $ariza->yonalish = "Ilmiy va metodologik kimyo yo'nalishi";
        }elseif($ariza->yonalish === 'boshlangich-talim-nazariyasi') {
            $ariza->yonalish = "Boshlang'ich ta'lim nazariyasi";
        }elseif($ariza->yonalish === 'boshlangich-talim-metodikasi-yonalishi') {
            $ariza->yonalish = "Boshlang'ich ta'lim metodikasi yo'nalishi";
        }elseif($ariza->yonalish === 'maktabgacha-talim-metodikasi-yonalishi') {
            $ariza->yonalish = "Maktabgacha ta'lim metodikasi yo'nalishi";
        }elseif($ariza->yonalish === 'bolalar-sporti-yonalishi') {
            $ariza->yonalish = "Bolalar sporti yo'nalishi";
        }elseif($ariza->yonalish === 'umumkasbiy-va-ihtisoslik-fanlari-yonalishi') {
            $ariza->yonalish = "Umumkasbiy va ihtisoslik fanlari yo'nalishi";
        }elseif($ariza->yonalish === 'ingliz-tili-yonalishi') {
            $ariza->yonalish = "Ingliz tili yo'nalishi";
        }elseif($ariza->yonalish === 'nemis-tili-yonalishi') {
            $ariza->yonalish = "Nemis tili yo'nalishi";
        }elseif($ariza->yonalish === 'fakultetlararo-chet-tillar-yonalishi') {
            $ariza->yonalish = "Fakultetlararo chet tillar yo'nalishi";
        }elseif($ariza->yonalish === 'biologiya-yonalishi') {
            $ariza->yonalish = "Biologiya yo'nalishi";
        }elseif($ariza->yonalish === 'geografiya-yonalishi') {
            $ariza->yonalish = "Geografiya yo'nalishi";
        }elseif($ariza->yonalish === 'genetika-va-evolutsion-biologiya-yonalishi') {
            $ariza->yonalish = "Genetika va evolutsion biologiya yo'nalishi";
        }elseif($ariza->yonalish === 'informatika-va-axborot-texnoligiyalari-yonalishi') {
            $ariza->yonalish = "Informatika va axborot texnoligiyalari yo'nalishi";
        }elseif($ariza->yonalish === 'algebra-va-matematik-analiz-yonalishi') {
            $ariza->yonalish = "Algebra va matematik analiz yo'nalishi";
        }elseif($ariza->yonalish === 'matematika-oqitish-metodikasi-va-geometriya-yonalishi') {
            $ariza->yonalish = "Matematika o'qitish metodikasi va geometriya yo'nalishi";
        }elseif($ariza->yonalish === 'informatika-oqitish-metodikasi-yonalishi') {
            $ariza->yonalish = "Informatika o'qitish metodikasi yo'nalishi";
        }elseif($ariza->yonalish === 'texnologik-talim-yonalishi') {
            $ariza->yonalish = "Texnologik talim yo'nalishi";
        }elseif($ariza->yonalish === 'jismoniy-madaniyat-metodikasi-yonalishi') {
            $ariza->yonalish = "Jismoniy madaniyat metodikasi yo'nalishi";
        }elseif($ariza->yonalish === 'jismoniy-madaniyat-nazariyasi') {
            $ariza->yonalish = "Jismoniy madaniyat nazariyasi";
        }elseif($ariza->yonalish === 'tasviriy-sanat-va-dizayn-yonalishi') {
            $ariza->yonalish = "Tasviriy sanat va dizayn yo'nalishi";
        }elseif($ariza->yonalish === 'muhandislik-va-kompyuter-grafikasi-yonalishi') {
            $ariza->yonalish = "Muhandislik va kompyuter grafikasi yo'nalishi";
        }elseif($ariza->yonalish === 'musiqa-yonalishi') {
            $ariza->yonalish = "Musiqa yo'nalishi";
        }else{
            $ariza->yonalish = "Yo'nalish topilmadi!";
        }

        return $ariza;
    }


    public function adminRegisterStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard')->with('toast', "Yangi admin ro'yxatga qo'shildi!");

    }

    public function adminlar(){
            $adminlar = User::paginate(10);
         
            return  view('adminlar')->with('adminlar', $adminlar);
    }

    public function adminDelete($id)
    {
       
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->back()->with('error', 'Admin topilmadi'); // Ariza topilmadi xabarini qaytarish
        }
        
        $user->delete();
        
        return redirect()->back()->with('status', "Ro'yxatdan admin o'chirildi!");
    }

    public function pdfYuklash($request) 
    {
        $ariza = Application::where('id', $request)->first();

        // Fakultetlarni aniqlash
        if ($ariza['fakultet'] === 'gumanitar') {
            $ariza['fakultet'] = 'Gumanitar fanlar fakulteti';
        } elseif ($ariza['fakultet'] === 'pedagogika') {
            $ariza['fakultet'] = "Pedagogika fakulteti";
        }elseif ($ariza['fakultet'] === 'fizika') {
            $ariza['fakultet'] = "Fizika va kimyo fakulteti";
        }elseif ($ariza['fakultet'] === 'boshlangich') {
            $ariza['fakultet'] = "Boshlang'ich ta'lim fakulteti";
        }elseif ($ariza['fakultet'] === 'maktabgacha') {
            $ariza['fakultet'] = "Maktabgacha ta’lim fakulteti";
        }elseif ($ariza['fakultet'] === 'turizm') {
            $ariza['fakultet'] = "Turizm fakulteti";
        }elseif ($ariza['fakultet'] === 'tabiiy') {
            $ariza['fakultet'] = "Tabiiy fanlar fakulteti";
        }elseif ($ariza['fakultet'] === 'matematika') {
            $ariza['fakultet'] = "Matematika va informatika fakulteti";
        }elseif ($ariza['fakultet'] === 'sport') {
            $ariza['fakultet'] = "Sport va chaqiriqqacha harbiy ta’lim fakulteti";
        }elseif ($ariza['fakultet'] === 'sanatshunoslik') {
            $ariza['fakultet'] = "San'atshunoslik fakulteti";
        } else {
            $ariza['fakultet'] = "Fakulteti topilmadi!";
        }

        // Yo'nalishlarni aniqlash
        if ($ariza['yonalish'] === 'ozbek-tilshunosligi-yonalishi') {
            $ariza['yonalish'] = "O‘zbek tilshunosligi yo'nalishi";            
        }elseif($ariza['yonalish'] === 'ozbek-adabiyotshunosligi-yonalishi') {
            $ariza['yonalish'] = "O‘zbek adabiyotshunosligi yo'nalishi";
        }elseif($ariza['yonalish'] === 'fakultetlararo-rus-tili-yonalishi') {
            $ariza['yonalish'] = "Fakultetlararo rus tili yo'nalishi";
        }elseif($ariza['yonalish'] === 'rus-adabiyoti-va-talim-metodikasi-yonalishi') {
            $ariza['yonalish'] = "Rus adabiyoti va ta'lim metodikasi yo'nalishi";
        }elseif($ariza['yonalish'] === 'fakultetlar-aro-ijtimoiy-fanlar-yonalishi') {
            $ariza['yonalish'] = "Fakultetlar aro Ijtimoiy fanlar yo'nalishi";
        }elseif($ariza['yonalish'] === 'ozbekiston-tarixi-yonalishi') {
            $ariza['yonalish'] = "O'zbekiston tarixi yo'nalishi";
        }elseif($ariza['yonalish'] === 'jahon-tarixi-yonalishi') {
            $ariza['yonalish'] = "Jahon tarixi yo'nalishi";
        }elseif($ariza['yonalish'] === 'milliy-goya-manaviyat-asoslari-va-huquq-talimi-yonalishi') {
            $ariza['yonalish'] = "Milliy g'oya, ma'naviyat asoslari va huquq ta'limi yo'nalishi";
        }elseif($ariza['yonalish'] === 'rus-tili-va-talim-metodikasi-yonalishi') {
            $ariza['yonalish'] = "Rus tili va ta'lim metodikasi yo'nalishi";
        }elseif($ariza['yonalish'] === 'pedagogika-yonalishi') {
            $ariza['yonalish'] = "Pedagogika yo'nalishi";
        }elseif($ariza['yonalish'] === 'maktab-menejmenti-yonalishi') {
            $ariza['yonalish'] = "Maktab menejmenti yo'nalishi";
        }elseif($ariza['yonalish'] === 'psixologiya-yonalishi') {
            $ariza['yonalish'] = "Psixologiya yo'nalishi";
        }elseif($ariza['yonalish'] === 'umumiy-pedagogika-yonalishi') {
            $ariza['yonalish'] = "Umumiy pedagogika yo'nalishi";
        }elseif($ariza['yonalish'] === 'maxsus-pedagogika-yonalishi') {
            $ariza['yonalish'] = "Maxsus pedagogika yo'nalishi";
        }elseif($ariza['yonalish'] === 'fizika-yonalishi') {
            $ariza['yonalish'] = "Fizika yo'nalishi";
        }elseif($ariza['yonalish'] === 'kimyo-yonalishi') {
            $ariza['yonalish'] = "Kimyo yo'nalishi";
        }elseif($ariza['yonalish'] === 'fizika-va-astronomiya-oqitish-metodikasi-yonalishi') {
            $ariza['yonalish'] = "Fizika va astronomiya o'qitish metodikasi yo'nalishi";
        }elseif($ariza['yonalish'] === 'ilmiy-va-metodologik-kimyo-yonalishi') {
            $ariza['yonalish'] = "Ilmiy va metodologik kimyo yo'nalishi";
        }elseif($ariza['yonalish'] === 'boshlangich-talim-nazariyasi') {
            $ariza['yonalish'] = "Boshlang'ich ta'lim nazariyasi";
        }elseif($ariza['yonalish'] === 'boshlangich-talim-metodikasi-yonalishi') {
            $ariza['yonalish'] = "Boshlang'ich ta'lim metodikasi yo'nalishi";
        }elseif($ariza['yonalish'] === 'maktabgacha-talim-metodikasi-yonalishi') {
            $ariza['yonalish'] = "Maktabgacha ta'lim metodikasi yo'nalishi";
        }elseif($ariza['yonalish'] === 'bolalar-sporti-yonalishi') {
            $ariza['yonalish'] = "Bolalar sporti yo'nalishi";
        }elseif($ariza['yonalish'] === 'umumkasbiy-va-ihtisoslik-fanlari-yonalishi') {
            $ariza['yonalish'] = "Umumkasbiy va ihtisoslik fanlari yo'nalishi";
        }elseif($ariza['yonalish'] === 'ingliz-tili-yonalishi') {
            $ariza['yonalish'] = "Ingliz tili yo'nalishi";
        }elseif($ariza['yonalish'] === 'nemis-tili-yonalishi') {
            $ariza['yonalish'] = "Nemis tili yo'nalishi";
        }elseif($ariza['yonalish'] === 'fakultetlararo-chet-tillar-yonalishi') {
            $ariza['yonalish'] = "Fakultetlararo chet tillar yo'nalishi";
        }elseif($ariza['yonalish'] === 'biologiya-yonalishi') {
            $ariza['yonalish'] = "Biologiya yo'nalishi";
        }elseif($ariza['yonalish'] === 'geografiya-yonalishi') {
            $ariza['yonalish'] = "Geografiya yo'nalishi";
        }elseif($ariza['yonalish'] === 'genetika-va-evolutsion-biologiya-yonalishi') {
            $ariza['yonalish'] = "Genetika va evolutsion biologiya yo'nalishi";
        }elseif($ariza['yonalish'] === 'informatika-va-axborot-texnoligiyalari-yonalishi') {
            $ariza['yonalish'] = "Informatika va axborot texnoligiyalari yo'nalishi";
        }elseif($ariza['yonalish'] === 'algebra-va-matematik-analiz-yonalishi') {
            $ariza['yonalish'] = "Algebra va matematik analiz yo'nalishi";
        }elseif($ariza['yonalish'] === 'matematika-oqitish-metodikasi-va-geometriya-yonalishi') {
            $ariza['yonalish'] = "Matematika o'qitish metodikasi va geometriya yo'nalishi";
        }elseif($ariza['yonalish'] === 'informatika-oqitish-metodikasi-yonalishi') {
            $ariza['yonalish'] = "Informatika o'qitish metodikasi yo'nalishi";
        }elseif($ariza['yonalish'] === 'texnologik-talim-yonalishi') {
            $ariza['yonalish'] = "Texnologik talim yo'nalishi";
        }elseif($ariza['yonalish'] === 'jismoniy-madaniyat-metodikasi-yonalishi') {
            $ariza['yonalish'] = "Jismoniy madaniyat metodikasi yo'nalishi";
        }elseif($ariza['yonalish'] === 'jismoniy-madaniyat-nazariyasi') {
            $ariza['yonalish'] = "Jismoniy madaniyat nazariyasi";
        }elseif($ariza['yonalish'] === 'tasviriy-sanat-va-dizayn-yonalishi') {
            $ariza['yonalish'] = "Tasviriy sanat va dizayn yo'nalishi";
        }elseif($ariza['yonalish'] === 'muhandislik-va-kompyuter-grafikasi-yonalishi') {
            $ariza['yonalish'] = "Muhandislik va kompyuter grafikasi yo'nalishi";
        }elseif($ariza['yonalish'] === 'musiqa-yonalishi') {
            $ariza['yonalish'] = "Musiqa yo'nalishi";
        }else{
            $ariza['yonalish'] = "Yo'nalish topilmadi!";
        }

        if ($ariza['mezon'] == 'mehribonlik_uylari_tarbiyalanuvchilari') {
            $ariza['mezon'] = "“Mehribonlik uylari” tarbiyalanuvchilari, yetim va ota-ona qaramog‘idan mahrum bo‘lgan talabalar";
        } elseif($ariza['mezon'] == 'bir_oiladan') {
            $ariza['mezon'] = "Bir oiladan bakalavriat bosqichi kunduzgi ta’lim shaklida ikki yoki undan ortiq to‘lov-shartnoma asosida o‘qiyotgan oilalar farzandlari";
        } elseif($ariza['mezon'] == 'nogironligi_bor') {
            $ariza['mezon'] = "I va II guruh nogironligi bo‘lgan talabalar";
        } elseif($ariza['mezon'] == 'ijtimoiy_himoya') {
            $ariza['mezon'] =  "“Ijtimoiy himoya yagona reyestri”, “Temir daftar” va “Ayollar daftari”ga kiritilgan ijtimoiy himoyaga muhtoj oilalarning farzandlari hamda “Yoshlar daftari”da turadigan talabalar";
        } elseif($ariza['mezon'] == 'xalqaro_fan_olimpiadalari') {
            $ariza['mezon'] = "Xalqaro fan olimpiadalari, Oliy ta’lim, fan va innovatsiyalar vazirligi tomonidan o‘tkaziladigan respublika fan olimpiadalarida g‘olib bo‘lgan talabalar";
        }elseif($ariza['mezon'] == 'yil_talabasi') {
            $ariza['mezon'] = "“Yil talabasi” va “Talabalar teatr studiyalari” ko‘rik tanlovlarining respublika bosqichida g‘olib bo‘lgan talabalar";
        }elseif($ariza['mezon'] == 'otm_talabalari') {
            $ariza['mezon'] = "OTM talabalari o‘rtasida o‘tkazilgan “Zakovat” intellektual o‘yinining respublika bosqichida g‘oliblikni qo‘lga kiritgan talabalar";
        }elseif($ariza['mezon'] == 'kengash_raisi') {
            $ariza['mezon'] = "Talabalar turar joyida talabalar kengashi raisi, qavat sardori bo‘lgan talabalar";
        }

        if ($ariza['holat'] == "korib_chiqilmoqda") {
           $ariza['holat'] = "Ko'rib chiqilmoqda";
        } elseif($ariza['holat'] == "maqullandi") {
            $ariza['holat'] = "Ariza maqullangan!";
        } elseif($ariza['holat'] == "rad_etildi") {
            $ariza['holat'] = "Ariza rad etilgan!";
        }
        
        

        
        if ($ariza) {
            $data = [
                'id' => $ariza['id'],
                'fish' => $ariza['fish'],
                'created_at' => $ariza['created_at'],
                'number_generation' => $ariza['number_generation'],
                'holat' => $ariza['holat'],
                'pass_info' => $ariza['pass_info'],
                'telefon' => $ariza['telefon'],
                'fakultet' => $ariza['fakultet'],
                'yonalish' => $ariza['yonalish'],
                'kurs_nomeri' => $ariza['kurs_nomeri'],
                'guruhi' => $ariza['guruhi'],
                'mezon' => $ariza['mezon'],
                'document' => $ariza['document'],
                'message' => $ariza['message'],
                
                

               
            ];           
                       
            $pdf = PDF::loadView('pdf', ['data' => $data]);
            
            return $pdf->download('laratutorials.pdf');
        }
    
        // Handle the case when $ariza is not found
        // You can redirect or return an error message
        return redirect()->back()->with('error', 'Invalid application ID');
    }




    
}
