<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $property->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        p {
            margin-bottom: 10px;
            color: #666;
            line-height: 1.5;
        }

        p strong {
            font-weight: bold;
            color: #333;
        }

        .image-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .video-container {
            margin-bottom: 20px;
        }

        .video-container iframe {
            width: 100%;
            height: 315px;
            border: none;
            border-radius: 8px;
        }

        .btn-buy {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }

        .btn-buy:hover {
            background-color: #45a049;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-danger ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .alert-danger li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="image-container">
            <img src="{{ $property->image }}" alt="{{ $property->model }}">
        </div>

        <h1>{{ $property->title }}</h1>

        <p><strong>Description:</strong> {{ $property->description }}</p>
        <p><strong>Price:</strong> {{ $property->price }}</p>
        <p><strong>Address:</strong> {{ $property->address }}</p>
        <p><strong>Type:</strong> {{ $property->type }}</p>
        <p><strong>Garden:</strong> {{ $property->garden ? 'Yes' : 'No' }}</p>
        <p><strong>State:</strong> {{ $property->state }}</p>
        <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
        <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
        <p><strong>m2:</strong> {{$property->m2}}</p>

        <h2>Comentarios</h2>
        @foreach ($comments as $comment)
            <p><strong>{{ $comment->user->name }}</strong> {{ $comment->description }}, {{ $comment->valoration }}⭐</p>

        @endforeach
        <button id="addcomment" >Add comment</button>
        <form action="{{ route('property.addComment', $property->id) }}" method="POST" style="display:none" id="commentForm">
            @csrf
            <input type="text" name="title" id="title">
            <input type="text" name="description" id="description">
            <input type="number" name="valoration" id="valoration" min="0" max="5">
            <button type="submit">Comentar</button>
        </form>
        <form action="{{ url('/property/' . $property->id . '/reservation') }}" method="GET">
            @csrf
                <button type="submit" class="btn-buy">Hacer reserva con el agente</button>
        </form>
    </div>
</body>

</html>

<script>
 button = document.getElementById('addcomment');
 button.addEventListener('click', function() {
    button.style.display = 'none';
    commentForm = document.getElementById('commentForm');
    commentForm.style.display = 'block';

});


</script>
