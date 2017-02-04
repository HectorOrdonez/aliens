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
    </style>
@endsection

{{--            J S            --}}


@section('js')
    @parent
    <script type="application/javascript">
    </script>
@show


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
    {{--        @include('includes/flash')--}}
    {{--        @include('includes/errors')--}}
    <a href="{{ route('pods.create') }}" class="addpod_button">Add Pod</a>
@endsection



{{--                           --}}
{{--        F O O T E R        --}}
{{--                           --}}
@section('footer')
    @parent
@endsection



@section('info util')
    <ul class="pods">
        <li class="pods__overview">
            {!! Form::open(['url' => route('pods.store')]) !!}
            {!! Form::submit('Add Pod', ['class' => 'pods__addpod_button']) !!}
            {!! Form::close() !!}
            @foreach ($pods as $pod)
                {{--{{ $pod->id }}--}}
                <div class="pods__pod">
                    {{--@forelse($pod->aliens as $alien)--}}
                    {{--{!! Form::open(['url' => route('pods.aliens.destroy', [$pod->id, $alien->id]), 'method'=>'delete']) !!}--}}
                    {{--{!! Form::submit("Alien: $alien->id of type $alien->type") !!}--}}
                    {{--{!! Form::close() !!}--}}
                    {{--@empty--}}
                    {{--No aliens--}}
                    {{--@endforelse--}}
                    {{--{!! Form::open(['url' => route('pods.aliens.store', $pod->id), 'class' => '']) !!}--}}
                    {{--{!! Form::submit('Add alien', ['class' => '']) !!}--}}
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
        </li>
        <li class="pods__addpod">hello</li>
    </ul>
@endsection
