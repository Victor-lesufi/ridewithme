<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gaming</title>
    
    <script src="js/word.js" defer></script>
    <script src="js/script.js" defer></script>
</head>

<style>

   /* game css*/
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}
 body {
     display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
     background: lightslategray; 
}  

.container{
    width: 450px;
    border-radius: 7px;
    background: #fff;
}
.container h2{
    font-size: 25px;
    font-weight:500 ;
    padding: 18px 25px;
    border-bottom: 1px solid #ccc;
}
.container .content{
    margin:25px 20px 35px;
}
.content .word{
    font-size: 33px ;
    font-weight: 500;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 25px;
    margin-right: -24px;
}
.content .details{
    margin: 25px 0 20px;
}
    .details p{
        font-size: 18px;
        margin-bottom: 10px;
    }
    .details p b{
        font-weight: 500;
    }

.content input{
    width: 100%;
    height: 60px;
    outline: none;
    font-size: 18px;
    padding: 0 16px;
    border-radius: 5px;
    border: 1px solid #aaa;
}
.content .buttons{
    display: flex;
    margin-top: 20px;
    justify-content: space-between;
}
.buttons button{
    border: none;
    outline: none;
    color: #fff;
    cursor: pointer;
    padding: 15px 0;
    font-size: 17px;
    border-radius: 5px;
    width: calc(100% / 2 - 8px);
}
.buttons .refresh-word{
    background: #6c757d;
    
}
.buttons .check-word{
    background: #5372F0;

}

.sec b{
    font-weight: 600;
} 
.back{
    display: block;
} 
</style>
<body>


     <!-- <div class="back"><a href="home.php">Back</a> </div>  -->
    <div class="container">
        <h2>Word Scramble</h2>
       
        <div class="content">
            <p class="word"></p>
           
            <div class="details">
                <p class="hint">Hint: <span></span></p>
                <p class="time">Time Left: <span class="sec"><b>30</b>s</span></p>
            </div>
            <input type="text" placeholder="Enter a valid word">
            <div class="buttons">
                <button class="refresh-word">Refresh word</button>
                <button class="check-word">Check word</button>
            </div>
        </div>
    </div>
</body>
</html>