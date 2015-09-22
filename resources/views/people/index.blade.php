@extends('layouts.base')

@section('content')
    <div class="wrapper">

        @if(count($users) > 0)
            <!-- people-block -->
            <div class="people-block" >
                <h2 class="home-block-heading"><span>ИГРОКИ</span></h2>
                <div class="one-third-thumbs clearfix" >
                    <table>
                        <thead>
                            <tr>
                                <th>Имя игрока</th>
                                <th>Расса</th>
                                <th>Класс</th>
                                <th>Фракция</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->username }}
                                    </td>
                                    <td>
                                        <img alt='' src='/img/races/{{ $user->game_race_id }}_{{ $user->gender }}.jpg' title="{{ $user->gameRace->race_name }}" class='avatar avatar-35 photo' height='36' width='36' />
                                    </td>
                                    <td>
                                        <img alt='' src='/img/classes/{{ $user->game_class_id }}.jpg' title="{{ $user->gameClass->class_name }}" class='avatar avatar-35 photo' height='36' width='36' />
                                    </td>
                                    <td>
                                        {{ $user->gameFaction->faction_name }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ENDS people-block -->
        @else
            Пользователи здесь еще не регистрировались =(
        @endif

    </div>
@endsection