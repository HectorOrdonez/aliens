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
        input {
            /*background-color: transparent;*/
            /*color: white;*/
        }
    </style>
@endsection

{{--            J S            --}}


@section('js')
    @parent
    <script type="application/javascript">
    </script>
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
    {{--    @include('includes/flash')--}}
    {{--    @include('includes/errors')--}}

    <div class="pods">
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
                {!! Form::open(['url' => route('pods.aliens.store', $pod->id), 'class' => '']) !!}
                {!! Form::submit('Add alien') !!}
                {!! Form::close() !!}

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
    </div>

@endsection



{{--                           --}}
{{--        F O O T E R        --}}
{{--                           --}}
@section('footer')
    @parent
@endsection
