<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Estudiantes') }} 
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
                                <th>Nombre y apellido</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Centro</th>
                                <th>Curso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estudiantes as $item)
                                <tr>
                                    <td>{{ $item->nombre }} - {{ $item->apellido }}</td>
                                    <td>{{ $item->fecha_nacimiento }}</td>
                                    <td>{{ $item->centro->nombre }} </td>
                                    <td> {{ $item->curso->descripcion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $estudiantes->links() }}
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

   
</x-app-layout>