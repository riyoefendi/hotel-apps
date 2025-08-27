@extends('app')
@section('title', 'Kategori Kamar')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title ?? '' }}</h3>
                    <div align="right" class="mb-3">
                        <a href="{{ route('reservation.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kamar</th>
                                <th>No Reservasi</th>
                                <th>Tamu</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $index => $data)
                                <tr>
                                    <td>{{ $index += 1 }}</td>
                                    <td>{{ $data->guest_name }}</td>
                                    <td>{{ $data->reservation_number }}</td>
                                    <td>
                                        <small>
                                            Nama : {{ $data->guest_name }}
                                            <br>
                                            Email : {{ $data->guest_email }}
                                            <br>
                                            Tlp : {{ $data->guest_phone }}
                                        </small>
                                    </td>
                                    <td>{{ $data->guest_checkin }}</td>
                                    <td>{{ $data->guest_checkout }}</td>
                                    <td>{{ $data->isReserve }}</td>
                                    <td>
                                        <a href="{{ route('reservation.edit', $data->id) }}"
                                            class="btn btn-success">Edit</a>
                                        <form action="{{ route('reservation.destroy', $data->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
