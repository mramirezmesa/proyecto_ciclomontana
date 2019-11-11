<?php
$helper=new HelpView();
 ?>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="javascript:void(0);"><span><img src="views/img/logo.png" ></span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right" >
                <li class="" >
                  <a href="javascript:;" class="user-profile dropdown-toggle"  style="color:white;" data-toggle="dropdown" aria-expanded="false">

                    <img src="views/img/user.png" alt=""><span ><b>Hola:</b> </span><?php echo $_SESSION["name"]; ?>
                    <span class="glyphicon glyphicon-menu-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo $helper->url("Front","exit") ?>"><i class="fa fa-sign-out pull-right"></i>Salir</a></li>
                  </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>