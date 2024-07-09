@extends("template.template")

@section("content")
<div class="container">
    <div class="row">

        <div class="col-md-6 col-xl-4">
            <a href="/book/view">
                <div class="card bg-primary text-white mb-3">
                    <div class="card-header">Jumlah Buku</div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-md-6">
                                <img width="60px" height="60px" src="{{asset('icons/file-icon.png')}}" alt="">
                            </div>
                            <div class="col-md-6">
                                <h1 class="text-white">{{$data_book}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection