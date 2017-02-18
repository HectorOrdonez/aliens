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

    <ul class="pods">
        <li class="pods__overview">
            @foreach ($pods as $pod)
                <div class="pods__pod">
                    <ul class="aliens">
                        @forelse($pod->aliens as $alien)
                            {{--{!! Form::open(['url' => route('pods.aliens.destroy', [$pod->id, $alien->id]), 'method'=>'delete']) !!}--}}
                            {{--<input type="submit">--}}
                            <li class="aliens__alien">
                                <svg>
                                    <defs>
                                        <pattern id="{{$alien->type}}_image" x="0%" y="0%" height="100%" width="100%" viewBox="0 0 512 512">
                                            <image x="0%" y="0%" width="512" height="512" xlink:href="{{ $alien->alien_type->image_link }}"></image>
                                        </pattern>
                                    </defs>
                                    Create {{$alien->type}}
                                    <circle class="alien_add" id="add_{{$alien->type}}" fill="url('#{{$alien->type}}_image')" r="55" cx="50%" cy="50%" stroke-width="5" stroke="#65ECEF"></circle>

                                    <circle r="19" cx="80%" cy="80%" stroke-width="2.5" stroke="#65ECEF"></circle>
                                    <text class="alien_counter" x="80%" y="80%" stroke="gold" stroke-width="1.5px" dy=".3em" text-anchor="middle">0</text>

                                    <circle r="19" cx="20%" cy="20%" stroke-width="2.5" stroke="#65ECEF"></circle>
                                    <text class="alien_counter" x="20%" y="20%" stroke="red" stroke-width="1.5px" dy=".3em" text-anchor="middle">
                                        0
                                    </text>
                                    {{--<image xlink:href="firefox.jpg" x="0" y="0" height="50px" width="50px"/>--}}
                                    {{--<image xlink:href="images/bullet.svg" x="50%" y="50%" height="50" widht="50" style="fill:red;"/>--}}
                                </svg>
                            </li>
                            {{--</input>--}}
                            {{--{!! Form::close() !!}--}}

                            {{--{!! Form::open(['url' => route('pods.aliens.update', [$pod->id, $alien->id]), 'method'=>'put']) !!}--}}
                            {{--<div>{!! Form::number('ammo', $alien->ammo) !!}</div>--}}
                            {{--{!! Form::submit('Change ammo') !!}--}}
                            {{--{!! Form::close() !!}--}}
                        @empty
                            No aliens
                        @endforelse
                        {{--{!! Form::open(['url' => route('pods.aliens.store', $pod->id), 'class' => '']) !!}--}}
                        {{--{!! Form::submit('Add alien', ['class' => '']) !!}--}}
                        {{--{!! Form::close() !!}--}}
                        {{----}}
                        {{--@foreach (alien_types() as $type)--}}
                        {{--                    {!! Form::open(['url' => route('pods.aliens.store', $pod->id), 'class' => 'pull-left']) !!}--}}
                        {{--                    {!! Form::hidden('type', $type) !!}--}}
                        {{--                    {!! Form::submit("Add $type") !!}--}}
                        {{--{!! Form::close() !!}--}}
                        {{--@endforeach--}}
                        {{----}}
                    </ul>
                </div>
                <hr />
            @endforeach
        </li>
        <li class="pods__addpod">hello</li>
    </ul>
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
