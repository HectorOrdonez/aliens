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


    <div class="alien__edit">
        <h1>Edit {{ $alien->type() }}</h1>
        <div>{!! link_to_route('pods.index', 'Back')!!}</div>

        {{ Form::open(['method' => 'PATCH', 'route' => ['pods.aliens.update', $pod->id, $alien->id]]) }}

        <div class="form-group">
            {!! Form::label('health', 'Health') !!}
            {!! Form::number('health', $alien->health) !!}
        </div>

        <div class="form-group">
            {!! Form::label('ammo', 'Ammo') !!}
            {!! Form::number('ammo', $alien->ammo) !!}
        </div>

        {!! Form::submit('Go') !!}
        {!! Form::close() !!}

    </div>


@endsection



{{--                           --}}
{{--        F O O T E R        --}}
{{--                           --}}
@section('footer')
    @parent
@endsection
