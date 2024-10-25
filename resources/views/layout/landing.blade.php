<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecte PHP - Landing</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abolition&family=Ratio+Modern&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #111; /* Fons negre */
            color: #fff; /* Text blanc */
            overflow-x: hidden; /* Evita el desplaçament horitzontal */
            font-family: 'Roboto', sans-serif; /* Font moderna per al text */
        }

        /* Estils per al bloc de títol */
        .title-block {
            background-color: #ffffff; /* Fons blanc */
            color: #000000; /* Text negre */
            padding: 3rem 1.5rem; /* Espai interior */
            border-radius: 0.5rem; /* Cantons arrodonits */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Ombra */
            text-align: center; /* Centrat */
            max-width: 90%; /* Màxima amplada */
            transition: box-shadow 0.3s ease; /* Transició per al glow */
            margin: 0 auto; /* Centrat a la pantalla */
        }

        /* Glow effect for title block */
        .title-block:hover {
            box-shadow: 0 0 30px rgba(255, 255, 255, 1); /* Glow blanc */
        }

        h1 {
            font-family: 'Abolition', sans-serif; /* Font per al títol */
            font-size: 4rem; /* Ajusta la mida de la font si és necessari */
        }

        h2 {
            font-family: 'Ratio Modern', sans-serif; /* Font per al subtítol */
            font-size: 1.75rem; /* Mida per al subtítol */
        }

        /* Estils per als botons */
        .button {
            width: 80px; /* Ample del botó per fer-ho quadrat */
            height: 80px; /* Alt del botó per fer-ho quadrat */
            transition: background-color 0.3s ease, transform 0.3s ease; /* Transició suau */
            border-radius: 0.375rem; /* Cantons arrodonits */
            background-color: darkred; /* Color de fons del botó */
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px; /* Espai entre botons */
        }

        .button:hover {
            background-color: black; /* Color del botó quan es passa el ratolí */
            transform: scale(1.05); /* Lleuger efecte de creixement */
        }

        /* Estils per a les marques de brillantor */
        .glow {
            position: absolute;
            width: 150px; /* Ample de la marca */
            height: 150px; /* Alt de la marca */
            background-color: rgba(255, 0, 0, 0.3); /* Color vermell difuminat */
            pointer-events: none; /* Evita interferir amb el ratolí */
            opacity: 0; /* Comença invisible */
            transition: opacity 2s ease; /* Transició d'opacitat */
            border-radius: 50%; /* Forma circular */
            filter: blur(30px); /* Difuminat */
            z-index: -1; /* Darrere de la resta del contingut */
        }

        /* Estils per a la responsive */
        @media (max-width: 640px) {
            h1 {
                font-size: 3rem; /* Mida per a mòbil */
            }
            h2 {
                font-size: 1.25rem; /* Mida per a mòbil */
            }
            .title-block {
                padding: 2rem 1rem; /* Espai interior per a mòbil */
            }
            .space-x-4 {
                flex-wrap: wrap; /* Permet que els botons es distribueixin a la següent línia si és necessari */
                justify-content: center; /* Centra els botons */
                gap: 1rem; /* Espai entre botons */
            }
        }
    </style>
</head>
<body class="relative flex items-center justify-center min-h-screen">
<!-- Contingut principal -->
<div class="title-block relative z-20">
    <h1 class="mb-4">Cinema i Automòbils</h1>
    <h2 class="mb-4">Descobreix el món del cinema i dels cotxes!<br>Fes clic als botons!</h2>
    <!-- Botons per a la navegació -->
    <div class="space-x-4 flex justify-center flex-wrap">
        <a href="/films" class="button">
            <i class="fas fa-film fa-2xl text-white"></i> <!-- Icon size increased -->
        </a>
        <a href="/cars" class="button">
            <i class="fas fa-car fa-2xl text-white"></i> <!-- Icon size increased -->
        </a>
    </div>
</div>

<script>
    const glowArray = []; // Array per guardar les marques de brillantor
    const maxGlowCount = 20; // Nombre màxim de marques que poden estar visibles alhora
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
        glow.style.left = `${x - 75}px`; // Centra la marca al cursor
        glow.style.top = `${y - 75}px`; // Centra la marca al cursor
        glow.style.opacity = 1; // Mostra la marca
        document.body.appendChild(glow); // Afegeix al document
        glowArray.push(glow); // Afegeix a l'array de marques
        // Restableix l'opacitat després de 1 segon
        setTimeout(() => {
            glow.style.opacity = 0; // Amaga la marca gradualment
        }, 0); // A partir del moment en què es crea
    }
</script>
</body>
</html>