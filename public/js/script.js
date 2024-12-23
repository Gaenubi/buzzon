const fillbutton = document.getElementById("filtbtn");
const filldd = document.getElementById("filtdd");
const langbutton = document.getElementById("langbtn");
const langdd = document.getElementById("langdd");
const accbutton = document.getElementById("accountbtn");
const accdd = document.getElementById("accountdd");

fillbutton.addEventListener('click', function(){
    if(filldd.style.visibility == "hidden"){
        filldd.style.visibility = "visible";
    } else{
        filldd.style.visibility = "hidden";
        console.log('hello');
    }
})

    langbutton.addEventListener('click', function(){
        if(langdd.style.visibility == "hidden"){
            langdd.style.visibility = "visible";
        } else{
            langdd.style.visibility = "hidden";
            console.log('hello');
        }
    
})
    accbutton.addEventListener('click', function(){
        if(accdd.style.visibility == "hidden"){
            accdd.style.visibility = "visible";
        } else{
            accdd.style.visibility = "hidden";
            console.log('hello');
        }

    })