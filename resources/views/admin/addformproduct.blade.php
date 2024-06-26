@extends('admin.layout')
@section('productadmin','page-admin-current')
@section('content')
<div id="myDataColors" class="d-none" data-array='{{ $colors }}'></div>
    <script>
       var colors = JSON.parse(document.getElementById('myDataColors').getAttribute('data-array'));
        console.log(colors); // ['apple', 'banana', 'orange']
    </script>
<div class="col-lg-10 col-12 px-4">
    <div class="row mx-4 my-3">
      <div class="offset-lg-6 col-lg-6 col-md-12">
        <form class="d-flex" role="search">
          <input class="form-control border-0 rounded-end-0 rounded-start-5 ps-4 shadow-sm" type="search"
            placeholder="Tìm kiếm sản phẩm bạn mong muốn" aria-label="Search" style="background-color: #F7F7F8;">
          <button class="btn btn-primary border-0 bg-primary rounded-end-5 rounded-start-0" type="submit"><i
              class="fa-solid fa-magnifying-glass text-light pe-2"></i></button>
        </form>
      </div>
    </div>
    <form action="/admin/addproduct" method="post"  enctype="multipart/form-data">
      <div class="mx-5" id="parentEle">
        <div class="d-flex justify-content-between my-4">
          <h3>Thêm sản phẩm</h3>
         
        </div>
        @csrf
        
    
        <!-- Button trigger modal -->
    
        <!-- Modal -->
              
      
           
       
                <div class="row my-2">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Mã sản phẩm</label>
                  </div>
                  <div class="col-9">
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã sản phẩm" required>
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <div class="row my-2">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Tên sản phẩm</label>
                  </div>
                  <div class="col-9">
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <div class="row my-2">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Giá sản phẩm</label>
                  </div>
                  <div class="col-9">
                    <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm" required>
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <div class="row my-2">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Giá cũ</label>
                  </div>
                  <div class="col-9">
                    <input type="text" name="priceold" class="form-control" placeholder="Nhập giá khuyến mãi của sản phẩm">
                  </div>
                </div>
                
                <div class="row my-2">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Danh mục</label>
                  </div>
                  <div class="col-9">
                    <select  name="id_category" class="form-select">
                      @foreach ($categories as $item)
                         <option {{ $item->id==$idCategorySelected ? 'selected' : "" }}  value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                      
                      
                    </select>
                  </div>
                </div>
                <br>
                <div class="row my-2">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Màu sắc chính</label>
                  </div>
                  <div class="col-9">
                    <select name="color_id" id="idColorMain" class="form-select" onchange="reLoadColorAdd()">
                      @foreach ($colors as $item)
                         <option  value="{{ $item->id }}">{{ $item->color }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row my-2">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Ảnh đại diện</label>
                  </div>
                  <div class="col-9">
                    <input name="imageMain" id="input-image-main" class="form-control file-input"  type="file" accept="image/*" required/>
                    <div class="invalid-feedback"></div>
                    <img src="" class="image-preview-single" alt="">
                  </div>
                </div>
                <br>
                <div class="row my-2">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Ảnh chi tiết</label>
                  </div>
                  <div class="col-9">
                    <input name="filesDetail[]" type="file" id="fileInput" accept="image/*" multiple />
                    <div class="image-preview"></div>
                  </div>
                </div>
                <br>
                <div class="row my-2">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Thêm hình ảnh theo màu</label>
                  </div>
                  <div class="col-9 d-flex gap-3">
                    <select id="idColorAdd" class="form-select">
                      @foreach ($colors as $item)
                         <option {{ $item->id==$idColorSelected ? 'selected' : "" }} value="{{ $item->id }}">{{ $item->color }}</option>
                      @endforeach
                    </select>
                    <button class="btn bg-secondary text-light btn-add-admin" onclick="addColor(this)">Thêm</button>
                  </div>
                </div>
                <br>
                <input type="hidden" name="id_colors_add" id="ele_id_colors_add" value="">
                <script>
                  const fileInput = document.getElementById('fileInput');
                  const imagePreview = document.querySelector('.image-preview');
                  const warningDiv = document.getElementById('warning');
                  var allFiles=[];
              
                  fileInput.addEventListener('change', (e) => {
                    const files = Array.from(e.target.files);
                    allFiles=allFiles.concat(files);
                    const fileList = new DataTransfer();
                    allFiles.forEach(file => {
                        fileList.items.add(file);
                    });

                    document.getElementById('fileInput').files=fileList.files;
                    
                    const previewImages = imagePreview.querySelectorAll('img');
              
              
                    for (let i = 0; i < files.length; i++) {
                      const file = files[i];
                      const reader = new FileReader();
              
                      reader.onload = () => {
                        const imgContainer = document.createElement('div');
                        imgContainer.className = 'image-container';
                        const img = document.createElement('img');
                        img.src = reader.result;
              
                        const removeBtn = document.createElement('button');
                        removeBtn.innerHTML = '&times;';
                        removeBtn.className = 'remove-btn';
                        removeBtn.addEventListener('click', () => {
                          Array.from(imagePreview.children).forEach((e, i) => {
                            if(e==imgContainer){
                              allFiles.splice(i,1);
                            }
                          });
                          console.log(allFiles);
                          imgContainer.remove();
                          const dataTransfer = new DataTransfer();
                          for (let j = 0; j < fileInput.files.length; j++) {
                            if (fileInput.files[j] !== file) {
                              dataTransfer.items.add(fileInput.files[j]);
                            }
                          }
                          fileInput.files = dataTransfer.files;

                        });
              
                        imgContainer.appendChild(img);
                        imgContainer.appendChild(removeBtn);
                        imagePreview.appendChild(imgContainer);
                      };
              
                      reader.readAsDataURL(file);
                    }
                  });
                </script>
                <div class="row my-2" id="description">
                  <div class="col-3">
                    <label for="" class="form-label fw-semibold mb-0 mt-1">Mô tả</label>
                  </div>
                  <div class="col-9">
                    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script>
                    <div id="editor">Mô tả sản phẩm</div>
                    <input type="hidden" name="description" id="description" value="">
                  </div>
                </div>
                
                
                
  
  
                
        <!-- <input id="inputkq" name="url" type="hidden" value=""> -->
        <!-- </form> -->
                  
            <div class="d-flex justify-content-end mb-5 mt-4">
              <a href="/admin/product">
                <button type="button" class="btn btn-outline-primary btn-cancel-admin me-3" data-bs-dismiss="modal">Hủy</button>
              </a>
              
                <button type="submit" class="btn bg-secondary text-light btn-add-admin" id="saveButton">Thêm</button>
            
            </div>
           
      </div>
    </form>
    <script>
      CKEDITOR.ClassicEditor
              .create(document.querySelector('#editor'), {
                  toolbar: {
              items: [
                 'heading', '|','findAndReplace', 'selectAll', '|',
                 'bold', 'italic', 'underline', 'subscript', 'superscript', 'removeFormat', '|',
                 'bulletedList', 'numberedList', '|','outdent', 'indent', '|',
                 '-',
                 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                 'alignment', '|',
                 'link', 'insertImage', 'insertTable', 'mediaEmbed', '|',
                  'horizontalLine', '|','sourceEditing'
              ],
              shouldNotGroupWhenFull: true
           },
           // Changing the language of the interface requires loading the language file using the <script> tag.
           // language: 'es',
           list: {
              properties: {
                 styles: true,
                 startIndex: true,
                 reversed: true
              }
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
           heading: {
              options: [
                 { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                 { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                 { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                 { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                 { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                 { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                 { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
              ]
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
           placeholder: 'Welcome to CKEditor 5!',
           // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
           fontFamily: {
              options: [
                 'default',
                 'Arial, Helvetica, sans-serif',
                 'Courier New, Courier, monospace',
                 'Georgia, serif',
                 'Lucida Sans Unicode, Lucida Grande, sans-serif',
                 'Tahoma, Geneva, sans-serif',
                 'Times New Roman, Times, serif',
                 'Trebuchet MS, Helvetica, sans-serif',
                 'Verdana, Geneva, sans-serif'
              ],
              supportAllValues: true
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
           fontSize: {
              options: [ 10, 12, 14, 'default', 18, 20, 22 ],
              supportAllValues: true
           },
           // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
           // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
           htmlSupport: {
              allow: [
                 {
                       name: /.*/,
                       attributes: true,
                       classes: true,
                       styles: true
                 }
              ]
           },
           // Be careful with enabling previews
           // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
           htmlEmbed: {
              showPreviews: true
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
           link: {
              decorators: {
                 addTargetToExternalLinks: true,
                 defaultProtocol: 'https://',
                 toggleDownloadable: {
                       mode: 'manual',
                       label: 'Downloadable',
                       attributes: {
                          download: 'file'
                       }
                 }
              }
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
           mention: {
              feeds: [
                 {
                       marker: '@',
                       feed: [
                          '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                          '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                          '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                          '@sugar', '@sweet', '@topping', '@wafer'
                       ],
                       minimumCharacters: 1
                 }
              ]
           },
           // The "super-build" contains more premium features that require additional configuration, disable them below.
           // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
           removePlugins: [
              // These two are commercial, but you can try them out without registering to a trial.
              // 'ExportPdf',
              // 'ExportWord',
              'CKBox',
              'CKFinder',
              'EasyImage',
              // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
              // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
              // Storing images as Base64 is usually a very bad idea.
              // Replace it on production website with other solutions:
              // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
              // 'Base64UploadAdapter',
              'RealTimeCollaborativeComments',
              'RealTimeCollaborativeTrackChanges',
              'RealTimeCollaborativeRevisionHistory',
              'PresenceList',
              'Comments',
              'TrackChanges',
              'TrackChangesData',
              'RevisionHistory',
              'Pagination',
              'WProofreader',
              // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
              // from a local file system (file://) - load this site via HTTP server if you enable MathType
              'MathType'
           ]
              })
              .then(editor => {
                  // window.editor = editor;
                  // document.getElementById('editor').addEventListener('keyup', function() {
                  //     var editorData = window.editor.getData();
                  //    //  var kq = document.getElementById('kq');
                  //    //  kq.innerHTML = editorData;
                  //     console.log(editorData);
                      
                  // });
                  editor.model.document.on('change', () => {
                     const data = editor.getData();
                     document.getElementById('description').value=data;
                 });
              })
              .catch(err => {
                  console.error(err.stack);
              });
    </script>
@endsection