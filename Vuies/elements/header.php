<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uph_salles</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

    <style>
        *{
            margin:0;
            padding:0;
            text-decoration:none;
            box-sizing:border-box;
        }
        body{
            background:#f2f2f2;
        }
        header{
            background-color:#212529!important;
            color: #fff;
            height: 120px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            padding-top: 50px;
        }
        /* Login style */

        .loginContent{
            background:white;
            margin:40px;
            border-radius:10px;
            height:440px;
            width:480px;

        }
        .loginHeader{
            background-color:#212529!important;
            margin-bottom:20px;
            color:#f2f2f2;
            height:100px;
            padding:20px;
            border-top-left-radius:10px ;
            border-top-right-radius:10px ;
            text-align:center;
            font-family: 'Times New Roman', Times, serif;

        }
        .btn-groups span{
            font-size:12px;
        }
        .erreur{
            width:100%;
            text-align:center;
            padding:10px;
            margin:10px;
            border-radius:10px;

        }
       
        .errorFaild{
            font-size:20px;
        }
        .fomContent{
            background:white;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
        }
        #formLogin label{
            font-size:25px;
        }
      #formLogin input{
          width:340px;
          background:#f2f2f2;
          outline:none;
      }
      #btnLogin{
        width:200px;
        font-size:20px;
        margin-left:50px;
        margin-top:40px;

      }
      /* ------------------------------------------------- */
      /* signin style */
      .signinContainer{
          margin-left:100px;
          margin-right:-100px;
          margin-top:20px;

      }
      .signinContent{
         background:white;
        border-radius:10px;
       
      }
      .signinHeader{
        color:#f2f2f2;
        height:100px;
        padding:20px;
        border-top-left-radius:10px ;
        border-top-right-radius:10px ;
        text-align:center;
        font-family: 'Times New Roman', Times, serif;
      }
     
      .filierContent{
        padding:20px;

      }
      .passwordContent{
        display:flex;
        justify-content:flex-end;
        align-items:center;
      }
      .ShowPassword{
          position:absolute;
          font-size:35px;
          cursor: pointer;
      }
      .input-groups{
        display:flex;
        justify-content:center;

      }
      .input-groupa{
          margin-left:15px;
      }
      .input-groupa input{
          width:350px;
      }
      .filierAll{
        display:none;

      }
      .filierbody{
        padding:20px;
        background:#f2f2f2;
        border-radius:5px;

      }
      .inputMatier{
        width:350px;

      }
      .gestionBody{
        display:flex;
        justify-content:space-between;

      }
     #btnSignin{
        width:450px;
        padding:10px;

      }
      .buttonSigninblock{
          text-align:center;
      }
      .buttonSigninblock span{
          margin-top:5px;
          font-size:17px;

      }
     /* fin flier */

     
      /* index verification */
      .inputVer{
          width:100px;
      }
        /* footer */
        .copyright{
            color: grey;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
        }
        /* timetableupdate */
        nav{
           background-color:white; 
          
       }
  
       .colNav{
        display:flex; 
        align-items:center;
        justify-content:space-between;
       }
       nav div:hover{
           /* background:#f2f2f2!important; */
       }
       .choisBlock{
           margin-left:20px;
           background:#f2f2f2;
           padding:10px;
       }
       .navigation{
           /* margin-right:60px; */
        display:flex;
        align-items:center;
        /* justify-content:space-between; */

       }
       .resultate{
            background:white;
            border-radius:10px;
            padding:10px;
            margin-top:20px;
            height:420px;
        }
        .heurCoursContent{
            display:flex;
            justify-content:space-between;

        }
        .verification{
            background:white;
            border-radius:10px;
            padding:10px;
            margin-top:20px;
            height:425px;
        }
    </style>
</head>
<body>
    <header class="bg-dark">
        <h1>GESTION DE SALLES</h1>
    </header>