<!--Himar Martín Vega-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    @if($errors->any())
        <div class="errores">
            <ul>
                <div>
                    @foreach($errors->all() as $error)
                        <div>⮞&nbsp;&nbsp;{{ $error }}</div>
                    @endforeach
                </div>
            </ul>
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST">    
    @csrf
       
        <label for="nombre-producto">Nombre del producto:</label>
        <input type="text" name="nombre-producto" value="{{ old('nombre-producto') }}" placeholder="Ejemplo: Mochila">

        
        <label for="descripcion-producto">Descripción del producto:</label>
        <textarea name="descripcion-producto" placeholder="Escribe aquí la descripción...">{{ old('descripcion-producto') }}</textarea>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" min="0" value="{{ old('precio') }}" placeholder="Ejemplo: 1">
        
        <label for="unidades">Unidades:</label>
        <input type="number" name="unidades" min="0" value="{{ old('unidades') }}" placeholder="Ejemplo: 1">

        <label for="categoria-producto">Categoría:</label>
        <select name="categoria-producto">
            <option value="">Seleccione una opción</option>
            <option value="Electrónica">Electrónica</option>
            <option value="Deporte">Deporte</option>
        </select>
    
        <button type="submit">Registrar producto</button>
    </form>

</body>
</html>