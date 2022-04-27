const form=document.querySelector(".chercheForm form");
btnCherche=form.querySelector(".btngroupsSR .Cherche");
//
const form2=document.querySelector("#formBtnGroupe");
const btnLibre=form2.querySelector(".libre");
const btnTimetable=form2.querySelector(".timetable");
const btnAllSallese=form2.querySelector(".AllSalles");
const btnOccupe=form2.querySelector(".occupe");
// 
const choisir=document.querySelector(".choisir");
btnReserver=form.querySelector(".btngroupsSR .reserver");
// 
let ResultatTable=document.querySelector('.tableResultat');
let blockEvent=document.querySelector('.blockEvent');
let logout=document.querySelector('#logout');
let heur=document.querySelector('.heur');
// apropos de timetable
let BtnUpdateTimeTable=document.querySelector('.updateTimetable');
let btnAcuielle=document.querySelector('.btnAcuielle');

// tableau
let tab=[];
//creation de tableau
let tableHeaderSalleShow=[
    {name:"id"},
    {name:"Nom de salle"},
    {name:"Nombre de table"},
    {name:"Nombre eleves"},
    {name:"Caracteristique  de salle"},
    {name:"status"},
    {name:"Salle Reserver"},


];

let tableOfTimetable=[
    {name:"id"},
    {name:"heur"},
    {name:"Lundie"},
    {name:"Mardie"},
    {name:"Mercredie"},
    {name:"Jeudie"},
    {name:"Vendredie"},

];
let tableOfSalles=[
    {name:"id"},
    {name:"Heur"},
    {name:"sal1"},
    {name:"sal2"},
    {name:"sal3"},
    {name:"sal4"},
    {name:"sal5"},
    {name:"sal6"},
    {name:"sal7"},
    {name:"sal8"},
    {name:"sal9"},
    {name:"sal10"},
    {name:"sal11"},
    {name:"sal12"},
    {name:"Status"},


];

let tableHeaderLibre=[
    {name:"id"},
    {name:"Nom de salle"},
    {name:"Nombre de table"},
    {name:"Nombre eleves"},
    {name:"Caracteristique  de salle"},
    {name:"status"},
    {name:"Salle Reserver"},
]
let tableOccupe=[
    {name:"id"},
    {name:"Heur"},
    {name:"salles"},
    {name:"Matier"},
    {name:"Nombre d'eleves"},
    {name:"Semestre"},
    {name:"Vageur"},
    {name:"Nom de professeur"},
    {name:"Jours"}

];

