<?php
    include("admin/DB/connect.php");
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }
    else{
        $page = "home";
    }
    if(isset($_COOKIE["userid"])){
        $user_id=$_COOKIE['userid'];
        $query=("SELECT * FROM users where id =$user_id");
        $user_data = mysqli_query($conn,$query);
        $user_data=$user_data->fetch_assoc();
        $user_name = $user_data['Name'];
        $f_text = "<a class='nav-link' href='pages/profile.php'>$user_name</a>";
        $l_text = '<a class="nav-link" href=""><i class="bi bi-cart"></i></a>';
    }
    else{
        $f_text= '<a class="nav-link" href="pages/login.php">Login</a>';
        $l_text= '<a class="nav-link" href="pages/signup.php">Signup</a>';
    }

?>
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
                        if($page=="home"){
                            echo "active";
                        }
                    ?>">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item <?php
                                if($page=="opr"){
                                    echo "active";
                                }
                    ?>">
                        <a class="nav-link" href="index.php?page=opr">Our Products</a>
                    </li>
                    <li class="nav-item <?php
                                if($page=="Abu"){
                                    echo "active";
                                }
                    ?>">
                        <a class="nav-link" href="index.php?page=Abu">About us</a>
                    </li>
                    <li class="nav-item <?php
                                if($page=="Cotus"){
                                    echo "active";
                                }
                    ?>">
                        <a class="nav-link" href="index.php?page=Cotus">Contact us</a>
                    </li>
                </ul>
        </div>
        <div>
            <ul class="navbar-nav ml-auto p-2 bd-highlight"">
                <li class="nav-item">
                    <?= $f_text?>
                </li>
                <li class="nav-item">
                    <?= $l_text; ?>
                </li>
            </ul>
        </div>
    </nav>