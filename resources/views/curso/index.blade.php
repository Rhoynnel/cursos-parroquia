<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Cursos') }} 
        </h2>
    </x-slot>

    <div class="container mt-4">
        @include('layouts.mensaje')
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="h-100 p-2 bg-body-tertiary border rounded-3">
                    <div class="flex justify-end mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AgregaCurso">
                            + Agregar Curso
                        </button>
                    </div>

                    <table class="table table-striped table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $item)
                                <tr>
                                    <td>{{ $item->descripcion }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <!-- Botón para abrir el modal de edición dinámico -->
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#EditaCurso{{ $item->id }}">
                                            Editar
                                        </button>

                                        <!-- MODAL EDITAR (Un modal único por cada curso usando su ID) -->
                                        <div class="modal fade" id="EditaCurso{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Editar Curso</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('curso.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body text-start">
                                                            <div class="form-floating mb-3">
                                                                <input name="descripcion" type="text" class="form-control" id="descripcion{{ $item->id }}" value="{{ old('descripcion', $item->descripcion) }}" required>
                                                                <label for="descripcion{{ $item->id }}">Descripción</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <select name="status" class="form-select" id="status{{ $item->id }}" required>
                                                                    <option value="">Seleccione un Estado</option>
                                                                    <option value="Activo" {{ old('status', $item->status) == 'Activo' ? 'selected' : '' }}>Activo</option>
                                                                    <option value="Inactivo" {{ old('status', $item->status) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                                                </select>
                                                                <label for="status{{ $item->id }}">Estado</label>
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
                    {{ $cursos->links() }}
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <!-- Modal Agregar Curso -->
    <div class="modal fade" id="AgregaCurso" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('curso.store') }}" method="POST">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="form-floating mb-3">
                            <input name="descripcion" type="text" class="form-control" id="descripcion" required>
                            <label for="descripcion">Descripción</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="status" class="form-select" id="status" required>
                                <option value="">Seleccione un Estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                            <label for="status">Estado</label>
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