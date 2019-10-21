<table class="table">
    <thead>
        <tr>
            <th>Nombre interno</th>
            <th>Nombre externo</th>
            <th>Descripcion</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permisos as $permiso)
            <tr>
                <td> {{$permiso->name}} </td>
                <td> {{$permiso->uiname}} </td>
                <td> {{$permiso->descripcion}} </td>
                <td>
                    <a class="btn btn-warning" href="{{route('admin.permisos.edit', ['permiso' => $permiso])}}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
