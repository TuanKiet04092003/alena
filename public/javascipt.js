const menu = document.querySelector(".menu");
window.addEventListener("scroll", () => {
    if (window.scrollY - 90 > 0) {
    menu.classList.add("fixed");
    } else {
    menu.classList.remove("fixed");
    }
});
var catalog_btns = document.getElementsByClassName('catalog-btn-body');
catalog_btns = Array.from(catalog_btns);
catalog_btns.forEach(a => {
    Array.from(a.children).forEach(b => {
    b.addEventListener('click', function () {
        var otherbtn = Array.from(b.parentElement.children);
        otherbtn.forEach(c => {
        c.classList.remove('bg-primary', 'text-light');
        c.classList.add('bg-body');
        });
        b.classList.remove('bg-body');
        b.classList.add('bg-primary', 'text-light');
    });
    })
});
function scrollThumbnails(amount) {
    event.preventDefault();
    let container = document.getElementById('thumbnailContainer');
    container.scrollBy({ left: amount, behavior: 'smooth' });
    console.log(container);
   
  }
var catalog_btns = document.getElementsByClassName('catalog-btn-light');
catalog_btns = Array.from(catalog_btns);
catalog_btns.forEach(a => {
    Array.from(a.children).forEach(b => {
    b.addEventListener('click', function () {
        var otherbtn = Array.from(b.parentElement.children);
        otherbtn.forEach(c => {
        c.classList.remove('bg-primary', 'text-light');
        c.classList.add('bg-light');
        });
        b.classList.remove('bg-light');
        b.classList.add('bg-primary', 'text-light');
    });
    })
});
function changeColorBox(e){
    event.preventDefault();
    var boxColor=Array.from(e.parentElement.parentElement.children);
    boxColor.forEach(element => {
        element.style.borderColor="white";
    });
    e.parentElement.style.borderColor="gray";
    var idProduct=e.getAttribute('idProduct');
    var idColor=e.getAttribute('idColor');
    console.log(idProduct,idColor);
    var inpIdInventory=e.parentElement.parentElement.parentElement.querySelector('#inpIdInventoryBox');
    var image=e.parentElement.parentElement.parentElement.querySelector('#imageBox');
    var inpImage=e.parentElement.parentElement.parentElement.querySelector('#inpImageBox');
    var imageTemp=imagesAll.filter(a=>a.id_product==idProduct && a.id_color==idColor)[0].image;
    image.src=imageTemp;
    inpImage.value=imageTemp;
    var inventoryCurent=inventories.filter(a=>a.id==inpIdInventory.value)[0];
    inpIdInventory.value=inventories.filter(a=>a.id_product==idProduct && a.id_color==idColor && a.id_size==inventoryCurent.id_size)[0].id;
}
function changeSizeBox(e){
    event.preventDefault();
    var boxSize=Array.from(e.parentElement.children);
    boxSize.forEach(element => {
        element.style.color="#1C5B41";
        element.style.backgroundColor="white";
    });
    e.style.color="white";
    e.style.backgroundColor="#1C5B41";
    var idProduct=e.getAttribute('idProduct');
    var idSize=e.getAttribute('idSize');
    console.log(idProduct,idSize);
    var inpIdInventory=e.parentElement.parentElement.querySelector('#inpIdInventoryBox');
    console.log(inpIdInventory);
    var inventoryCurent=inventories.filter(a=>a.id==inpIdInventory.value)[0];
    inpIdInventory.value=inventories.filter(a=>a.id_product==idProduct && a.id_color==inventoryCurent.id_color && a.id_size==idSize)[0].id;
}
var tabaccount = document.getElementsByClassName('tabaccount');
tabaccount = Array.from(tabaccount);
tabaccount.forEach(b => {
    
    b.addEventListener('click', function () {
        var otherbtn = Array.from(document.getElementsByClassName('tabaccount'));
        otherbtn.forEach(c => {
        c.classList.remove('page-admin-current', 'page-link-admin');
        // c.classList.add('page-link-admin');
        });
        b.classList.remove('page-link-admin');
        b.classList.add('page-admin-current');
    });
});
if (typeof inventories === 'undefined') {
    inventories = [];
}else{
    var amountInventory=inventories[0].quantity;
}
if (typeof idColorDatail === 'undefined') {
}else{
    document.getElementById('inputinventory').value=inventories.filter(item=>item.id_color==idColorDatail && item.id_size==idSizeDetail)[0].id;
}
// console.log(document.getElementById('inputinventory').value);
    // document.getElementById('inputimage').value=imagesColors.filter(item=>item.id_color==idColorDatail)[0].image;
    // console.log(document.getElementById('inputimage').value);
