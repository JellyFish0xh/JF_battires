<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/contactus.css">
    <title>JFB</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="images/Ourlogo.png" width="40" height="40" class="d-inline-block align-top" alt="">
            JF Battires
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
            <li class="nav-item <?php
                if(!(isset($_GET["page"]))){
                    echo "active";
                }
            ?>">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item <?php
                    if(isset($_GET["page"]))
                    {
                        if($_GET["page"]=="opr"){
                            echo "active";
                        }
                    }
            ?>">
                <a class="nav-link" href="index.php?page=opr">Our Products</a>
            </li>
            <li class="nav-item <?php
                    if(isset($_GET["page"]))
                    {
                        if($_GET["page"]=="Abu"){
                            echo "active";
                        }
                    }
            ?>">
                <a class="nav-link" href="index.php?page=Abu">About us</a>
            </li>
            <li class="nav-item <?php
                    if(isset($_GET["page"]))
                    {
                        if($_GET["page"]=="Cotus"){
                            echo "active";
                        }
                    }
            ?>">
                <a class="nav-link" href="index.php?page=Cotus">Contact us</a>
            </li>
            <li class="nav-item <?php
                    if(isset($_GET["page"]))
                    {
                        if($_GET["page"]=="signup"){
                            echo "active";
                        }
                    }
            ?>">
                <a class="nav-link" href="pages/signup.php">Create Account</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>