@extends('admin.glowny')

@section('content')



<div class="container-fluid">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br />
    @endif
    <div class="row">

        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card-body"> <small class="text-muted">Adres email </small>
                <h6>{{ $user -> email}}</h6>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.update', $user -> id) }}" method="POST" class="form-horizontal m-t-30">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label class="col-md-12">Imie</label>
                        <div class="col-md-12">
                            <input type="text" name="imie" value="{{ $user -> imie}}" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Nazwisko</label>
                        <div class="col-md-12">
                            <input type="text" name="nazwisko" value="{{ $user -> nazwisko}}" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Nazwa użytkownika</label>
                        <div class="col-md-12">
                            <input type="text" name="nazwa_uzytkownika" value="{{ $user -> nazwa_uzytkownika}}" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" name="email" value="{{ $user -> email}}" class="form-control form-control-line" name="example-email" id="example-email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">Zaktualizuj profil</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

</div>

@endsection