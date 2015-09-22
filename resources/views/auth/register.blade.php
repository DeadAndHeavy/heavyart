@extends('layouts.base')

@section('content')

<div class="reg_form">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Упс!</strong> Что-то пошло не так =)<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form role="form" method="POST" action="{{ url('/auth/register') }}" id="regForm">
        <h4>Регистрация</h4>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <label for="username">Ваш никнейм</label><br/>
        <input type="text" name="username" value="{{ old('username') }}"><br/><br/>

        <label for="password">Ваш пароль</label><br/>
        <input type="password" name="password" id="reg_password"><br/><br/>

        <label for="password_confirmation">И снова пароль</label><br/>
        <input type="password" name="password_confirmation"><br/><br/>

        <label for="game_class">Ваш игровой класс</label><br/>
        <select name="game_class">
            <option value="" selected disabled>Укажите класс</option>
            @foreach ($game_classes as $class)
                @if (!in_array($class->id, [12,13]))
                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                @endif
            @endforeach
        </select><br/><br/>

        <label for="faction">Ваша игровая фрация</label><br/>
        <select id="faction_selector" name="faction">
            <option value="" selected disabled>Укажите фракцию</option>
            @foreach ($game_factions as $faction)
                @if ($faction->id != 3)
                    <option value="{{ $faction->id }}">{{ $faction->faction_name }}</option>
                @endif
            @endforeach
        </select><br/><br/>

        <label for="race">Ваша игровая расса</label><br/>
        <select id="race_selector" name="race" disabled>
            <option value="" selected disabled>Укажите рассу</option>
            @foreach ($game_races as $race)
                <option data-faction-id="{{ $race->game_faction_id }}" value="{{ $race->id }}">{{ $race->race_name }}</option>
            @endforeach
        </select><br/><br/>

        <label for="gender">Ваш игровой пол</label><br/>
        <select name="gender">
            <option value="" selected disabled>Укажите пол</option>
            <option value="1">Мужской</option>
            <option value="2">Женский</option>
        </select><br/><br/>

        <p>
            <input name="reg_submit" type="submit" id="reg_submit" value="Зарегистрироваться" />
        </p>
    </form>
</div>
@endsection
