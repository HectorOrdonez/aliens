<html>
<head>

</head>

<body>

<ul style="list-style-type: none">
    @foreach ($aliens as $alien)
        <li>
            <form action="{{route('alien.destroy', $alien->id)}}" method="post">
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit">ayy</button>
            </form>
        </li>
    @endforeach
</ul>

<form action="{{route('alien.store')}}" method="post">
    <button type="submit">button</button>
</form>

</body>
</html>
