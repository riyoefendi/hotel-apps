<?php

namespace App\Http\Controllers;

use App\Models\Categories;//gunakan file Categories pada folder Models
use App\Models\Guest;//gunakan file Guest pada folder Models
use Illuminate\Http\Request;//ini hanya pemanggilan default jika membuat file ini
use Illuminate\Support\Facades\Validator;//ini juga default
use Illuminate\Validation\Rule;//ini juga default

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::orderBy('id', 'desc')->get();//mengambil data id dan desc
        return view('guest_information.index', compact('guests'));//menampilkan halaman file index.blade.php pada folder view->guest_information
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Input Tamuku";//memberikan nama
        $categories = Categories::orderBy('id', 'desc')->get();//mengambil file Categories.php di folder Models
        return view("guest_information.create", compact('title', 'categories'));//menampilkan halaman create.blade.php di folder guest_information, compact('title', 'categories') → biar di view itu bisa langsung pakai $title dan $categories.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_tamu' => ['required'],//mengambil field nama_tamu
            'check_in' => ['required'],
            'check_out' => ['required'],
            'no_kamar' => ['required', Rule::in(['A01', 'A02', 'A03', 'A04'])],//dikasih pilihan pada field no_kamar
            'email' => ['required', 'email', 'unique:guests'],//wajib untuk di input dan tidak boleh sama
            'no_tel' => ['required', 'string', 'unique:guests'],//wajib untuk di input dan tidak boleh sama
            'status_tamu' => ['required'],
            'alamat' => ['required'],
            'kebutuhan_khusus' => ['nullable'],//boleh di kosongkan
        ];
        $validator = Validator::make($request->all(), $rules);//memanggil semuahnya
        if ($validator->fails()) {//jika gagal maka akan muncul error yg akan tampil
            return back()->withErrors($validator)->withInput();//withInput = data yang sudah diisi user tetap ditampilkan di form (tidak hilang).
        }
        Guest::create($request->all());//membuat data yg akan di reques Guest.php di folder Models
        return redirect()->to("guestinformation");//data tersebut akan di tampilkan dari folder guest_information
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guest = Guest::find($id);//memanggil field id
        $categories = Categories::all();//memanggil data dari file Categories.php di folder Models
        return view('guest_information.edit', compact('categories', 'guest'));//akan menampilkan file edit.blade.php di folder guest_information, compact('categories', 'guest') → supaya di view bisa langsung pakai variabel $categories dan $guest.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
