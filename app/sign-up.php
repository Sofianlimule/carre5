<?php
include_once '_head.php';

$alert = false;
    if(!empty($_GET)){
        $alert = true;
        if($_GET['error'] == 'missingInput'){
            $type = 'warning';
            $message = 'Les champs sont vides';
        }
        if($_GET['error'] == 'invalidTyping'){
            $type = 'warning';
            $message = 'Le nom d\'utilisateur ou le mot de passe sont invalides. Merci de taper une chaîne de caractère supérieure à 3';
        }
        if($_GET['error'] == 'alreadyExists'){
            $type = 'warning';
            $message = 'Le nom d\'utilisateur existe déjà !';
        }
        if($_GET['error'] == 'passwordsNotMatching'){
            $type = 'warning';
            $message = 'Les mots de passe ne correspondent pas';
        }
    }
?>

<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
        style="background-image: url('assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                    <p class="text-lead text-white">Use these awesome forms to login or create new account in your
                        project for free.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Register with</h5>
                        <?php if($alert) : ?>
                            <div class="alert alert-<?php echo $type; ?>" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-body">
                        <form role="form text-left" action="sign-up_post.php" method="POST">
                            
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="username" aria-label="username"
                                    aria-describedby="username-addon" name="username">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                                    aria-describedby="password-addon" name="password">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Re-type your password"
                                    aria-label="Confirm password" aria-describedby="password-addon" name="password2">
                            </div>
                            <div class="form-check form-check-info text-left">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked="">
                                <label class="form-check-label" for="flexCheckDefault">
                                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms
                                        and Conditions</a>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">Already have an account? <a href="sign-in.php"
                                    class="text-dark font-weight-bolder">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once '_footer.php';
?>