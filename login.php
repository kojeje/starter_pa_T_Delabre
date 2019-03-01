<?php
    $page = 'login';
    require('inc/config.php');
    $message = '';
    $emailErr = "";
    $nameErr = "";
    $surnameErr = "";
    $usernameErr = "";

    if( isset($_POST['submit-signin'])){
        // Récup des valeurs des champs du formulaire
        $username = $_POST['signin-username'];
        $name = $_POST['signin-name'];
        $surname = $_POST['signin-surname'];
        $adress = $_POST['signin-adress'];
        $cp = $_POST['signin-cp'];
        $city = $_POST['signin-city'];
        $email = $_POST['signin-email'];
        $birth = $_POST['signin-birth'];
        $password = $_POST['signin-password'];
        $password2 = $_POST['signin-password2'];
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed"; 
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
            $surnameErr = "Only letters and white space allowed"; 
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $usernameErr = "Only letters and white space allowed"; 
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
        }



        if($nameErr == "" && $surnameErr == "" && $usernameErr == "" && $emailErr == ""){
            $username_verify_request = "SELECT * FROM users WHERE users_username = '$username' LIMIT 1";
            if( $resultat = $mysqli->query($username_verify_request) ){
                $row_cnt = $resultat->num_rows;
                if($row_cnt !== 0){
                    $message = "Votre pseudo est déjà utilisé.";
                }else{
                    if( $password == $password2 ){
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $now = date('Y-m-d H:i:s');
                        $new_user_request = "INSERT INTO users (
                                users_username,
                                users_password,
                                users_active,   /* 0:inactif, 1:actif */
                                users_type,     /* 1:Etudiant, 2:Prof, 3:Admin */ 
                                users_name,
                                users_surname,
                                users_adress,
                                users_cp,
                                users_city,
                                users_add_date,
                                users_email,
                                users_avatar
                            ) VALUES (
                                '$username',
                                '$password',
                                0,
                                1,
                                '$name',
                                '$surname',
                                '$adress',
                                '$cp',
                                '$city',
                                '$now',
                                '$email',
                                'users/upload/profile.jpg'
                            )";
                        if($mysqli->query($new_user_request) === TRUE ){ 
                           $message = 'Enregistrement de votre compte OK.'; 
                        }else{
                            echo $mysqli->error;
                        }
                    }else{
                        $message = "Les mot de passes indiqués ne correspondent pas.";
                    }
            // Enregistrement dans la bdd
                }
            }





        }
                
        // vérification username non attribué
      
    }else if( isset($_POST['submit-login']) ){
        // Récupérer les infos du formulaire dans des variables
        $username = $_POST['login-username'];
        $password = $_POST['login-password'];
        // Vérifier la concordance entre le formulaire et la BDD
        $login_request = "SELECT * FROM users WHERE users_username = '$username' LIMIT 1";
        // Vérification des résultats
        if( $resultat = $mysqli->query($login_request) ){       // Si il y a un username qui correspond entre le formulaire et la BDD
            while( $res = $resultat->fetch_object() ){
               $res_id = $res->id;
               $res_username = $res->users_username;
               $res_password = $res->users_password;  
               $res_email = $res->users_email;  
               $res_type = $res->users_type;  
               if( password_verify($password, $res_password) === TRUE ){
                    $_SESSION['activity']['id'] = $res_id; 
                    $_SESSION['activity']['username'] = $res_username;
                    $_SESSION['activity']['type'] = $res_type;
                    $_SESSION['activity']['email'] = $res_email;
                    header('Location: index.php');
                    die();
               }else{

                    $message = 'Erreur dans le mot de passe.';
               }
            }
        }
    }else{
        $message = "Bienvenue, merci de vous log.";
        if(isset($_GET['logout'])){
            $_SESSION['activity'] = Array();
            session_destroy();
            $message = "Vous avez bien été déconnecté.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once('inc/head.php'); ?>
	</head>
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login">
				<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">Sign In To Admin</h3>
							</div>
							<form class="m-login__form m-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
								<div class="form-group m-form__group">
									<input name="login-username" class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input name="login-password" class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left m-login__form-left">
										<label class="m-checkbox  m-checkbox--light">
											<input type="checkbox" name="remember"> Remember me
											<span></span>
										</label>
									</div>
									<div class="col m--align-right m-login__form-right">
										<a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
									</div>
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signin_submit" name="submit-login" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">Sign In</button>
								</div>
							</form>
						</div>
						<div class="m-login__signup">
							<div class="m-login__head">
								<h3 class="m-login__title">Sign Up</h3>
								<div class="m-login__desc">Enter your details to create your account:</div>
							</div>
							<form class="m-login__form m-form" action="">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Fullname" name="fullname">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="password" placeholder="Password" name="password">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="rpassword">
								</div>
								<div class="row form-group m-form__group m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--light">
											<input type="checkbox" name="agree">I Agree the <a href="#" class="m-link m-link--focus">terms and conditions</a>.
											<span></span>
										</label>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signup_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign Up</button>&nbsp;&nbsp;
									<button id="m_login_signup_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
								</div>
							</form>
						</div>
						<div class="m-login__forget-password">
							<div class="m-login__head">
								<h3 class="m-login__title">Forgotten Password ?</h3>
								<div class="m-login__desc">Enter your email to reset your password:</div>
							</div>
							<form class="m-login__form m-form" action="">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
								</div>
								<div class="m-login__form-action">
									<button id="m_login_forget_password_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
									<button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
								</div>
							</form>
						</div>
						<div class="m-login__account">
							<span class="m-login__account-msg">
								Don't have an account yet ?
							</span>&nbsp;&nbsp;
							<a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

        <?php include('inc/scripts.php'); ?>
        <script src="assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>

	</body>

	<!-- end::Body -->
</html>