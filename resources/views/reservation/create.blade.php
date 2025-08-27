@extends('app')
@section('title', 'Reservasi Baru')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                @foreach ($errors->all() as $i )
                    <ul style="background-color: red">
                        <li>{{ $i }}</li>
                    </ul>
                @endforeach

                <h3 class="card-title">{{ $title ?? '' }}</h3>
                <form action="{{ route('reservation.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="guest_name" class="form-label">Nama Tamu *</label>
                                <input type="text" class="form-control" name="guest_name" placeholder="silahkan masukan nama tamu" required>
                            </div>
                            <div class="mb-3">
                                <label for="guest_phone" class="form-label">Telepon / Hp</label>
                                <input type="number" class="form-control" name="guest_phone" placeholder="silahkan masukan no telp">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Kategori Kamar *</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="">Pilih Kategori Kamar</option>
                                    @foreach ($categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nomor Kamar *</label>
                                <select name="guest_room_number" id="" class="form-select">
                                    <option value="">Pilih Nomor Kamar</option>
                                    @foreach ($categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Check-In *</label>
                                <input type="date" class="form-control" name="guest_check_in" id="checkin" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Metode Bayar *</label>
                                <select name="guest_room_number" id="" class="form-select">
                                    <option value="">Pilih Metode Bayar</option>
                                        <option value="cc">Credit Card</option>
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank Transfer</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="guest_email" class="form-label">Email *</label>
                                <input type="email" class="form-control" name="guest_email" placeholder="silahkan masukan email">
                            </div>
                            <div class="mb-3">
                                <label for="guest_qty" class="form-label">Jumlah Tamu </label>
                                <select name="" id="" class="form-select">
                                    <option value="">-- Jumlah Tamu --</option>
                                    <option value="1">1 Tamu</option>
                                    <option value="2">2 Tamu</option>
                                    <option value="3">3 Tamu</option>
                                    <option value="4">4 Tamu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="room_id" class="form-label">Nama Kamar *</label>
                                <select name="room_id" id="room_id" class="form-select">
                                    <option value="">Pilih Kamar</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="guest_note" class="form-label">Special Request / Note *</label>
                                <textarea name="guest_note" id="" class="form-control" rows=""></textarea>
                            </div>
                            <div class="mb-3">
                               <label for="" class="form-label">Check-Out *</label>
                               <input type="date" class="form-control" name="guest_check_out" id="checkout" required>
                           </div>
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">Rangkuman Pembayaran</h6>
                                    <div class="mb-3 mb-3 d-flex justify-content-between">
                                        <span>Harga Kamar (per malam)</span>
                                        <span id="roomRate">Rp. 0</span>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <span>Berapa Malam</span>
                                        <span id="totalNight">0</span>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <span>Subtotal</span>
                                        <span id="subtotal">Rp. 0</span>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between border-bottom">
                                        <span>Tax</span>
                                        <span id="tax">Rp. 0</span>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <span><strong>Grandtotal</strong></span>
                                        <span id="totalAmount"><strong>Rp. 0</strong></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                                <button class="btn btn-primary" type="button" name="simpan" id="save">Submit</button>
                                <a href="{{url()->previous()}}" class="text-muted">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
