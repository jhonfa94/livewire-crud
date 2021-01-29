<h2>Listado de Post</h2>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Contenido</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>
                    <button wire:click='edit({{$post->id}})' class="btn btn-sm btn-primary">
                        Editar
                    </button>
                </td>
                <td>
                    <button wire:click="destroy({{$post->id}})" class="btn btn-sm btn-danger">
                        Eliminar
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- Paginación --}}
{{-- {{ $posts->links() }} --}}

{{ $posts->links('pagination::bootstrap-4') }}
