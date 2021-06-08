<?php
        session_start();
        $ulogovan=false;
        if(isset($_SESSION["username"])){
            $ulogovan=true;
            require "header2.php";
        }
        else{
            $ulogovan=false;
            header("Location: index.php");
            return;
        }

    ?>
    <div id="main-content" class="container">
       <p style="color:white; font-size:20px">Nemate pristup stranici za prijavu!</p>
    </div>
    <footer>
        <div class="text-center">&copy; FONov tim za multimedijalnu produkciju</div>
    </footer>
    
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>