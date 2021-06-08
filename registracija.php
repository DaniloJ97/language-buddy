<?php
    session_start();
    $ulogovan=false;
    if(isset($_SESSION["username"])){
        $ulogovan=true;
        Header("Location: index.php");
        return;
    }
    require "header.php";
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=multimedijalna","root","");
    if(isset($_POST["imeKorisnika"]) && isset($_POST["prezimeKorisnika"]) && isset($_POST["mailKorisnika"])
    && isset($_POST["korisnickoIme"]) && isset($_POST["lozinkaKorisnika"]) && isset($_POST["potvrdaLozinke"])){
        $imeKorisnika=$_POST["imeKorisnika"];
        $prezimeKorisnika=$_POST["prezimeKorisnika"];
        $mailKorisnika=$_POST["mailKorisnika"];
        $korisnickoIme=$_POST["korisnickoIme"];
        $lozinkaKorisnika=$_POST["lozinkaKorisnika"];
        $statement1= $pdo->query("SELECT * FROM korisnik");
        $postoji=false;
        while($row=$statement1->fetch(PDO::FETCH_ASSOC)){
            if($row["username"]==$korisnickoIme){
                $_SESSION["usernameRegGreska"]="postoji";
                $postoji=true;
            break;
            }
            if($row["email"]==$mailKorisnika){
                $_SESSION["mailRegGreska"]="postoji";
                $postoji=true;
            break;
            }
        }
        if($postoji){
            Header("Location: registracija.php");
            return;
        }
        else {
            $_SESSION["mailRegGreska"]="ne postoji";
            $_SESSION["usernameRegGreska"]="ne postoji";
            $hashovanaLozinka=password_hash($lozinkaKorisnika,PASSWORD_DEFAULT);
            $statement2=$pdo->prepare("INSERT INTO korisnik(ime, prezime, email, username, lozinka) VALUES (:ime, :prezime, :email, :username, :lozinka)");
            $statement2->execute(
                array(
                    ":ime"=>$imeKorisnika,
                    ":prezime"=>$prezimeKorisnika,
                    ":email" => $mailKorisnika,
                    ":username" => $korisnickoIme,
                    ":lozinka" => $hashovanaLozinka
                )
            );
            Header("Location: index.php");
            return;
        }
    }
?>
    <div id="main-content" class="container">
    <h1 class="text-center" style="color:white; padding-top:20px; font-family: 'Oxygen', sans-serif">Registracija</h1>
    <form method="post" id="registracija" novalidate>
        <div class="row">
            <div class="col-md-6">
                <p><input type="text" class="polje input-group" id="imeKorisnika" name="imeKorisnika"  placeholder="Ime" required></p>
                <p class="greska"></p>
            </div>
            <div class="col-md-6">
                <p><input type="text" class="polje input-group" id="prezimeKorisnika" name="prezimeKorisnika" placeholder="Prezime" required></p>
                <p class="greska"></p>
            </div>
        </div>
        <p><input type="email" class="polje input-group" id="mailKorisnika" name="mailKorisnika" placeholder="E-mail" required minlength="8"></p>
        <p class="greska"><?php
            if(isset($_SESSION["mailRegGreska"])){
                if($_SESSION["mailRegGreska"]=="postoji"){
                    echo "Postoji već korisnik sa adresom koju ste uneli!";
                    unset($_SESSION["mailRegGreska"]);
                }
            }
        ?></p>
        <p><input type="text" class="polje input-group" id="korisnickoIme" name="korisnickoIme" placeholder="Korisničko ime" required></p>
        <p class="greska">
            <?php
                if(isset($_SESSION["usernameRegGreska"])){
                    if($_SESSION["usernameRegGreska"]=="postoji"){
                        echo "Korisničko ime je zauzeto. Probajte sa nekim drugim!";
                        unset($_SESSION["usernameRegGreska"]);
                    }
                }
            ?>
        </p>
        <div class="row">
            <div class="col-md-6">
                <p><input type="password" class="polje input-group" id="lozinkaKorisnika" name="lozinkaKorisnika" placeholder="Lozinka" required minlength="8"></p>
                <p class="greska"></p>
            </div>
            <div class="col-md-6">
                <p><input type="password" class="polje input-group" id="potvrdaLozinke" name="potvrdaLozinke" placeholder="Potvrda lozinke" required minlength="8"></p>
                <p class="greska">
            </div>
        </div>
        </p>
        <p><input type="submit" id="dugme2" value="Registruj se"></p>
    </form>
    </div>
    <footer>
        <div class="text-center">&copy; FONov tim za multimedijalnu produkciju</div>
    </footer>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validacija.js"></script>
</body>
</html>