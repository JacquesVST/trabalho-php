<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Shop</title>
    <link rel="stylesheet" href="./lib/bootstrap.min.css">
    <link rel="stylesheet" href="./lib/estilo.css">
</head>
<body>

    <div class="login-container d-flex align-items-center justify-content-center">
        <form class="login-form text-center" method="post" action="../api/login.php">
            <h1 class="mb-5 font-weight-light tex-uppercase">Login</h1>
            <div class="form-group">
                <input type="text" name="login" class="form-control rounded-pill form-control-lg" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <input type="text" name="senha" class="form-control rounded-pill form-control-lg" placeholder="Senha" required>
            </div>
            <div class="forgot-link d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label for="remember">Lembrar Senha</label>
                </div>
                <a href="#">Esqueceu sua Senha?</a>
            </div>
            <button type="submit" id="btnEntrar" class="btn mt-5 btn-custom text-uppercase btn-block rounded-pill btn-lg">Entrar</button>
            <p class="mt-3 font-weight-normal">Não possui uma conta <a href="#"><strong>Registre-se Agora</strong></a></p>
        </form>
    </div>
        
</body>
</html>