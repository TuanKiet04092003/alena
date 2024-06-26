

// const { isArguments } = require("lodash");
if (typeof colors === 'undefined') {
   colors = [];
}
var input = document.querySelectorAll('.file-input');
var imageSingle = document.querySelectorAll('.image-preview-single');
function loadImage(){ 
   input = document.querySelectorAll('.file-input');
   imageSingle = document.querySelectorAll('.image-preview-single');
   for(let i=0;i<input.length;i++){
      input[i].addEventListener("change", (e) => {
      if (e.target.files.length) {
          const src = URL.createObjectURL(e.target.files[0]);
          imageSingle[i].src = src;
      }
  });
  }
}
if(document.getElementById('idColorMain')){
    id_color_main=document.getElementById('idColorMain').value;
}
loadImage();
if (typeof imagesColor === 'undefined') {
    var id_colors_add=[];
 }else{
    var id_colors_add=[];
    imagesColor.forEach(element => {
        id_colors_add.push(element.id_color);
    });
    console.log(id_colors_add);
 }
 if (typeof imagesDetail !== 'undefined') {
    imagesDetail=imagesDetail.map((e)=>{ return e.image });
    document.getElementById('imagesDetailOld').value=imagesDetail;
 }

 
function reLoadColorAdd(){
    
    id_color_main=document.getElementById('idColorMain').value;
    document.getElementById('idColorAdd').innerHTML='';
    document.getElementById('idColorMain').innerHTML=`
    <option selected 
    value="${id_color_main}">${colors.filter(e=>e.id==id_color_main)[0].color}</option>`;
    colorsShow=colors;
    colorsShow=colorsShow.filter(e=>e.id!=id_color_main);
    id_colors_add.forEach(element => {
        colorsShow=colorsShow.filter(e=>e.id!=element);
    });

    
    let i=0;
    colorsShow.forEach(element => {
        document.getElementById('idColorMain').innerHTML+=`
        <option
        value="${element.id}">${element.color}</option>`;    });
    colorsShow.forEach(element => {
        document.getElementById('idColorAdd').innerHTML+=`<option ${i==0?"selected":""} value="${element.id}">${element.color}</option>`;
        i++;
    });
    document.getElementById('ele_id_colors_add').value=id_colors_add;
    console.log(document.getElementById('ele_id_colors_add').value);
}
reLoadColorAdd();

function addColor(e){
    event.preventDefault();
    var id_color_add=e.parentElement.children[0].value;
    id_colors_add.push(id_color_add);
    document.getElementById('ele_id_colors_add').value=id_colors_add;

    var color_name=colors.filter(e=>e.id==id_color_add)[0].color;
    var color_ele=document.createElement('div');
    color_ele.classList.add('row', 'my-2');
    color_ele.innerHTML=`<div class="col-3">
    <label for="" class="form-label fw-semibold mb-0 mt-1">Ảnh màu ${color_name.toLowerCase()}</label>
  </div>
  <div class="col-9">
    <div class="d-flex gap-3">
      <input name="imageColor${id_color_add}" id="input-image-main" class="form-control  file-input"  type="file" accept="image/*"/>
     <button class="btn btn-danger" onclick="deleteColor(${id_color_add}, this)">Xóa</button>
    </div>
    <img src="" class="image-preview-single" alt="">
  </div>`;
  document.getElementById('parentEle').insertBefore(color_ele, document.getElementById('description'));
  reLoadColorAdd();
  loadImage();
}
function deleteColor(id_color_delete, ele){
    
    event.preventDefault();
    id_colors_add=id_colors_add.filter(e=>e!=id_color_delete);
    document.getElementById('ele_id_colors_add').value=id_colors_add;
    console.log(document.getElementById('ele_id_colors_add').value);
    ele.parentElement.parentElement.parentElement.remove();
    reLoadColorAdd();
}
function validateEmail(email) {
   var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   return re.test(String(email).toLowerCase());
}

function validatePhone(phone) {
   var re = /^[0-9]{10}$/;
   return re.test(phone);
}
if(document.getElementById('saveButton')){
   document.getElementById('saveButton').addEventListener('click', function(event) {
      event.preventDefault(); // Ngăn chặn form gửi đi
   
      var isValid = true;
      var inputs = document.querySelectorAll('input[required], select[required]');
   
      inputs.forEach(function(input) {
          if (!input.value) {
              isValid = false;
              input.classList.add('is-invalid');
              input.nextElementSibling.textContent = 'Trường này là bắt buộc';
          } else {
              if (input.name === 'email' && validateEmail(input.value)) {
                  isValid = false;
                  input.classList.add('is-invalid');
                  input.nextElementSibling.textContent = 'Email không hợp lệ';
              } else if (input.name === 'phone' && !validatePhone(input.value)) {
                  isValid = false;
                  input.classList.add('is-invalid');
                  input.nextElementSibling.textContent = 'Số điện thoại không hợp lệ';
              } else {
                  input.classList.remove('is-invalid');
                  input.nextElementSibling.textContent = '';
              }
          }
      });


  
      
      if (isValid) {
          // Nếu tất cả đều hợp lệ, gửi form
          this.form.submit();
      }
   });
}

