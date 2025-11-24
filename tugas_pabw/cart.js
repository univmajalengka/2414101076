let cart = [];

function addToCart(id, nama, harga) {
    let item = cart.find(i => i.id === id);
    if(item){
        item.qty++;
    } else {
        cart.push({id, nama, harga, qty:1});
    }
    updateCart();
}

function buyNow(id, nama, harga) {
    cart = [{id, nama, harga, qty:1}];
    document.getElementById("buy-total").value = harga;
    new bootstrap.Modal(document.getElementById("buyModal")).show();
}

function updateCart() {
    document.getElementById("cart-count").innerText = cart.length;
    let html = "<table class='table'><tr><th>Nama</th><th>Qty</th><th>Harga</th><th>Aksi</th></tr>";
    let total = 0;
    cart.forEach((item, index)=>{
        total += item.harga * item.qty;
        html += `<tr>
            <td>${item.nama}</td>
            <td>
              <button class="btn btn-sm btn-secondary" onclick="decreaseQty(${index})">-</button>
              ${item.qty}
              <button class="btn btn-sm btn-secondary" onclick="increaseQty(${index})">+</button>
            </td>
            <td>Rp ${item.harga * item.qty}</td>
            <td><button class="btn btn-sm btn-danger" onclick="removeItem(${index})">Hapus</button></td>
        </tr>`;
    });
    html += `<tr><td colspan="2"><b>Total</b></td><td colspan="2"><b>Rp ${total}</b></td></tr></table>`;
    document.getElementById("cart-items").innerHTML = html;
}

function increaseQty(index){
    cart[index].qty++;
    updateCart();
}
function decreaseQty(index){
    if(cart[index].qty>1){
        cart[index].qty--;
    } else {
        cart.splice(index,1);
    }
    updateCart();
}
function removeItem(index){
    cart.splice(index,1);
    updateCart();
}

function checkout(){
    let total = cart.reduce((sum,item)=> sum + item.harga*item.qty, 0);
    document.getElementById("buy-total").value = total;
    new bootstrap.Modal(document.getElementById("buyModal")).show();
}

function filterCategory(cat){
    let cards = document.querySelectorAll(".equipment-card");
    cards.forEach(card=>{
        if(cat==="all" || card.dataset.category===cat){
            card.style.display="block";
        } else {
            card.style.display="none";
        }
    });
}
 