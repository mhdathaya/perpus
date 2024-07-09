@extends("template.template")

@section("content")
<div class="container">
    <h1 style="color: #566A7F;">Book Category</h1>

    <div class="card card-primary">
        <div class="card-header bg-primary">
            <h1 class="text-white">Book Category</h1>
        </div>

        <div class="card-body">
            @if (session()->get("role") == "admin")
            <a href="/category/tambah-data" class="btn btn-primary mt-4">Tambah Data</a>
            @endif

            <div class="table-responsive text-nowrap mt-3">
                <table class="table">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Category</th>

                            @if (session()->get("role") == "admin")
                            <th>Aksi</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data_category as $dtc)
                        <tr class="text-center">
                            <td>{{$no++}}</td>
                            <td>{{$dtc->name}}</td>

                            @if (session()->get("role") == "admin")
                            <td>

                                <a href="/category/update-index/{{$dtc->id}}" class="btn btn-warning mb-2">Update</a>
                                <a href="/category-delete/{{$dtc->id}}" class="btn btn-danger mb-2">Hapus</a>
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