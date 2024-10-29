<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotxes</title>
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
        tbody td {
            font-weight: bold;
        }
        .poster {
            width: 200px; /* Fixed width for desktop */
            height: auto;
            object-fit: cover;
            border-radius: 8px;
            margin: 0 auto;
        }
        .image-gallery-container {
            padding: 1rem; /* Padding around the gallery */
            display: flex; /* Set to flex for layout */
            overflow-x: hidden; /* Default to hidden for larger screens */
        }
        .image-gallery {
            display: flex;
            gap: 1rem; /* Space between images */
        }
        /* Enable horizontal scrolling for smaller screens */
        @media (max-width: 640px) {
            .image-gallery-container {
                overflow-x: auto; /* Enable horizontal scrolling */
            }
            .poster {
                width: 200px; /* Maintain the same width in mobile */
                height: auto; /* Maintain aspect ratio */
            }
            .table-cell {
                min-width: 100px;
            }
        }
    </style>
</head>
<body class="flex flex-col h-screen">
<?php require "../resources/views/layout/header.blade.php"; ?>

<div class="max-w-4xl w-full mx-auto container shadow-lg rounded-lg p-6 fade-in flex-grow mt-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-5xl font-extrabold title">Cotxes</h1>
        <div class="top-right">
            <a href="/cars" style="font-size: 36px;" class="text-white"> <i class="fa">&#xf137;</i></a>
        </div>
    </div>
    <div class="flex justify-center mb-4">
        <div class="image-gallery-container" id="imageGalleryContainer">
            <div class="image-gallery" id="imageGallery"></div>
        </div>
    </div>
    <div class="overflow-x-auto mt-12">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden" id="carsTable">
            <thead>
            <tr class="table-header text-sm uppercase leading-normal">
                <th class="py-3 px-6 text-left table-cell">Marca</th>
                <th class="py-3 px-6 text-left table-cell">Model</th>
                <th class="py-3 px-6 text-left table-cell">Any</th>
                <th class="py-3 px-6 text-left table-cell" style="width: 150px;">Preu</th> <!-- Increased width for price column -->
                <th class="py-3 px-6 text-left table-cell">Descripció</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            <?php if (empty($car)): ?>
            <tr>
                <td colspan="5" class="py-3 px-6 text-center">No hi ha cotxes disponibles.</td>
            </tr>
            <?php else: ?>
            <tr class="table-row border-b border-gray-200">
                <td class="py-3 px-6 table-cell"><?= htmlspecialchars($car['make']) ?></td>
                <td class="py-3 px-6 table-cell"><?= htmlspecialchars($car['model']) ?></td>
                <td class="py-3 px-6 table-cell"><?= htmlspecialchars($car['year']) ?></td>
                <td class="py-3 px-6 table-cell"><?= htmlspecialchars($car['price']) ?> €</td> <!-- Retained original font size -->
                <td class="py-3 px-6 table-cell"><?= htmlspecialchars($car['description']) ?></td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require "../resources/views/layout/footer.blade.php"; ?>

<script>
    const carMake = "<?= $car['make'] ?>";
    const carModel = "<?= $car['model'] ?>";
    const apiKey = "BZrzxWnJDomztVU6UQPQFbsjMb2btnIl9b_PpiPiWZs"; // Your Unsplash Access Key
    const apiUrl = `https://api.unsplash.com/search/photos?query=${encodeURIComponent(carMake + ' ' + carModel)}&client_id=${apiKey}`;
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            const imageGallery = document.getElementById('imageGallery');
            if (data.results && data.results.length > 0) {
                // Limit to the first four images
                const imagesToShow = data.results.slice(0, 4);
                imagesToShow.forEach(image => {
                    const imgElement = document.createElement('img');
                    imgElement.src = image.urls.regular;
                    imgElement.alt = "Car Image";
                    imgElement.classList.add('poster');
                    imageGallery.appendChild(imgElement);
                });
            } else {
                console.error("Car images not found.");
            }
        })
        .catch(error => console.error("Error fetching car images:", error));
</script>
</body>
</html>