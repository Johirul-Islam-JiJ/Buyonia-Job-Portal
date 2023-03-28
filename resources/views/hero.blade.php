<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <title>My Website</title>
    <style>
        /* Sticky navbar */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Hero section */
        .hero {
            height: 500px;
            /* Change height to your desired value */
            background-image: url('path/to/your/image.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Centered title */
        .hero h1 {
            color: #fff;
            font-size: 48px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu 2</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero section -->
    <section class="hero">
        <div class="container">
            <h1>My Website</h1>
        </div>
    </section>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>

</html>
