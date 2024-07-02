<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreapplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fish' => 'required|min:5|max:50',
            'telefon' => [
                'required',
                Rule::unique('applications')->whereNull('deleted_at'),
                'min:4',
                'max:18',
            ],
            'passport_number' => [
                'required',
                Rule::unique('applications')->whereNull('deleted_at'),
                'min:2',
                'max:25',
            ],
            'passport_seriya' => 'required|min:4|max:25',
            'passport_berilgan_sana' => 'required|min:1|max:10',
            'passport_kim_bergan' => 'required|min:3|max:100',
            'father_about' => 'required|min:5|max:500',
            'mather_about' => 'required|min:5|max:500',
            'about_health' => 'required|min:5|max:500',
            'residence_to_passport' => 'required',
            'passport_file_upload' => 'required|file|mimes:pdf,jpg,png,doc,docx,pdf|max:2048',
            'ignition_code' => 'required',
            'ignition_name' => 'required',
            'educational_form' => 'required',
            'gender' => 'required',
            'education_level' => 'required',
            'education_level_file' => 'required|file|mimes:pdf,jpg,png,doc,docx,pdf|max:2048',
            'lang_prompt' => 'required',
            'brith_day' => 'required',
            'brith_moth' => 'required',
            'brith_year' => 'required',
            'passport_place_info' => 'required'


        ];
    }
    public function messages()
    {

        return [

            // Familya ism sharif uchun validatsiya messaglari
            'fish.required' => "Familya ism sharifingizni yozishingiz kerak.",
            'fish.min' => "Familya ism sharifingizni to'liq yozishingiz kerak.",
            'fish.max' => "Familya ism sharifingiz shunchalik uzunmi? 😒",

            // Telefon ma'lumoti uchun validatsiya messaglari
            'telefon.required' => "Shaxsiy telefon raqamingizni yozishingiz kerak.",
            'telefon.min' => "Shaxsiy telefon raqamingizni to'liq yozishingiz kerak.",
            'telefon.max' => "Shaxsiy telefon raqamingiz shunchalik uzunmi? 😒",
            'telefon.unique' => "Bu telefon raqami bo'yicha ariza qoldirilgan!",

            // Passport number validation messages
            'passport_number.required' => "Pasport raqamini kiritishingiz kerak.",
            'passport_number.unique' => "Bu pasport raqami allaqachon mavjud.",
            'passport_number.min' => "Pasport raqami kamida 2 ta belgidan iborat bo'lishi kerak.",
            'passport_number.max' => "Pasport raqami 25 ta belgidan oshmasligi kerak.",

            // Passport series validation messages
            'passport_seriya.required' => "Pasport seriyasini kiritishingiz kerak.",
            'passport_seriya.min' => "Pasport seriyasi kamida 4 ta belgidan iborat bo'lishi kerak.",
            'passport_seriya.max' => "Pasport seriyasi 25 ta belgidan oshmasligi kerak.",

            // Passport issue date validation messages
            'passport_berilgan_sana.required' => "Pasport berilgan sanasini kiritishingiz kerak.",
            'passport_berilgan_sana.min' => "Pasport berilgan sanasi kamida 1 ta belgidan iborat bo'lishi kerak.",
            'passport_berilgan_sana.max' => "Pasport berilgan sanasi 10 ta belgidan oshmasligi kerak.",

            // Passport issued by validation messages
            'passport_kim_bergan.required' => "Pasport kim tomonidan berilganligini kiritishingiz kerak.",
            'passport_kim_bergan.min' => "Pasport kim tomonidan berilganligi kamida 3 ta belgidan iborat bo'lishi kerak.",
            'passport_kim_bergan.max' => "Pasport kim tomonidan berilganligi 100 ta belgidan oshmasligi kerak.",

            // Father's information validation messages
            'father_about.required' => "Otangiz haqidagi ma'lumotlarini kiritishingiz kerak.",
            'father_about.min' => "Otangiz haqidagi ma'lumotlar kamida 5 ta belgidan iborat bo'lishi kerak.",
            'father_about.max' => "Otangiz haqidagi ma'lumotlar 500 ta belgidan oshmasligi kerak.",

            // Mother's information validation messages
            'mather_about.required' => "Onangiz haqidagi ma'lumotlarini kiritishingiz kerak.",
            'mather_about.min' => "Onangiz haqidagi ma'lumotlar kamida 5 ta belgidan iborat bo'lishi kerak.",
            'mather_about.max' => "Onangiz haqidagi ma'lumotlar 500 ta belgidan oshmasligi kerak.",

            // Health information validation messages
            'about_health.required' => "Sog'lig'ingiz haqida ma'lumotlarni kiritishingiz kerak.",
            'about_health.min' => "Sog'lig'ingiz haqida ma'lumotlar kamida 5 ta belgidan iborat bo'lishi kerak.",
            'about_health.max' => "Sog'lig'ingiz haqida ma'lumotlar 500 ta belgidan oshmasligi kerak.",

            // Residence information validation messages
            'residence_to_passport.required' => "Yashash joyi haqida ma'lumotlarni kiritishingiz kerak.",

            // Passport file upload validation messages
            'passport_file_upload.required' => "Pasport faylini yuklashingiz kerak.",
            'passport_file_upload.file' => "Pasport fayli bo'lishi kerak.",
            'passport_file_upload.max' => "Fayl hajmi :max kb dan kotta bo'lmasligi kerak",
            'passport_file_upload.mimes' => "Fayl formati quyidagilardan iborat bo'lishi kerak! Namuna: :values",

            // Ignition code validation messages
            'ignition_code.required' => "Ta'lim shrifti kodini kiritishingiz kerak.",

            // Educational form validation messages
            'educational_form.required' => "Ta'lim shaklini kiritishingiz kerak.",

            // Passport place information validation messages
            'passport_place_info.required' => "Pasport joyi haqida ma'lumotlarni kiritishingiz kerak.",

            // Gender validation messages
            'gender.required' => "Jinsingizni kiritishingiz kerak.",

            // Education level validation messages
            'education_level.required' => "Ta'lim darajasini kiritishingiz kerak.",

            // Education level file upload validation messages
            'education_level_file.required' => "Ta'lim darajasi faylini yuklashingiz kerak.",
            'education_level_file.file' => "Ta'lim darajasi fayli bo'lishi kerak.",
            'education_level_file.max' => "Fayl hajmi :max kb dan kotta bo'lmasligi kerak",
            'education_level_file.mimes' => "Fayl formati quyidagilardan iborat bo'lishi kerak! Namuna: :values",

            // Lang prompt  validation messages
            'lang_prompt.required' => "Suxbatni qaysi tilda olib borilishini tanlashingiz kerak.",

               // Lang prompt  validation messages
            'ignition_name.required' => "Ta'lim yo'nalish nomini yozishingiz kerak.",

            'brith_day.required' => "Tug'ulgan kunizni yozishingiz kerak.",
            'brith_moth.required' => "Tug'ulgan oyizni tanlashingiz kerak.",
            'brith_year.required' => "Tug'ulgan yilingizni tanlashingiz kerak.",
        ];
    }
}
