// // 
BtnUpdateTimeTable.onclick=()=>{
    // creation de table
    let table=document.createElement('table');
    table.className="table table-bordered table-success table-hover tableWala";

    let thead=document.createElement('thead');
    let trhead=document.createElement('tr');

    thead.className="theader theadA";
    thead.id="Theader";
    table.appendChild(thead)

    let tbody=document.createElement('tbody');
    tbody.className="text-center table-dark ";
        tbody.id="tbody";

    tableOfTimetable.map((row)=>{
        trhead.innerHTML+=`
                <th class="text-center ">${row.name}</th>                            
                `
            });
            thead.appendChild(trhead)
    table.appendChild(thead)

    // suppresion de content
    let resultatBlock=document.querySelector('.resultatBlock');
    let resultate=document.querySelector('.resultate');
    resultatBlock.removeChild(resultate);
    // fin de suppression
    let btngroupsSR=document.querySelector('.btngroupsSR');
    let inputDelete=document.querySelector('.inputDelete');
    let choisir=document.querySelector(".choisir");
    btnReserver=document.querySelector(".reserver");
    charDelete=document.querySelector(".charDelete");
    Cherche=document.querySelector(".Cherche");
    // condition de suppresion
    if(btnReserver==null){
        alert("Arrete svp!")
    }else{

        inputDelete.remove();
        choisir.remove();
        btnReserver.remove();
        charDelete.remove();
        Cherche.remove();
                
    }
        // creaion de contenta
    let newContentA=document.createElement("div");
    let intoResultat=document.createElement("div");
    intoResultat.className="intoResultat"
    newContentA.className="resultate tableResultat";
    // creation de button
    let buttonUpdate=document.createElement("button");
    buttonUpdate.className="btn btn-success btnTimetable";
    buttonUpdate.id="btnUpdateJours";
    buttonUpdate.style.width="300px"
    buttonUpdate.style.marginTop="40px"
    buttonUpdate.textContent="Update";
    
    //pour evite la repetition
    btnUpdateJours=document.querySelector(".btnUpdateJours");
    if(btnUpdateJours!=null){
        btnUpdateJours.remove();
    }
    btngroupsSR.appendChild(buttonUpdate)
    
    
    //    appel de fichier timetable
    let xhr=new XMLHttpRequest() //creating xml objet
    xhr.open("POST","../Controleur/AffichagerTimeTable.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                tbody.innerHTML=data; 
                table.appendChild(tbody)
                intoResultat.appendChild(table)
                newContentA.appendChild(intoResultat)
                resultatBlock.appendChild(newContentA)
                
            }
        }
    }
    //we have to send the form data through ajax to php
    let formdata= new FormData(form)
    xhr.send(formdata);//sending the form data to php        
}
