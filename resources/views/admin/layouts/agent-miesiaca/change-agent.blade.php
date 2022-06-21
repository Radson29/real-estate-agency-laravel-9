@extends('admin.glowny')

@section('content')

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Agent miesiąca</h4>
</div>
                    </div>
            </div>
           
            <div class="container-fluid">
               
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
                @endif
                <div class="row">
                    
                    <div class="col-lg-8 col-xlg-8 col-md-8 offset-1">
                    <div class="card">
                        <form action="{{ route('Amiesiac.update', $agent-> id) }}" method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data"> 
                        @csrf
                        @method('PATCH') 
                        <div class="card-body"> 
                            <div class="form-group">
                                <label class="col-sm-12">Agent :</label>
                                <div class="col-sm-12">
                                    <select  name="id_agenta" class="form-control form-control-line" required>
                                    <option  style="display:none">Wybierz agenta :</option>
                                    @foreach($agenci as $a)
                                        <option value="{{ $a->id }}" >{{ $a->imie }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" style="margin: 0 auto;
                            display: block;" class="mt-5 btn btn-success">Zaktualizuj agenta</button>
                        </div>
                    </div>

                    </div>
                
                 
                            </div>
                        </div>
                    </div>
                 
                </div>
              
            </div>
         
@endsection