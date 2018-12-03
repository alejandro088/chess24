@extends('layouts.app')

@section('css')
    <style>
        .bg_white {
            background-color: goldenrod;
            border: 2pt;
            padding: 4px;
            color: white;
        }

        .bg_black {
            background-color: goldenrod;
            border: 2pt;
            padding: 4px;
            color: black;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <h3>Partidas: Fase de grupos</h3>
                    <table class="table">
                        @foreach($matches as $match)
                            @if($match->created_at == NULL) 
                                <tr>
                                    <td><span class="bg_white"><i class="fas fa-chess"></i></span> {{$match->white_player->nick_chess24}} - {{$match->black_player->nick_chess24}} <span class="bg_black"><i class="fas fa-chess"></i></span></td>
                                <td><a href="{{route('setResult',[$match,1])}}">Gana {{$match->white_player->nick_chess24}}</a> - <a href="{{route('setResult',[$match,3])}}">Empate</a> - <a href="{{route('setResult',[$match,2])}}">Gana {{$match->black_player->nick_chess24}}</a></td>
                                </tr>
                            @endif                        
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
