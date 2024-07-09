@extends("template.template")

@section("content")
<div class="container">
    <h1 style="color: #566A7F;">History Peminjaman</h1>

    <div class="card card-primary">
        <div class="card-header bg-primary">
            <h1 class="text-white">History Peminjaman</h1>
        </div>

        <div class="card-body">
            @if (session()->get("role") == "admin")
            <!-- <a href="/book/tambah-data" class="btn btn-primary mt-4">Tambah Data</a> -->
            @endif

            <div class="table-responsive text-nowrap mt-3">
                <table class="table">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Buku Dipinjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Durasi Pengembalian</th>
                            @if (session()->get("role") == "admin")
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data_pinjaman as $dtp)
                        <tr class="text-center">
                            <td>{{$no++}}</td>
                            <td>{{$dtp->peminjam->name}}</td>
                            <td>{{$dtp->book->judul}}</td>
                            <td>{{$dtp->tanggal_pinjam}}</td>
                            <td>{{$dtp->tanggal_kembali}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection