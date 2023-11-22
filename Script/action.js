$(document).ready(function(){
  setInterval(loadDis,2000);
});
function loadDis(){
$('.loader').hide();
}

function add_fav(ele,p_id) {
  performAjx('index.php', 'get','key=f0fbe9802db9070478c7bf0a10abf99e0ea9088ea9d9334bd7d4d778f20de42e&controller=home&action=index&p_id=' + p_id, (res) => {
    d = JSON.parse(res);
    if(d.status){
      if(d.favStatus == 'added'){
        $('#'+ele).attr('class','fa fa-heart');
      }else{
        $('#'+ele).attr('class','fa fa-heart-o');
      }
      dis_msg_box('#000','lightgreen',d.message);
    }else{
      dis_msg_box('#000','tomato',d.message);
    }
  });
}
function remove_fav(ele,p_id){
    performAjx('index.php', 'get','key=f0fbe9802db9070478c7bf0a10abf99e0ea9088ea9d9334bd7d4d778f20de42e&controller=home&action=index&p_id=' + p_id, (res) => {
      d = JSON.parse(res);
      if(d.status){
        dis_my_fav();
        dis_msg_box('#000','lightgreen',d.message);
      }else{
        dis_msg_box('#000','tomato',d.message);
      }
    });
}

function signup(){
  performAjx('../../index.php', 'get','key=a2abe3fa78380c0d025613301912c523df07b99824536a8e087736d1ff6f7ab6&controller=customer&'+$('#frm').serialize(), (res) => {
    d = JSON.parse(res);
    if(d.status){
      $('#dis_err').text('');
      $('#frm')[0].reset();
      window.open('index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6','_self');
    }else{
      $('#dis_err').text(d.msg).css('color','tomato');
    }
  });
}

function updtSetting(){
 performAjx('index.php', 'get','key=f7fb420f385803c64b9356fa8776522ab8d882855a31927a7a6465c68499b58f&controller=customer&'+$('#frm').serialize(), (res) => {
    d = JSON.parse(res);
    if(d.status){
      $('#dis_err').text('');
      alert(d.msg);
      window.open('index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6','_self');
    }else{
      $('#dis_err').text(d.msg).css('color','tomato');
    }
  });
}
function login(){
  if($('#cus_idnty').val().trim().length == 0){
    $('#dis_err').text('Please enter Name or Mobile or Email or CID').css('color','tomato');
  }else if($('#pwd').val().trim().length == 0){
    $('#dis_err').text('Please enter your password').css('color','tomato');
  }else{
    performAjx('../../index.php', 'get','key=3d95f6ccf7e91c1cd9ef2e1533131466c515c5d559419556a2a439e7110d7716&controller=customer&'+$('#frm').serialize(), (res) => {
      d = JSON.parse(res);
      if(d.status){
        $('#dis_err').text('');
        $('#frm')[0].reset();
      window.open('../../index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6','_self');
      }else{
        $('#dis_err').text(d.msg).css('color','tomato');
      }
    });
  }
}

function loadMoreProduct(data){
  // $('#loadMoreProduct').html('View More <span class="fa fa-angle-double-down"></span>');
  $('#loadMoreProduct').html('Fetching... <span class="fa fa-clock-o"></span>');
  performAjx('index.php', 'get',data, (res) => {
    d = JSON.parse(res);
    if(d.status){
      $('#loadMoreProduct').attr({'onclick':"loadMoreProduct('key=5b9a4ec28c6ebd73521c41b554fc3f5ec02d546cb0d381ac83e3140f044f43a4&controller=product&from="+(d.range[0])+"&to="+(d.range[1])+"')"});
      loadComponent('nor-card-view',d);
  $('#loadMoreProduct').html('View More <span class="fa fa-angle-double-down"></span>');
    }else{
      $('#dis_err').text(d.msg).css('color','tomato');
    }
  });
}

