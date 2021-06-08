    var lekcije = document.getElementsByClassName("videoLekcija");
    
    for(var i=0;i<lekcije.length;i++){
        (function(){
            var brojLekcije=i;
            var nazivLekcije=lekcije[brojLekcije].innerHTML;
            lekcije[i].addEventListener("click", function(){
                posaljiGETRequest("data/video.html", function(responseText){
                    var lekcija = responseText.replace("xxxxxx", "Lekcija"+brojLekcije);
                    var lekcija = lekcija.replace("yyy",brojLekcije);
                    document.getElementById("rezultatAjaxa").innerHTML=lekcija;
                    document.getElementById("vid-lekcija-"+brojLekcije).addEventListener("ended", function(){
                        lekcije[brojLekcije].innerHTML=nazivLekcije+' <i class="fas fa-check"></i>';
                    });
                });
                var videoID="vid-lekcija-"+brojLekcije;
                console.log(videoID);
                
            });
        }()); 
    }


    var posaljiGETRequest = function(url, handler){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function () {
            handlujZahtev(xmlhttp,handler);
        }
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }

    var handlujZahtev = function(xmlhttp, handler){
        if(xmlhttp.status==200 && xmlhttp.readyState==4){
            handler(xmlhttp.responseText);
        }
    }
