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
        body {
            background-color: #111;
            color: #fff;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        tbody td {
            font-weight: bold; /* Make all table data cells bold */
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
<?php require "../resources/views/layout/header.blade.php"; ?>
        <!-- Contenidor principal amb animació fade-in -->
<main class="flex-grow flex items-center justify-center p-4"> <!-- Added padding for mobile -->
    <div class="max-w-lg bg-white w-full shadow-lg rounded-lg p-6 fade-in"> <!-- Removed container class -->
        <h1 class="text-5xl text-black font-extrabold mb-6 text-center title">Eliminar Pel·lícula</h1>
        <!-- Missatge de confirmació d'eliminació -->
        <p class="text-lg text-black mb-6 text-center">Vols eliminar la pel·lícula "<strong><?= htmlspecialchars($film['name']) ?></strong>"?</p>
        <!-- Formulari per eliminar la pel·lícula -->
        <form action="/films/destroy" method="POST" class="text-center">
            <input type="hidden" name="id" value="<?= htmlspecialchars($film['id']) ?>">
            <button type="submit" class="bg-dark-red text-white px-6 py-3 rounded hover:bg-black hover-animate">Eliminar</button>
        </form>
        <!-- Enllaç per cancel·lar i tornar a la pàgina principal -->
        <div class="text-center mt-6">
            <a href="/films" class="text-black hover:underline">Cancel·lar</a>
        </div>
    </div>
</main>
<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>