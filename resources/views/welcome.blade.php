<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INICIO </title>



    <script src="https://kit.fontawesome.com/ec7c892af7.js"crossorigin="anonymous">b</script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  

    <style>
    nav {
            background-color: #333;
            padding: 10px 0;
        }

        nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    text-align: right; /* Alinea el texto a la derecha */
}

nav ul li {
    display: inline-block;
    margin: 0 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: #555;
}

        h1{
            text-align: center;
        }
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }


    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }


    .game-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        list-style: none;
        padding: 0;
        margin: 0;
    }


    .game-item {
        background-color: #f9f9f9;
        border-radius: 5px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }


    .game-item a {
        text-decoration: none;
        color: #333;
    }


    .game-item a:hover {
        color: #f0f2f5;
    }


    .game-name {
        font-weight: bold;
        margin-bottom: 10px;
    }


    .game-price {
        color: #888;
    }
    .game-item {
    position: relative;
    width: 200px; 
    height: 300px; 
}

.game-item img {
    max-width: 100%;
    max-height: 100%;
    display: block;
    margin: 0 auto;
    width: 100%; 
    height: auto; 
}
.footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

.footer-links ul {
    list-style: none;
    padding: 0;
}

.footer-links ul li {
    display: inline-block;
    margin-right: 10px;
}

.footer-links ul li:last-child {
    margin-right: 0;
}

.social-media {
    margin-top: 10px;
}

.social-media a {
    color: #fff;
    text-decoration: none;
    margin-right: 10px;
}

.social-media a:last-child {
    margin-right: 0;
}

.footer p {
    margin-top: 20px;
}
.button-container .add-to-cart {
    background-color: #ff69b4; /* Rosa */
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    margin-right: 10px; /* Espacio entre los botones */
    cursor: pointer;}

    h1{
        color: white;
        text-shadow: 1px 2px 2px black, 0 0 25px blue, 0 0 5px blue;
        text-align: center;
        padding: 5px 20px;
    
    }
    h2{
        color: white;
        text-shadow: 1px 2px 2px black, 0 0 25px blue, 0 0 5px blue;
        text-align: center;
        padding: 5px 20px;
    
    }
    h3{
        color: white;
        text-shadow: 1px 2px 2px black, 0 0 25px blue, 0 0 5px blue;
        text-align: center;
        padding: 3px 15px;
    
    }
    p   {
        font-size: 24px;
    }

    </style>
</head>
<body>
    @include('blade/partials/nav')
    

    <main>
        <div class="container">
          <div class="jumbotron">
            <h1> sixGames </h1>
            <p>todos los juegos dijitales un clic de distancia </p>

            <div class="button-container">
                <form action="/juegos">
                    <button type="submit" class="add-to-cart" >Catalogo de juegos </button>
                </form>
            </div>
            

          </div>
        </div>
 </main>
 @include('blade/partials/footer')
 
</body>
</html>