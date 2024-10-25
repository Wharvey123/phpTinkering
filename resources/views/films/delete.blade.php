<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Pel·lícula</title>
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
<div class="max-w-lg w-full container shadow-lg rounded-lg p-6 fade-in">
    <h1 class="text-5xl font-extrabold mb-6 text-center title">Eliminar Pel·lícula</h1>
    <!-- Missatge de confirmació d'eliminació -->
    <p class="text-lg mb-6 text-center">Vols eliminar la pel·lícula "<strong><?= htmlspecialchars($film['name']) ?></strong>"?</p>

    <!-- Formulari per eliminar la pel·lícula -->
    <form action="/destroy" method="POST" class="text-center">
        <input type="hidden" name="id" value="<?= htmlspecialchars($film['id']) ?>">
        <button type="submit" class="bg-dark-red text-white px-6 py-3 rounded hover:bg-black hover-animate">Eliminar</button>
    </form>

    <!-- Enllaç per cancel·lar i tornar a la pàgina principal -->
    <div class="text-center mt-6">
        <a href="/films" class="text-gray-500 hover:underline">Cancel·lar</a>
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