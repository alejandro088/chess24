@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estadisticas - {{$player->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                            
                            <div class="col-md-8">
                                {!!$userInfo->html()!!}
                            </div>
                    </div>
                    

                    {!!$rank->html()!!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
