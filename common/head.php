<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['login'])) { ?>
    <script>
        var login = true;
    </script>
<?php }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .header #value {
            width: 390px;
            position: absolute;
            top: 20px;
            left: -495px;
            height: 46px;
            /* border-radius: 15px; */
            outline: none;
        }

        #searchIcon {
            width: 42px;
            position: absolute;
            top: 20px;
            left: -105px;
            height: 46px;
            border-right: 15px;
            outline: none;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #searchIcon:hover {
            color: red;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="nav">
            <ul>
                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            </ul>
        </div>
        <div class="header">
            <img src="../images/logo.png" alt="heelo">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="../Recipes/recipe.php">Recipes</a></li>

                <li>
                    <a href="#"><i class="fa-solid fa-user"></i>My Account</a>

                    <ul class="dropdown">
                        <li id="register"><a href="../login/register.php"><i class='fas fa-user-plus'></i>Register</a>
                        </li>
                        <li id="login_"><a href="../login/login.php"><i
                                    class="fa-solid fa-right-to-bracket"></i>Login</a></li>
                        <li id="logout" style="display:none"><a href="../login/logout.php"><i
                                    class="fas fa-sign-out"></i>Logout</a></li>
                    </ul>
                    <hr>
                </li>
                <input type="text" id="value" placeholder="Search here...."><i id="searchIcon"
                    class="fa-solid fa-magnifying-glass" onclick="filter()"></i></input>
            </ul>
        </div>
    </div>
</body>
<script>
    function filter() {
        const nodeList = document.querySelectorAll(".card");
        const search_val = document.getElementById('value').value;
        var count=0;
        for (i = 0; i < nodeList.length; i++) {
            const name = nodeList[i].getElementsByClassName('details')[0].getElementsByClassName('details-sub')[0].getElementsByTagName('h5')[0].innerHTML;
            var res = name.localeCompare(search_val);
            if (res != 0) {
                nodeList[i].style.display = "none";
                
            }
            else count++;
        }
        if(count==0)document.getElementsByClassName("empty")[0].innerHTML="Nothing to show";
    }
    if (login) {
        document.getElementById("register").style.display = "none";
        document.getElementById("logout").style.display = "block";
        document.getElementById("login_").style.display = "none";
    }
</script>

</html>