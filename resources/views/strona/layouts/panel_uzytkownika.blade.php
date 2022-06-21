
@extends('strona.glowny')

@section('content')

<section id="showcase-inner" class="py-5 text-white">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <h1 class="display-4">Panel użytkownika</h1>

      </div>
    </div>
  </div>
</section>


<section id="dashboard" class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Witaj {{ Auth::user()->get_full_name() }} </h2>
        <p>Wykazy nieruchomości o które pytałeś</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tytuł</th>
              <th scope="col">Wiadomość</th>
              <th scope="col">Zobacz nieruchomość</th>
              <th scope="col">Usuń wiadomość</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lista as $l)
            <tr>
              <td>{{ $l ->nieruchomosci-> id }}</td>
              <td>{{ $l ->nieruchomosci-> tytuł }}</td>
              <td>{{ $l ->opis }}</td>
             
              <td>
                <a class="btn btn-dark" href="{{ route('id.nieruchomosc',$l-> nieruchomosci ->id) }}">Zobacz</a>
              </td>
              <td>
                <form style="display:inline-block" method="post" action="{{ route('kontakt.destroy', $l-> id) }} ">
                @csrf
                 @method('delete')
                 <button type="submit" class="btn btn-danger">Usuń</button>
                 <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                </form>
              </td>
            </tr>
            @endforeach
         
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection
