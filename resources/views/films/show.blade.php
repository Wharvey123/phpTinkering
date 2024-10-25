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
        /* Adjusted styles for a wider poster */
        .poster {
            width: 200px;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 1rem;
        }

        /* Custom column width for the poster */
        .poster-column {
            width: 220px; /* Ensures extra space for the poster */
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
<div class="max-w-5xl w-full mx-auto container shadow-lg rounded-lg p-6 fade-in">
    <h1 class="text-5xl font-extrabold mb-8 text-center title">Film</h1>
    <div class="top-right">
        <a href="/films" style="font-size: 36px;"> <i class="fa">&#xf137;</i></a>
    </div>
    <div class="overflow-x-auto mt-12">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden" id="filmsTable">
            <thead>
            <tr class="table-header text-sm uppercase leading-normal">
                <th class="py-3 px-6 text-left poster-column">Poster</th>
                <th class="py-3 px-6 text-left">Títol</th>
                <th class="py-3 px-6 text-left">Director</th>
                <th class="py-3 px-6 text-left">Any</th>
                <th class="py-3 px-6 text-left">Descripció</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            <?php if (empty($film)): ?>
            <tr>
                <td colspan="5" class="py-3 px-6 text-center">No hi ha pel·lícules disponibles.</td>
            </tr>
            <?php else: ?>
            <tr class="table-row border-b border-gray-200">
                <td class="py-3 px-6 poster-column">
                    <img id="posterImage" src="" alt="Movie Poster" class="poster">
                </td>
                <td class="py-3 px-6"><?= htmlspecialchars($film['name']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($film['director']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($film['year']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($film['description']) ?></td>
            </tr>
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
    // Fetch movie poster using OMDb API
    const movieTitle = "<?= $film['name'] ?>"; // PHP variable for movie title
    const movieYear = "<?= $film['year'] ?>";   // PHP variable for movie year
    const apiKey = "e897831c"; // Your OMDb API key

    // Construct the API URL
    const apiUrl = `http://www.omdbapi.com/?t=${encodeURIComponent(movieTitle)}&y=${movieYear}&apikey=${apiKey}`;

    // Fetch the movie poster
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.Response === "True") {
                // Set the poster image source to the fetched URL
                document.getElementById('posterImage').src = data.Poster;
            } else {
                console.error("Poster not found:", data.Error);
            }
        })
        .catch(error => console.error("Error fetching poster:", error));
</script>
</body>
</html>