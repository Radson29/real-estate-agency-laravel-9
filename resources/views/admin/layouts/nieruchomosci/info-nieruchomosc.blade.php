@extends('admin.glowny')

@section('content')


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dane </h4>
        </div>

    </div>
</div>

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
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <img src="{{ url($nieruchomosc->zdjecie_opcjonalne0) }}" class="mb-5" width="300" height="150" />
                        @if($nieruchomosc->zdjecie_opcjonalne1)
                        <img src="{{ url($nieruchomosc->zdjecie_opcjonalne1) }}" class="mb-5" width="300" height="150" />
                        @endif
                        @if($nieruchomosc->zdjecie_opcjonalne2)
                        <img src="{{ url($nieruchomosc->zdjecie_opcjonalne2) }}" class="mb-5" width="300" height="150" />
                        @endif
                        @if($nieruchomosc->zdjecie_opcjonalne3)
                        <img src="{{ url($nieruchomosc->zdjecie_opcjonalne3) }}" class="mb-5" width="300" height="150" />
                        @endif
                    </center>
                </div>
                <div>
                    <hr>
                </div>

            </div>
        </div>

        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Anieruchomosci.update', $nieruchomosc -> id) }}" method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label>Tytuł :</label>
                            <input type="text" name="tytuł" class="form-control" value="{{ $nieruchomosc -> tytuł }}" placeholder="tytuł" required>
                        </div>
                        <div class="form-group">
                            <label>Cena :</label>
                            <input type="number" name="cena" class="form-control" value="{{ $nieruchomosc -> cena }}" placeholder="cena" required>
                        </div>
                        <div class="form-group">
                            <label>Powierzchnia :</label>
                            <input type="number" name="powierzchnia" class="form-control" value="{{ $nieruchomosc -> powierzchnia }}" placeholder="powierzchnia" required>
                        </div>

                        <div class="form-group">
                            <label>Sypialnie :</label>
                            <input type="number" name="sypialnie" class="form-control" value="{{ $nieruchomosc -> sypialnie }}" placeholder="sypialnie" required>
                        </div>
                        <div class="form-group">
                            <label>Łazienki:</label>
                            <input type="number" name="łazienki" class="form-control" value="{{ $nieruchomosc -> łazienki }}" placeholder="łazienki" required>
                        </div>
                        <div class="form-group">
                            <label>Garaże :</label>
                            <input type="number" name="garaże" class="form-control" value="{{ $nieruchomosc -> garaże }}" placeholder="garaże" required>
                        </div>

                        <div class="form-group">
                            <label>Miasto :</label>
                            <input type="text" name="Miasto" class="form-control" value="{{ $nieruchomosc -> Miasto }}" placeholder="miasto" required>
                        </div>
                        <div class="form-group">
                            <label>Kraj :</label>
                            <input type="text" name="Kraj" class="form-control" value="{{ $nieruchomosc -> Kraj }}" placeholder="kraj" required>
                        </div>
                        <div class="form-group">
                            <label>Opis:</label>
                            <textarea name="opis" class="form-control" rows="5" required>{{ $nieruchomosc -> opis }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>zdjecie_glowne :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input">
                                    <label for="image" class="custom-file-label">Wybierz zdjecie</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>zdjecie_opcjonalne1 :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image_one" class="custom-file-input">
                                    <label for="image_one" class="custom-file-label">Wybierz zdjecie</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>zdjecie_opcjonalne2 :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image_two" class="custom-file-input">
                                    <label for="image_two" class="custom-file-label">Wybierz zdjecie</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>zdjecie_opcjonalne3 :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image_three" class="custom-file-input">
                                    <label for="image_three" class="custom-file-label">Wybierz zdjecie</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12">Agent :</label>
                            <div class="col-sm-12">
                                <select name="id_agenta" class="form-control form-control-line" required>
                                    <option style="display:none">Wybierz Agenta</option>
                                    <option value="{{ $nieruchomosc -> agenci-> id }}" selected>{{ $nieruchomosc -> agenci-> imie}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Czy opublikować :</label>
                            <div class="col-sm-12">
                                <select name="Czy_opublikowany" class="form-control form-control-line" required>
                                    <option selected style="display:none">Wybierz</option>
                                    <option value="1" @if($nieruchomosc -> Czy_opublikowany == '1')
                                        selected
                                        @endif >Publikuj</option>

                                    <option value="0" @if($nieruchomosc -> Czy_opublikowany == '0')
                                        selected
                                        @endif
                                        >Nie publikuj</option>

                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Aktualizuj</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>




@endsection