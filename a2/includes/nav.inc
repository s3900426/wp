<body>
    <header class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-md navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img src="assets/images/favicon.ico" alt="Icon for SkillSwap" class="justify-center allign-left"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php if (isset($_SESSION["message"])) { ?>
                        <div class="alert alert-success alert-dismissable fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            Logged in
                            <?php print $_SESSION['message'];
                            unset($_SESSION['message']); ?>
                        </div>
                    <?php }?>
                    <?php if (isset($_SESSION["error"])) { ?>
                        <div class="alert alert-danger alert-dismissable fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            Failed to log in. 
                            <?php print $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </div>
                    <?php }?>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="skills.php">All Skills</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gallery.php">Gallery</a>
                            </li>

                            
                            <?php if (isset($_SESSION["user_id"])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="add.php">Add Skill</a>
                                </li>
                                </ul>
                                <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                <a class="nav-link" href="login.php">Hello, <?php $_SESSION['username'] ?></a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                                </li>
                                          
                            <?php }else{?>
                                </ul>
                                <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.php">Register</a>
                                </li>
                            <?php }?>
                            <li class="nav-item">
                                <form class="d-flex justify-content-end">
                                    <button class="sBarB btn btn-light" type="submit">
                                        <span class="material-icons">search</span>
                                    </button>
                                    <input class="sBarT form-control me-2" type="text" placeholder="Search Skills...">
                                </form>
                            </li>
                        </ul>
                        
                    </div>
                    
                </div>
            </nav>
        </div>
    </header>
