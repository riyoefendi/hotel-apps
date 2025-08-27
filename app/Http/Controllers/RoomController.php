<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Rooms;
use App\Models\Categories;
use PHPStan\PhpDocParser\Ast\PhpDoc\PureUnlessCallableIsImpureTagValueNode;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ORM (Object relation model)
        // prisma js
        // sequilize js dll
        $datas = Rooms::with('category')->orderBy('id', 'desc')->get();
        $title = "Data Kamar";
        return view('room.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        $title = "Tambah Kamar";
        return view('room.create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'price'         => $request->price,
            'facility'      => $request->facility,
            'description'   => $request->description,
        ];

        // $request->file('image_cover')
        // jika gambar sudah ada
        if ($request->hasFile('image_cover')) {
            $data['image_cover'] = $request->file('image_cover')->store("rooms", "public");
        }

        Rooms::create($data);
        return redirect()->to('room');
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
        $edit = Rooms::find($id);
        $categories = Categories::get();
        $title = "Ubah Data Kamar";
        return view('room.edit', compact('edit', 'title', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'price'         => $request->price,
            'facility'      => $request->facility,
            'description'   => $request->description,
        ];

        $room = Rooms::find($id);

        if ($request->hasFile('image_cover')) {
            if ($room->image_cover && Storage::disk('public')->exists($room->image_cover)) {
                Storage::disk('public')->delete($room->image_cover);
            }

            $data['image_cover'] = $request->file('image_cover')->store('rooms', 'public');
        }

        $room->update($data);
        return redirect()->to('room');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Rooms::find($id);
        if ($room->image_cover && Storage::disk('public')->exists($room->image_cover)) {
            Storage::disk('public')->delete($room->image_cover);
        }

        $room->delete();
        return redirect()->to('room');
    }
}
