angular
    .module('myapp', ['ngRoute'])
    // .config(function ($routeProvider) {
    //     $routeProvider
            
    // })
    // .config(['$httpProvider', function($httpProvider) {
    //     $httpProvider.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
    // }])
    // .module('myapp', [], function($interpolateProvider) {
    //     $interpolateProvider.startSymbol('[[');
    //     $interpolateProvider.endSymbol(']]');
    // })
    .controller('myctrl', function ($scope, $http, $timeout, $location) {
        $timeout(function () {
            
        }, 100);
        $http.get('products.json').then(function (response){
            $scope.products=response.data;
            $scope.productshow=$scope.products;
            console.log($scope.products);
        });
    })
    // .controller('detailCtrl', function ($scope, $routeParams, $timeout) {
    //     window.scrollTo(0, 0);
    //     $scope.id = $routeParams.id;
    //     $scope.detail = $scope.product.filter(pro => pro.id == $scope.id)[0];
    //     $scope.imagedetail = $scope.image.filter(img => img.id_product == $scope.id);
    //     $scope.size = 'S';
    //     $scope.listidcolor = ($scope.imagedetail.filter(img => img.id_color != 0)).map(img => img.id_color);
    //     // console.log($scope.imagedetail);
    //     // console.log($scope.listidcolor);
    //     $scope.amount = 1;
    //     $scope.colorchoice = $scope.listidcolor[0];
    //     $scope.namecolorchoice = $scope.color.filter(c => c.id == $scope.colorchoice)[0].name;
    //     $scope.getColorCode = function (clr) {
    //         return $scope.color.filter(c => c.id == clr)[0].code;
    //     }
    //     $scope.getimagemaincolor = function (id_product, id_color) {
    //         return $scope.image.filter(i => i.id_product == id_product && i.id_color == id_color)[0].path;
    //     }
    //     $scope.getimagedetail = function (id_product) {
    //         return $scope.image.filter(i => i.id_product == id_product && i.id_color == 0);
    //     }
    //     $scope.changecolor = function (id_color) {
    //         $scope.colorchoice = id_color;
    //         $scope.namecolorchoice = $scope.color.filter(c => c.id == $scope.colorchoice)[0].name;
    //         $scope.getimagemaincolor($scope.id, $scope.colorchoice);
    //         $scope.getimagedetail($scope.id);
    //         var carousel = document.getElementById('carouselExampleIndicators').getElementsByClassName('carousel-item');
    //         for (var i = 0; i < carousel.length; i++) {
    //             carousel[i].classList.remove('active');
    //         }
    //         carousel[0].classList.add('active');
    //     }
    //     $scope.desc = function () {
    //         if ($scope.amount > 1) {
    //             $scope.amount--;
    //         }
    //     }
    //     $scope.asc = function () {
    //         $scope.amount++;
    //     }
    //     $scope.changesize = function (size) {
    //         $scope.size = size;
    //     }
    //     $timeout(function () {
    //         var size = document.getElementById('choicesize').children;
    //         for (let i = 0; i < size.length; i++) {
    //             size[i].addEventListener('click', function () {
    //                 var sizeitem = this.parentElement.children;
    //                 for (let i = 0; i < sizeitem.length; i++) {
    //                     sizeitem[i].classList.remove('bg-secondary', 'text-light');
    //                 }
    //                 this.classList.add('bg-secondary', 'text-light');
    //             })
    //         }
    //     }, 100);
    //     $scope.productrelative = $scope.product.filter(pro => pro.id_catalog == $scope.detail.id_catalog && pro.id != $scope.detail.id).slice(0, 3);
    // });
    ;
