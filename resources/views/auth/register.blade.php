@extends('strona.glowny')

@section('content')
<section id="register" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header bg-dark text-warning">
              <h4>
                <i class="fas fa-user-plus"></i> Rejestracja uzytkownika</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                @csrf
                  <div class="form-group">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                  <label for="imie">Imie</label>
                  <input type="text" name="imie" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="nazwisko">Nazwisko</label>
                  <input type="text" name="nazwisko" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="nazwa_uzytkownika">Nazwa uzytkownika</label>
                  <input type="text" name="nazwa_uzytkownika" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="password2">Hasło</label>
                  <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="password">Potwierdź hasło</label>
                  <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <input type="submit" value="Rejestruj" class="btn btn-dark btn-block text-white">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
