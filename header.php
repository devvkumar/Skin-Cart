<link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/header.css">


<header class="full">
    <div class="header-content-top">
        <div class="content">
            <span>Any Problem or Query to contact on this number</span>
            <span><i class="fas fa-phone-square-alt"></i> 100</span>
            <span><i class="fas fa-envelope-square"></i> dkkardam49@gmail.com</span>
        </div>
    </div>

    <div class="nav-container">
        <nav class="all-category-nav"></nav>
        <nav class="featured-category">

            <ul class="nav-row">
                <a href="#"><span style = "margin-left: -280px"><img src="assets/logo.png"  height="50px" width="50px" alt=""></span></a>
                <li class="nav-row-list"><a href="index.php" class="nav-row-list-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a></li>
                <li class="nav-row-list"><a href="mobile-skin.php" class="nav-row-list-link <?php echo basename($_SERVER['PHP_SELF']) == 'mobile-skin.php' ? 'active' : ''; ?>">Mobile Skin</a></li>
                <li class="nav-row-list"><a href="laptop-skin.php" class="nav-row-list-link <?php echo basename($_SERVER['PHP_SELF']) == 'laptop-skin.php' ? 'active' : ''; ?>">Laptop Skin</a></li>
                <li class="nav-row-list"><a href="apply-skin.php" class="nav-row-list-link <?php echo basename($_SERVER['PHP_SELF']) == 'apply-skin.php' ? 'active' : ''; ?>">How to Apply</a></li>

                <li class="nav-row-list"><a href="cart.php" class="nav-row-list-link"<?php echo basename($_SERVER['PHP_SELF']) == 'cart.php' ? 'active' : ''; ?>"><i class='fas fa-shopping-cart'></i></a></li>
                <li>
                    <?php
                    if (isset($_SESSION['USER_LOGIN'])) {
                    ?>
                        <div class="profile_info">
                            <img src="assets/man.png" height="30px" width="30px" alt="user">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <h5><?php $row['username'] ?></h5>
                                </div>
                                <div class="profile_info_details">
                                    <a href="#">My Profile</a>
                                    <a href="#">Settings</a>
                                    <a href="logout.php">Log Out</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a href="login.php">Login</a>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
</header>


<script>
    let lastScrollTop = 0;
    const header = document.querySelector('header.full');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            header.style.top = '-100px'; // Adjust to the height of your header
        } else {
            header.style.top = '0';
        }

        lastScrollTop = scrollTop;
    });
</script>