var idSizeDetail=1;
if (typeof imagesColors !== 'undefined') {
    var idColorDatail=imagesColors[0].id_color;
}

document.addEventListener('DOMContentLoaded', () => {
    if(document.getElementById('btn-colors')){ 
        idColorDatail=document.getElementById('btn-colors').children[0].getAttribute('idColorDetail');
        console.log(idColorDatail);
    }    
    var colors_btn=document.getElementsByClassName('btn-colors')[0].children;
    colors_btn = Array.from(colors_btn);
    colors_btn.forEach(a => {
            a.addEventListener('click', function (event) {
                let e=event.target;
                idColorDatail=e.getAttribute('idColorDetail');
                
                amountInventory=inventories.filter(item=>item.id_color==idColorDatail && item.id_size==idSizeDetail)[0].quantity;
                checkamount()
                reloadDetail();
                document.getElementById('inputidinventory').value=inventories.filter(item=>item.id_color==idColorDatail && item.id_size==idSizeDetail)[0].id;
                document.getElementById('inputimage').value=imagesColors.filter(item=>item.id_color==idColorDatail)[0].image;
                console.log(document.getElementById('inputidinventory').value);
                console.log(document.getElementById('inputimage').value);
            });
        
    });
   
});
function ascamount(){ 
    document.getElementById('requiredamount').value++;
    checkamount()
}
function descamount(){
    if(document.getElementById('requiredamount').value>1){
        document.getElementById('requiredamount').value--;
    } 
    checkamount()
}

function checkamount(){ 
    var requiredamount=document.getElementById('requiredamount').value;
    if(requiredamount>amountInventory){
        id="btn-buynow-detail"
        document.getElementById('btn-buynow-detail').disabled = true;
        document.getElementById('btn-addtocart-detail').disabled = true;
        
    }else{
        document.getElementById('btn-buynow-detail').disabled = false;
        document.getElementById('btn-addtocart-detail').disabled = false;
    }
}
var amount=1;

var sizes_btn = document.getElementsByClassName('btn-sizes');
sizes_btn = Array.from(sizes_btn);
sizes_btn.forEach(a => {
    Array.from(a.children).forEach(b => {
    b.addEventListener('click', function () {
        var otherbtn = Array.from(b.parentElement.children);
        otherbtn.forEach(c => {   
            c.classList.remove('bg-secondary', 'text-light');
        });
        b.classList.add('bg-secondary', 'text-light');
        idSizeDetail=b.getAttribute('idSizeDetail');
        amountInventory=inventories.filter(item=>item.id_color==idColorDatail && item.id_size==idSizeDetail)[0].quantity;
        checkamount()
        reloadDetail();
        document.getElementById('inputidinventory').value=inventories.filter(item=>item.id_color==idColorDatail && item.id_size==idSizeDetail)[0].id;
        
        console.log(document.getElementById('inputidinventory').value);
    });
    })
});

function reloadDetail(){
    if(amountInventory==0){
        document.getElementById('amount-required').innerHTML='Hết hàng';
        document.getElementById('amount-required').style.color='red !important';
    }else{
        document.getElementById('amount-required').innerHTML=`Còn ${amountInventory} sản phẩm`;
        document.getElementById('amount-required').style.color='#1C5B41 !important';
    }
}
// reloadDetail();
if (typeof images === 'undefined') {
    images = [];
}
if (typeof products === 'undefined') {
    products = [];
}
var imagesShow=images;
var productsShow=products;
var filterList = [];
function filterProducts(e) {
    if (e.checked) {
        filterList.push(e.value);
    } else {
        filterList = filterList.filter(function (item) {
            return item !== e.value;
        });
    }
    changeDataFilter();
    loadDataFilter();
}

