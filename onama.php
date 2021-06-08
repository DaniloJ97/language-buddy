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
        <div id="onama">
        <h1 class="text-center">O nama</h1>
        <p>LanguageBuddy je projekat koji je razvio tim studenata FON-a. Projekat je započet 2019. godine s ciljem da se deci pruži nov i zabavan način učenja stranih jezika. Težićemo da kroz ovaj projekat unapredimo i modernizujemo načine obrazovanja u Srbiji</p>
        <p>Za nas, na prvom mestu su deca, stoga smo vrlo pažljivo birali saradnike, koji će nam dati sugestije tokom izrade projekta, poput psihologa, sociologa i učitelja stranih jezika. Želimo da obezbedimo da su sadržaji koje smo pripremili bezbedni i tačni.</p>
        <p>Naš tim čine mladi ljudi iz oblasti programiranja, marketinga, multimedije, menadžmenta, koji svakodnevno rade kako bi LanguageBuddy učinili još boljim. Zbog toga su nam mišljenja korisnika veoma važna i molimo Vas da, ukoliko imate primedbe ili sugestije, nas kontaktirate.   </p>
        </div>
    </div>
    <footer>
        <div class="text-center">&copy; FONov tim za multimedijalnu produkciju</div>
    </footer>
    
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>