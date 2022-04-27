<?php
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php');
?>
<div class="container-fluid">
        <div class="container" >
            <div class="row" >
                <div class="col-sm-10"  >
                    <div class="signinContainer" >
                        <div class="signinContent">
                            <div class="signinHeader bg-dark" >
                                <h1>Signin Members</h1>
                            </div>
                            <div class="siginForm " >
                                <form >
                                    <div  id="erreurBlock">
                                        <span id="error"></span>
                                    </div>
                                    <div class="input-groups">                                   
                                        <div class="input-groupa">
                                            <label for="pseudoName">Name</label>
                                                <input type="text" name="pseudoName" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="input-groupa">
                                            <label for="password">Password</label><br>
                                            <div class="passwordContent">
                                                <input type="password" name="password" class="form-control passwordClass"  placeholder="Password">
                                                <span class="ShowPassword">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>                                     
                                    </div>
                                    <div class="filierContent">
                                        <h5>Choise your filier here please:</h5>
                                        <span>If you teach subject more than two , you have check in plusieur !</span>
                                        <div class="filierbody">
                                            <div class="fliergestion">
                                                <h5>Filiere Gestion</h5>
                                                <input type="text"  class="filierAll" name="gestion" value="gestion">
                                                <div class="gestionBody">
                                                
                                                    <div class="infoBody">
                                                        <label for="gestionSubject">Subject</label>
                                                        <input type="text" name="gestionSubject" class="form-control inputMatier" placeholder="Subject">
                                                    </div>
                                                    <div class="infoBody">
                                                        <span>OR</span>
                                                    </div>
                                                    <div class="infoBody">
                                                        <label for="checkgestion">Several</label>
                                                        <input type="checkbox" name="checkgestion" class="form-check-input ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fliercomm">
                                                <h5>Filiere Communication</h5>
                                                <input type="text" class="filierAll" name="Communication" value="Communication">

                                                <div class="gestionBody">
                                                
                                                    <div class="infoBody">
                                                        <label for="subjectCommunication">Subject</label>
                                                        <input type="text" name="subjectCommunication" class="form-control inputMatier" placeholder="Subject">
                                                    </div>
                                                    <div class="infoBody">
                                                        <span>OR</span>
                                                    </div>
                                                    <div class="infoBody">
                                                        <label for="checkCommunication">Several</label>
                                                        <input type="checkbox" name="checkCommunication" class="form-check-input" >
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <hr>

                                        <div class="filierbody">
                                            <div class="fliergestion">
                                                <h5>Filiere Informatique</h5>
                                                <input type="text"  class="filierAll" name="informatique" value="informatique">

                                                <div class="gestionBody">
                                                
                                                    <div class="infoBody">
                                                        <label for="subjectInfo">Subject</label>
                                                        <input type="text" name="subjectInfo" class="form-control inputMatier" placeholder="Subject">
                                                    </div>
                                                    <div class="infoBody">
                                                        <span>OR</span>
                                                    </div>
                                                    <div class="infoBody">
                                                        <label for="checkInfo">Several</label>
                                                        <input type="checkbox" name="checkInfo" class="form-check-input" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fliercomm">
                                                <h5>Filiere Genie logiciel</h5>
                                                <input type="text"  class="filierAll" name="GenieCivile" value="Genie Civile">
                                                <div class="gestionBody">
                                                
                                                    <div class="infoBody">
                                                        <label for="subjectGenieLogiciel">Subject</label>
                                                        <input type="text" name="subjectGenieLogiciel" class="form-control inputMatier" placeholder="Subject">
                                                    </div>
                                                    <div class="infoBody">
                                                        <span>OR</span>
                                                    </div>
                                                    <div class="infoBody">
                                                        <label for="checkGenieLogiciel">Several</label>
                                                        <input type="checkbox" name="checkGenieLogiciel" class="form-check-input" >
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>                                      
                                    <hr>                                                                    
                                    <div class="button">
                                        <button type="submit" class="btn btn-dark" id="btnSignin">JOIN</button><br>
                                        <span>ou  if you already signin click <a href="../index.php">Login</a></span>
                                    </div>
                                </form>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- javascript -->
<script src="../javascript/signin.js"></script>
<?php
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php');
?>
</body>
</html>