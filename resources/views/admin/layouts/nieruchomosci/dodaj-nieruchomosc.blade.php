@extends('admin.glowny')

@section('content')


    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dodaj nieruchomość</h4>
            </div>
        </div>
    </div>
   
    <div class="container-fluid">
       
        <div class="row justify-content-md-center">
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
                    <form action="{{ route('Anieruchomosci.store') }}" method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data"> 
                        @csrf
                        
                        <div class="form-group">
                            <label>Tytuł :</label>
                            <input type="text" name="tytuł" class="form-control" value="{{ old('tytuł') }}" placeholder="Tytuł" required>
                        </div>
                        <div class="form-group">
                            <label>Cena :</label>
                            <input type="number" name="cena" class="form-control" value="{{ old('cena') }}"  placeholder="Cena" required>
                        </div>
                        <div class="form-group">
                            <label>Powierzchnia :</label>
                            <input type="number" name="powierzchnia" class="form-control" value="{{ old('powierzchnia') }}"  placeholder="Powierzchnia" required>
                        </div>
                        <div class="form-group">
                            <label>Sypialnie:</label>
                            <input type="number" name="sypialnie" class="form-control" value="{{ old('sypialnie') }}" placeholder="Sypialnie" required>
                        </div>                        
                        <div class="form-group">
                            <label>Łazienki :</label>
                            <input type="number" name="łazienki" class="form-control" value="{{ old('łazienki') }}" placeholder="Łazienki" required>
                        </div>
  
                        <div class="form-group">
                            <label>Garaże :</label>
                            <input type="number" name="garaże" class="form-control"  value="{{ old('garaże') }}" placeholder="Garaże" required>
                        </div>
                          
                        <div class="form-group">
                            <label>Miasto :</label>
                            <input type="text" name="Miasto" class="form-control"  value="{{ old('Miasto') }}" placeholder="Miasto" required>
                        </div>                        
                        <div class="form-group">
                            <label>Kraj :</label>
                            <input type="text" name="Kraj" class="form-control"  value="{{ old('Kraj') }}" placeholder="Kraj" required>
                        </div>
                        <div class="form-group">
                            <label>Opis :</label>
                            <textarea name="opis" class="form-control" rows="5" required>{{ old('opis') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Zdjecie główne :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="zdjecie_opcjonalne0" class="custom-file-input">
                                <label for="image" class="custom-file-label">Wybierz</label>
                                
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Zdjecie opcjonalne 1:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="zdjecie_opcjonalne1" class="custom-file-input">
                                <label for="image_one" class="custom-file-label">Wybierz</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Zdjecie opcjonalne 2 :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="zdjecie_opcjonalne2" class="custom-file-input">
                                <label for="image_two" class="custom-file-label">Wybierz</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Zdjecie opcjonalne 3:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="zdjecie_opcjonalne3" class="custom-file-input">
                                <label for="image_three" class="custom-file-label">Wybierz</label>
                                </div>
                            </div>
                        </div>
                      

                        <div class="form-group">
                            <label class="col-sm-12">Agent :</label>
                            <div class="col-sm-12">
                                <select  name="id_agenta" class="form-control form-control-line" required>
                                <option selected style="display:none">Wybierz Agenta</option>
                                @foreach($agenci as $a)
                                    <option value="{{ $a->id }}" >{{ $a->imie }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Czy opublikować :</label>
                            <div class="col-sm-12">
                                <select  name="Czy_opublikowany" class="form-control form-control-line"  required>
                                <option selected style="display:none">Wybierz</option>
                                    <option @if (old('Czy_opublikowany') == "1") {{ 'selected' }} @endif value="1">Publikuj</option>
                                    <option @if (old('Czy_opublikowany') == "0") {{ 'selected' }} @endif  value="0">Nie publikuj</option>
                                </select>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-success">Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
      
    </div>

@endsection