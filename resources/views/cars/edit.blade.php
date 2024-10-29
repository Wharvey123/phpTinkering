<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cotxe</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
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
            font-weight: bold;
        }
    </style>
</head>
<body class="flex flex-col h-screen">
<?php require "../resources/views/layout/header.blade.php"; ?>

<main class="flex-grow flex items-center justify-center">
    <div class="max-w-4xl w-full container shadow-lg rounded-lg p-6 fade-in mx-auto mt-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-5xl font-extrabold title">Editar Cotxe</h1>
            <div>
                <a href="/cars" style="font-size: 36px;" class="text-dark-red hover:text-black"> <i class="fa">&#xf137;</i></a>
            </div>
        </div>

        <form action="/cars/update/<?= htmlspecialchars($car['id']) ?>" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($car['id']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            <div class="mb-4">
                <label for="make" class="block text-white font-semibold">Marca:</label>
                <input type="text" name="make" value="<?= htmlspecialchars($car['make']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" required>
            </div>
            <div class="mb-4">
                <label for="model" class="block text-white font-semibold">Model:</label>
                <input type="text" name="model" value="<?= htmlspecialchars($car['model']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" required>
            </div>
            <div class="mb-4">
                <label for="year" class="block text-white font-semibold">Any de fabricació:</label>
                <input type="number" name="year" value="<?= htmlspecialchars($car['year']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-white font-semibold">Preu (en euros):</label>
                <input type="number" name="price" value="<?= htmlspecialchars($car['price']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-white font-semibold">Descripció:</label>
                <input type="text" name="description" value="<?= htmlspecialchars($car['description']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 text-black" required>
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