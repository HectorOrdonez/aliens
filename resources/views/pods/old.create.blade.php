@extends('layouts.main')

@section('css')
    @parent

    <style type="text/css">
        html, h1, ul, div, p, h2 {
            font-size: 20px !important;
        }
    </style>
@endsection

@section('js')
    @parent
    <script type="application/javascript">
        function debug(msg)
        {
            console.log('Debug - ' + msg);
        }

        $(document).ready(function () {
            @foreach(alien_types() as $type)
            $('#{{$type}}-block').click(
                    function () {
                        debug('Increasing {{$type}} amount');

                        var $amountField = $('#{{$type}}-amount');
                        var currentAmount = parseInt($amountField.val());
                        $amountField.val(currentAmount + 1);
                        $amountField.text(currentAmount + 1);

                        debug('Previous amount: ' + currentAmount);
                        debug('After amount: ' + $amountField.val());
                    }
            );
            @endforeach

        });
    </script>
@endsection

@section('main')
    @parent

    <h1>Create new Pod</h1>

    {!! Form::open(['url' => route('pods.store')]) !!}

    <ul>

        @foreach(alien_types() as $type)

            <li id="{{$type}}-block">Create {{$type}}
                <input type="text" id="{{$type}}-amount" name="pod[{{$type}}]" value="0" />
            </li>
        @endforeach
    </ul>

    <input type="submit" />

    {!! Form::close() !!}

@endsection
