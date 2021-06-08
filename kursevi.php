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
    <div id="main-content" class="container">
        <h1 class="text-center" style="color: white; margin-top: 20px; font-family: 'Oxygen', sans-serif;">Kursevi</h1>
        <div  class="text-center zastava-div">
        <a href="engleski.php"><img src="images/engleski.png" height=100% alt="Engleski" class="zastava"></a>
        <br><span class="jezik-span">Engleski jezik</span>
        </div>
        <div  class="text-center zastava-div">
        <a href="francuski.php"><img src="images/francuski.png" height=100% alt="Francuski" class="zastava"></a>
        <br><span class="jezik-span">Francuski jezik</span>    
        </div>
        <div class="text-center zastava-div">
        <a href="nemacki.php"><img src="images/nemacki.png" height=100% alt="Nemački" class="zastava"></a>
        <br><span class="jezik-span">Nemački jezik</span> 
        </div>

        
    </div>
    <footer>
        <div class="text-center">&copy; FONov tim za multimedijalnu produkciju</div>
    </footer>
    
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>