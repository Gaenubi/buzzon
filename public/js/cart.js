window.addEventListener("DOMContentLoaded", (event) => {
    const checkbox = document.getElementsByClassName("checkbox");
    const quantity = document.getElementsByClassName("quantity");
    const totalprice = document.getElementById("totalprice");
    const price = document.querySelectorAll("h2");
    let total = 0;
    let product = 0

    if (checkbox) {
        for(i=0; i<checkbox.length; i++){
            checkbox[i].addEventListener("change", function() {        
                for(i=0; i<checkbox.length; i++){
                    if (checkbox[i].checked == true) {
                        cartitem = price[i].innerHTML * quantity[i].value;
                        console.log(cartitem);
                        total += cartitem;
                        console.log(total);
                        cartitem = 0;                       
                    }
                }
                totalprice.innerHTML = total;
                total = 0;
            })
    }
    }
    
})

