@extends("template.template")

@section("content")
<div class="container">
    <h1 style="color: #566A7F;">Tambah Akun</h1>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="/book-create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="book_category_id">Kategori Buku</label>
                        <div class="col-sm-10">
                            <select name="book_category_id" id="book_category_id" class="form-control">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($book_categories as $bc)
                                    <option value="{{ $bc->id }}">{{ $bc->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul" class="form-control" id="judul">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="pengarang">Pengarang</label>
                        <div class="col-sm-10">
                            <input type="text" name="pengarang" class="form-control" id="pengarang">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="penerbit">Penerbit</label>
                        <div class="col-sm-10">
                            <input type="text" name="penerbit" class="form-control" id="penerbit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="jumlah_stok">Jumlah Stok</label>
                        <div class="col-sm-10">
                            <input type="number" name="jumlah_stok" class="form-control" id="jumlah_stok">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" name="lokasi" class="form-control" id="lokasi">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" name="gambar" class="form-control" id="gambar">
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
