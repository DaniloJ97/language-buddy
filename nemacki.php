<?php
        session_start();
        $ulogovan=false;
        if(isset($_SESSION["username"])){
            $ulogovan=true;
            require "header2.php";
        }
        else{
            Header("Location: index.php");
            return;
        }

    ?>
    <div class="spisakSadrzaja">
    <h1 style="font-size: 30px;font-family: 'Oxygen', sans-serif">Spisak sadržaja</h1>
        <button type="button" class="padajuci" id="lekcijePadajuci"><h2><i class="fas fa-sun"></i>Video lekcije</h2></button>
        <div class="videoLekcije">
        <div class="videoLekcija materijal aktivna"> <i class="fas fa-play-circle"></i>Prva lekcija/First lesson</div>
        <div class="videoLekcija materijal"><i class="fas fa-play-circle"></i>Druga lekcija/Second lesson</div>
        <div class="videoLekcija materijal"><i class="fas fa-play-circle"></i>Treća lekcija/Third lesson</div>
        <div class="videoLekcija materijal"><i class="fas fa-play-circle"></i>Četvrta lekcija/Fourth lesson</div>
        <div class="videoLekcija materijal"><i class="fas fa-play-circle"></i>Peta lekcija/Fifth lesson</div>
        <div class="videoLekcija materijal"><i class="fas fa-play-circle"></i>Šesta lekcija/Sixth lesson</div>
        <div class="videoLekcija materijal"><i class="fas fa-play-circle"></i>Sedma lekcija/Seventh lesson</div>
        <div class="videoLekcija materijal"><i class="fas fa-play-circle"></i>Osma lekcija/Eighth lesson</div>
        <div class="videoLekcija materijal"><i class="fas fa-play-circle"></i>Deveta lekcija/Ninth lesson</div>
        <div class="videoLekcija materijal"><i class="fas fa-play-circle"></i>Deseta lekcija/Tenth lesson</div>
        </div><button type="button" class="padajuci"><h2><i class="fas fa-sun"></i>Zadaci</h2></button>
        <div class="zadaci">
        <div class="zadatak materijal"><i class="fas fa-pen"></i>Zadatak 1/Assignment 1</div>
        <div class="zadatak materijal"><i class="fas fa-pen"></i>Zadatak 2/Assignment 2</div>
        <div class="zadatak materijal"><i class="fas fa-pen"></i>Zadatak 3/Assgnment 3</div>
        </div>
        <button type="button" class="padajuci"><h2><i class="fas fa-sun"></i>Kvizovi</h2></button>
        <div class="kvizovi">
        <div class="kviz materijal"><i class="fas fa-question-circle"></i>Kviz 1</div>
        <div class="kviz materijal"><i class="fas fa-question-circle"></i>Kviz 2</div>
        <div class="kviz materijal"><i class="fas fa-question-circle"></i>Kviz 3</div>
        </div>
    </div>
    <div class="sadrzaj sadrzaj-nemacki" id="rezultatAjaxa">
    </div>
    <footer>
        <div class="text-center">&copy; FONov tim za multimedijalnu produkciju</div>
    </footer>
    
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var padajuci = document.getElementsByClassName("padajuci");
var i;

for (i = 0; i < padajuci.length; i++) {
  padajuci[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var sadrzaj = this.nextElementSibling;
    if (sadrzaj.style.display === "block") {
      sadrzaj.style.display = "none";
      this.style.background="#f1f1f1";
    } else {
      sadrzaj.style.display = "block";
      this.style.background="#e6e6e6";
    }
  });
}
</script>
<script>
  var materijali = document.getElementsByClassName("materijal");
for (var i = 0; i < materijali.length; i++) {
  materijali[i].addEventListener("click", function() {
  var trenutni = document.getElementsByClassName("aktivna");
  trenutni[0].className = trenutni[0].className.replace(" aktivna", "");
  this.className += " aktivna";
  });
}
</script>

<script src="js/ucitajvideo.js"></script>
<script src="js/ucitajkviz.js"></script>
</body>
</html>