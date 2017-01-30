<html>
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<style type="text/css">
    img.alien {
        width: 100px;
    }

</style>
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
    @foreach ($aliens as $alien)
        <li class="list-group-item">
            <form action="{{route('aliens.destroy', $alien->id)}}" method="post">
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit">
                    @if ($alien->type == 'sectoid')
                        <img class='alien sectoid'
                             src="http://orig07.deviantart.net/4da1/f/2016/038/7/6/xcom_2__sectoid_by_deliciouslydemented-d9qtydm.png"/>
                    @elseif ($alien->type == 'floater')
                        <img class='alien floater'
                             src="http://img3.wikia.nocookie.net/__cb20120502152600/xcom/images/5/52/XCOM-EU_Floater.png"/>
                    @else
                        unknown
                    @endif
                </button>
            </form>
        </li>
    @endforeach
</ul>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">select pls</div>
            <div class="panel-body">
                <form action="{{route('aliens.store')}}" method="post" class="pull-left">
                    <input type="hidden" name="type" value="sectoid"/>
                    <button type="submit" class="btn btn-default btn-lg">can i hz sectoid</button>
                </form>

                <form action="{{route('aliens.store')}}" method="post" class="pull-right">
                    <input type="hidden" name="type" value="floater"/>
                    <button type="submit" class="btn btn-default btn-lg">can i hz fluter</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
