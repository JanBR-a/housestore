<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Propiedad</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f3f3f3;
        margin: 0;
        padding: 20px;
    }

    h1 {
        color: #333;
        text-align: center;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select,
    textarea {
        width: calc(100% - 10px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    textarea {
        height: 100px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
<body>
    <h1>Agrega una Nueva Propiedad</h1>

    <form action="{{ route('store-property') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="address">Dirección:</label>
        <input type="text" id="address" name="address" required>

        <label for="image">Imagen:</label>
        <input type="text" id="image" name="image">

        <label for="type">Tipo:</label>
        <select id="type" name="type" required>
            <option value="casa">Casa</option>
            <option value="chalet">Chalet</option>
            <option value="apartamento">Apartamento</option>
            <option value="solar">Solar</option>
        </select>

        <label for="garden">¿Tiene jardín?</label>
        <select id="garden" name="garden" required>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>

        <label for="state">Estado:</label>
        <select id="state" name="state" required>
            <option value="compra">Compra</option>
            <option value="alquiler">Alquiler</option>
        </select>

        <label for="bedrooms">Habitaciones:</label>
        <input type="number" id="bedrooms" name="bedrooms" value="1" required>

        <label for="bathrooms">Baños:</label>
        <input type="number" id="bathrooms" name="bathrooms" value="1" required>

        <label for="m2">Metros Cuadrados:</label>
        <input type="number" id="m2" name="m2" required>

        <button type="submit">Agregar Propiedad</button>
    </form>
</body>
</html>
