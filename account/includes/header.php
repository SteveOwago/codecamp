<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="index.php" class="logo">
            <img src="assets/img/iearnlogosmall1.png" alt="Logo">
        </a>
        <a href="index.php" class="logo logo-small">
            <img src="assets/img/iearnlogosmall1.png" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">	<i class="fas fa-bars"></i>
    </a>
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="feather-search"></i>
            </button>
        </form>
    </div>

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">	<i class="fas fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">
       

        <!-- Fullscreen -->
        <li class="nav-item dropdown">
            <a href="#" id="btnFullscreen" class=" ">
                <i class="feather-maximize"></i>
            </a>
        </li>
        <!-- /Fullscreen -->


        <li class="nav-item dropdown has-arrow main-drop ml-3">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img src="assets/img/profiles/avatar.png" alt="">Student
						<span class="status online"></span></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="feather-user"></i> My Profile</a>
                <form method="post" action="includes/functions.php">
                &emsp;<i class="feather-power"></i>&emsp;<input type="submit" class="btn btn-secondary" name="logout" value="Logout">
                </form>
            </div>
        </li>
    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->