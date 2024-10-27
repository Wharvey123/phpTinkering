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
            font-weight: bold; /* Make all table data cells bold */
        }
        /* Adjusted styles for the poster */
        .poster {
            width: 200px; /* Set to a smaller width */
            height: auto; /* Allow height to adjust based on aspect ratio */
            object-fit: cover;
            border-radius: 8px;
            margin: 0 auto; /* Center the poster */
        }
        /* Remove poster column from the table */
        .hidden-poster-column {
            display: none; /* Hide the poster column in the table */
        }
        /* Mida constant dels camps de la taula per mòbils */
        @media (max-width: 640px) {
            .table-cell {
                min-width: 100px; /* Change 100px to your desired minimum width */
            }
        }
    </style>
</head>
<body class="flex flex-col h-screen">
<?php require "../resources/views/layout/header.blade.php"; ?>

<div class="max-w-4xl w-full mx-auto container shadow-lg rounded-lg p-6 fade-in flex-grow mt-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-5xl font-extrabold title">Film</h1>
        <div class="top-right">
            <a href="/films" style="font-size: 36px;" class="text-white"> <i class="fa">&#xf137;</i></a>
        </div>
    </div>
    <div class="flex justify-center mb-4">
        <img id="posterImage" src="" alt="Movie Poster" class="poster">
    </div>
    <div class="overflow-x-auto mt-12">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden" id="filmsTable">
            <thead>
            <tr class="table-header text-sm uppercase leading-normal">
                <th class="py-3 px-6 text-left table-cell">Títol</th>
                <th class="py-3 px-6 text-left table-cell">Director</th>
                <th class="py-3 px-6 text-left table-cell">Any</th>
                <th class="py-3 px-6 text-left table-cell">Descripció</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            <?php if (empty($film)): ?>
            <tr>
                <td colspan="4" class="py-3 px-6 text-center">No hi ha pel·lícules disponibles.</td>
            </tr>
            <?php else: ?>
            <tr class="table-row border-b border-gray-200">
                <td class="py-3 px-6 table-cell"><?= htmlspecialchars($film['name']) ?></td>
                <td class="py-3 px-6 table-cell"><?= htmlspecialchars($film['director']) ?></td>
                <td class="py-3 px-6 table-cell"><?= htmlspecialchars($film['year']) ?></td>
                <td class="py-3 px-6 table-cell"><?= htmlspecialchars($film['description']) ?></td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require "../resources/views/layout/footer.blade.php"; ?>

<script>
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
