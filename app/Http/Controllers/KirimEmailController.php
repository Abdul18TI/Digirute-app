<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class KirimEmailController extends Controller
{
    //
    public function kirim()
    {
        $email = 'emailtujuan@hotmail.com';
        $data = [
            'title' => 'Pengajuan Email!',
            'url' => 'https://aantamim.id',
        ];
        Mail::to($email)->send(new SendMail($data));
        return 'Berhasil mengirim email!';
    }
}
