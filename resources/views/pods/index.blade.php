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
            <div class="panel panel-info">
                <div class="panel-heading">Pod {{ $pod->id }}</div>
                <div class="panel-body">
                    @forelse($pod->aliens as $alien)

                        {!! Form::open(['url' => route('pods.aliens.destroy', [$pod->id, $alien->id]), 'method'=>'delete']) !!}
                        {!! Form::submit("Alien: $alien->id of type $alien->type") !!}
                        {!! Form::close() !!}
                    @empty
                        No aliens
                    @endforelse
                </div>

                <div class="panel-footer">
                    {!! Form::open(['url' => route('pods.aliens.store', $pod->id), 'class' => 'pull-left']) !!}
                    {!! Form::submit('Add unknown alien') !!}
                    {!! Form::close() !!}

                    @foreach (alien_types() as $type)
                        {!! Form::open(['url' => route('pods.aliens.store', $pod->id), 'class' => 'pull-left']) !!}
                        {!! Form::hidden('type', $type) !!}
                        {!! Form::submit("Add $type") !!}
                        {!! Form::close() !!}
                    @endforeach

                    {!! Form::open(['url' => route('pods.aliens.store', $pod->id)]) !!}
                    {!! Form::submit('Add floater') !!}
                    {!! Form::close() !!}
                </div>
            </div>
            {!! Form::open(['url' => route('pods.destroy', $pod->id), 'method'=>'delete']) !!}
            {!! Form::submit('Destroy Me') !!}
            {!! Form::close() !!}
        </li>
    @endforeach
</ul>

{!! Form::open(['url' => route('pods.store')]) !!}
{!! Form::submit('Add Pod') !!}
{!! Form::close() !!}
</body>
</html>
