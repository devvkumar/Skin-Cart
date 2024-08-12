<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php include 'backend/link.php'; ?>
</head>

<body>
    
    <?php include 'header.php'; ?>

    <h1 class="mt-4" style="display: flex; justify-content:center; ">How to Apply Skin on Mobile</h1>

    <!-- Embed YouTube Video -->
    <div class="container mt-4" style = "display:contents;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/J7-HlQydtm8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Add space between videos -->
    <div class="container mt-5"></div> 

    <h1 class="mt-2" style="display: flex; justify-content:center; ">How to Apply Skin on Laptop</h1>

    <div class="container mt-4" style = "display:contents;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/QcZreOs3daE?si=vYtO9SlCNtI5OJYQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- End Embed YouTube Video -->

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>

</html>
