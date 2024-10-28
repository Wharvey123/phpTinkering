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
            <h1 class="text-5xl font-extrabold title">Editar Pel·lícula</h1>
            <div>
                <a href="/films" style="font-size: 36px;" class="text-dark-red hover:text-black"> <i class="fa">&#xf137;</i></a>
            </div>
        </div>

        <form action="/films/update/<?= htmlspecialchars($film['id']) ?>" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($film['id']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">

            <div class="mb-4">
                <label for="name" class="block text-white font-semibold">Nom:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($film['name']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" required>
            </div>

            <div class="mb-4">
                <label for="director" class="block text-white font-semibold">Director:</label>
                <input type="text" name="director" value="<?= htmlspecialchars($film['director']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" required>
            </div>

            <div class="mb-4">
                <label for="year" class="block text-white font-semibold">Any:</label>
                <input type="number" name="year" value="<?= htmlspecialchars($film['year']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-white font-semibold">Descripció:</label>
                <input type="text" name="description" value="<?= htmlspecialchars($film['description']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" required>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-dark-red text-white px-6 py-3 rounded hover:bg-black hover-animate w-full">Editar</button>
            </div>
        </form>
    </div>
</main>
<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>