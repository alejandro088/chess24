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
                <div class="card-header">Grupo {{$group->name}} - Torneo Chess24 Discord</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                        <h3>Grupo {{$group->name}}</h3>
                        
                        <table class="table">
                            
                            <tr>
                                <td>Grupo {{$group->name}}</td>
                                @php
                                    $rivals = $group->players
                                @endphp
                                @foreach($rivals as $rival)
                                    <td>{{$rival->nick_chess24}}</td>
                                @endforeach
                                <td>Total</td>                                
                            </tr>
                            
                            @php 
                                $i=1
                            @endphp
                             
                            @foreach($group->players as $player)
                                
                                <tr>
                                <td><a href="{{route('player', $player)}}">{{$player->nick_chess24}}</a></td>
                                    <td>@if($i == 1)
                                         -
                                        @else
                                        
                                            @if($player->playedWhiteWithRival($rivals[0]))
                                                <span class="bg_white"><i class="fas fa-chess"></i></span> {{$player->matchWhiteWithRival($rivals[0])}} 
                                            @else
                                                NA
                                            @endif
                                            |
                                            @if($player->playedBlackWithRival($rivals[0])) 
                                            <span class="bg_black"><i class="fas fa-chess"></i></span> {{$player->matchBlackWithRival($rivals[0])}}
                                            @else
                                                NA
                                            @endif
                                        @endif 
                                    </td>
                                    <td>@if($i == 2)
                                         -
                                        @else
                                            @if($player->playedWhiteWithRival($rivals[1]))
                                            <span class="bg_white"><i class="fas fa-chess"></i></span> {{$player->matchWhiteWithRival($rivals[1])}} 
                                            @else
                                                NA
                                            @endif
                                            |
                                            @if($player->playedBlackWithRival($rivals[1])) 
                                            <span class="bg_black"><i class="fas fa-chess"></i></span> {{$player->matchBlackWithRival($rivals[1])}}
                                            @else
                                                NA
                                            @endif
                                        @endif
                                    </td>
                                    <td>@if($i == 3)
                                         -
                                        @else
                                            @if($player->playedWhiteWithRival($rivals[2]))
                                            <span class="bg_white"><i class="fas fa-chess"></i></span> {{$player->matchWhiteWithRival($rivals[2])}} 
                                            @else
                                                NA
                                            @endif
                                            |
                                            @if($player->playedBlackWithRival($rivals[2])) 
                                            <span class="bg_black"><i class="fas fa-chess"></i></span> {{$player->matchBlackWithRival($rivals[2])}}
                                            @else
                                                NA
                                            @endif
                                        @endif
                                    </td>
                                    <td>@if($i == 4)
                                         -
                                        @else
                                            @if($player->playedWhiteWithRival($rivals[3]))
                                            <span class="bg_white"><i class="fas fa-chess"></i></span> {{$player->matchWhiteWithRival($rivals[3])}} 
                                            @else
                                                NA
                                            @endif
                                            |
                                            @if($player->playedBlackWithRival($rivals[3])) 
                                            <span class="bg_black"><i class="fas fa-chess"></i></span> {{$player->matchBlackWithRival($rivals[3])}}
                                            @else
                                                NA
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{$player->points}}</td>                                
                                </tr>
                                @php $i++ @endphp
                            @endforeach                            

                        </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
