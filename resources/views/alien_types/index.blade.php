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

        table {
            font-size: 20px;
            color: black;
        }

        table td {
            border: 1px solid black;
            padding: 2px;
        }

        table td.alien_type__image {
            width: 100px;
            height: 100px;
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

    <table class="alien_types">
        @foreach ($alienTypes as $alienType)
            <tr>
                <td class="alien_type__id">{{ $alienType->id }}</td>
                <td class="alien_type__name">{{ $alienType->name }}</td>
                <td class="alien_type__image"><img src="{{$alienType->image_link}}" alt="{{$alienType->name}}" /></td>
                <td class="alien_type__health">{{ $alienType->health }}</td>
                <td class="alien_type__ammo">{{ $alienType->ammo }}</td>
            </tr>

            {{--@forelse($pod->aliens as $alien)--}}
            {{--{!! Form::open(['url' => route('pods.aliens.destroy', [$pod->id, $alien->id]), 'method'=>'delete']) !!}--}}
            {{--{!! Form::submit("Alien: $alien->id of type $alien->type") !!}--}}
            {{--{!! Form::close() !!}--}}
            {{--@empty--}}
            {{--No aliens--}}
            {{--@endforelse--}}
            {{--{!! Form::open(['url' => route('pods.aliens.store', $pod->id), 'class' => '']) !!}--}}
            {{--{!! Form::submit('Add alien') !!}--}}
            {{--{!! Form::close() !!}--}}

            {{--@foreach (alien_types() as $type)--}}
            {{--{!! Form::open(['url' => route('pods.aliens.store', $pod->id), 'class' => 'pull-left']) !!}--}}
            {{--{!! Form::hidden('type', $type) !!}--}}
            {{--{!! Form::submit("Add $type") !!}--}}
            {{--{!! Form::close() !!}--}}
            {{--@endforeach--}}

            {{--{!! Form::open(['url' => route('pods.aliens.store', $pod->id)]) !!}--}}
            {{--{!! Form::submit('Add floater') !!}--}}
            {{--{!! Form::close() !!}--}}
            </div>
        @endforeach
    </table>

    <div>{!! link_to_route('alien_types.create', 'Add alien type')!!}</div>
@endsection



{{--                           --}}
{{--        F O O T E R        --}}
{{--                           --}}
@section('footer')
    @parent
@endsection
