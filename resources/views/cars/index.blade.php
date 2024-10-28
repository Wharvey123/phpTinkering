<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
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
        .table-header {
            background-color: darkred;
            color: white;
        }
        .table-row {
            transition: background-color 0.3s ease;
        }
        .table-row:hover {
            background-color: lightgray;
            color: black;
        }
        .glow-button {
            background-color: darkred;
            color: #fff;
            transition: box-shadow 0.3s ease;
        }
        .glow-button:hover {
            box-shadow: 0 0 8px 2px white;
        }
        tbody td {
            font-weight: bold;
        }
    </style>
</head>
<body class="flex flex-col h-screen">
<?php require "../resources/views/layout/header.blade.php"; ?>

<div class="max-w-4xl w-full mx-auto container shadow-lg rounded-lg p-6 fade-in flex-grow mt-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-5xl font-extrabold title">Cotxes</h1>
        <div class="top-right">
            <a href="/" style="font-size: 36px;" class="text-white"> <i class="fa">&#xf137;</i></a>
        </div>
    </div>
    <div class="top-left">
        <a href="/cars/create" class="glow-button px-6 py-3 rounded hover:bg-black hover-animate w-full">Afegir Nou Cotxe</a>
    </div>
    <div class="mt-4">
        <input type="text" id="search" placeholder="Cerca per any..." class="p-2 border border-gray-300 rounded w-full text-black" />
    </div>
    <div class="overflow-x-auto mt-12">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden" id="carsTable">
            <thead>
            <tr class="table-header text-sm uppercase leading-normal">
                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(0)">ID &#x21C5;</th>
                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(1)">Marca &#x21C5;</th> <!-- Marca is clickable -->
                <th class="py-3 px-6 text-left">Model</th> <!-- Model is not clickable -->
                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(3)">Any &#x21C5;</th>
                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(4)">Preu &#x21C5;</th>
                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(5)">Descripció &#x21C5;</th>
                <th class="py-3 px-6 text-center">Accions</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            <?php if (empty($cars)): ?>
            <tr>
                <td colspan="7" class="py-3 px-6 text-center">No hi ha cotxes disponibles.</td>
            </tr>
            <?php else: ?>
                <?php foreach ($cars as $car): ?>
            <tr class="table-row border-b border-gray-200">
                <td class="py-3 px-6"><?= htmlspecialchars($car['id']) ?></td>
                <td class="py-3 px-6">
                    <a href="/cars/show/<?= $car['id'] ?>" class="text-blue-500 hover:text-blue-700">
                            <?= htmlspecialchars($car['make']) ?> <!-- Marca -->
                    </a>
                </td>
                <td class="py-3 px-6"><?= htmlspecialchars($car['model']) ?></td> <!-- Model -->
                <td class="py-3 px-6"><?= htmlspecialchars($car['year']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($car['price']) ?> €</td>
                <td class="py-3 px-6"><?= htmlspecialchars($car['description']) ?></td>
                <td class="py-3 px-6 text-center">
                    <a href="/cars/edit/<?= $car['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="/cars/delete/<?= $car['id'] ?>" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require "../resources/views/layout/footer.blade.php"; ?>

<script>
    const searchInput = document.getElementById('search');
    searchInput.addEventListener('input', function () {
        const filter = searchInput.value.toLowerCase();
        const rows = document.querySelectorAll('#carsTable tbody tr');
        rows.forEach(row => {
            const yearCell = row.cells[3].textContent.toLowerCase();
            row.style.display = yearCell.includes(filter) ? '' : 'none';
        });
    });

    let sortDirection = true;
    function sortTable(colIndex) {
        const table = document.getElementById('carsTable');
        const rows = Array.from(table.rows).slice(1);
        rows.sort((a, b) => {
            const aText = a.cells[colIndex].textContent.trim();
            const bText = b.cells[colIndex].textContent.trim();
            if (colIndex === 0) {
                return sortDirection
                    ? parseInt(aText) - parseInt(bText)
                    : parseInt(bText) - parseInt(aText);
            } else if (colIndex === 1 || colIndex === 3 || colIndex === 4 || colIndex === 5) {
                return sortDirection
                    ? aText.localeCompare(bText)
                    : bText.localeCompare(aText);
            }
            return 0;
        });
        const tbody = table.querySelector('tbody');
        tbody.innerHTML = '';
        rows.forEach(row => {
            tbody.appendChild(row);
        });
        sortDirection = !sortDirection;
    }
</script>
</body>
</html>