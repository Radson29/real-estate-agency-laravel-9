@extends('admin.glowny')

@section('content')
 

            <div class="container-fluid">
              
                <div class="row">
                 
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                            <center class="m-t-30">
                                    <h4 class="card-title m-t-10">{{ $zapytanie ->user-> nazwa_uzytkownika }}</h4>

                            </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email  </small>
                                <h6>{{ $zapytanie -> email }}</h6> <small class="text-muted p-t-30 db">Numer telefonu</small>
                                <h6>{{ $zapytanie -> numer_telefonu }}</h6> 
                                <br/>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Nieruchomość :</label>
                                        <div class="col-md-12">
                                            <td>{{ $zapytanie -> nieruchomosci -> tytuł }}</td>
                                            <td class="mr-5">
                                                <a href="{{ route('id.nieruchomosc', $zapytanie -> nieruchomosci -> id ) }}"><span class="btn btn-sm btn-rounded btn-success">Zobacz</span></a>
                                            </td>
                                        </div>
                                    </div>
                            </div>
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Wiadomość:</label>
                                        <div class="col-md-12">
                                            {{ $zapytanie -> opis }}
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

              
            </div>
          
@endsection