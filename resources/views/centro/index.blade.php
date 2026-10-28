<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Centros') }} 
        </h2>
    </x-slot>

    <div class="container mt-4">
        @include('layouts.mensaje')
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="h-100 p-2 bg-body-tertiary border rounded-3">
                    <div class="flex justify-end mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AgregaCentro">
                            + Agregar Centro
                        </button>
                    </div>

                    <table class="table table-striped table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($centros as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->direccion }}</td>
                                    <td>
                                        <!-- Botón para abrir el modal de edición dinámico -->
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#EditaCentro{{ $item->id }}">
                                            Editar
                                        </button>

                                        <!-- MODAL EDITAR (Un modal único por cada centro usando su ID) -->
                                        <div class="modal fade" id="EditaCentro{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Editar Centro</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('centro.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body text-start">
                                                            <div class="form-floating mb-3">
                                                                <input name="nombre" type="text" class="form-control" id="nombre{{ $item->id }}" value="{{ old('nombre', $item->nombre) }}" required>
                                                                <label for="nombre{{ $item->id }}">Nombre</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input name="direccion" type="text" class="form-control" id="direccion{{ $item->id }}" value="{{ old('direccion', $item->direccion) }}" required>
                                                                <label for="direccion{{ $item->id }}">Dirección</label>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN MODAL EDITAR -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $centros->links() }}
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <!-- Modal Agregar Centro -->
    <div class="modal fade" id="AgregaCentro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Centro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('centro.store') }}" method="POST">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="form-floating mb-3">
                            <input name="nombre" type="text" class="form-control" id="nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="direccion" type="text" class="form-control" id="direccion" required>
                            <label for="direccion">Dirección</label>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>