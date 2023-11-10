<?php

require_once __DIR__ . "/../Controller/commonController.php"; //COMMON CONTOLLER



class productController extends commonController
{

    public function __construct()
    {
        //init
        require_once __DIR__ . "/../Model/productModel.php";

        $this->validateResults = []; //init for auto validate looping arr in commonController.php

        //Product Model

        $this->productMdl = new products();
    }
    public function getReviews($data){
      return $this->productMdl->getReview($data);
    }
    /**
     * Execute the corresponding action.
     *
     */
    public function run($action){
    //here no no use for action var
        $algo = 'sha256';
      $skey = 9050;
      if(isset($_GET) && count($_GET)){
        $req['key'] = $_GET['key'];
      }else{
        $req['key'] = '723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6';//default
      }
      if(hash_equals(hash_hmac($algo,'moveToAddProduct',$skey),$req['key'])){
        $this->moveToAddProduct();
      }else if(hash_equals(hash_hmac($algo,'moveToEditProduct',$skey),$req['key'])){
        $this->moveToEditProduct();
      }else if(hash_equals(hash_hmac($algo,'addProduct',$skey),$req['key'])){
        echo json_encode($this->productMdl->addProduct());
      }else if(hash_equals(hash_hmac($algo,'editProduct',$skey),$req['key'])){
        echo json_encode($this->productMdl->editProduct());
      }else if(hash_equals(hash_hmac($algo,'addCategory',$skey),$req['key'])){
        echo json_encode($this->productMdl->addCategory());
      }else if(hash_equals(hash_hmac($algo,'viewProduct',$skey),$req['key'])){
        $this->productDetail();
      }else if(hash_equals(hash_hmac($algo,'category',$skey),$req['key'])){
        $this->category();
      }else if(hash_equals(hash_hmac($algo,'removefrommycart',$skey),$req['key'])){
        echo json_encode($this->productMdl->removefrommycart($_GET['cartid']));
      }else if(hash_equals(hash_hmac($algo,'search',$skey),$req['key'])){
        echo json_encode($this->productMdl->search($_GET['search_txt']));
      }else if(hash_equals(hash_hmac($algo,'sendReview',$skey),$req['key'])){
        echo json_encode($this->productMdl->sendReview($_GET));
      }else if(hash_equals(hash_hmac($algo,'checkout',$skey),$req['key'])){
        echo json_encode($this->productMdl->checkout());
      }else if(hash_equals(hash_hmac($algo,'getCateById',$skey),$req['key'])){
        echo json_encode($this->productMdl->getCateById($_GET['cid']));
      }else if(hash_equals(hash_hmac($algo,'editCategory',$skey),$req['key'])){
       echo json_encode($this->productMdl->editCategory());
      }else if(hash_equals(hash_hmac($algo,'getProductDetailById',$skey),$req['key'])){
        echo json_encode($this->productMdl->getProductDetailById($_GET['pid']));
      }else if(hash_equals(hash_hmac($algo,'completedClientOrder',$skey),$req['key'])){
        echo json_encode($this->productMdl->completedClientOrder());
      }else if(hash_equals(hash_hmac($algo,'getProductByRange',$skey),$req['key'])){
        $from = $_GET['from'] + $_GET['to'];
        $to = 2;//get five new product
        echo json_encode($this->productMdl->get_all(['from-range'=>$from,'to-range'=>$to]));
      }else if(hash_equals(hash_hmac($algo,'moreCategory',$skey),$req['key'])){
        $this->view("category/moreCate", array(
          "title" => "All category",
          "data"=>$this->productMdl->get_cate_list()
      ));
      }else if(hash_equals(hash_hmac($algo,'productStatusCpanel',$skey),$req['key'])){
        $this->view("main/productStatusCpanel", array(
          "title" => "Client product contol",
          "data"=>[]
      ));
      }else if(hash_equals(hash_hmac($algo,'moveToAddCate',$skey),$req['key'])){
        $this->view("category/addCate", array(
            "title" => "Create category",
            "data"=>[]//$this->productMdl->get_all()
        ));
      }else if(hash_equals(hash_hmac($algo,'moveToEditCate',$skey),$req['key'])){
        $this->view("category/editCate", array(
            "title" => "Edit category",
            "data"=>$this->productMdl->get_cate_list()
        ));
      }else if(hash_equals(hash_hmac($algo,'moveToAddSlider',$skey),$req['key'])){
        $this->view("main/addSlider", array(
            "title" => "Add slider",
            "data"=>[]//$this->productMdl->get_all()
        ));
      }else if(hash_equals(hash_hmac($algo,'trackMyOrder',$skey),$req['key'])){
        $this->view("track_order/index", array(
            "title" => "Track Orders",
            "data"=>$this->productMdl->getOrderList()
        ));
      }else if(hash_equals(hash_hmac($algo,'openSearch',$skey),$req['key'])){
        $this->view("search/index", array(
            "title" => "Product Search",
            "data"=>$this->productMdl->search($_GET['search_txt'])
        ));
      }else if(hash_equals(hash_hmac($algo,'checkoutfinal',$skey),$req['key'])){
        $this->view("main/checkout", array(
            "title" => "Checkout Product",
            "data"=>$this->productMdl->getCartByIdNDate(date('Y-m-d'))
           //$this->productMdl->checkoutFinal()
        ));
      }else if(hash_equals(hash_hmac($algo,'addSlider',$skey),$req['key'])){
        echo json_encode($this->productMdl->addSlider());
      }else if(hash_equals(hash_hmac($algo,'getOrderDetailById',$skey),$req['key'])){
        if(isset($_GET['order_id'])){
        echo json_encode($this->productMdl->getOrderDetailById($_GET['order_id']));
        }
      }else if(hash_equals(hash_hmac($algo,'productDelivered',$skey),$req['key'])){
        if(isset($_GET['t_id'])){
        echo json_encode($this->productMdl->productDelivered($_GET['t_id']));
        }
      }else{
        $this->index();
      }
    }


