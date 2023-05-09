<?php

require_once('../../models/usuario/login/protect.php');

?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metalcoin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/css/page/index.css">


    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!--<title>Responsive Navigation Menu Bar</title>-->
</head>

<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen'></i>
            <span class="logo navLogo"><a href="#">Metalcoin</a></span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">Metalcoin</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Produto</a></li>
                    <li><a href="#">Usuario</a></li>

                </ul>


            </div>

            <div class="darkLight-searchBox">

                <div class="dark-light">
                    <i class='bx bx-cart'></i>
                </div>

                <div class="searchBox">
                    <div class="searchToggle">
                        <i class='bx bx-x cancel'></i>
                        <i class='bx bx-log-out search'></i>
                    </div>

                    <div class="search-field">
                        <button id="logout" class="btn btn-dark">Sair<i class='bx bx-log-out' style="color: red;"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        const body = document.querySelector("body"),
            nav = document.querySelector("nav"),
            modeToggle = document.querySelector(".dark-light"),
            searchToggle = document.querySelector(".searchToggle"),
            sidebarOpen = document.querySelector(".sidebarOpen"),
            siderbarClose = document.querySelector(".siderbarClose");

        let getMode = localStorage.getItem("mode");
        if (getMode && getMode === "dark-mode") {
            body.classList.add("dark");
        }

        // js code to toggle dark and light mode
        modeToggle.addEventListener("click", () => {
            modeToggle.classList.toggle("active");
            body.classList.toggle("dark");

            // js code to keep user selected mode even page refresh or file reopen
            if (!body.classList.contains("dark")) {
                localStorage.setItem("mode", "light-mode");
            } else {
                localStorage.setItem("mode", "dark-mode");
            }
        });

        // js code to toggle search box
        searchToggle.addEventListener("click", () => {
            searchToggle.classList.toggle("active");
        });


        //   js code to toggle sidebar
        sidebarOpen.addEventListener("click", () => {
            nav.classList.add("active");
        });

        body.addEventListener("click", e => {
            let clickedElm = e.target;

            if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
                nav.classList.remove("active");
            }
        });
    </script>
    <script src="../assets/js/jquery/jquery.js"></script>
    <script src="../assets/js/jquery/ajax.js"></script>
    <script src="../assets/js/usuario/login/logout.js"></script>

</body>

</html>