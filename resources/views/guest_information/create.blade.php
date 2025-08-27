@extends('app')
@section('title', 'Tambah Informasi Tamu')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        @foreach ($errors->all() as $i)
                            <ul style="background-color: red ">
                                <li>{{ $i }}</li>
                            </ul>
                        @endforeach
                    </div>
                    <h3 class="card-title">{{ $title ?? '' }}</h3>
                    <form action="{{ route('guest.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Tamu*</label>
                            <input type="text" class="form-control" name="nama_tamu" placeholder="Masukkan Nama"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Check_in*</label>
                            <input type="date" value="{{ old('check_in') }}" class="form-control" name="check_in"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Check_out*</label>
                            <input type="date" class="form-control" name="check_out" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">No Kamar*</label>
                            <select name="no_kamar" class="form-select">
                                <option value="">--Pilih No--</option>
                                <option value="A01">A01</option>
                                <option value="A02">A02</option>
                                <option value="A03">A03</option>
                                <option value="A04">A04</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email*</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">No Telpon*</label>
                            <input type="number" name="no_tel" class="form-control" required>
                        </div>
                        {{-- @dd($categories) --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Status Tamu</label>
                            <select name="status_tamu" class="form-select" required>
                                <option value="">--Pilih Status--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat*</label>
                            <textarea class="form-control" name="alamat" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kebutuhan Khusus</label><br>
                            <input type="radio" name="statusnya" id="ada" onclick="toggleinput(true)"> Ada
                            <input type="radio" name="statusnya" id="tidak"onclick="toggleinput(false)"> Tidak
                            Ada
                            <input class="form-control" style="display: none" type="text" name="kebutuhan_khusus"
                                id="kebutuhan_khusus">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        function toggleinput(show) {
            const kebutuhan_khusus = document.querySelector("#kebutuhan_khusus");

            kebutuhan_khusus.style.display = show ? 'block' : 'none';
        }
    </script>
@endsection
