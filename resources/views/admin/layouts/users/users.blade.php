@extends('admin.glowny')

@section('content')

     
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Uzytkownicy</h4>
                    </div>
                </div>
            </div>
           
            <div class="container-fluid">
             
                <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Wszyscy użytkownicy</h4>
                            </div>
                            <div class="table-responsive m-t-20 p-2">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nazwa użytkownika</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Akcja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users2 as $user)
                                        <tr id="row_{{$user->id}}">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user -> get_full_name() }}</td>
                                            <td>{{ $user -> email }}</td>
                                            <td>
                                            <a href="{{ route('users.show', $user -> id ) }}"><span class="btn btn-sm btn-rounded btn-success">Zobacz</span></a>

                                            <form style="display:inline-block" method="POST" action="{{ route('users.destroy', $user -> id) }}">
                                            @csrf
                                            @method('DELETE')
                                            
                                        </form>
                                        <button onclick="deleteData('{{ route('users.destroy', $user -> id) }}','{{ $user -> id }}')" type="submit" class="btn btn-sm btn-rounded btn-danger">Usuń</button>
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