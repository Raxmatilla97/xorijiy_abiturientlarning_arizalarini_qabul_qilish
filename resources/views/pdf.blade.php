<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document | {{ $data['fish']}} </title>
   </head>
   <body>

        <div class="container">
            <h3 style="text-align: center; margin-bottom:80px"><strong>OTM TTJga joylashish bo'yicha ariza matni&nbsp;&nbsp;</strong></h3>
            <p style="text-align: left;">Yuborilgan: {{$data['created_at']}}</p>
            <p style="text-align: left;">ID: {{$data['id']}} | G-{{ $data['number_generation']}}</p>
            <table style="border-collapse: collapse; width: 100%; height: 399px;" border="1">
                <tbody>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Arizachining F.I.Sh:</p>
                </td>
                <td style="width: 46.5502%; height: 18px;">{{ $data['fish']}}</td>
                </tr>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Passport seriya raqami:</p>
                </td>
                <td style="width: 46.5502%; height: 18px;">{{ $data['pass_info']}}</td>
                </tr>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Bog'lanish uchun telefon raqami:</p>
                </td>
                <td style="width: 46.5502%; height: 18px;">{{ $data['telefon']}}</td>
                </tr>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Tahsil olayotgan fakulteti:</p>
                </td>
                <td style="width: 46.5502%; height: 18px;">{{ $data['fakultet']}}</td>
                </tr>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Tahsil olayotgan yo'nalishi:</p>
                </td>
                <td style="width: 46.5502%; height: 18px;">{{ $data['yonalish']}}</td>
                </tr>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Tahsil olayotgan bosqichi:</p>
                </td>
                <td style="width: 46.5502%; height: 18px;">{{ $data['kurs_nomeri']}}</td>
                </tr>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Tahsil olayotgan guruhi:</p>
                </td>
                <td style="width: 46.5502%; height: 18px;">{{ $data['guruhi']}}</td>
                </tr>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Qaysi me&rsquo;zonga mos kelishi:</p>
                </td>
                <td style="width: 46.5502%; height: 18px;">{{ $data['mezon']}}</td>
                </tr>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Asoslovchi hujjati:</p>
                </td>
                <td style="width: 46.5502%; height: 18px; ">Fayl saytdan yuklab olinadi!</td>
                </tr>
                <tr style="height: 18px; text-align: justify;">
                <td style="width: 30.0666%; height: 18px;">
                <p class="font-normal text-gray-800 dark:text-white ">Arizaning holati:</p>
                </td>
                <td style="width: 46.5502%; height: 18px;">{{ $data['holat']}}</td>
                </tr>
                <tr style="height: 64px;">
                <td style="width: 30.0666%; height: 64px; text-align: center;">
                <p class="font-normal text-gray-800 dark:text-white " style="text-align: justify;">Arizachiga xabar qoldirish.</p>
                </td>
                <td style="width: 46.5502%; height: 64px; text-align: center;">{{ $data['message']}}</td>
                </tr>
                </tbody>
                </table>
        </div>      

    <style>
        td {
            padding-left: 20px;
            padding-right: 5px;
        }
        /* .container {
            margin-left: 0;
            margin-right: 10px;
            width: 1200px;
            margin: auto;
        } */
    </style>
   </body>
</html>