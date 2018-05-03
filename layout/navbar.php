<nav class="navbar navbar-inverse navbar-toggleable-sm fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="Navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="index.php?action=main"><span class="fa fa-home fa-lg"></span> Home</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?action=about"><span class="fa fa-info fa-lg"></span> About</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-list fa-lg"></span> Shop</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
        
        </ul>
        <span class="navbar-text" id="registr">
            <?php
                if(isset($_SESSION["id"])){ 
                    echo '<a href="index.php?action=logout" id="log-out"><span class="fa fa-sign-out"></span> Sign out</a>';
                } 
                else{
                    echo '<a href="index.php?action=registration" id="reg"><span class="fa fa-address-book"></span> Sign up</a>
                          <a href="index.php?action=login" id="log-in"><span class="fa fa-sign-in"></span> Sign in</a>';
                }
            ?>
        </span>
        </div>
    </div>
</nav>
    