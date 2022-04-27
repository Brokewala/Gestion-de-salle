const form=document.querySelector(".siginForm form");
btnCherche=document.querySelector("#btnSignin");
let ShowText=document.querySelector(".ShowPassword");
let passwordClass=document.querySelector(".passwordClass");

ShowText.onclick=()=>{
    if(passwordClass.type="password"){
        passwordClass.type="text" ;   
    }else{
        passwordClass.type="password" ;   

    }

    
}
    
form.onsubmit=(e)=>{
    e.preventDefault();
}
btnCherche.onclick=()=>{
  
    //Let's start Ajax
     let xhr=new XMLHttpRequest() //creating xml objet
     xhr.open("POST","../../Controleur/signinControle.php",true);
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                console.log(data);
                
                if (data=="success") {        
                    erreurBlock.style.background="green"; 
                    erreurBlock.className="erreur";          
                     error.textContent=data;
                    location.href="../dashboard.php";
                }else{
                    erreurBlock.style.background="rgb(240, 107, 107)";
                    error.className="errorFaild";
                    erreurBlock.className="erreur";
                    error.textContent=data;

                }
                
            }
        }
     }
     //we have to send the form data through ajax to php
     let formData=new FormData(form); //creating new formData object
     xhr.send(formData);//sending the form data to php

}