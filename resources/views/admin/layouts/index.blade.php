@extends('admin.glowny')

@section('content')


    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Panel admina</h4>
</div>

        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-3">
                <a href="{{ route('users.index') }}">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $op_uzytkownicy }}</span>
                           Liczba <br>użytkowników
                        </div>
                        <div class="tiles-progress">
                            <div class="m-t-20">
                                <div class="progress progress-sm m-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: calc(5% + <?php echo $op_uzytkownicy*8?>px);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-3">
                <a href="{{ route('Anieruchomosci.index') }}">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-warning"><i class="ion-ios7-cart"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $op_nieruchomosci }}</span>
                        Wystawione nieruchomości
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">

                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar bg-warning" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: calc(5% + <?php echo $op_nieruchomosci*8?>px);">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-3">
                <a href="{{ route('Anieruchomosci.index') }}">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $nowe_nieruchomosci }}</span>
                       Niepubliczne nieruchomości
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">

                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: calc(5% + <?php echo $nowe_nieruchomosci*8?>px) ;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-3">
            <a href="{{ route('Aagenci.index') }}">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-purple"><i class="ion-android-contacts"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{ $op_agenci }}</span>
                       Liczba aktywnych agentów
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">

                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width:calc(5% + <?php echo $op_agenci*8?>px);">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>


        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center mt-2 text-danger"> Wiadomości od użytkowników</h4>
                    </div>
                    <div class="table-responsive m-t-20 p-1">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>

                                    <th scope="col">#</th>
                                    <th scope="col">Imie</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Numer telefonu</th>
                                    <th scope="col">Nieruchomość</th>
                                    <th scope="col">Użytkownik</th>
                                    <th scope="col">Akcja</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($zapytania as $z)
                                <tr id="row_{{$z->id}}">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $z -> Imie }}</td>
                                    <td>{{ $z -> email }}</td>
                                    <td>{{ $z -> numer_telefonu }}</td>
                                    <td>{{ $z -> nieruchomosci-> tytuł }}</td>
                                    <td>{{ $z -> user-> nazwa_uzytkownika }}</td>
                                    <td>
                                        <a href="{{ route('Azapytania.show', $z -> id ) }}"><span class="btn btn-sm btn-rounded btn-success">Zobacz</span></a>
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
