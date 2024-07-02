<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <main>
        <form  method="post"> <!-- Utiliza route en lugar de router -->
            @csrf <!-- Agrega el token CSRF -->
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
            </div>
            <div class="mb-3">
                <label for="userInput" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="userInput" name="name" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </main>
</body>
</html>
