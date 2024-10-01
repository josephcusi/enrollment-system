
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - Baco Community College</title>
    <style>
        body {
           font-family: 'Poppins', Arial, sans-serif;
        background-color: white;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        flex-direction: column;
        }

        .container {
            text-align: center;
          
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #e74c3c;
        }

        p {
            font-size: 1.5rem;
            color: #555;
        }

        .button {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.8rem 2.5rem;
            background-color: #3498db;
            color: #fff;
            font-size: 1.2rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><img src="<?=base_url()?>/cssjs/img/404.jpg" alt="dormehi Logo" width="700px" height="auto"></h1>
         <p>
            <?php if (ENVIRONMENT !== 'production') : ?>
                <?= nl2br(esc($message)) ?>
            <?php else : ?>
                Sorry! Cannot seem to find the page you were looking for.
            <?php endif ?>
        </p>
    </div>
</body>
</html>

