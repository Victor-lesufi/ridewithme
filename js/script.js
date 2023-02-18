const wordText = document.querySelector(".word"),
hintText = document.querySelector(".hint span"),
timeText = document.querySelector(".time b"),
inputField = document.querySelector("input"),
refreshBtn= document.querySelector(".refresh-word");
checkBtn= document.querySelector(".check-word");

let correctWord,timer;

const initTimer = maxTime =>{
    clearInterval(timer);
    timer = setInterval(() => {
        if(maxTime > 0){
            maxTime--;
         return   timeText.innerText = maxTime;
        }
        clearInterval(timer);
        alert('time off! ${correctWord,timer.toUpperCase()} was the correct word');
        initGame();

    },1000);
}

const initGame = () => {
    initTimer(30);
    let randomObj = words[Math.floor(Math.random() * words.length)];
    let wordArray = randomObj.word.split("");
    for (let i = wordArray.length -1; i > 0; i--){
         let j = Math.floor(Math.random() * (i + 1));

         [wordArray[i], wordArray[j]] = [wordArray[j],wordArray[i]];
    }
    wordText.innerText = wordArray.join("");
    hintText.innerText = randomObj.hint;
    correctWord = randomObj.word.toLowerCase(); 
    inputField.value = "";
    inputField.setAttribute("maxlength",correctWord.length);
    
}
initGame();

const checkword = () => {
    let userWord = inputField.value.toLocaleLowerCase();
    if(!userWord) return alert("please enter a word")
    

    if(userWord !== correctWord) return alert('oops! ${userWord} is not correct')

    alert('Congrats! ${userWord.toUpperCase()} is correct');
    initGame();
}



refreshBtn.addEventListener("click", initGame);
checkBtn.addEventListener("click", checkword);