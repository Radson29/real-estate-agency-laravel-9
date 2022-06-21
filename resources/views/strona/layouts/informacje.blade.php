@extends('strona.glowny')
@section('content')


<!-- nieruchomosc -->
<section id="nieruchomosc" class="py-4">
  <div class="container">
    <a href="{{ route('oferty') }}" class="btn btn-dark mb-4">Wróć do nieruchomości</a>
    <div class="tyt py-4 text-warning display-5">
      {{ $nieruchomosc ->tytuł }}
    </div>
    <div class="row">
      <div class="col-md-9">

        <div class="embed-responsive embed-responsive-16by9">
          <img src="{{ url($nieruchomosc ->zdjecie_opcjonalne0) }}" alt="" class="img-main img-fluid mb-3 embed-responsive-item">
        </div>

        <div class="row mb-5 thumbs">
          @if ($nieruchomosc ->zdjecie_opcjonalne1)
          <div class="col-md-2">
            <a href="{{ url($nieruchomosc->zdjecie_opcjonalne1) }}" data-lightbox="home-images">
              <img src="{{ url($nieruchomosc ->zdjecie_opcjonalne1) }}" alt="" class="img-fluid">
            </a>
          </div>
          @endif
          @if ($nieruchomosc ->zdjecie_opcjonalne2)
          <div class="col-md-2">
            <a href="{{ url($nieruchomosc ->zdjecie_opcjonalne2) }}" data-lightbox="home-images">
              <img src="{{ url($nieruchomosc ->zdjecie_opcjonalne2) }}" alt="" class="img-fluid">
            </a>
          </div>
          @endif
          @if ($nieruchomosc ->zdjecie_opcjonalne3)
          <div class="col-md-2">
            <a href="{{ url($nieruchomosc ->zdjecie_opcjonalne3) }}" data-lightbox="home-images">
              <img src="{{ url($nieruchomosc ->zdjecie_opcjonalne3) }}" alt="" class="img-fluid">
            </a>
          </div>
          @endif

        </div>

        <div class="row mb-5 fields">
          <div class="col-md-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-dark ">
                <i class="fas fa-money-bill-alt"></i> Cena:
                <span class="float-right">{{ $nieruchomosc ->cena }}zł</span>
              </li>
              <li class="list-group-item text-dark">
                <i class="fas fa-bed"></i> Sypialnie:
                <span class="float-right">{{ $nieruchomosc ->sypialnie }}</span>
              </li>
              <li class="list-group-item text-dark">
                <i class="fas fa-bath"></i> Łazienki:
                <span class="float-right">{{ $nieruchomosc ->łazienki }}</span>
              </li>
              <li class="list-group-item text-dark">
                <i class="fas fa-car"></i> Garaże:
                <span class="float-right">{{ $nieruchomosc ->garaże }}
                </span>
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-dark">
                <i class="fas fa-th-large"></i> Powierzchnia:
                <span class="float-right">{{ $nieruchomosc ->powierzchnia }}m²</span>
              </li>
              <li class="list-group-item text-dark">
                <i class="fas fa-calendar"></i> Data wystawienia:
                <span class="float-right">{{ $nieruchomosc -> created_at->diffForHumans() }}</span>
              </li>
              <li class="list-group-item text-dark">
                <i class="fas fa-user"></i> Agent:
                <span class="float-right">{{ $nieruchomosc -> agenci-> imie }}
                </span>
              </li>
            </ul>
          </div>
        </div>


        <div class="row mb-5">
          <div class="col-md-12 font-weight-bold">

            {{ $nieruchomosc ->opis }}
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-3">
          <img class="card-img-top" src="{{ url($nieruchomosc -> agenci-> zdjecie) }}" alt="Agent">
          <div class="card-body">
            <h5 class="card-title">Pośrednik nieruchomości</h5>
            <h6 class="text-warning">{{ $nieruchomosc -> agenci-> imie }}</h6>
          </div>
        </div>
        @if (Auth::check())
        <button class="btn-dark btn btn-lg" data-toggle="modal" data-target="#inquiryModal">Zadaj pytanie</button>
        @else
        <div class="container">
          <h5 class="card-title text-danger">Zaloguj się by skontaktować się z agentem !</h5>
        </div>

        @endif
      </div>
    </div>
  </div>
</section>


<div class="modal fade" id="inquiryModal" role="dialog">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="inquiryModalLabel">Skontaktuj się z agentem</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('wyslij') }}">
          @csrf
          <input type="hidden" name="id_nieruchomosci" value="{{ $nieruchomosc ->id }}">
          <input type="hidden" name="id_uzytkownika" value="{{ Auth::id() }}">
          <div class="form-group">
            <label for="property_name" class="col-form-label">Dla Nieruchomości:</label>
            <input type="text" name="nieruchomosc" class="form-control" value="{{ $nieruchomosc ->tytuł }}" disabled="">
          </div>
          <div class="form-group">
            <label for="imie" class="col-form-label">Imie i nazwisko :</label>
            <input type="text" name="Imie" class="form-control" @auth value="{{ Auth::user()->get_full_name() }}" @endif required>
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" name="email" class="form-control" @auth value="{{ Auth::user()->email }}" @endif required>
          </div>
          <div class="form-group">
            <label for="numer_telefonu" class="col-form-label">Telefon:</label>
            <input type="text" name="numer_telefonu" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="opis" class="col-form-label">wiadomość:</label>
            <textarea name="opis" class="form-control" required></textarea>
          </div>
          <hr>
          <input type="submit" value="Wyślij" class="btn btn-block btn-dark text-warning">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection