@extends('layouts.main')

@section('css')
    @parent
@endsection

@section('main')
    @parent
    {!! Form::open(['url' => route('pods.store')]) !!}
    <ul class="aliens">
        @foreach($alienTypes as $alienType)
            <li class="aliens__alien">
                <input id="alien_types[{{$alienType->id}}]" class="hello" type="hidden" name="alien_types[{{$alienType->id}}]" value="0">
                <svg>
                    <defs>
                        <pattern id="{{$alienType->name}}_image" x="0%" y="0%" height="100%" width="100%" viewBox="0 0 512 512">
                            <image x="0%" y="0%" width="512" height="512" xlink:href="{{ $alienType->image_link }}"></image>
                        </pattern>
                    </defs>
                    <circle class="alien_add" id="add_{{$alienType->name}}" fill="url('#{{$alienType->name}}_image')" r="55" cx="50%" cy="50%" stroke-width="5" stroke="#65ECEF"></circle>
                    <circle r="20" cx="80%" cy="80%" stroke-width="2.5" stroke="#65ECEF"></circle>
                    <text class="alien_counter" x="80%" y="80%" stroke="#FFF" stroke-width="1.5px" dy=".3em" text-anchor="middle">0</text>
                </svg>
            </li>
        @endforeach
    </ul>
    <input type="submit" />
    {!! Form::close() !!}
@endsection

@section('js')
    @parent
    <script type="application/javascript">
        function debug(msg){
            console.log('Debug - ' + msg);
        }

        $(document).ready(function () {
            $('.alien_add').click(function () {
                        var value = parseInt($(this).parent().parent().find('.hello').attr('value'));
                        var newValue = value + 1;

                        console.log('Alien counter value: ' + $(this).parent().find('.alien_counter').text());
                        $(this).parent().find('.alien_counter').text(newValue);
                        console.log('Alien counter value: ' + $(this).parent().find('.alien_counter').text());
                        console.log('Alien input counter value: ' + $(this).parent().parent().find('.hello').attr('value'));
                        $(this).parent().parent().find('.hello').attr('value', newValue);
                        console.log('Alien input counter value: ' + $(this).parent().parent().find('.hello').attr('value'));
                    }
            );
        });
    </script>
@endsection