function rating(x){
  for(i=1;i<=5;i++){
      $('#star'+i).removeClass();
      $('#star'+i).attr('class','fa fa-star-o');
      $('#star'+i).css('color','#555a');
  }

  for(i=1;i<=x;i++){
      $('#star'+i).removeClass();
      $('#star'+i).attr('class','fa fa-star');
      $('#star'+i).css('color','goldenrod');
  }
  $('#rating').val(x);
}

function sendReview(){
  if($('#review_msg').val().trim().length == 0){
    dis_msg_box('#000','tomato','Please enter review message');
  }else{
    performAjx('index.php', 'get','key=da77e8367e2b26bc9b2f928ca3b0b9f2db7cdb3bd28c565fe3741065238bb331&controller=product&'+$('#reviewFrm').serialize(), (res) => {
      d = JSON.parse(res);
      if(d.status){
        for(i=1;i<=5;i++){
          $('#star'+i).removeClass();
          $('#star'+i).attr('class','fa fa-star-o');
          $('#star'+i).css('color','#555a');
      }
        $('#reviewFrm')[0].reset();
        dis_msg_box('#000','lightgreen',d.message);
      }else{
        dis_msg_box('#000','tomato',d.message);
      }
    });
  }
}




function calc_offer(price, offer) {
    offer_price = price * offer / 100;
    return price - offer_price;
}

function gen_fav_ind(x) {
    return (x == '' || x == null) ? 'fa fa-heart-o' : 'fa fa-heart';
}

function check_stock(x, stock, off_price, unit, p_name, p_id) {
    if (stock <= 0) {
        return "<h3 style='text-align:center;color:tomato'>OUT OF STOCK</h3><br><button  onclick=\"add_fav('myfav"+x+"','" +
            p_id + "')\" class=\"fa fa-heart btn-active \">&nbsp;&nbsp;Add to fav</button>";
    } else {
        return '<div style=\"padding-top:5px;border-top:.2px solid rgba(0,0,0,.1);display:flex;justify-content:space-between;align-items: center;\"><div class="quantity-control"><h2>' +
            unit + '</h2><span class="fa fa-minus" onclick="decr_quantity(' + (x + 1) + ',' + stock + ',' +
            off_price + ')"></span><small id="quantity_' + (x + 1) +
            '">0</small><span class="fa fa-plus" onclick="incr_quantity(' + (x + 1) + ',' + stock + ',' +
            off_price +
            ')"></span></div><span class=\"fa fa-long-arrow-right\"></span><div><span id=\"dis-cart-price-' + (x +
                1) + '\">0</span><sup>rs</sup></div></div><button id=\"id-ty-' + (x + 1) +
            '\" onclick=\"add_to_cart('+(x + 1)+',\'' + p_id + '\')\" class=\"fa fa-shopping-cart btn-active id-ty-' + (x + 1) + '\">&nbsp;&nbsp;Add to cart</button>';
    }
}

function incr_quantity(pos, stock, o_price) {
    $('.id-ty-' + pos).removeClass();
    $('#id-ty-' + pos).attr('class', 'fa fa-shopping-cart btn-active').text('  Add to cart');
    i_cur_quantity_str = $('#quantity_' + pos).text();
    i_cur_quantity_int = parseInt(i_cur_quantity_str);
    if (i_cur_quantity_int >= stock) {
      //DO ngth
    } else {
        i_tmp = i_cur_quantity_int + 1;
        $('#quantity_' + pos).text(check_price_digit(i_tmp));
        $('#dis-cart-price-' + pos).text(check_price_digit(i_tmp * o_price));

    }
}

function decr_quantity(pos, stock, o_price) {
    $('.id-ty-' + pos).removeClass();
    $('#id-ty-' + pos).attr('class', 'fa fa-shopping-cart btn-active').text('  Add to cart');
    d_cur_quantity_str = $('#quantity_' + pos).text();
    d_cur_quantity_int = parseInt(d_cur_quantity_str);

    if (d_cur_quantity_int <= 1) {
        $('#quantity_' + pos).text(check_price_digit(1));
        $('#dis-cart-price-' + pos).text(d_cur_quantity_int * o_price)
    } else {
        d_tmp = d_cur_quantity_int - 1;
        $('#quantity_' + pos).text(check_price_digit(d_tmp));
        $('#dis-cart-price-' + pos).text(check_price_digit(d_tmp * o_price))
    }

}

