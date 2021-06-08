var kvizovi = document.getElementsByClassName("kviz");
    
for(var i=0;i<kvizovi.length;i++){
    (function(){
        var brojKviza=i;
        kvizovi[i].addEventListener("click", function(){
            var url="data/kviz"+brojKviza+"engleski.html";
            posaljiGETRequest(url, function(responseText){
                var kviz = responseText;
                document.getElementById("rezultatAjaxa").innerHTML=kviz;
            });
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
