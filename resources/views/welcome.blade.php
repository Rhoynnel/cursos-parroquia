<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Parroquia - Cursos e Inscripciones</title>
    <!-- Tailwind CSS desde CDN o compilado -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col justify-between">

    <!-- Navbar superior -->
    <header class="p-6 flex justify-between items-center max-w-7xl mx-auto w-full">
        <h1 class="text-2xl font-bold tracking-tight text-white">Mi Parroquia</h1>
        <div>
            <!-- Botón de Acceso Administrativo (Filament Login) -->
            <a href="/login" 
               class="text-sm font-semibold text-gray-300 hover:text-white px-4 py-2 rounded-lg border border-gray-700 hover:border-gray-500 transition">
                Acceso Administrativo
            </a>
        </div>
    </header>

    <!-- Sección Principal (Hero / Call to Action) -->
    <main class="flex-1 flex flex-col items-center justify-center text-center px-4">
        <span class="bg-blue-500/10 text-blue-400 text-sm font-medium px-4 py-1.5 rounded-full border border-blue-500/20 mb-6">
            Inscripciones Abiertas
        </span>

        <h2 class="text-4xl sm:text-6xl font-extrabold text-white max-w-3xl leading-tight">
            Sistema de Inscripción de Cursos Parroquiales
        </h2>

        <p class="mt-4 text-lg text-gray-400 max-w-xl">
            Inscribe a tus representados en nuestros cursos y talleres disponibles por centro o sucursal de manera rápida y sin necesidad de iniciar sesión.
        </p>

        <!-- Botón destacado al Formulario -->
        <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <a href="#" 
               class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-8 py-4 rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                Iniciar Inscripción
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="p-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Mi Parroquia. Todos los derechos reservados.
    </footer>

</body>
</html>