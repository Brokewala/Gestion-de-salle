<?php
    require(__DIR__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php');

?>
<div class="container-fluid">
        <div class="container" >
            <div class="row" >
                <div class="col-sm-10" style="display:flex;justify-content:center; margin-bottom:50px;">
                    <div class="loginContent">
                        <div class="loginHeader bg-dark">
                            <h1>Login Members</h1>
                        </div>
                        <div class="fomContent">
                        <div id="errorLoginContent">
                            <span id="errorLogin"></span>
                        </div>
                        <div class="loginForm">
                            <form  method="post"id="formLogin">
                                <label for="pseudo" class="lab">Pseudo</label><br>
                                <input type="text" name="pseudo" class="form-control" placeholder="Pseudo "><br>
                                <label for="passwordLogin">Paswsword</label><br>
                                <input type="password" name="passwordLogin"class="form-control"  placeholder="Password  "><br>
                                <div class="filierS">
                                    <select name="Filier_Prof" id="Filier" class="form-select">
                                        <option value="gestion">Gestion</option>
                                        <option value="communication">Communication</option>
                                        <option value="informatique">Informatique</option>
                                        <option value="Genie Civile">Genie Civile</option>

                                    </select>
                                </div>
                                <div class="btn-groups button">
                                    <button type="button" class="btn btn-dark" id="btnLogin">Connection</button><br>
                                    <span>ou if you never signin click <a href="blog/signin.php">Sigin</a></span>
                                </div>
                            </form>
                        </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div> 
    </div>

</div>
<div class="footer" style="bottom:0;margin-top:10px; color:#333; text-align:center;">
    <i>&copy;lodphin-@2021</i>
</div>
<!-- js -->
<script src="javascript/login.js"></script>
</body>
</html>