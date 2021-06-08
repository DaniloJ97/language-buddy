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
        <div id="kontakt">
            <h1 class="text-center">Kontakt</h1>
            <p>Kontakt telefoni: <br> 011/000-00-00 <br> 065-00-00-000 <br> 066-00-00-000</p>
            <hr>
            <p>E-mail adresa: <br> languagebuddy@gmail.com</p>
            <hr>
            <p>Adresa: <br> Jove Ilića 154, 11000 Beograd (Voždovac)  </p>
            <hr>
            <div id="mapa">
                <a href="https://goo.gl/maps/HEuQ2gCPEUyJWuBN9" target="_blank">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11329.598346569857!2d20.4752276!3d44.7726584!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xadaf5cff042d3bd0!2sFaculty%20of%20Organizational%20Sciences!5e0!3m2!1sen!2srs!4v1588387958005!5m2!1sen!2srs" id="map" width="600" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </a>
            </div>
        </div>
    </div>
    <footer>
        <div class="text-center">&copy; FONov tim za multimedijalnu produkciju</div>
    </footer>
    
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>