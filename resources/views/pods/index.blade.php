<html>
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>

@include('flash')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<ul class="list-group">
    @foreach ($pods as $pod)
        <li class="list-group-item">
            {!! Form::open(['url' => route('pods.destroy', $pod->id), 'method'=>'delete']) !!}
            {!! Form::submit('Click Me!') !!}
            {!! Form::close() !!}
        </li>
    @endforeach
</ul>

{!! Form::open(['url' => route('pods.store')]) !!}
{!! Form::submit('Click Me!') !!}
{!! Form::close() !!}

</body>
</html>
