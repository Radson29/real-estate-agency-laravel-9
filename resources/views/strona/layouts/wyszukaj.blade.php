@extends('strona.glowny')
@section('content')

<div class="container text-center ">
            <div class="home-search p-3">
                <div class="overlay p-3">
                    <h1 class="display-4 mb-4">
                       Wyszukiwarka nieruchomości
                    </h1>
                    <div class="search">
                        <form method="GET" action="{{ route('wyszukaj') }}"> 
                             <div class="form-row">
                                <div class="col-md-6 mb-3">
                                <label class="sr-only">Łazienki</label>
                                    <select name="łazienki" class="form-control">
                                        <option selected="true" disabled="disabled">Łazienki</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>                            
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="sr-only">Miasto</label>
                                    <input type="text" name="Miasto" class="form-control" placeholder="Miasto">
                                </div>
                            </div>
                         
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="sr-only">Łazienki</label>
                                    <select name="sypialnie" class="form-control">
                                        <option selected="true" disabled="disabled">Sypialnie</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select name="cena" class="form-control" id="type">
                                        <option selected="true" disabled="disabled">Maksymalna cena nieruchomości</option>
                                        <option value="100000">100,000 zł</option>
                                        <option value="200000">200,000 zł</option>
                                        <option value="300000">300,000 zł</option>
                                        <option value="400000">400,000 zł</option>
                                        <option value="500000">500,000 zł</option>
                                        <option value="600000">600,000 zł</option>
                                        <option value="700000">700,000 zł</option>
                                        <option value="800000">800,000 zł</option>
                                        <option value="900000">900,000 zł</option>
                                        <option value="1000000"> max 1M zł</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-block mt-4 bg-dark text-white" type="submit">Wyszukaj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 



<section id="nieruchomosci" class="py-4">
    <div class="container">
    <div class="d-flex justify-content-center">
            {{ $nieruchomosci->links()}}
        </div>
      <div class="row">

        
@if(count($nieruchomosci) > 0)
@foreach ($nieruchomosci as $s)

<div class="col-md-6 col-lg-4 mb-4">
    <div class="card listing-preview">
    <div class="embed-responsive embed-responsive-16by9">
      <img class="card-img-top embed-responsive-item" src="{{ url($s -> zdjecie_opcjonalne0) }}" alt="">
</div>
      <div class="card-img-overlay">
        <h2>
          <span class="badge badge-dark text-white">{{ $s -> cena }}zł</span>
        </h2>
      </div>
      <div class="card-body">
        <div class="listing-heading text-center">
          <h4 class="text-warning">{{ $s -> tytuł }}</h4>
          <p>
            <i class="fas fa-map-marker text-dark"></i>
            {{ $s-> Miasto }} {{ $s -> Kraj }}

        </p>
        </div>
        <hr>
        <div class="row py-2 text-dark">
          <div class="col-6">
            <i class="fas fa-th-large"></i> Pow[m²]: {{$s-> powierzchnia}}m²</div>
          <div class="col-6">
            <i class="fas fa-car"></i> Garaże: {{ $s -> garaże }}</div>
        </div>
        <div class="row py-2 text-dark">
          <div class="col-6">
            <i class="fas fa-bed"></i> Sypialnie: {{ $s -> sypialnie }}</div>
          <div class="col-6">
            <i class="fas fa-bath"></i> Łazienki: {{ $s -> łazienki }}</div>
        </div>
        <hr>
        <div class="row py-2 text-dark">
          <div class="col-12">
            <i class="fas fa-user"></i> {{ $s -> agenci-> imie }} </div>

        </div>
        <div class="row text-dark pb-2">
          <div class="col-12">
            <i class="fas fa-clock"></i> {{ $s -> created_at->diffForHumans() }}
        </div>
        </div>
        <hr>
        <a href="{{ route('id.nieruchomosc', $s->id) }}" class="btn btn-dark btn-block">Więcej informacji</a>
      </div>
    </div>
  </div>

@endforeach

      @else
      <div class="container text-center">
      <h1> Nie znaleziono dopasowanych nieruchomości</h1>
      </div>
      @endif

      </div>

      </div>
  </section>
  @endsection
