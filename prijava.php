<?php
    session_start();
    $ulogovan=false;
    if(isset($_SESSION["username"])){
        Header("Location: index.php");
        return;
    }
    $pdo=new PDO("mysql:host=localhost;port=3306;dbname=multimedijalna", "root", "");
    if(isset($_POST["korisnickoime"]) && isset($_POST["lozinka"])){
        $korisnickoime=$_POST["korisnickoime"];
        $lozinka=$_POST["lozinka"];
        if($korisnickoime!="" && $lozinka!=""){
            $pogodak=false;
            $statement=$pdo->prepare("SELECT * FROM korisnik WHERE username=:username");
            $statement->execute(
                array(
                    ":username"=>$korisnickoime
                )
            );
            if($row=$statement->fetch(PDO::FETCH_ASSOC)){
                if(password_verify($lozinka,$row["lozinka"])){
                    $pogodak=true;
                    $_SESSION["username"]=$korisnickoime;
                }
            }
            if($pogodak==false){
                $_SESSION["findIme"]="nepronadjeno";
                $_SESSION["findLozinka"]="nepronadjeno";
                header("Location: prijava.php");
                return;
            }
            else {
                $_SESSION["findIme"]="pogodak";
                $_SESSION["findLozinka"]="pogodak";
                header("Location: index.php");
                return;
            }
        }
        else {
            if($korisnickoime==""){
                $_SESSION["statusIme"]="prazno";
            }
            if($lozinka==""){
                $_SESSION["statusLozinka"]="prazno";
            }
        }
        header("Location: prijava.php");
        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LanguageBuddy - Najbolji sajt za učenje stranih jezika</title>
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="images/avatar.jpg">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <header>
        <nav id="header-nav" class="navbar navbar-expand-lg navbar-light">
            <div id="nav-container" class="container">
                <div class="navbar-brand">
                    <a href="index.php">
                        <div id="logo"></div>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nasMeni">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="nasMeni" class="collapse navbar-collapse">
                    <ul id="lista" class="nav navbar-nav ml-auto">
                        <li><a href="index.php"><i class="fas fa-home"></i> <br class="d-none d-lg-block">POCETNA</a></li>
                        <li><a href="prijava.php"><i class="fas fa-sign-in-alt"></i> <br class="d-none d-lg-block">PRIJAVA</a></li>
                        <li><a href="registracija.php"><i class="fas fa-user-plus"></i> <br class="d-none d-lg-block">REGISTRACIJA</a></li>
                        <li><a href="onama.php"><i class="fas fa-info-circle"></i> <br class="d-none d-lg-block">O NAMA</a></li>
                        <li><a href="kontakt.php"><i class="fas fa-phone"></i> <br class="d-none d-lg-block">KONTAKT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="main-content" class="container">
    <h1 class="text-center" style="color:white;padding-top:20px; font-family: 'Oxygen', sans-serif">Prijava</h1>
    <div id="prijava">
    <form method="post">
        <p><input class="loginPolje" type="text" id="korisnickoime" name="korisnickoime" placeholder="korisničko ime"></p>
        <?php
            if(isset($_SESSION["statusIme"])){
                echo "<p class='greska'>Morate uneti korisničko ime!</p>";
                unset($_SESSION["statusIme"]);
            }
        ?>
        <p><input class="loginPolje" type="password" id="lozinka" name="lozinka" placeholder="lozinka"></p>
            <?php
                if(isset($_SESSION["statusLozinka"])){
                    echo "<p class='greska'>Morate uneti lozinku!</p>";
                    unset($_SESSION["statusLozinka"]);
                }
            ?>
        <p><input id="dugme1" type="submit" value="Prijavi se"></p>
        <?php
            if(isset($_SESSION["findIme"]) && isset($_SESSION["findLozinka"])){
                if($_SESSION["findIme"]=="nepronadjeno" || $_SESSION["findLozinka"]=="nepronadjeno"){
                    echo "<p class='greska'>Niste dobro uneli korisničko ime ili lozinku!</p>";
                    unset($_SESSION["findIme"]);
                    unset($_SESSION["findLozinka"]);
                }
            }
        ?>
    </form>  
    </div>
    </div>
    <footer>
        <div class="text-center">&copy; FONov tim za multimedijalnu produkciju</div>
    </footer>
    
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>