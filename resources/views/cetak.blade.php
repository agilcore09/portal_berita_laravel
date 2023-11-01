<!DOCTYPE html>
<html>

<head>
    <title>Portal Berita</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>

    </style>
</head>

<body>

    <div class="container">
        <div class="card" style="background-color: white; padding: 10px;">
            <div>
                <h3>{{ $data->judul_berita }}</h3>
                <small>{{ $data->created_at }}</small>
                <hr>
            </div>
            <div>
                <p>{{ $data->body_berita }}</p>
            </div>
        </div>
    </div>



</body>

</html>