    public function index()
    {
        $this->view("index", array(
            "title" => "Home",
            "data"=>$this->productMdl->get_all()
        ));
    }

    public function moveToAddProduct(){
      $this->view("product/addProduct", array(
          "title" => "Add Product",
          "data"=>$this->productMdl->get_cate_list()
      ));
    }

    public function moveToEditProduct(){
      $this->view("product/editProduct", array(
          "title" => "Edit Product",
          "data"=>$this->productMdl->get_cate_list()
      ));
    }

    public function category(){
      $this->view("category/index", array(
          "title" => "Category",
          "data"=>$this->productMdl->getProductByCate($_GET['cate'])
      ));
    }
//    addProduct

    public function productDetail(){
      $products = $this->productMdl->get_product();
      if($products['status']){
        $selected_product['status'] = true;
        $selected_product['message'] = 'Select product fetched successfully';
        $selected_product['myFavExit']=$products['myFavExit'];//$this->productMdl->myfavExist($_GET['pid']);
        $suggest_product['status'] = true;
        $suggest_product['message'] = 'Suggestion product fetched for Selected product';
        $suggest_product['data']=[];//default EMPTY

      }
      $inc1 = 0;
      $inc2 = 0;
      if(count($products['data'])!==0){
        for($i=0;$i<count($products['data']);$i++){
          if($products['data'][$i]['p_id'] == $_GET['pid']){
            $selected_product['data'][$inc1] = $products['data'][$i];
            $inc1++;
          }else{
            $suggest_product['data'][$inc2] = $products['data'][$i];
            $inc2++;
          }
        }
      }
      $this->view("product/detailProduct", array(
          "title" => "Product detail",
          "data"=>$selected_product,
          "suggestion"=>$suggest_product
// SELECT *
// FROM products
// WHERE s_no <> 0 and cate = 'Non-veg'
// ORDER BY RAND()
// LIMIT 10;
      ));
    }

    // ,
    // "suggest_data"=>$this->productMdl->get_suggestion()

}


?>