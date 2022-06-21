@extends('strona.glowny')

 @section('content')

 <section id="showcase">
    <div class="container text-center">
        <div class="home-search p-5">
            <div class="overlay p-5">
    <h1 class="display-5  mt-5 text-white font-weight-bold">
      Witaj w naszym biurze pośrednictwa nieruchomości<br>Zapoznaj się z naszymi ofertami
    </h1>
</div>
        </div>
    </div>
</section>


    <section id="listings" class="py-5">
        <div class="container">
            <h3 class="text-center mb-3 text-warning">Najnowsze dodane nieruchomości</h3>
            <div class="row">
          
                @foreach ($najnowsze as $n)

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card listing-preview">
                    <div class="embed-responsive embed-responsive-16by9">
                      <img class="card-img-top embed-responsive-item" src="{{ url($n -> zdjecie_opcjonalne0) }}" alt="">
</div>
                      <div class="card-img-overlay">
                        <h2>
                          <span class="badge badge-dark text-white">{{ $n -> cena }}zł</span>
                        </h2>
                      </div>
                      <div class="card-body">
                        <div class="listing-heading text-center">
                          <h4 class="text-warning">{{ $n -> tytuł }}</h4>
                          <p>
                            <i class="fas fa-map-marker text-dark"></i>
                            {{ $n -> Miasto }} {{ $n -> Kraj }}

                        </p>
                        </div>
                        <hr>
                        <div class="row py-2 text-dark">
                          <div class="col-6">
                            <i class="fas fa-th-large"></i> Pow[m²]: {{$n-> powierzchnia}}m²</div>
                          <div class="col-6">
                            <i class="fas fa-car"></i> Garaże: {{ $n -> garaże }}</div>
                        </div>
                        <div class="row py-2 text-dark">
                          <div class="col-6">
                            <i class="fas fa-bed"></i> Sypialnie: {{ $n -> sypialnie }}</div>
                          <div class="col-6">
                            <i class="fas fa-bath"></i> Łazienki: {{ $n -> łazienki }}</div>
                        </div>
                        <hr>
                        <div class="row py-2 text-dark">
                          <div class="col-12">
                            <i class="fas fa-user"></i> {{ $n -> agenci-> imie }} </div>

                        </div>
                        <div class="row text-dark pb-2">
                          <div class="col-12">
                            <i class="fas fa-clock"></i> {{ $n -> created_at->diffForHumans() }}
                        </div>
                        </div>
                        <hr>
                        <a href="{{ route('id.nieruchomosc', $n->id) }}" class="btn btn-dark btn-block">Więcej informacji</a>
                      </div>
                    </div>
                  </div>

                @endforeach


            </div>
        </div>
    </section>
    <div class="text-center pb-4 text-warning">
        <h2>To dla Ciebie możemy zrobić</h2>
    </div>
    <section id="services" class="py-5 bg-warning text-white">
        <div class="container">

            <div class="row text-center">
                <div class="col-md-4">
                    <i class="fas fa-comment fa-4x mr-4"></i>
                    <hr>
                    <h3>Usługi doradcze</h3>
                    <p>Usługi konsultingowo-doradcze na rynku nieruchomości, zaliczane są do usług profesjonalnych. Doradztwo w zakresie wiedzy i doświadczenia w branży nieruchomościowej, możemy określić jako część consultingu.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-home fa-4x mr-4"></i>
                    <hr>
                    <h3>Zarządzanie nieruchomościami</h3>
                    <p>Pomagamy w opracowaniu oraz wdrażaniu koncepcji działań, które podnoszą wartość nieruchomości.
                        Nowym inwestorom na rynku nieruchomości doradzamy i dzielimy się naszą wiedzą i doświadczeniem.
                       </p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-suitcase fa-4x mr-4"></i>
                    <hr>
                    <h3>Lorem</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure consequatur veritatis et est sapiente. Earum maxime odio quod recusandae iusto?</p>
                </div>
            </div>
        </div>
    </section>

{{-- ------------------------------Tu jest przerwa--------------------- --}}
    <section id="work" class="bg-dark text-white text-center">
        <h2 class="display-4">Sprawdź naszą baze nieruchomości !</h2>
        <hr>
    <a href="{{ route('oferty') }}" class="btn btn-warning text-white btn-lg">Zobacz nasze nieruchomości</a>
    </section>

    <section id="team" class="py-5">
    <div class="container">
      <h2 class="text-center">Nasi agenci</h2>
      <div class="row text-center">

        @foreach ($agenci as $a)

        <div class="col-md-4">
          <img src="{{ url($a -> zdjecie) }}" alt="" class="rounded-circle mb-3">
          <h4>{{ $a -> imie }}</h4>
          <p class="text-success">
            <i class="fas fa-award text-success mb-3"></i> Agent</p>
          <hr>
          <p>
            <i class="fas fa-phone"></i> {{ $a -> numer_telefonu }}</p>
          <p>
            <i class="fas fa-envelope-open"></i> {{ $a -> email }}</p>
        </div>
        @endforeach
      </div>
    </div>
    </section>



    <div class="container ">
        <div class="col-md-4 center">
        @if($s)
        <div class="card bg-dark">
            <img class="card-img-top" src="{{ url($s -> agenci-> zdjecie) }}" alt="Agent miesiaca">
            <div class="card-body">
            <h5 class="card-title text-white">Agent miesiąca</h5>
            <h6 class="text-white">{{ $s ->agenci-> imie}}</h6>
            <p class="card-text">
            </p>
            </div>
        </div>
        @endif
    </div>
        </div>


@endsection

