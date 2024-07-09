@extends("template.template")

@section("content")
<div class="container">
    <h1 style="color: #566A7F;">Book</h1>

    <div class="card card-primary">
        <div class="card-header bg-primary">
            <h1 class="text-white">Book</h1>
        </div>

        <div class="card-body">
            @if (session()->get("role") == "admin")
            <a href="/book/tambah-data" class="btn btn-primary mt-4">Tambah Data</a>
            @endif

            <div class="table-responsive text-nowrap mt-3">
                <table class="table">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Lokasi</th>
                            <th>Jumlah Stok</th>
                            <th>Gambar</th>
                            @if (session()->get("role") == "admin")
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data_book as $dtb)
                        <tr class="text-center">
                            <td>{{$no++}}</td>
                            <td>{{$dtb->judul}}</td>
                            <td>{{$dtb->book_category->name}}</td>
                            <td>{{$dtb->pengarang}}</td>
                            <td>{{$dtb->lokasi}}</td>
                            <td>{{$dtb->jumlah_stok}}</td>
                            <td>
                                <img src="{{ asset('storage/' . $dtb->gambar) }}" alt="Gambar" style="width: 100px; height: 100px;">
                            </td>
                            @if (session()->get("role") == "admin")
                            <td>
                                <a href="/book/update-index/{{$dtb->id}}" class="btn btn-warning mb-2">Update</a>
                                <a href="/book-delete/{{$dtb->id}}" class="btn btn-danger mb-2">Hapus</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
