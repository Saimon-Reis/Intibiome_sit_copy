<?Php include_once 'conexao.php';

//ver se exiete email e senha 
if(isset($_POST['email']) || isset($_POST['senha'])){
    //verificar se esta em branco 
    if(strlen($_POST['email'])== 0){
        echo "O email garai";
    }else if(strlen($_POST['senha'])== 0){
       echo "Voce é burro? a senha";
    }else{
        //limpando os campos para um Qa não usar insert
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
         
        //verificando se os capos estão corretos
        $sql_code = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha, o dev é um inutil sem conexao SQL" . $mysqli->error);

        //retorno de linhas
        $quantia = $sql_query->num_rows;

        if($quantia == 1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['email'] = $usuario['email'];

            //redirecionando meu usuario para a pagina após login
            header("location: painel.php");

        }else{
            echo "erro senha e email";
        }


    }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/tela.css">
    <script src="https://kit.fontawesome.com/af636e4c2d.js" crossorigin="anonymous"></script>
</head>
<body background="./img/por_sol.avif">

<header>
        <div class="cabeça">
            <div class="texto">
                <!--<h1>JAPAN</h1>-->
                <h1>BIOME</h1>
            </div>
        </div>
    </header>


  <!--  <h1>Login</h1>
    <form action="" method="POST">
        <p>
        <label>Email</label>
        <input type="text" name="email">
        </p>
        <p>
        <label>senha</label>
        <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">entrar</button>
        </p>
    </form>-->


    <form action="" method="POST">
    <section>
        <div class="form-box">
            <div class="form-value">
                <div class="form" >
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email">
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="senha">
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
                      
                    </div>
                    <button type="submit">entrar</button>
                    <div class="register">
                        <p>Don't have a account <a href="#">Register</a></p>
                    </div>
             </div>
            </div>
        </div>
    </section>
    </form>

</body>
</html>