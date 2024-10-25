<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
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
            overflow-x: hidden; /* Evitar el desplaçament horitzontal */
        }
        .container {
            background-color: #ffffff; /* Fons blanc */
            color: #000000; /* Text negre */
            position: relative;
            padding: 1rem; /* Afegeix padding per evitar el desplaçament horitzontal */
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
            background-color: lightgray; /* Canvi de color de fons a gris clar */
            color: black; /* Opcional: canvia el color del text a negre */
        }
        .glow-button {
            background-color: darkred; /* Fons dark red */
            color: #fff; /* Text blanc */
            transition: box-shadow 0.3s ease;
        }
        .glow-button:hover {
            box-shadow: 0 0 8px 2px white; /* Efecte glow blanc */
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
        /* Posició del botó a la dreta amb més marge */
        .top-right {
            position: absolute;
            top: 20px; /* Més espai des de dalt */
            right: 30px; /* Més marge des de la dreta */
        }
        /* Botó d'afegir nova pel·lícula alineat amb el títol */
        .top-left {
            margin-top: 20px; /* Ajustat per estar a sota del títol */
            left: 0;
            position: relative;
        }
        .table-row td {
            font-weight: bold;
        }
        /* Estils responsius */
        @media (max-width: 640px) {
            .top-right {
                right: 10px; /* Ajusta el marge en mòbil */
                top: 10px; /* Ajusta la posició en mòbil */
            }
            .title {
                font-size: 3rem; /* Ajusta la mida del títol en mòbil */
            }
            .container {
                padding: 1rem; /* Més espai a la pàgina en mòbil */
            }
            .glow-button {
                width: 100%; /* Botó ocupa tot l'ample en mòbil */
                margin-top: 1rem; /* Espai superior per al botó */
            }
            .mt-12 {
                margin-top: 1.5rem; /* Espai per la taula en mòbil */
            }
            .p-8 {
                padding-left: 1rem; /* Marges iguals esquerra i dreta */
                padding-right: 1rem; /* Marges iguals esquerra i dreta */
            }
        }
    </style>
</head>
<body class="p-8 flex items-center justify-center min-h-screen">
<!-- Contenidor principal amb animació fade-in -->
<div class="max-w-4xl w-full mx-auto container shadow-lg rounded-lg p-6 fade-in">
    <h1 class="text-5xl font-extrabold mb-8 text-center title">Films</h1>
    <!-- Botó per afegir una nova pel·lícula alineat amb el títol -->
    <div class="top-left">
        <a href="/create" class="glow-button px-6 py-3 rounded hover:bg-black hover-animate w-full">Afegir Nova Pel·lícula</a>
    </div>
    <!-- Botó per tornar a la pàgina principal amb icona i fons negre -->
    <div class="top-right">
        <a href="/" style="font-size: 36px;"> <i class="fa">&#xf137;</i></a>
    </div>
    <!-- Cercador per filtrar pel·lícules per any -->
    <div class="mt-4">
        <input type="text" id="search" placeholder="Cerca per any..." class="p-2 border border-gray-300 rounded w-full" />
    </div>
    <!-- Taula de films amb estil millorat -->
    <div class="overflow-x-auto mt-12">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden" id="filmsTable">
            <thead>
            <tr class="table-header text-sm uppercase leading-normal">
                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(0)">ID &#x21C5;</th> <!-- Icone de ordenar -->
                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(1)">Títol &#x21C5;</th> <!-- Icone de ordenar -->
                <th class="py-3 px-6 text-left">Director</th>
                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(3)">Any &#x21C5;</th> <!-- Icone de ordenar -->
                <th class="py-3 px-6 text-center">Accions</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            <!-- Comprovació si hi ha films disponibles -->
            <?php if (empty($films)): ?>
            <tr>
                <td colspan="5" class="py-3 px-6 text-center">No hi ha pel·lícules disponibles.</td>
            </tr>
            <?php else: ?>
                    <!-- Bucle per mostrar cada pel·lícula -->
                <?php foreach ($films as $film): ?>
            <tr class="table-row border-b border-gray-200">
                <td class="py-3 px-6"><?= htmlspecialchars($film['id']) ?></td>
                <td class="py-3 px-6">
                    <a href="/show/<?= $film['id'] ?>" class="text-blue-500 hover:text-blue-700">
                            <?= htmlspecialchars($film['name']) ?>
                    </a> <!-- Enllaç al detall de la pel·lícula -->
                </td>
                <td class="py-3 px-6"><?= htmlspecialchars($film['director']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($film['year']) ?></td>
                <td class="py-3 px-6 text-center">
                    <a href="/edit/<?= $film['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">
                        <i class="fas fa-edit"></i> <!-- Icona d'editar -->
                    </a>
                    <a href="/delete/<?= $film['id'] ?>" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash-alt"></i> <!-- Icona d'eliminar -->
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Filtrar per any
    const searchInput = document.getElementById('search');
    searchInput.addEventListener('input', function () {
        const filter = searchInput.value.toLowerCase();
        const rows = document.querySelectorAll('#filmsTable tbody tr');
        rows.forEach(row => {
            const yearCell = row.cells[3].textContent.toLowerCase();
            row.style.display = yearCell.includes(filter) ? '' : 'none'; // Filtra la fila
        });
    });
    // Ordenar la taula
    let sortDirection = true; // True per ascendent, false per descendent
    function sortTable(colIndex) {
        const table = document.getElementById('filmsTable');
        const rows = Array.from(table.rows).slice(1); // Ignore the header
        rows.sort((a, b) => {
            const aText = a.cells[colIndex].textContent.trim(); // Trim whitespace
            const bText = b.cells[colIndex].textContent.trim(); // Trim whitespace
            // Sort ID as numbers, other columns as strings
            if (colIndex === 0) { // If ID column
                return sortDirection
                    ? parseInt(aText) - parseInt(bText)
                    : parseInt(bText) - parseInt(aText);
            } else if (colIndex === 1 || colIndex === 3) { // If Title or Year
                return sortDirection
                    ? aText.localeCompare(bText)
                    : bText.localeCompare(aText);
            }
            return 0; // Don't sort by other columns
        });
        // Clear existing rows
        const tbody = table.querySelector('tbody');
        tbody.innerHTML = ''; // Clear existing rows
        // Re-add sorted rows without changing font weight
        rows.forEach(row => {
            tbody.appendChild(row); // Re-add the row
        });
        sortDirection = !sortDirection; // Toggle the sorting direction
    }
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