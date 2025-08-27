<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations; //menngunakan file Reservation.php di folder Models
use App\Models\Rooms; //menggunakan file Rooms.php di folder Models
use App\Models\Categories; //menggunakan file Categories.php di folder Models

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Reservations::orderBy('id', 'desc')->get(); //mengambil file Reservations di foler Models untuk mengambil id dan desc
        $title = "Data Reservasiku"; //menamai judul
        return view('reservation.index', compact('datas', 'title')); //menampilkan file index.blade.php di folder reservation dan dikirim ke datas & title
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get(); //mengambil file Categories.php di folder Models
        return view('reservation.create', compact('categories')); //menampilkan file create.blade.php di folder reservation dan di kirim ke folder categories
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'guest_name' => 'required',
                'guest_email' => 'required|email',
                'guest_phone' => 'required',
                'guest_note' => 'required',
                'guest_room_number' => 'required',
                'guest_checkin' => 'required|data',
                'guest_checkout' => 'required|data|after:checkin',
                'room_id' => 'required',

            ]);
            $create = Reservations::create($data);
            return response()
                ->json(
                    ['status' => 'success', 'massage' => 'Reservasi create success', 'data' => $create],
                    201
                );
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'massage' => 'Validation error',
                'error' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'massage' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
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
        //
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

    public function getRoomByCategory($id_category)
    {
        try {
            $rooms = Rooms::where('category_id', $id_category)->get();
            return response()->json(['data' => $rooms, 'message' => 'Fetch Success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Errrorrrrr', 'error' => $th->getMessage()]);
        }
    }
}
