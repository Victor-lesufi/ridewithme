<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
*{
    text-decoration: none;
    box-sizing: border-box;
}
.max-width{
    max-width: 1300px;
    padding: 0 80px;
    margin: auto;
}
    .navbar{
        position: fixed;
        top:0px;
        width: 100%;
        background: crimson;
        padding: 15px 0;
    }
    .navbar .max-width{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .navbar .logo a{
        color: #fff;
        font-size: 35px;
        font-weight: 600;
    }
    .navbar .menu li{
        list-style: none;
        display: inline-block;
    }
    .navbar .menu li a{
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        margin-left: 25px;
    }
   @media(max-width:947px){
.max-width{
    padding: 0 50px
}
.menu-btn{
    display: block;
    z-index: 999;
}
body{
    background-color: lightblue;
}
.navbar .menu{
    position: fixed;
    height: 100vh;
    width:100%;
    left: -100%;
    /* background:#111; */
    left: 0;
    top: 0;
    text-align: center;
    padding-top: 80px;
}
.navbar .menu .active{
left: 0;
}
.navbar .menu li{
    display: block;
}
.navbar .menu li a {
    display: inline-block;
    margin: 20px 0;
    font-size: 25px;
}
   }



</style>
<body>
    <nav class="navbar">
        <div class="max-width">
        <div class="logo"><a href="">menu</a></div>
        <ul class="menu">
            <li><a href="">home</a></li>
            <li><a href="">home</a></li>
            <li><a href="">home</a></li>
            <li><a href="">home</a></li>
            <li><a href="">home</a></li>
            <li><a href="">home</a></li>
        </ul>
    </div>
    </nav>
</body>
</html>