@extends('admin.glowny')

@section('content')


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Nieruchomości</h4>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            @if(count($niepublikowane_nieruchomosci) > 0)
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nowe nieruchomości</h4>
                </div>
                <div class="table-responsive m-t-20">
                    <table id="" class="table table-bordered table-responsive-lg">
                        <thead>
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">Tytuł</th>
                                <th scope="col">Cena</th>
                                <th scope="col">Agent</th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Status</th>
                                <th scope="col">Data</th>
                                <th scope="col">Akcja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($niepublikowane_nieruchomosci as $n)
                            <tr id="row_{{$n->id}}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $n -> tytuł }}</td>
                                <td>{{ $n -> cena }}</td>
                                <td>{{ $n -> agenci-> imie }}</td>
                                <td><img src="{{ url($n -> zdjecie_opcjonalne0) }}" alt="" srcset="" style="width:70px;height:50px"></td>
                                <td>@if ( $n -> Czy_opublikowany == '1' )
                                    Opublikowany
                                    @else
                                    Nie opublikowany
                                    @endif
                                </td>
                                <td>{{ $n -> created_at->diffForHumans() }}</td>

                                <td>
                                    <a href="{{ route('listings.show', $n -> id ) }}"><span class="btn btn-sm btn-rounded btn-success">Zobacz</span></a>

                                    {{-- <form style="display:inline-block" method="POST" action="{{ route('listings.destroy', $n-> id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-rounded btn-danger">Delete</button>
                                    </form> --}}
                                    <button onclick="deleteData('{{ route('listings.destroy', $n -> id) }}','{{ $n -> id }}')" type="submit" class="btn btn-sm btn-rounded btn-danger">Usuń</button>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            @endif
            @if(count($publiczne_nieruchomosci) > 0)
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Wszystkie nieruchomości</h4>
                    <a href="{{ route('Anieruchomosci.create') }}"><span class="tr btn btn-sm btn-rounded btn-info">Dodaj nieruchomość</span></a>
                </div>
                <div class="table-responsive m-t-20">
                    <table id="" class="table table-bordered table-responsive-lg">
                        <thead>
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">Tytuł</th>
                                <th scope="col">Cena</th>
                                <th scope="col">Agent</th>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Status</th>
                                <th scope="col">Data wystawienia</th>
                                <th scope="col">Akcja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publiczne_nieruchomosci as $p)
                            <tr id="row_{{$p->id}}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p -> tytuł }}</td>
                                <td>{{ $p-> cena }}</td>
                                <td>{{ $p -> agenci-> imie }}</td>
                                <td><img src="{{ url($p -> zdjecie_opcjonalne0) }}" alt="" srcset="" style="width:70px;height:50px"></td>
                                <td>@if ( $p -> Czy_opublikowany == '1' )
                                    Opublikowany
                                    @else
                                    Nie opublikowany
                                    @endif
                                </td>
                                <td>{{ $p -> created_at->diffForHumans() }}</td>

                                <td>
                                    <a href="{{ route('Anieruchomosci.show', $p-> id ) }}"><span class="btn btn-sm btn-rounded btn-success">Zobacz</span></a>

                                    {{-- <form style="display:inline-block" method="POST" action="{{ route('listings.destroy', $p -> id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-rounded btn-danger">Delete</button>
                                    </form> --}}
                                    <button onclick="deleteData('{{ route('Anieruchomosci.destroy', $p -> id) }}','{{ $p -> id }}')" type="submit" class="btn btn-sm btn-rounded btn-danger">Usuń</button>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
            @endif

        </div>
    </div>

</div>


@endsection