

<!-- Work -->
<section id="work" class="bg-dark text-white text-center">
    <h2 class="display-4">Sprawdź naszą baze nieruchomości !</h2>
    <hr>
<a href="{{ route('listings') }}" class="btn btn-warning text-white btn-lg">Zobacz nasze nieruchomości</a>
</section>

<!-- Team -->
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

{{-- @endsection --}}

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
