@extends("template.template")

@section("content")
@foreach ($data_category as $dtc)


<div class="container">
    <h1 style="color: #566A7F;">Edit Akun</h1>
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
                <form action="/category-update" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$dtc->id}}">
                    <div class="row mb-5">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Category</label>
                        <div class="col-sm-10">
                            <input value="{{$dtc->name}}" type="text" name="name" class="form-control" id="basic-default-name" />
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
<script>
    function limitPasswordDisplay(input, maxLength) {
        // Mengambil nilai input password
        var password = input.value;

        // Mengatur nilai input password dengan mengambil hanya 5 karakter pertama
        input.value = password.slice(0, maxLength);
    }
</script>
@endforeach
@endsection