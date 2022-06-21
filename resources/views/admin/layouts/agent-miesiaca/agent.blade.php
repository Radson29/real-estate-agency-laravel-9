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
                    @if($agent)
                    <a  href="{{ route('Amiesiac.show', $agent->id ) }}"><span style="top:64px;z-index:999" class="tr btn btn-sm btn-rounded btn-info">Zmień agenta</span></a>
                    
                            <div class="card-body">
                                <center class="m-t-30"> 
                                    
                                    @if($agent)
                                    <img src="{{ url($agent->agenci->zdjecie) }}" class="rounded-circle mb-5" width="150" height="150" />
                                    @endif
                                    <h4 class="card-title m-t-10">{{ $agent->agenci-> imie }}</h4>
                                    
                                    
                                </center>
                            </div>
                
                                <hr>
                            <div class="card-body"> 
                                    <small class="text-muted">Email </small>
                                    <h6>{{ $agent->agenci-> email }}</h6> <small class="text-muted p-t-30 db">Numer_telefonu</small>
                                    <h6>{{ $agent->agenci-> numer_telefonu }}</h6> <small class="text-muted p-t-30 db">Adres</small>
                                    <h6>{{ $agent->agenci-> adres }}</h6>
                            </div>
                                
                            
                            @else
                            <form action="{{ route('Amiesiac.store') }}" method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data"> 
                            @csrf
                            <div class="card-body"> 
                                <div class="form-group">
                                        <label class="col-sm-12">Agent :</label>
                                    <div class="col-sm-12">
                                        <select  name="id_agenta" class="form-control form-control-line" required>
                                        <option selected style="display:none">Wybierz agenta</option>
                                        @foreach($agenci as $a)
                                            <option value="{{ $a->id }}" >{{ $a->imie }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" style="margin: 0 auto;
                                display: block;" class="mt-5 btn btn-success">Dodaj</button>
                            </div>

                        @endif
                    </div>

                    </div>
               
                 
                            </div>
                        </div>
                    </div>
                   
                </div>
               
            </div>
          
@endsection