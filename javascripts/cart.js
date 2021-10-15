var gT = 0;
var itemPrice= document.getElementsByClassName('itemPrice');
var itemQuantity= document.getElementsByClassName('itemQuantity');
var subTotal= document.getElementsByClassName('subTotal');
var grandTotal= document.getElementById('grandTotal');



function subTotalPrice() 
{
  gT=0;
 for(i=0;i<itemPrice.length;i++){
  subTotal[i].innerText=(itemPrice[i].value)*(itemQuantity[i].value);
  gT=gT+(itemPrice[i].value)*(itemQuantity[i].value);
 }
 grandTotal.innerText=gT;
}



subTotalPrice();









