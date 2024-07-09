@extends("template.template")

@section("content")
<div class="container">
    <h1 style="color: #566A7F;">Tambah Pinjaman Buku</h1>
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
                <form action="/tambah-pinjaman" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="peminjam_id" value=" {{$data_peminjam->id}}">
                    <div class="row mb-5">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Judul Buku</label>
                        <div class="col-sm-10">

                            <select name="book_id" id="book_id" class="form-control">
                                <option value="">-- Pilih Buku --</option>
                                @foreach ($data_book as $dtb)
                                <option value="{{$dtb->id}}">{{$dtb->judul}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_pinjam" class="form-control" id="basic-default-name" />
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal Kembali</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_kembali" class="form-control" id="basic-default-name" />
                        </div>
                    </div>



                    <div class="d-flex justify-content-end">

                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection