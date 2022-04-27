const form=document.querySelector(".loginForm form");
btnlogin=form.querySelector(".button button");

form.onsubmit=(e)=>{
    e.preventDefault();
}
btnlogin.onclick=()=>{
    //Let's start Ajax
     let xhr=new XMLHttpRequest() //creating xml objet
     xhr.open("POST","../Controleur/loginControleur.php",true);
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                console.log(data);
                
                if (data=="success") {
                    errorLoginContent.style.background="green"; 
                    errorLoginContent.className="erreur";          
                    errorLoginContent.textContent=data;
                    location.href="dashboard.php ";
                }else if(data==""){
                    errorLoginContent.style.background="yellow";
                    errorLogin.className="errorFaild";
                    errorLoginContent.className="erreur";
                    errorLogin.innerHTML="Sorry Guy !";
                } else{
                errorLoginContent.style.background="rgb(240, 107, 107)";
                errorLogin.className="errorFaild";
                errorLoginContent.className="erreur";
                errorLogin.innerHTML=data;

                }                                             
            }
        }
    }
    //we have to send the form data through ajax to php
    let formdata= new FormData(form)
    xhr.send(formdata);//sending the form data to php

}
