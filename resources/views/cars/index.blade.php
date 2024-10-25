<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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

        /* Estils per a la taula */
        .table-header {
            background-color: darkred; /* Fons vermell fosc */
            color: white; /* Text blanc */
        }

        .table-row {
            transition: background-color 0.3s ease; /* Transició suau */
        }

        .table-row:hover {
            background-color: rgba(255, 0, 0, 0.1); /* Efecte hover */
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
    </style>
</head>
<body class="p-8 flex items-center justify-center min-h-screen">
<!-- Contenidor principal amb animació fade-in -->
<div class="max-w-4xl w-full mx-auto container shadow-lg rounded-lg p-6 fade-in">
    <h1 class="text-5xl font-extrabold mb-8 text-center title">Cars</h1>

    <!-- Botó per afegir un nou cotxe amb estil coherent -->
    <div class="mb-6 text-center">
        <a href="/create" class="bg-darkred text-white px-6 py-3 rounded hover:bg-black hover-animate">Afegir Nou Cotxe</a>
    </div>

    <!-- Botó per tornar a la pàgina principal -->
    <div class="mb-6 text-center">
        <a href="/" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 hover-animate">Tornar a la Pàgina Principal</a>
    </div>

    <!-- Taula de cotxes amb estil millorat -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
            <thead>
            <tr class="table-header text-sm uppercase leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Model</th>
                <th class="py-3 px-6 text-left">Marca</th>
                <th class="py-3 px-6 text-left">Any</th>
                <th class="py-3 px-6 text-center">Accions</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            <!-- Comprovació si hi ha cotxes disponibles -->
            <?php if (empty($cars)): ?>
            <tr>
                <td colspan="5" class="py-3 px-6 text-center">No hi ha cotxes disponibles.</td>
            </tr>
            <?php else: ?>
                    <!-- Bucle per mostrar cada cotxe -->
                <?php foreach ($cars as $car): ?>
            <tr class="table-row border-b border-gray-200">
                <td class="py-3 px-6"><?= htmlspecialchars($car['id']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($car['model']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($car['brand']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($car['year']) ?></td>
                <td class="py-3 px-6 text-center">
                    <a href="/edit/<?= $car['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">Editar</a>
                    <a href="/delete/<?= $car['id'] ?>" class="text-red-500 hover:text-red-700">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
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