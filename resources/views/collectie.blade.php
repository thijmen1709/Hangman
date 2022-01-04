<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Collectie</title>
</head>
<body>

@foreach($collecties as $collectie)
    <tr>
        <th>{{ $collectie->item_id}}</th>
        <th>{{ $collectie->user_id }}</th>
    </tr>
@endforeach

</body>
</html>
