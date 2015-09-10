@extends('layouts.admin')

@section('content')

<div class="add_comics_form">
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

    <div class="successfull_info_message">
        {{ session('message_ok') }}
    </div>

    <form role="form" method="POST" action="{{ url('/admin/add-comics') }}" id="addComicsForm" enctype="multipart/form-data">
        <h4>Добавить новый комикс</h4>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <label for="comics_name">Название</label><br/>
        <input type="text" name="comics_name" value="{{ old('comics_name') }}"><br/><br/>

        <label for="comics_description">Описание</label><br/>
        <textarea name="comics_description">{{ old('comics_description') }}</textarea><br/><br/>

        <label for="comics_file">Картинка комикса</label><br/>
        <input type="file" name="comics_file"><br/><br/>

        <p>
            <input name="reg_submit" type="submit" id="reg_submit" value="Создать комикс" />
        </p>
    </form>
</div>
@endsection
