@extends("template.template")

@section("content")
<div class="container">
    <h1 style="color: #566A7F;">Tambah Akun</h1>
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
                <form action="/category-create" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-5">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Category</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="basic-default-name" />
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