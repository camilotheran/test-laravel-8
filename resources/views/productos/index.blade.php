@extends('productos.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Todos los productos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('productos.create') }}"> Crear nuevo producto</a>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>Referencia</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Total</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>{{ $producto->precio_unitario }}</td>
            <td>{{ $producto->precio_total }}</td>
            <td>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">


                    <a class="btn btn-primary" href="{{ route('productos.edit', $producto->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            
            <td> Total</td>
                
            <td> {{ $grantotal}}</td>
            
            
            <td></td>
        </tr>
    </table>



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif





@endsection
