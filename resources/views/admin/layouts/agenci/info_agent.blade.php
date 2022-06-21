@extends('admin.glowny')

@section('content')




<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Profil</h4>
        </div>

    </div>
</div>

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="{{ url($agent->zdjecie) }}" class="rounded-circle mb-5" width="150" height="150" />

                        <h4 class="card-title m-t-10">{{ $agent -> imie }}</h4>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"> <small class="text-muted">email </small>
                    <h6>{{ $agent -> email }}</h6> <small class="text-muted p-t-30 db">Telefon</small>
                    <h6>{{ $agent -> numer_telefonu }}</h6> <small class="text-muted p-t-30 db">Adres</small>
                    <h6>{{ $agent -> adres }}</h6>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Aagenci.update', $agent -> id) }}" method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label>Imie Agenta :</label>
                            <input type="text" name="imie" class="form-control" value="{{ $agent -> imie }} " required>
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" id="example-email" name="email" class="form-control" value="{{ $agent -> email }}" required>
                        </div>

                        <div class="form-group">
                            <label>Adres :</label>
                            <input type="text" id="example-email" name="adres" class="form-control" value="{{ $agent -> adres }}" required>
                        </div>
                        <div class="form-group">
                            <label>Telefon :</label>
                            <input type="number" name="numer_telefonu" class="form-control" value="{{ $agent -> numer_telefonu }}" required>
                        </div>

                        <div class="form-group">
                            <label>Zdjecie Agenta</label>
                            <div class="input-group">
                                <div class="input-group-prepend">

                                </div>
                                <div class="custom-file">
                                    <input type="file" name="zdjecie" class="form-control">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Zaktualizuj</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>




@endsection