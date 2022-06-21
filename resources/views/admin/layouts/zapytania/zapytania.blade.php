@extends('admin.glowny')

@section('content')

      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Wiadomości od użytkowników</h4>
                    </div>
                </div>
            </div>
         
            <div class="container-fluid">
          
                <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Wszystkie wiadomości</h4>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>

                                            <th scope="col">#</th>
                                            <th scope="col">Imie</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Numer telefonu</th>
                                            <th scope="col">Nieruchomosc</th>
                                            <th scope="col">Uzytkownik</th>
                                            <th scope="col">Akcja</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($zapytania as $zapytanie)
                                        <tr id="row_{{$zapytanie->id}}">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $zapytanie -> Imie }}</td>
                                            <td>{{ $zapytanie -> email }}</td>
                                            <td>{{ $zapytanie -> numer_telefonu }}</td>
                                            <td>{{ $zapytanie -> nieruchomosci-> tytuł }}</td>
                                            <td>{{ $zapytanie -> user-> nazwa_uzytkownika }}</td>
                                            <td>
                                                <a href="{{ route('Azapytania.show', $zapytanie -> id ) }}"><span class="btn btn-sm btn-rounded btn-success">Zobacz</span></a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                 {{-- Pagination --}}
                                <div class="d-flex justify-content-center py-5 ">
                                   {{$zapytania->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
          

        
@endsection