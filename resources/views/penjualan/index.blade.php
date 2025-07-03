@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Penjualan</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($penjualan as $item)
            @php $subtotal = $item->harga * $item->jumlah; $total += $subtotal; @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ number_format($item->harga, 2) }}</td>
                <td>{{ number_format($subtotal, 2) }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>
                    <a href="{{ route('penjualan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            {{-- Baris total harga semua penjualan dihapus --}}
        </tbody>
    </table>
</div>
@endsection