function check_price_digit(x) {
    if (typeof x == 'number' && Number.isInteger(x)) {
        if (x < 10) {
            return '0' + x;
        } else {
            return x
        }
    } else {
        if (x < 10) {
            return '0' + x;
        } else {
            return x.toFixed(2);
        }
    }
}

function dis_msg_box(color,bgcolor,content){
  $('#common_dis_msg_box').slideDown(100);
  $('#common_dis_msg_box').css('background-color',bgcolor);
  $('#common_dis_msg_box').css('color',color);
  $('#msg_content_to_display').text(content);
  setTimeout(function(){
  $('#common_dis_msg_box').slideUp(3000);
  },2000);
}

// function getFav() {
//     $.ajax({
//         url: 'EP.php?key=myfav&uid=' + uid,
//         type: 'get',
//         success: function(e) {
//             data = JSON.parse(e);
//             if (parseInt(data.status)) {
//
//
//             }
//         }
//     });
// }
function getMyFav(){
  performAjx('index.php', 'get','key=94f224e95c2fe21dfe0085d5665bc248d55a0c1be7dc574729ebaa12d97b4ed3&controller=home&action=index', (res) => {
    myfavComponent(JSON.parse(res))
  });
}
//94f224e95c2fe21dfe0085d5665bc248d55a0c1be7dc574729ebaa12d97b4ed3
function cls_my_fav() {
    $('.myfav').fadeOut(100);
}

function dis_my_fav() {
  $('#myfavtbl').empty();
  $('#myfavtbl').append(
    "<tr><th>sno</th><th>Product ID</th><th>Added On</th><th>Option</th></tr><tr><th colspan='4' align='center'><br>Fetching FAV ....</th></tr>");
    $('.myfav').fadeIn(100);
  getMyFav();
}

function add_fav_tmp_ctrl(x) {
    cls_my_fav();
    add_fav(x);
}

function dis_search_result(){
  $('.dis_search_result').show();
}

function cls_search_result(){
  $('.dis_search_result').hide();
}



function add_to_cart(pos,p_id) {
  qnt = parseInt($('#quantity_'+pos).text());
  if(qnt == 0){
    dis_msg_box('#000','tomato','Zero quantity, Please increase quantity.');
  }else{
    performAjx('index.php', 'get','key=428b9259d7c24affcd994d23f74adc3090fbb8ae647ee79b703ec7c6356d44a3&controller=home&action=index&qnt='+qnt+'&p_id=' + p_id, (res) => {
      d = JSON.parse(res);
      if(d.status){
        $('.cartIndi').text((d.cartnum < 10)?'0'+d.cartnum:d.cartnum).css('background','red');
        $('#id-ty-'+pos).text(' Item added');
        $('#id-ty-'+pos).removeClass();
        $('#id-ty-'+pos).attr('class','fa fa-shopping-cart btn-de-active');
        dis_msg_box('#000','lightgreen',d.message);
      }else{
        dis_msg_box('#000','tomato',d.message);
      }
    });
  }
}


var mycart_data;

function dis_my_cart(x) {
  $('.mycart').fadeIn(100);
  $('#mycarttbl').empty();
  $('#mycarttbl').append(
      "<tr><th>Item</th><th>price</th><th>offer</th><th>off price</th><th>quantity</th><th>total</th><th>Option</tr><tr><th colspan='7'><br>Fetching Cart list ...</th></tr>"
  );
    var arg;
    if (x == 'cart_date_filter') {
        arg = 'key=2327115e33e067c37233fe38f3a68ed9b9e95a7b7c8b6d169358c72703ed9e24&date=' + $('#cart_filter').val();
    }else if (x == 'cart_type_filter') {
      arg = 'key=2327115e33e067c37233fe38f3a68ed9b9e95a7b7c8b6d169358c72703ed9e24&type='+$('#cart_type').val()+'&date='+$('#cart_filter').val();
    } else {
        arg = 'key=2327115e33e067c37233fe38f3a68ed9b9e95a7b7c8b6d169358c72703ed9e24';
    }
    performAjx('index.php', 'get',arg, (res) => {
      d = JSON.parse(res);
        mycartComponent(d);
    });
}

