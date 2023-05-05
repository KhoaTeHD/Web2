reload_Total();

var add_btn = document.getElementsByClassName("add_btn");
for (var i =0; i< add_btn.length; i++){
    add_btn[i].addEventListener("click",function(event){
        var target = event.target;
        var id = target.getAttribute("data-id");

        var x = target.parentElement;

        var quantity = x.children[1];

        var parent = x.parentElement;
    
        //var quantity =document.getElementById(id);

        var sumQuanty = parseInt(quantity.innerText) +1;

        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                var s = String(this.responseText);

                if(s == 1){
                    quantity.innerText = sumQuanty;
                    reload_ItemTotal(id, parent.children[3].getAttribute("data-id"), sumQuanty);
                }
                else if ( s !=0) {
                    swal(this.responseText.toString(), "", "warning");
                }
            }
        }
        xml.open("GET","modules/updateCart.php?ProductID="+id+"&Quantity="+sumQuanty,true);
        xml.send();
    })
}

var minus_btn = document.getElementsByClassName("minus_btn");
for (var i =0; i< add_btn.length; i++){
    minus_btn[i].addEventListener("click",function(event){
        var target = event.target;
        var id = target.getAttribute("data-id");

        var x = target.parentElement;

        var quantity = x.children[1];

        var parent = x.parentElement;
        //var quantity =document.getElementById(id);

        var sumQuanty = parseInt(quantity.innerText) -1;
        if(sumQuanty != 0){
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    var s = String(this.responseText);
                    
                    if(s == 1){
                        quantity.innerText = sumQuanty;
                        reload_ItemTotal(id, parent.children[3].getAttribute("data-id"), sumQuanty);
                    }
                }
            }
            xml.open("GET","modules/updateCart.php?ProductID="+id+"&Quantity="+sumQuanty,true);
            xml.send();
        }
    })
}

function reload_ItemTotal(productID, price, quantity){
    var label =document.getElementById(productID);

    label.innerText = new Intl.NumberFormat('en-US').format(parseFloat(price) * quantity) + " đ"; 

    reload_Total();
}

function reload_Total(){
    var items = document.getElementsByClassName("cart_item");
    
    var total = 0;
    for(var i = 0; i < items.length ; i++){
        var price = items[i].children[3];
        var quanty = items[i].children[4].children[1];

        var unitPrice =  parseInt(price.getAttribute('data-id'));
        var quantity = parseInt(quanty.innerText);

        total += unitPrice *quantity;
    }
    var totalLabel = document.getElementsByClassName("cart_totalprice");
    totalLabel[0].children[1].innerText = new Intl.NumberFormat('en-US').format(total) + " đ";
}

function deleteItem(ProductID, button){
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            var s = String(this.responseText);
            
            if(s != 1){
                swal("Đã có lỗi xảy ra! vui lòng thử lại sau", "", "error");
            }
            else{
                var element = button.parentElement;
                element.remove();
                reload_Total();
            }
        }
    }
    xml.open("GET","modules/deleteCart.php?ProductID="+ProductID,true);
    xml.send();
}