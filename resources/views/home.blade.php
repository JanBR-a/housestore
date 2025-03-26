<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .navigation {
            text-align: right;
            padding: 10px;
            background-color: #444;
        }

        .navigation a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .property {
            width: 30%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.2s;
            cursor: pointer;
        }

        .property:hover {
            transform: scale(1.05);
        }

        .property img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .property-details {
            padding: 15px;
        }

        .property-details h2 {
            font-size: 1.2em;
            margin: 0;
            color: #333;
        }

        .property-details p {
            margin: 5px 0;
            color: #666;
        }

        .property-details strong {
            color: #333;
        }

        .delete-btn {
            background-color: #ff4c4c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
            text-align: center;
        }

        .delete-btn:hover {
            background-color: #ff1f1f;
        }

        .detailBtn {
            background-color: #12b936;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
            text-align: center;
        }

        .detailBtn:hover {
            background-color: #1fff44;
        }

        @media print {
            .property {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Propiedades</h1>
    </header>
    <div class="navigation">
        <?php if (auth()->check()): ?>
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        <?php if (auth()->user()->role === 'user' || auth()->user()->role === 'admin'): ?>
        <a href="{{ route('add-property') }}">Add property</a>
        <?php endif; ?>
        <?php else: ?>
        <a href="{{ url('/login') }}">Log in</a>
        <a href="{{ url('/register') }}">Register</a>
        <?php endif; ?>
    </div>
    <section>
        @foreach ($properties as $property)
            <div class="property">
                <img src="{{ $property->image }}" alt="{{ $property->model }}">
                <div class="property-details">
                    <h2><strong>Título:</strong> {{ $property->title }}</h2>
                    <p><strong>Descripción:</strong> {{ $property->description }}</p>
                    <p><strong>Precio:</strong> {{ $property->price }}</p>
                    <p><strong>Tipo:</strong> {{ $property->state }}</p>
                    <p><strong>Metros Cuadrados:</strong> {{ $property->m2 }}</p>
                    <p><strong>Habitaciones:</strong> {{ $property->bedrooms }}</p>
                    <p><strong>Baños:</strong> {{ $property->bathrooms }}</p>

                    @if (auth()->check() && ($property->user_id == auth()->user()->id || auth()->user()->role === 'admin'))
                        <form action="/property/{{ $property->id }}/delete" method="POST"
                            onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta propiedad?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Eliminar Propiedad</button>
                        </form>
                    @endif
                </div>
                <button class="detailBtn" onclick="redirectProperty('{{ $property->id }}')">Ver detalles</button>
            </div>
        @endforeach
    </section>

    <script>
        function redirectProperty(property_id) {
            window.location.href = "/property/" + property_id;
        }
    </script>
</body>

</html>