function cls_my_cart() {
    $('.mycart').fadeOut(100);
}




function removefrommycart(x,rowID) {
    performAjx('index.php', 'get','controller=product&key=4a107946f7b882778ffc1aff5ab8b7bcf8eed223f32cb23ee2a78379f01663f1&cartid='+x, (res) => {
      d = JSON.parse(res)
      if(d.status){
        dis_my_cart(x);//load cart again
        $('.cartIndi').text((d.cartnum < 10)?'0'+d.cartnum:d.cartnum).css('background','red');
        dis_msg_box('#000','lightgreen',d.message);
      }else{
        dis_msg_box('#000','tomato',d.message);
      }
    });
}

function validate(flow){
	if($('#cate_name').val().trim()==''){
		return [false,'warning','Category field required !'];
	}else if(document.getElementById('file1').value.trim()=='' && flow=='add'){
		return [false,'warning','Please select image !'];
	}else if($('#p_name').val().trim()==''){
		return [false,'warning','Product name field required !'];
	}else if($('#desc').val().trim()==''){
		return [false,'warning','Product description field required !'];
	}else if($('#price').val().trim()==''){
		return [false,'warning','Price field required !'];
	}else if($('#unit').val().trim()==''){
		return [false,'warning','Unit field required !'];
	}else if($('#stock').val().trim()==''){
		return [false,'warning','Stock field required !'];
	}else if($('#tags').val().trim()==''){
		return [false,'warning','Tags field required !'];
	}else{
		return [true,'success',''];
	}
}


function add_item(){
  flag = validate('add');
  if(flag[0]){
    performAjxForFiles('index.php','#frm','?controller=product&key=5265dbb8b63da8f3da8c145702deae1954a7224a585014f0bbc3086a6e499ef6', (res) => {
      d = JSON.parse(res)
      if(d.status){
        $('#frm')[0].reset();
        dis_msg_box('#000','lightgreen',d.message);
      }else{
        dis_msg_box('#000','tomato',d.message);
      }
    });
  }else{
    bg = (flag[1] == 'warning')?'tomato':'lightgreen';
    dis_msg_box('#000',bg,flag[2]);
  }
}



function edit_item(){
  flag = validate('');
  if(flag[0]){
    performAjxForFiles('index.php','#frm','?controller=product&key=9020315212f791b04b1efbefb974826daee09ace2b3e4f4b451ec13842d0ec76', (res) => {
      d = JSON.parse(res)
      if(d.status){
        $('#frm')[0].reset();
        dis_msg_box('#000','lightgreen',d.message);
      }else{
        dis_msg_box('#000','tomato',d.message);
      }
    });
  }else{
    bg = (flag[1] == 'warning')?'tomato':'lightgreen';
    dis_msg_box('#000',bg,flag[2]);
  }
}

var menutmp=0;
function op_search(){
  
  if(menutmp%2==0){
  coursep_menu();
  $('#search_product').focus();
  $('.search_layer').css('top','0px');
  }else{
  coursep_menu();
  $('.search_layer').css('top','-100%');
  }
  menutmp++;
}
function coursep_menu(){
  $('.menu').toggle(100);
}


function logout(){
  performAjx('index.php', 'get','controller=customer&key=db9f28956ed0d7d1c9004b39d056ca9d3e512125b3eb196070f1f9526318e9a1', (res) => {
    d = JSON.parse(res)
    if(d.status){
      dis_msg_box('#000','lightgreen',d.message);
    }else{
      dis_msg_box('#000','tomato',d.message);
    }
  });
}

