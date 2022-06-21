@extends('strona.glowny')

@section('content')
<section id="login" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
            @endif

            <div class="card-header bg-dark text-warning">
              <h4>
                <i class="fas fa-sign-in-alt"></i> Logowanie</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <label for="username">Podaj Email</label>
                  <input type="text" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="password2">Podaj hasło</label>
                  <input type="password" name="password" class="form-control" required>
                </div>

                <input type="submit" value="Zaloguj" class="btn btn-dark btn-block text-warning">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
