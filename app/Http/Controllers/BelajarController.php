<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // menggunakan data dari file User di folder Models

class BelajarController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get(); // memanggil $user untuk field id dan desc
        return view('belajar', compact('users'));// lalu di return memanggil file belajar.blade.php
    }
    public function getCallName()
    {
        return $this->callName();
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function kurang()
    {
        return view('kurang');
    }

    public function storeTambah(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));
    }

    public function storeKurang(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 - $angka2;
        return view('kurang', compact('jumlah'));
    }
}
