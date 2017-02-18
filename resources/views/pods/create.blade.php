@extends('layouts.main')

@section('css')
    @parent
@endsection

@section('main')
    @parent
    {{--<h1>Create new Pod</h1>--}}

    {!! Form::open(['url' => route('pods.store')]) !!}
    <ul class="aliens">
        @foreach(alien_types() as $type)
            <li class="aliens__alien">
                <input id="input_{{$type}}" class="hello" type="hidden" name="pod[{{$type}}]" value="0">
                <svg>
                    <defs>
                        <pattern id="{{$type}}_image" x="0%" y="0%" height="100%" width="100%" viewBox="0 0 512 512">
                            <image x="0%" y="0%" width="512" height="512" xlink:href="{{ get_alien_image($type) }}"></image>
                        </pattern>
                    </defs>
                    {{--Create {{$type}}--}}
                    <circle class="alien_add" id="add_{{$type}}" fill="url('#{{$type}}_image')" r="60" cx="50%" cy="50%" stroke-width="0.5" stroke="#FFF">hey</circle>
                    <circle r="15" cx="70%" cy="70%" stroke-width="1.5" stroke="#BBB"></circle>
                    <text class ="alien_counter" x="70%" y="70%" stroke="#FFF" stroke-width="2px" dy=".3em" text-anchor="middle">0</text>
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
            {{--            @foreach(alien_types() as $type)--}}
            $('.alien_add').click(function(){
                        value = parseInt($(this).parent().parent().find('.hello').attr('value'));
                        newValue = value+1;

                        console.log('Alien counter value: ' + $(this).parent().find('.alien_counter').text());
                        $(this).parent().find('.alien_counter').text(newValue);
                        console.log('Alien counter value: ' + $(this).parent().find('.alien_counter').text());
                        console.log('Alien input counter value: ' + $(this).parent().parent().find('.hello').attr('value'));
                        $(this).parent().parent().find('.hello').attr('value', newValue);
                        console.log('Alien input counter value: ' + $(this).parent().parent().find('.hello').attr('value'));

//                        debug('Increasing ' + $(this).closest('input') + ' amount');
                        {{----}}
                        {{--var amountField = $('#{{$type}}-amount');--}}
//                        var currentAmount = parseInt(amountField.val());
//                        amountField.val(currentAmount + 1);
//                        amountField.text(currentAmount + 1);
//
//                        debug('Previous amount: ' + currentAmount);
//                        debug('After amount: ' + amountField.val());
                    }
            );
            {{--@endforeach--}}

        });
    </script>
@endsection