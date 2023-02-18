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
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
    }
    body{
        font-family:sans-serif;
        background-color: lightgray;
    }
    nav{
        background: #0082e6;
        height: 80px;
        width: 100%;
        position: fixed;
        top:0;
        margin-bottom: 5px;
    }
    label.logo{
        color: white;
        font-size: 35px;
        line-height: 80px;
        padding: 0 100px;
        font-weight: bold;
    }
    nav ul{
        float: right;
        margin-right: 20px;
    }
    nav ul li{
        display: inline-block;
        line-height: 80px;
        margin: 0 5px;
    }
    nav ul li a{
        color: white;
        font-size: 17px;
        padding: 7px 13px;
        border-radius: 3px;
    }
    a.active,a:hover{
        background: #1b9bff;
        transition: 0.5s;
    }
    .checkbtn{
        font-size: 30px;
        color: white;
        float: right;
        line-height: 80px;
        margin-right: 40px;
        cursor: pointer;
        display: none;
    }
    #check{
        display: none;
    }
    @media(max-width:952px){
        label.logo{
            font-size: 30px;
            padding-left: 50px;
        }
        nav ul li a{
            font-size: 16px;
        }
      
    }
    @media(max-width:858px){
        .checkbtn{
            display: block;
        }
        ul{
            position: absolute;
            width: 100%;
            height: 100vh;
            background: black;
            top: 80px;
            left: -100%;
            text-align: center;
            transition: all 0.5s;
        }
        nav ul li{
            display: block;
            margin: 50px 0;
            line-height: 30px;
        }
        nav ul li  {
            font-size: 20px;
        }
        a:hover,a.active{
            background: none;
            color: #0082e6;
        }
        #check:checked ~ ul{
            left: 0;
        }
       
    }
</style>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check"  class="checkbtn">
            <i class="fas fa-bars">M</i>
        </label>
        <label class="logo">Ridewithme</label>
        <ul>
            <li><a  class="active" href="">HOME</a></li>
            <li><a href="chat.php">mesage</a></li>
            <li><a href="ride.php">actions</a></li>
            <li><a href="info.php">request</a></li>
            <li><a href="">HOME</a></li>
        </ul>
    </nav>
</body>
</html>