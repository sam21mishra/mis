<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <?php
        $this->renderPartial('//layouts/header');
        ?>
    </head>
    <body class="gray-bg">
        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div>
                    <!--<h1 class="logo-name">MIS</h1>-->
                </div>
                <h3>Welcome to EMIS</h3>
                <p>Perfectly designed and precisely prepared admin control with over 50 pages with extra new web app views.
                    <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
                </p>
                <p>Login in. To see it in action.</p>
                <?php
                /*
                  <form class="m-t" role="form" action="index.html">
                  <div class="form-group">
                  <input type="email" class="form-control" placeholder="Username" required="">
                  </div>
                  <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" required="">
                  </div>
                  <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                  <a href="#"><small>Forgot password?</small></a>
                  <p class="text-muted text-center"><small>Do not have an account?</small></p>
                  <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                  </form>
                  <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
                 * 
                 */
                echo $content;
                ?>
            </div>
        </div>
        <?php
        $this->renderPartial('//layouts/footer');
        ?>
    </body>
</html>