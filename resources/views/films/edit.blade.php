<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pel·lícula</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Afegim una animació de fade-in suau */
        .fade-in {
            animation: fadeIn ease 1s;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: scale(0.95); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Estil del fons i text */
        body {
            background-color: #111; /* Fons negre */
            color: #fff; /* Text blanc */
            overflow-x: hidden; /* Evita el desplaçament horitzontal */
        }

        /* Estils per al contenidor principal */
        .container {
            background-color: #ffffff; /* Fons blanc */
            color: #000000; /* Text negre */
        }

        /* Estil del títol */
        .title {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Ombratge al títol */
        }

        /* Estils pels botons */
        .hover-animate {
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-animate:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        /* Estil del glow */
        .glow {
            position: absolute;
            width: 150px;
            height: 150px;
            background-color: rgba(255, 0, 0, 0.3); /* Color vermell difuminat */
            pointer-events: none; /* Evita interferir amb el ratolí */
            opacity: 0; /* Comença invisible */
            transition: opacity 2s ease;
            border-radius: 50%;
            filter: blur(30px);
            z-index: -1;
        }

        /* Estil del nou enllaç */
        .bg-dark-red {
            background-color: #8B0000; /* Color vermell fosc */
        }
    </style>
</head>
<body class="p-8 flex items-center justify-center min-h-screen">
<!-- Contenidor principal amb animació fade-in -->
<div class="max-w-2xl w-full container shadow-lg rounded-lg p-6 fade-in relative">
    <!-- Enllaç per tornar a la pàgina anterior -->
    <div class="absolute top-4 right-4">
        <a href="/films" style="font-size: 36px;"> <i class="fa">&#xf137;</i></a>
    </div>

    <h1 class="text-5xl font-extrabold mb-6 text-center title">Editar Pel·lícula</h1>

    <!-- Formulari d'edició -->
    <form action="/update" method="POST">
        <!-- ID ocult per actualitzar la pel·lícula correcta -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($film['id']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">

        <!-- Nom de la pel·lícula -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold">Nom:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($film['name']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3" required>
        </div>

        <!-- Director de la pel·lícula -->
        <div class="mb-4">
            <label for="director" class="block text-gray-700 font-semibold">Director:</label>
            <input type="text" name="director" value="<?= htmlspecialchars($film['director']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3" required>
        </div>

        <!-- Any de la pel·lícula -->
        <div class="mb-4">
            <label for="year" class="block text-gray-700 font-semibold">Any:</label>
            <input type="number" name="year" value="<?= htmlspecialchars($film['year']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3" required>
        </div>

        <!-- Descripcio de la pel·lícula -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold">Any:</label>
            <input type="text" name="description" value="<?= htmlspecialchars($film['description']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3" required>
        </div>

        <!-- Botó per enviar el formulari -->
        <div class="text-center">
            <button type="submit" class="bg-dark-red text-white px-6 py-3 rounded hover:bg-black hover-animate w-full">Editar</button>
        </div>
    </form>
</div>

<script>
    const glowArray = [];
    const maxGlowCount = 20;

    document.addEventListener('mousemove', (e) => {
        const { clientX: x, clientY: y } = e;
        createGlow(x, y);
    });

    function createGlow(x, y) {
        if (glowArray.length >= maxGlowCount) {
            const oldGlow = glowArray.shift(); // Elimina la marca més antiga
            oldGlow.remove(); // Removeix l'element del DOM
        }
        const glow = document.createElement('div');
        glow.classList.add('glow');
        glow.style.left = `${x - 75}px`;
        glow.style.top = `${y - 75}px`;
        glow.style.opacity = 1; // Mostra la marca
        document.body.appendChild(glow);
        glowArray.push(glow);
        setTimeout(() => {
            glow.style.opacity = 0; // Amaga la marca gradualment
        }, 0);
    }
</script>
</body>
</html>