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
        <h1>Eit {{ $alienType->name }}</h1>

        {{ Form::open(['method' => 'PATCH', 'route' => ['alien_types.update', $alienType->id]]) }}
        @include('alien_types.partials._form')
        {!! Form::submit('Go') !!}
        {!! Form::close() !!}

    <div>{!! link_to_route('alien_types.index', 'Back')!!}</div>
@endsection



{{--                           --}}
{{--        F O O T E R        --}}
{{--                           --}}
@section('footer')
    @parent
@endsection
