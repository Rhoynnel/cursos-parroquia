<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Representante y Estudiantes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
    @include('layouts.mensaje')

<div class="container bg-white p-4 rounded shadow-sm" style="max-width: 900px;">
    <h3 class="mb-4">Registro de Inscripción / Catequesis</h3>

    <form action="{{ route('inscripcion.store') }}" method="POST" id="formRegistro">
        @csrf
        <!-- DATOS DEL REPRESENTANTE -->
        <h5 class="text-primary border-bottom pb-2">Datos del Representante</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label">Cédula</label>
                <input type="text" name="representante[cedula]" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Nombre</label>
                <input type="text" name="representante[nombre]" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Apellido</label>
                <input type="text" name="representante[apellido]" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Teléfono</label>
                <input type="text" name="representante[telefono]" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Centro</label>
                <select name="representante[id_centro]" class="form-select" required>
                    <option value="">Seleccione un Centro</option>
                    @foreach($centros as $centro)
                        <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Dirección</label>
                <input type="text" name="representante[direccion]" class="form-control" required>
            </div>
        </div>

        <!-- DATOS DE LOS ESTUDIANTES -->
        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
            <h5 class="text-primary m-0">Estudiantes a Registrar</h5>
            <button type="button" class="btn btn-sm btn-success" id="btnAgregarEstudiante">
                + Agregar Estudiante
            </button>
        </div>

        <div id="contenedorEstudiantes">
            <!-- Se creará al menos una fila por defecto mediante JS -->
        </div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary btn-lg">Guardar Registro</button>
        </div>
    </form>
</div>

<!-- Plantilla Oculta para Fila de Estudiante -->
<template id="plantillaEstudiante">
    <div class="card mb-3 estudiante-item bg-light border">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="card-subtitle text-muted numero-estudiante">Estudiante #1</h6>
                <button type="button" class="btn btn-sm btn-outline-danger btnEliminar" style="display: none;">Eliminar</button>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Cédula (Opcional)</label>
                    <input type="text" name="estudiantes[{INDEX}][cedula]" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="estudiantes[{INDEX}][nombre]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="estudiantes[{INDEX}][apellido]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Fecha Nacimiento</label>
                    <input type="date" name="estudiantes[{INDEX}][fecha_nacimiento]" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Curso de Catequesis</label>
                    <select name="estudiantes[{INDEX}][id_curso]" class="form-select" required>
                        <option value="">Seleccione un Curso</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let contadorEstudiantes = 0;
    const contenedor = document.getElementById('contenedorEstudiantes');
    const plantilla = document.getElementById('plantillaEstudiante').innerHTML;

    function agregarEstudiante() {
        const html = plantilla.replaceAll('{INDEX}', contadorEstudiantes);
        contenedor.insertAdjacentHTML('beforeend', html);
        contadorEstudiantes++;
        actualizarNumeracion();
    }

    function actualizarNumeracion() {
        const items = contenedor.querySelectorAll('.estudiante-item');
        items.forEach((item, index) => {
            item.querySelector('.numero-estudiante').textContent = `Estudiante #${index + 1}`;
            const btnEliminar = item.querySelector('.btnEliminar');
            // Muestra botón eliminar solo si hay más de 1 estudiante
            if (items.length > 1) {
                btnEliminar.style.display = 'block';
            } else {
                btnEliminar.style.display = 'none';
            }
        });
    }

    document.getElementById('btnAgregarEstudiante').addEventListener('click', agregarEstudiante);

    contenedor.addEventListener('click', function(e) {
        if (e.target.classList.contains('btnEliminar')) {
            e.target.closest('.estudiante-item').remove();
            actualizarNumeracion();
        }
    });

    // Agregar el primer estudiante por defecto
    agregarEstudiante();
</script>

</body>
</html>