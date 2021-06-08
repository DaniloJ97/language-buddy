var polja = document.getElementsByClassName("polje");
var lozinka = document.getElementById("lozinkaKorisnika");
var potvrda = document.getElementById("potvrdaLozinke");


for(var i=0;i<polja.length;i++){
    (function(){
        var polje=polja[i];
        polja[i].addEventListener("input", function(event){
            if(polje.validity.valid){
                polje.parentElement.nextElementSibling.innerHTML="";
                polje.style.borderBottom="2px solid #ccc";
            }
            else {
                if(polje.validity.valueMissing){
                    polje.parentElement.nextElementSibling.textContent=`Polje ${ polje.placeholder } je obavezno!`;
                }
                else if(polje.validity.typeMismatch){
                    polje.parentElement.nextElementSibling.textContent=`Morate popuniti polje ${ polje.placeholder } u odgovarajućem formatu!`;
                }
                else if(polje.validity.tooShort){
                    polje.parentElement.nextElementSibling.textContent=`Polje ${ polje.placeholder } treba da ima minimum ${ polje.minLength } znakova!`;
                }  
                polje.style.borderBottom="2px solid #ff6666";
            }
        });
    }()); 
}

    document.getElementById("dugme2").addEventListener("click", function(event){
        console.log("Proverica");
        for(var i=0;i<polja.length;i++){
            polje=polja[i];
            if(polje.validity.valid){
                if(polje.name=="potvrdaLozinke" && potvrda.value!=lozinka.value){
                    polje.parentElement.nextElementSibling.innerHTML="Lozinke se ne podudaraju! Pokušajte ponovo!";
                    polje.style.borderBottom="2px solid #ff6666";
                    event.preventDefault();
                }
                else{
                    polje.parentElement.nextElementSibling.innerHTML="";
                    polje.style.borderBottom="2px solid #ccc";
                }
            }
            else {
                if(polje.validity.valueMissing){
                    polje.parentElement.nextElementSibling.textContent=`Polje ${ polje.placeholder } je obavezno!`;
                }
                else if(polje.validity.typeMismatch){
                    polje.parentElement.nextElementSibling.textContent=`Morate popuniti polje ${ polje.placeholder } u odgovarajućem formatu!`;
                }
                else if(polje.validity.tooShort){
                    polje.parentElement.nextElementSibling.textContent=`Polje ${ polje.placeholder } treba da ima minimum ${ polje.minLength } znakova!`;
                } 
                polje.style.borderBottom="2px solid #ff6666";
                event.preventDefault();
            }
        }
    });
