@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cuadro principal - Torneo Chess24 Discord</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($groups as $group)
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
                                        
                                        {{$player->matchWhiteWithRival($rivals[0])}} | {{$player->matchBlackWithRival($rivals[0])}}
                                        @endif 
                                    </td>
                                    <td>@if($i == 2)
                                         -
                                        @else
                                        {{$player->matchWhiteWithRival($rivals[1])}} | {{$player->matchBlackWithRival($rivals[1])}}
                                        @endif
                                    </td>
                                    <td>@if($i == 3)
                                         -
                                        @else
                                        {{$player->matchWhiteWithRival($rivals[2])}} | {{$player->matchBlackWithRival($rivals[2])}}
                                        @endif
                                    </td>
                                    <td>@if($i == 4)
                                         -
                                        @else
                                        {{$player->matchWhiteWithRival($rivals[3])}} | {{$player->matchBlackWithRival($rivals[3])}}
                                        @endif
                                    </td>
                                    <td>{{$player->points}}</td>                                
                                </tr>
                                @php $i++ @endphp
                            @endforeach                            

                        </table>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
