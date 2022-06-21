@extends('admin.glowny')

@section('content')


<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Wszyscy agenci</h4>
                    <a href="{{ route('Aagenci.create') }}"><span class="tr btn btn-sm btn-rounded btn-info">Dodaj agenta</span></a>
                </div>
                <div class="table-responsive m-t-20">
                    <table class="table table-bordered table-responsive-lg">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Imie</th>
                                <th scope="col">Email</th>
                                <th scope="col">Kontakt</th>
                                <th scope="col">zdjecie</th>
                                <th scope="col">Akcja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agenci as $a)
                            <tr id="row_{{$a->id}}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $a -> imie }}</td>
                                <td>{{ $a -> email }}</td>
                                <td>{{ $a -> numer_telefonu }}</td>
                                <td>{{ $a -> adres }}</td>
                                <td>
                                    <a href="{{ route('Aagenci.show', $a -> id ) }}"><span class="btn btn-sm btn-rounded btn-success">Zobacz</span></a>

                                    <form style="display:inline-block" method="POST" action="{{ route('Aagenci.destroy', $a -> id) }}">
                                        @csrf
                                        @method('DELETE')

                                    </form>
                                    <button onclick="deleteData('{{ route('Aagenci.destroy', $a -> id) }}','{{ $a-> id }}')" type="submit" class="btn btn-sm btn-rounded btn-danger">Usuń</button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection