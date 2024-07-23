const URL = "http://localhost/CorsoPHP/Lez10/controller/ControllerPopolazioneRegione.php?action="
const tendinaRegioni = document.createElement("select");
const tendinaComuni = document.createElement("select");

tendinaRegioni.append("<option>Scegli una Regione:</option>");
fetch(URL+"regioni")
    .then(res=>res.json())
    .then(regioni=>{
        for (const regione of regioni){

            const option=document.createElement("option");
            option.value=regione;
            option.textContent=regione;
            tendinaRegioni.appendChild(option);

        }
    })
    tendinaRegioni.addEventListener("change",cambia);
    tendinaComuni.addEventListener("change",cambiaComune);

    function cambia(){
        
    fetch(URL+"comuni&regione="+tendinaRegioni.value)
        .then(res=>res.json())
        .then(comuni=>{
            tendinaComuni.innerHTML="";
            for(const comune of comuni){
                const option=document.createElement("option");
                option.value=comune;
                option.textContent=comune;
                tendinaComuni.append(option);
            }
        })

    }

    function cambiaComune(){
        
        fetch(URL+"comune&comune="+tendinaComuni.value)
            .then(res=>res.json())
            .then(comune=>{
                const div=document.createElement("div");
                div.setAttribute("style","border:1px solid blue; width: 100%; padding: 2em; font-size:1.5em;");
                div.textContent=`Il comune selezionato è: ${comune.comune} \n Maschi: ${comune.maschi}\nFemmine: ${comune.femmine}`;
                document.body.append(div);
            })
    
        }

document.body.appendChild(tendinaRegioni);
document.body.appendChild(tendinaComuni);