var priceList=['price_1', 'price_2', 'price_3', 'price_4', 'price_5', 'price_6'];
function changeDataFilter(){
    if(filterList.length==0){
        productsShow=products;
        imagesShow=images;
    }else{
        var id_Colors=filterList.filter(item => {return priceList.indexOf(item)==-1});
        if(id_Colors.length==0){
            productsShow=products;
            imagesShow=images;
        }else{
            imagesShow=[];
            for(let i=0; i<id_Colors.length; i++){
            
                var imagesTemp = images.filter(function(item) {
                    return item.id_color == id_Colors[i];
                });
                imagesShow.push(...imagesTemp);
            }
            productsShow=[];
            for(let i=0; i<imagesShow.length; i++){
                
                var productsTemp = products.filter(function(item) {
                    return item.id == imagesShow[i].id_product;
                });
                productsShow.push(...productsTemp);
            }
        }
        var priceFilters=filterList.filter(item => {return priceList.indexOf(item)!=-1});
        if(priceFilters.length>0){
            var productsShowSum=[];
            for(let i=0; i<priceFilters.length; i++){
                var productsShowTemp=[];
                console.log(i);
                switch (priceFilters[i]) {
                    case 'price_1':
                        var productsTemp = productsShow.filter(function(item) {
                            return item.price < 100000;
                        });
                        productsShowTemp.push(...productsTemp);
                        break;
                    case 'price_2':
                        var productsTemp = productsShow.filter(function(item) {
                            return item.price >= 100000 &&  item.price <200000;
                        });
                        productsShowTemp.push(...productsTemp);
                        break;
                    case 'price_3':
                        var productsTemp = productsShow.filter(function(item) {
                            return item.price >= 200000 &&  item.price <300000;
                        });
                        productsShowTemp.push(...productsTemp);
                        break;
                    case 'price_4':
                        var productsTemp = productsShow.filter(function(item) {
                            return item.price >= 300000 &&  item.price <400000;
                        });
                        productsShowTemp.push(...productsTemp);
                        break;
                    case 'price_5':
                        var productsTemp = productsShow.filter(function(item) {
                            return item.price >= 400000 &&  item.price <= 500000;
                        });
                        productsShowTemp.push(...productsTemp);
                        break;
                    case 'price_6':
                        var productsTemp = productsShow.filter(function(item) {
                            return item.price > 500000;
                        });
                        productsShowTemp.push(...productsTemp);
                        break;
                    default:
                        break;
                }
                productsShowSum.push(...productsShowTemp);
            }
            productsShow=productsShowSum;
            var imagesShowTemp=[];
            for(let i=0; i<productsShow.length; i++){
                
                var imagesTemp = imagesShow.filter(function(item) {
                    return item.id_product == productsShow[i].id;
                });
                imagesShowTemp.push(...imagesTemp);
            }
            imagesShow=imagesShowTemp;
        }
    }
}
function loadDataFilter(){
    document.getElementById('productsShow').innerHTML='';
    var numberProductsPage=0;
    if(productsShow.length>limitPage){
        numberProductsPage=limitPage;
    }else{
        numberProductsPage=productsShow.length;
    }
    for(let i=0;i<numberProductsPage; i++){
    
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var imageColorMain=imagesAll.filter(e=>e.id_product==productsShow[i].id && e.is_main==1)[0];
        var imagesColorNotMain=imagesAll.filter(e=>e.id_product==productsShow[i].id && e.is_main==0 && e.id_color>0);
        var inventory=inventories.filter(e=>e.id_product==productsShow[i].id && e.id_color==imageColorMain.id_color && e.id_size==sizes[0].id)[0];
        var boxsizes='';
        sizes.forEach(size => {
            boxsizes+=`<button style="${size.id==sizes[0].id?'background-color: #1C5B41; color: white':''}" 
            onclick="changeSizeBox(this)" idProduct="${productsShow[i].id}" idSize="${size.id}">${size.code_size}</button>`;
        });
        var boxcolors='';
        console.log(imagesColorNotMain);
        imagesColorNotMain.forEach(image => {
            boxcolors+=`
            <div style="border-color: white">
                <div   onclick="changeColorBox(this)"  idProduct="${productsShow[i].id}" idColor="${image.id_color}" style="background-color: ${colors.filter(e=>e.id==image.id_color)[0].code_color}"></div>
            </div>`;
        });
        document.getElementById('productsShow').innerHTML+=`<div class="col-md-4 col-sm-6">
                        <div class="card bg-light border-0">
                            <div class="card-header p-0 bg-light border-0 position-relative">
                                <form action="/addtocart" method="post">
                                    <a href="/detail/${productsShow[i].id}"><img id="imageBox" src="${window.location.origin}/${imagesShow[i].image}" class="card-img-top rounded-3" alt="..."></a>
                               
                                    <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                    <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                    Thêm vào giỏ hàng
                                    </button>
                                    <div class="box-size">${boxsizes}</div>
                                    <div class="box-color">
                                        <div>
                                            <div onclick="changeColorBox(this)"  idProduct="${productsShow[i].id}" idColor="${imageColorMain.id}" style="background-color: ${colors.filter(e=>e.id==imageColorMain.id_color)[0].code_color}"></div>
                                        </div>${boxcolors}</div>
                                    
                                    
                                
                                    <input type="hidden" name="_token" value="${csrfToken}">
                                    <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="`+inventory.id+`">
                                    <input type="hidden" name="price" value="`+productsShow[i].price+`">
                                    <input type="hidden" name="image" id="inpImageBox" value="`+imageColorMain.image+`">
                                    <input type="hidden" name="quantity" value="1">
                                </form>
                            </div>
                            <div class="card-body px-0">
                                <a class="card-title product-tittle" href="/detail/${productsShow[i].id}"">`+ productsShow[i].name +`</a>
                                <div class="card-text d-flex gap-2 align-items-center">
                                    <p class="price-product text-primary">`+ priceFomat(productsShow[i].price) +`<span class="text-decoration-underline">đ</span>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>`;
    }
    countPage();
}
function priceFomat(thanhtienso){

                var thanhtien='';
                if(thanhtienso==0){
                    thanhtien='0';
                }else{
                    while(thanhtienso>0){
                        if(thanhtienso>=1000000){
                            thanhtien+=Math.floor(thanhtienso/1000000)+'.';
                            thanhtienso=thanhtienso-Math.floor(thanhtienso/1000000)*1000000;
                        }
                        if(thanhtienso>=1000){
                            thanhtien+=Math.floor(thanhtienso/1000)+'.';
                            thanhtienso=thanhtienso-Math.floor(thanhtienso/1000)*1000;
                        }
                        if(thanhtienso<1000){
                            if(thanhtienso>0){
                                thanhtien+=thanhtienso;
                            }else{
                                thanhtien+='000';
                            }
                        }
                    }
                }
                return thanhtien;
}
function searchProducts(e){
    // setTimeout(function(){
    //     console.log(e.value);
    // },500);
    console.log(e.value);
    changeDataFilter();
    productsShow= productsShow.filter(product => product.name.toLowerCase().includes(e.value.toLowerCase()));
    sortImages();
    loadDataFilter();
}
function sortImages(){
    var imagesShowTemp=[];
    for(let i=0; i<productsShow.length; i++){
        
        var imagesTemp = imagesShow.filter(function(item) {
            return item.id_product == productsShow[i].id;
        });
        imagesShowTemp.push(...imagesTemp);
    }
    imagesShow=imagesShowTemp;
}
function countPage(){
    var pagination= document.querySelector('.pagination');
    pagination.innerHTML='';
    if(Math.ceil(productsShow.length/limitPage)>1){
        for(let i=0;i<Math.ceil(productsShow.length/limitPage); i++){
            if(i==0){
                pagination.innerHTML=`<li onclick="changePage(this)" class="page-item"><a class="page-link text-light bg-secondary">`+(i+1)+`</a></li>`
            }else{
                pagination.innerHTML+=`<li onclick="changePage(this)" class="page-item"><a class="page-link text-secondary">`+(i+1)+`</a></li>`;
            }
        }
    }
}
function changePage(e){
    window.scrollTo(0, 0);
    var pagination= document.querySelector('.pagination');
    pagination.innerHTML='';
    if(Math.ceil(productsShow.length/limitPage)>1){
        for(let i=0;i<Math.ceil(productsShow.length/limitPage); i++){
            if(i+1==e.children[0].innerHTML){
                pagination.innerHTML+=`<li onclick="changePage(this)" class="page-item"><a class="page-link text-light bg-secondary">`+(i+1)+`</a></li>`
            }else{
                pagination.innerHTML+=`<li onclick="changePage(this)" class="page-item"><a class="page-link text-secondary">`+(i+1)+`</a></li>`;
            }
        }
    }
    document.getElementById('productsShow').innerHTML='';
    var endProducts=0;
    if(productsShow.length>limitPage*(e.children[0].innerHTML)){
        endProducts=limitPage*(e.children[0].innerHTML);
    }else{
        endProducts=productsShow.length;
    }
    for(let i=limitPage*(e.children[0].innerHTML-1);i<endProducts; i++){
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var imageColorMain=imagesAll.filter(e=>e.id_product==productsShow[i].id && e.is_main==1)[0];
        var imagesColorNotMain=imagesAll.filter(e=>e.id_product==productsShow[i].id && e.is_main==0 && e.id_color>0);
        var inventory=inventories.filter(e=>e.id_product==productsShow[i].id && e.id_color==imageColorMain.id_color && e.id_size==sizes[0].id)[0];
        var boxsizes='';
        sizes.forEach(size => {
            boxsizes+=`<button style="${size.id==sizes[0].id?'background-color: #1C5B41; color: white':''}" 
            onclick="changeSizeBox(this)" idProduct="${productsShow[i].id}" idSize="${size.id}">${size.code_size}</button>`;
        });
        var boxcolors='';
        console.log(imagesColorNotMain);
        imagesColorNotMain.forEach(image => {
            boxcolors+=`
            <div style="border-color: white">
                <div   onclick="changeColorBox(this)"  idProduct="${productsShow[i].id}" idColor="${image.id_color}" style="background-color: ${colors.filter(e=>e.id==image.id_color)[0].code_color}"></div>
            </div>`;
        });
        document.getElementById('productsShow').innerHTML+=`<div class="col-md-4 col-sm-6">
                        <div class="card bg-light border-0">
                            <div class="card-header p-0 bg-light border-0 position-relative">
                                <form action="/addtocart" method="post">
                                    <a href="/detail/${productsShow[i].id}"><img id="imageBox" src="${window.location.origin}/${imagesShow[i].image}" class="card-img-top rounded-3" alt="..."></a>
                               
                                    <button class="addtocart-product rounded-bottom-3 border-0 bg-addtocart hover:bg-primary">
                                    <i class="fa-solid fa-basket-shopping fs-5 text-light"></i>
                                    Thêm vào giỏ hàng
                                    </button>
                                    <div class="box-size">${boxsizes}</div>
                                    <div class="box-color">
                                        <div>
                                            <div onclick="changeColorBox(this)"  idProduct="${productsShow[i].id}" idColor="${imageColorMain.id}" style="background-color: ${colors.filter(e=>e.id==imageColorMain.id_color)[0].code_color}"></div>
                                        </div>${boxcolors}</div>
                                    
                                    
                                
                                    <input type="hidden" name="_token" value="${csrfToken}">
                                    <input type="hidden" name="idinventory"  id="inpIdInventoryBox" value="`+inventory.id+`">
                                    <input type="hidden" name="price" value="`+productsShow[i].price+`">
                                    <input type="hidden" name="image" id="inpImageBox" value="`+imageColorMain.image+`">
                                    <input type="hidden" name="quantity" value="1">
                                </form>
                            </div>
                            <div class="card-body px-0">
                                <a class="card-title product-tittle" href="/detail/${productsShow[i].id}"">`+ productsShow[i].name +`</a>
                                <div class="card-text d-flex gap-2 align-items-center">
                                    <p class="price-product text-primary">`+ priceFomat(productsShow[i].price) +`<span class="text-decoration-underline">đ</span>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>`;
    }
}
function sortProducts(e){
    console.log(e.value);
    switch (e.value) {
        case 'name_asc':
            console.log('asc');
            productsShow.sort((a,b)=>a.name.localeCompare(b.name));
            sortImages();
            loadDataFilter();
            break;
        case 'name_desc':
            productsShow.sort((a,b)=>b.name.localeCompare(a.name));
            sortImages();
            loadDataFilter();
            break;
        case 'name_desc':
            productsShow.sort((a,b)=>b.name.localeCompare(a.name));
            sortImages();
            loadDataFilter();
            break;
        case 'price_asc':
            productsShow.sort((a,b)=>a.price-b.price);
            sortImages();
            loadDataFilter();
            break;
        case 'price_desc':
            productsShow.sort((a,b)=>b.price-a.price);
            sortImages();
            loadDataFilter();
            break;
        case 'new':
            productsShow.sort((a,b)=>b.id-a.id);
            sortImages();
            loadDataFilter();
            break;
        case 'bestseller':
            productsShow.sort((a,b)=>b.sold-a.sold);
            sortImages();
            loadDataFilter();
            break;
        case 'view':
            productsShow.sort((a,b)=>b.view-a.view);
            sortImages();
            loadDataFilter();
        break;
        default:
            break;
    }
}
function deleteAvatar(e){
    e.preventDefault();
    document.getElementsByClassName('image-container-account')[0].remove();
    if(document.getElementById('avatarOld')){
       document.getElementById('avatarOld').value='0'+document.getElementById('avatarOld').value.slice(1);
    }
 }

 document.addEventListener('DOMContentLoaded', () => {
    const heart = document.querySelectorAll('.heart');
    
    heart.forEach(element => {
        element.addEventListener('click', () => {
            element.classList.toggle('red');
        });
    });
});
 
function addressother(){
    if(document.getElementById('address-other-check').checked==true){
        document.getElementById('address-other').style.display="block";
    }else{
        document.getElementById('address-other').style.display="none";
    }
}
                      
    