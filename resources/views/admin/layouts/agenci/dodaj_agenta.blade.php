@extends('admin.glowny')

@section('content')


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dodaj agenta</h4>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                <form action="{{ route('Aagenci.store') }}" method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Imie</label>
                        <input type="text" name="imie" class="form-control" placeholder="Imie" required>
                    </div>
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label>Adres :</label>
                        <input type="text" id="example-email" name="adres" class="form-control" placeholder="Adres" required>
                    </div>
                    <div class="form-group">
                        <label>Numer telefonu :</label>
                        <input type="number" name="numer_telefonu" class="form-control" placeholder="numer telefonu" required>

                    </div>

                    <div class="form-group">
                        <label>Wybierz zdjecie agenta</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="zdjecie" class="custom-file-input" required>
                                <label for="zdjecie" class="custom-file-label">Wybierz zdjecie
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Dodaj</button>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection