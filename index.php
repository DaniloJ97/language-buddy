    <?php
        session_start();
        $ulogovan=false;
        if(isset($_SESSION["username"])){
            $ulogovan=true;
            require "header2.php";
        }
        else{
            $ulogovan=false;
            require "header.php";
        }

    ?>
    <div id="main-content" class="container">
        <video class="center" width="800" height="500" controls autoplay>
            <source src="movie.mp4" type="video/mp4">
          <!--  <source src="movie.ogg" type="video/ogg"> -->
            Vaš veb čitač ne podržava dat format.
          </video>
          <div id="info">
              <h1 class="text-center">Informacije</h1>
              <p>Dobrodosli! Hajde da zajedno sa Language Buddy krenemo u pustolovinu otkrivanja novih jezika.</p>
              <p>Trenutno postoje 3 kursa za strane jezike:
                  <ul>
                      <li>engleski</li>
                      <li>nemacki</li>
                      <li>francuski</li>
                  </ul>      
            </p>
                <p>Nasa namera je da deca uce kroz zabavu i igru, tako da nece biti potrebno da mnogo puta ponavljaju naučeno da bi zapamtila. Intuitivno će usvojiti ono sto je vazno i u tome ce pomoci sve aktivnosti koje prate video lekcije (mini kvizovi, kratki stripovi, isecci iz novina, kratke animirane price i VR igre).</p>
                <p>U sledecem pasusu mozete procitati uputstva za kreiranje naloga.</p>
          </div>
          <hr>
          <div id="instrukcije">
              <h1 class="text-center"> Instrukcije za roditelje</h1>
              <p>Instrukcije za registraciju novog korisnika: </p>
              <p>1. Kliknite na dugme "Registracija" na vrhu strane.</p>
              <p>2. Pojavice se nova strana sa naslovom "Registracija" i cetiri prazna polja za unos podataka. Unesite u polja trazene podatke.</p>
              <p>3. Kada ste popunili polja, kliknite na dugme "Registruj se".</p>
              <p>4. U e-mail sanducetu potrazite mejl sa naslovom "Potvrda registracije" od posiljaoca LanguageBuddy. Otvorite mejl i kliknite na link u tekstu kako biste potvrdili registraciju. Nakon klika, otvorice se strana "Kursevi" sajta LanguageBuddy. Kliknite na englesku, francusku ili nemacku zastavu kako biste zapoceli ucenje.</p>
          </div>
    </div>
    <footer>
        <div class="text-center">&copy; FONov tim za multimedijalnu produkciju</div>
    </footer>
    
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>