function checkout(){
  performAjx('index.php', 'get','controller=product&key=c2d97bc89eeb6ca8b1f370a7d3d3f0c990626a58815536a103e0068a4207cbcf', (res) => {
    d = JSON.parse(res)

    if(d.status){
      cls_my_cart();
      window.open('index.php?key=a773cdf359b5e5059a18b9c4d994502d457261015c98d6c22575997dfc8fc544&controller=product','_self');
      dis_msg_box('#000','lightgreen',d.message);
    }else{
      dis_msg_box('#000','tomato',d.message);
    }
  });
}

function searchProduct(flow,eleId) {
  if($('#'+eleId).val().trim().length==0){
    alert('Search required');
  }else{

    if(flow == 'detailProduct'){
      //pre init
      op_search();
      window.open('index.php?controller=product&key=736e0d2b6f380a950a9456b6a33c6cc56d246e025599ac354a12245ad2f28da4&search_txt='+$('#'+eleId).val().trim(),'_SELF');
      return;
    }
      $('#result_res_msg,#result_res_indi').text('');
      $('#result_list').empty();
      $('#result_res_indi').text('Please wait....');
      dis_search_result();//open search result
      txt=$('#'+eleId).val().trim();
        performAjx('index.php', 'get','controller=product&key=8fac78974f959202bd400f5a04f1df06c8bdafc2282ce53ee5b08ee953c07619&search_txt='+txt, (res) => {
        d = JSON.parse(res);
        if(d.status){
        $('#result_res_indi').html('Search results ('+d.data.length+')');
        $('#result_res_msg').text('');
            for(i=0;i<d.data.length;i++){
              if(flow == 'editProduct'){
                $('#result_list').append('<li onclick="search_purpose(\'editProduct\',\''+d.data[i].p_id+'\')">'+d.data[i].p_name+', '+((d.data[i].price == 0)?'Out of stock':'In stock('+d.data[i].stock+')')+'</li>');
              }
              // else if(flow == 'detailProduct'){
              //   $('#search_product').val('');
              //   $('#result_list').append('<li onclick="search_purpose(\'detailProduct\',\''+d.data[i].p_id+'\')">'+d.data[i].p_name+', '+((d.data[i].price == 0)?'Out of stock':'In stock('+d.data[i].stock+')')+'</li>');
              // }
          }
        }else{
        $('#result_res_msg').text(d.message);
        $('#result_res_indi').text('Search results ('+d.data.length+')');
        }
        });

  }

}

function search_purpose(flow,id){
  switch(flow){
    case 'editProduct':
      performAjx('index.php', 'get','controller=product&key=febbef3e3b764304dc863d3b1bffc7cccfef3d44d873760d8a2b42a4151420a8&pid='+id, (res) => {
        d = JSON.parse(res);
        if(d.status){
          if(d.data.length !==0){
            fillEditForm(d.data[0]);
          }else{
            alert('Selected product empty')
          }
        }else{
          alert(d.message)
        }
      });
      break;
    case 'detailProduct':
      window.location.href='index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid='+id;
      break;
      //index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid=
  }

}

function fillEditForm(data){
  $('#search_txt').val('');
  cls_search_result();//close search result
  $('#cate_name option[id="'+data.cate+'"]').attr('selected',true);
  $('#disOldImgLink').show();
  $('#disOldUrl').attr('href','assets/product_images/'+data.p_img);
  $('#p_id').val(data.p_id);
  $('#p_img').val(data.p_img);
  $('#p_name').val(data.p_name);
  $('#desc').val(data.p_desc);
  $('#price').val(data.price);
  $('#price').val(data.price);
  $('#unit').val(data.unit);
  $('#stock').val(data.stock);
  $('#tags').val(data.tags);
}



function chFileBg(id) {
    val = document.getElementById('file' + id);
    if (val.value.trim().length !== 0) {
        $('#fileInd' + id).attr('class', 'fa fa-check');
    } else {
        $('#fileInd' + id).removeClass();
    }
}
