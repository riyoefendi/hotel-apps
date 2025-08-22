@extends('app')
@section('title', 'Ubah Kamar')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title ?? '' }}</h3>
                    <form action="{{ route('room.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Kategori Kamar *</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Pilih Kategori Kamar</option>
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $edit->category_id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Kamar *</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Kamar"
                                required value="{{ $edit->name ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Harga *</label>
                            <input type="number" class="form-control" name="price" placeholder="Masukkan Harga Kamar"
                                required value="{{ $edit->price ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Fasilitas *</label>
                            <textarea name="facility" id="" cols="30" rows="10" class="form-control" required>{{ $edit->facility ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi </label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $edit->description ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Gambar *</label>
                            <input type="file" name="image_cover" required>
                            <img src="{{ asset('storage/' . $edit->image_cover) }}" alt="" width="100">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Simpan</button>
                            <a href="{{ url()->previous() }}" class="text-muted">Kembali</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
