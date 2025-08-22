@extends('app')
@section('title', 'Ubah Kategori Kamar')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title ?? '' }}</h3>
                    <form action="{{ route('categories.update', $edit->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Nama *</label>
                            <input type="text" class="form-control"
                            name="name" placeholder="Masukkan Nama"
                            required value="{{$edit->name ?? ''}}">
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