function previewImage(event) {
   if(document.getElementsByClassName('image-container')[0]){
      document.getElementsByClassName('image-container')[0].remove();
   }
   var input = event.target;
   var reader = new FileReader();

   reader.onload = function() {
      const imgContainer = document.createElement('div');
          imgContainer.className = 'image-container';
          imgContainer.innerHTML=`<img id="imagePreview" />`;
          var chooseAvatar=document.getElementById('chooseAvatar');
          chooseAvatar.appendChild(imgContainer);
          var imagePreview=document.getElementById('imagePreview');
          var dataURL = reader.result;
       
          imagePreview.src = dataURL;
         
          const removeBtn = document.createElement('button');
          removeBtn.innerHTML = '&times;';
          removeBtn.className = 'remove-btn';
          removeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            imgContainer.remove();
            if(document.getElementById('avatarOld')){
               document.getElementById('avatarOld').value='0'+document.getElementById('avatarOld').value.slice(1);
               console.log(document.getElementById('avatarOld').value);
            }
           chooseAvatar.innerHTML=`<input type="file" class="form-control" 
           placeholder="Chọn hình ảnh" onchange="previewImage(event)">`;
          });
          imgContainer.appendChild(removeBtn);
       
   };

   if (input.files && input.files[0]) {
       reader.readAsDataURL(input.files[0]);
   }
}

function deleteAvatar(e){
   e.preventDefault();
   document.getElementsByClassName('image-container')[0].remove();
   if(document.getElementById('avatarOld')){
      document.getElementById('avatarOld').value='0'+document.getElementById('avatarOld').value.slice(1);
   }
}
if(products.length>0){
   var productsShow=products;
}else{
   var productsShow=[];
}
if(images.length>0){
   var imagesShow=images;
}else{
   var imagesShow=[];
}
function searchProduct(e){
   productsShow= products.filter(product => product.name.toLowerCase().includes(e.value.toLowerCase()) ||  product.code_product.toLowerCase().includes(e.value.toLowerCase()));
   imagesShow=[];
   productsShow.forEach(element => {
      imagesShow.push(imagesShow.filter(e=>e.id_product==element.id));
   });
   window.scrollTo(0, 0);
   var pagination= document.querySelector('.pagination');
   pagination.innerHTML='';
   if(Math.ceil(productsShow.length/limitPage)>1){
       for(let i=0;i<Math.ceil(productsShow.length/limitPage); i++){
           if(i+1==1){
               pagination.innerHTML+=`<li onclick="changePage(this)" class="page-item"><a class="page-link text-light bg-secondary">`+(i+1)+`</a></li>`
           }else{
               pagination.innerHTML+=`<li onclick="changePage(this)" class="page-item"><a class="page-link text-secondary">`+(i+1)+`</a></li>`;
           }
       }
   }
   var tableProducts=document.getElementById('tableProducts');
   tableProducts.innerHTML='';
   var endProducts=0;
    if(productsShow.length>limitPage){
        endProducts=limitPage*1;
    }else{
        endProducts=productsShow.length;
    }
   for(let i=limitPage*0;i<endProducts; i++){
      tableProducts.innerHTML+=`<tr class="align-middle">
      <td>${i+1}</td>
      <td>${productsShow[i].code_product}</td>
      <td><img src="${window.location.origin}/${images[i].image}" height="70px" alt=""></td>
      <td>${productsShow[i].price}</td>
      <td>${productsShow[i].priceold}</td>
      <td>${productsShow[i].name}</td>
      <td>${productsShow[i].view}</td>
      <td>${productsShow[i].sold}</td>
      <td>
        <a href="/admin/editformproduct/${productsShow[i].id}">
          <i class="fa-solid fa-pen-to-square text-info me-2"></i>
        </a>
        |
        <a href="/admin/deleteproduct/${productsShow[i].id}">
          <i class="fa-solid fa-trash-can text-danger ms-2"></i>
        </a>
      </td>
    </tr>`;
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
   var tableProducts=document.getElementById('tableProducts');
   tableProducts.innerHTML='';
   var endProducts=0;
    if(productsShow.length>limitPage*(e.children[0].innerHTML)){
        endProducts=limitPage*(e.children[0].innerHTML);
    }else{
        endProducts=productsShow.length;
    }
   for(let i=limitPage*(e.children[0].innerHTML-1);i<endProducts; i++){
      tableProducts.innerHTML+=`<tr class="align-middle">
      <td>${i+1}</td>
      <td>${productsShow[i].code_product}</td>
      <td><img src="${window.location.origin}/${images[i].image}" height="70px" alt=""></td>
      <td>${productsShow[i].price}</td>
      <td>${productsShow[i].priceold}</td>
      <td>${productsShow[i].name}</td>
      <td>${productsShow[i].view}</td>
      <td>${productsShow[i].sold}</td>
      <td>
        <a href="/admin/editformproduct/${productsShow[i].id}">
          <i class="fa-solid fa-pen-to-square text-info me-2"></i>
        </a>
        |
        <a href="/admin/deleteproduct/${productsShow[i].id}">
          <i class="fa-solid fa-trash-can text-danger ms-2"></i>
        </a>
      </td>
    </tr>`;
   }
}








