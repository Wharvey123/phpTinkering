<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir Nova Pel·lícula</title>
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
<body class="flex flex-col h-screen">
<?php require "../resources/views/layout/header.blade.php"; ?>

<main class="flex-grow flex items-center justify-center">
    <div class="max-w-4xl w-full container shadow-lg rounded-lg p-6 fade-in mx-auto mt-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-5xl font-extrabold title">Afegir Nova Pel·lícula</h1>
            <div>
                <a href="/films" style="font-size: 36px;" class="text-dark-red hover:text-black"> <i class="fa">&#xf137;</i></a>
            </div>
        </div>

        <form action="/store" method="POST">
            <!-- Camp per al títol de la pel·lícula -->
            <div class="mb-4">
                <label for="name" class="block text-white font-semibold">Títol:</label>
                <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" placeholder="Escriu el títol de la pel·lícula">
            </div>

            <!-- Camp per al director de la pel·lícula -->
            <div class="mb-4">
                <label for="director" class="block text-white font-semibold">Director:</label>
                <input type="text" name="director" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" placeholder="Escriu el nom del director">
            </div>

            <!-- Camp per a l'any de llançament de la pel·lícula -->
            <div class="mb-4">
                <label for="year" class="block text-white font-semibold">Any de llançament:</label>
                <input type="number" name="year" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" placeholder="Escriu l'any de llançament">
            </div>

            <!-- Camp per a la descripció de la pel·lícula -->
            <div class="mb-4">
                <label for="description" class="block text-white font-semibold">Descripció:</label>
                <input type="text" name="description" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" placeholder="Escriu una descripció breu (255 caràcters max)">
            </div>

            <!-- Botó per afegir la pel·lícula -->
            <div class="text-center">
                <button type="submit" class="bg-dark-red text-white px-6 py-3 rounded hover:bg-black hover-animate w-full">Afegir Pel·lícula</button>
            </div>
        </form>
    </div>
</main>

<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>