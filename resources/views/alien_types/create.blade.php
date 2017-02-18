{{--                           --}}
{{--        L A Y O U T        --}}
{{--                           --}}
@extends('layouts.main')


{{--                           --}}
{{--          H E A D          --}}
{{--                           --}}


{{--           C S S           --}}
@section('css')
    @parent
    <style type="text/css">
        a {
            font-size: 20px;
        }

        .form-group {
            margin: 5px;
        }

        .form-group label {
            font-size: 15px;
            color: black;
            font-weight: bold;
            display: inline-block;
            width: 65px;
        }
    </style>
@endsection

{{--            J S            --}}


@section('js')
    @parent
@endsection


{{--                           --}}
{{--        H E A D E R        --}}
{{--                           --}}
@section('header')
    @parent
@endsection



{{--                           --}}
{{--          M A I N          --}}
{{--                           --}}
@section('main')
    @parent
    @include('includes/flash')
    @include('includes/errors')

    <div class="alien_types__create">
        <h1>Create new Alien Type</h1>

        {!! Form::open(['url' => route('alien_types.store')]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Type') !!}
            {!! Form::text('name') !!}
        </div>

        <div class="form-group">
            {!! Form::label('image_link', 'Image') !!}
            {!! Form::text('image_link') !!}
        </div>

        <div class="form-group">
            {!! Form::label('health', 'Health') !!}
            {!! Form::number('health') !!}
        </div>

        <div class="form-group">
            {!! Form::label('ammo', 'Ammo') !!}
            {!! Form::number('ammo') !!}
        </div>

        {!! Form::submit('Go') !!}
        {!! Form::close() !!}
    </div>

    <div>{!! link_to_route('alien_types.index', 'Back')!!}</div>
@endsection



{{--                           --}}
{{--        F O O T E R        --}}
{{--                           --}}
@section('footer')
    @parent
@endsection