// creation de table
function tableContent(){
    let div=document.createElement('div');
    div.className="blockEvent"
    div.id="blockEvent"
    let table=document.createElement('table');
    table.className="table table-bordered table-success table-hover";

    let thead=document.createElement('thead');
    thead.className="theader";
    thead.id="Theader";
    table.appendChild(thead)

    let tbody=document.createElement('tbody');
    tbody.className="text-center table-dark";
    tbody.id="tbody";

    table.appendChild(tbody)
    div.appendChild(table)
    ResultatTable.appendChild(div);
    

}
// tableContent();
// form1
form.onsubmit=(e)=>{
    e.preventDefault();
}
// frorm 2
form2.onsubmit=(e)=>{
    e.preventDefault();
}
// evenement recherche
btnCherche.onclick=()=>{
    
    //Let's start Ajax
     let xhr=new XMLHttpRequest() //creating xml objet
     xhr.open("POST","../Controleur/indexControleur.php",true);
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;                                
                if (data=="All input are requered") {
                    error.textContent=data;
                    error.style.background="rgb(240, 107, 107)";
                    error.className="erreur";
                }else if(data=="you have to check one"){
                    error.textContent=data;
                    error.style.background="rgb(240, 107, 107)";
                    error.className="erreur";

                }else{
                    // error.textContent="Successfull";
                    // error.style.background="green";
                    // error.className="erreur";
                    
                    let blockEvent=document.querySelector('.blockEvent');
                    ResultatTable.removeChild(blockEvent);
                    // 
                    tableContent();
                    let tbody=document.querySelector('#tbody');
                    let Theader=document.querySelector('#Theader');
                    // 

                    let tr1=document.createElement('tr');
                    tr1.className="tr1";
                    tr1.id="tr1ID";
                    
                    tableHeaderSalleShow.map((row)=>{
                        tr1.innerHTML+=`
                        <th class="text-center ">${row.name}</th>                            
                        `
                    });
                    Theader.appendChild(tr1)
                    tbody.innerHTML=data;
                }
            }    
        }    
    }    
    //we have to send the form data through ajax to php
    let formdata= new FormData(form)
    xhr.send(formdata);//sending the form data to php

}
// reservation
btnReserver.onclick=()=>{
    let tbody=document.querySelector('#tbody');
    const ReserverSalle=tbody.querySelectorAll("input[type='checkbox']");
    
    // verification de checke que utilisateur a choisir
    ReserverSalle.forEach((element)=>{
        if (element.checked==true) {            
            if (element.value=="on") {
                // changer valeur dans le input qui a le nom choise
                let inconnue=element.dataset.lang;                
                if(inconnue!=undefined){                                    
                    tab.push(inconnue);
                                                         
                }
            }
        }
        
    });
    // condition si il check pluslieur
    TabLongeur=tab.length;
    if (TabLongeur==1) {                                                                               
        choisir.value=tab[0];
       //Let's start Ajax
         let xhr=new XMLHttpRequest() //creating xml objet
         xhr.open("POST","../Controleur/reservationControleur.php",true);
         xhr.onload=()=>{
            if(xhr.readyState===XMLHttpRequest.DONE){
                if(xhr.status===200){
                    let data=xhr.response;
                    console.log(data);
                    
                    // tbody.innerHTML=data;     
                    if (data=="success") {
                        error.textContent="success";
                        error.style.background="green";
                        error.className="erreur";
                    }else if(data=="All input are requered"){
                        error.textContent=data;
                        error.style.background="rgb(240, 107, 107)";
                        error.className="erreur";
                    }else if(data=="All input are requered!"){
                        error.textContent=data;
                        error.style.background="rgb(240, 107, 107)";
                        error.className="erreur";
                    }else if(data=="heurPlusGrand"){
                        error.textContent="debut de cour doit etre plus grand";
                        error.style.background="rgb(240, 107, 107)";
                        error.className="erreur";
                    }
                    else if(data=="heurPlusGrand0"){
                        error.textContent="fin de cour doit etre plus grand";
                        error.style.background="rgb(240, 107, 107)";
                        error.className="erreur";
                    }
                    else if(data=="heurIcorecte"){
                        error.textContent="format de l'heur est incorecte";
                        error.style.background="rgb(240, 107, 107)";
                        error.className="erreur";
                    }
                    else if(data=="sallesoccupe"){
                        error.textContent="Salle est occupe";
                        error.style.background="rgb(240, 107, 107)";
                        error.className="erreur";
                    }else{
                        error.textContent="Please use your head";
                        error.style.background="yellow";
                        error.className="erreur";
                    }
                   
                          
                    
                }
            }
        }
        //we have to send the form data through ajax to php
        let formdata= new FormData(form)
        xhr.send(formdata);//sending the form data to php
    }else{
        alert("Tu doit sectionner un pas plus !");
        tab.splice(0,10);        
    }
    
}
// recherche libre
btnLibre.onclick=()=>{
    //Let's start Ajax
     let xhr=new XMLHttpRequest() //creating xml objet
    xhr.open("GET","../Controleur/libreControleur.php",true);
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                // 
                let blockEvent=document.querySelector('.blockEvent');
                ResultatTable.removeChild(blockEvent);
                tableContent()
                let tr1=document.createElement('tr');
                tr1.className="tr2";
                tr1.id="tr2ID";

                tableHeaderLibre.map((row)=>{
                    tr1.innerHTML+=`
                    <th class="text-center ">${row.name}</th>                            
                    `
                });
                Theader.appendChild(tr1)
                tbody.innerHTML=data;
              
            }        
        }        
    }        
    //we have to send the form data through ajax to php
    let formdata= new FormData(form)
    xhr.send(formdata);//sending the form data to php

} 
// ocuppe
btnOccupe.onclick=()=>{
    //Let's start Ajax
     let xhr=new XMLHttpRequest() //creating xml objet
     xhr.open("GET","../Controleur/occupeControleur.php",true);
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                 
                let blockEvent=document.querySelector('.blockEvent');
                ResultatTable.removeChild(blockEvent);
                tableContent()

                let tr1=document.createElement('tr');
                tr1.className="tr2";
                tr1.id="tr2ID";

                tableOccupe.map((row)=>{
                    tr1.innerHTML+=`
                            <th class="text-center ">${row.name}</th>                            
                            `
                        });
                        Theader.appendChild(tr1)
                        tbody.innerHTML=data;                        
                                              
            }        
        }        
    }        
    //we have to send the form data through ajax to php
    let formdata= new FormData(form)
    xhr.send(formdata);//sending the form data to php
    
} 
// 
btnAcuielle.onclick=()=>{
    //Let's start Ajax
     let xhr=new XMLHttpRequest() //creating xml objet
     xhr.open("POST","../Controleur/AcuielleControleur.php",true);
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                          location.href="dashboard.php ";

                          
                                              
            }        
        }        
    }        
    //we have to send the form data through ajax to php
    let formdata= new FormData(form)
    xhr.send(formdata);//sending the form data to php
    
} 
// 
btnTimetable.onclick=()=>{
    // 
    let xhr=new XMLHttpRequest() //creating xml objet
    xhr.open("POST","../Controleur/AffichagerTimetable.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
           if(xhr.status===200){
               let data=xhr.response;
                 
               let blockEvent=document.querySelector('.blockEvent');
               ResultatTable.removeChild(blockEvent);
               tableContent()

               let tr1=document.createElement('tr');
               tr1.className="tr2";
               tr1.id="tr2ID";

               tableOfTimetable.map((row)=>{
                   tr1.innerHTML+=`
                           <th class="text-center ">${row.name}</th>                            
                           `
                       });
                       Theader.appendChild(tr1)

                    tbody.innerHTML=data;    
                    
                                             
           }                               
        }        
    }        
    //we have to send the form data through ajax to php
    let formdata= new FormData(form)
    xhr.send(formdata);//sending the form data to php}
}
// --------------------------------------
// Time
setInterval(()=>{
    let xhr=new XMLHttpRequest() //creating xml objet
    xhr.open("GET","../Controleur/deleteAndHours.php",true);
    xhr.onload=()=>{
       if(xhr.readyState===XMLHttpRequest.DONE){
           if(xhr.status===200){
               let data=xhr.response;
               heur.textContent=data;                                
              
           }
       }
   }
   //we have to send the form data through ajax to php
   let formdata= new FormData(form)
   xhr.send(formdata);//sending the form data to php    
},500);

// --------------------------
// Animation
// ----------------------------------\
let direBonjour=document.querySelector(".salut");

let array=["Je me souvient de toi,vous etez ","Bonjour","Hello"];
let arrayColor=["black","green","brown"]
let wordIndex=0;
let lettterIndex=0;
const createletter=()=>{
    let namepseud0=document.querySelector(".namepseud0");
    const letter=document.createElement("span")
    direBonjour.appendChild(letter);
    letter.textContent=array[wordIndex][lettterIndex]
    letter.style.color=arrayColor[wordIndex];
    namepseud0.style.color=arrayColor[wordIndex];

    setTimeout(()=>{
        letter.remove();
    },2800);
}

const loop=()=>{
   
    setTimeout(() => {
        if (wordIndex>=array.length) {
            wordIndex=0;
            lettterIndex=0;
            loop();
        }else if (lettterIndex<array[0].length) {
            createletter();
            lettterIndex++;
            loop()
        }else{
            wordIndex++
            lettterIndex=0;
            setTimeout(() => {
                loop()
            }, 2800);
           
        }
    }, 50);
}
loop()


// END