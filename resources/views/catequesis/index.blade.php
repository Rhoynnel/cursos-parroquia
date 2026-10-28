<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Catequesis') }} 
        </h2>
    </x-slot>

    <div class="container mt-4">
        @include('layouts.mensaje')
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="h-100 p-2 bg-body-tertiary border rounded-3">
                    

                    <table class="table table-striped table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Curso</th>
                                <th>Centro</th>
                                <th>Estudiante</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catequesis as $item)
                                <tr>
                                    <td>{{ $item->curso->descripcion }}</td>
                                    <td>{{ $item->centro->nombre }}</td>
                                    <td>{{ $item->estudiante->nombre }} {{ $item->estudiante->apellido }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $catequesis->links() }}
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

   
</x-app-layout>