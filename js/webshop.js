const price = 25.00;

let amountField = document.querySelector(".mand__number");
if(localStorage.getItem("amount") === ""){
    let amount = 1;
    amountField.value = amount;
    let cost = price* amount ;
    document.querySelector(".mand__price").innerHTML = "€" + cost+",00";
    let total = cost + 5;
    document.querySelector(".mand__total__number").innerHTML = total + " euro";
}else{
    let amount = localStorage.getItem("amount");
    amountField.value = amount;
    let cost = price* amount ;
    document.querySelector(".mand__price").innerHTML = "€" + cost+",00";
    let total = cost + 5;
    document.querySelector(".mand__total__number").innerHTML = total + " euro";
}







amountField.addEventListener("change", (e)=>{
    let amount = e.target.value;

    localStorage.setItem("amount", amount);
    

    let cost = price*amount;
    document.querySelector(".mand__price").innerHTML = "€" + cost+",00";

    let total = cost + 5;
    document.querySelector(".mand__total__number").innerHTML = total + " euro";
})
