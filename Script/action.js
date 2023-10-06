// function get_all(x = '723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6') {
//     performAjx('model/EP.php', 'get', 'key=' + x, (res) => {
//         if (typeof(res) !== 'undefined') {
//             loadComponent('nor-card-view', JSON.parse(res));
//         }
//     });
// }

function add_fav(p_id) {
  performAjx('index.php', 'get','key=f0fbe9802db9070478c7bf0a10abf99e0ea9088ea9d9334bd7d4d778f20de42e&controller=home&action=index&p_id=' + p_id, (res) => {
    d = JSON.parse(res);
    if(d.status){
      dis_msg_box('#000','lightgreen',d.message);
    }else{
      dis_msg_box('#000','tomato',d.message);
    }
  });
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
        return "<h3 style='text-align:center;color:tomato'>OUT OF STOCK</h3><br><button  onclick=\"add_fav('" +
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
  $('#common_dis_msg_box').fadeIn(500);
  $('#common_dis_msg_box').css('background-color',bgcolor);
  $('#common_dis_msg_box').css('color',color);
  $('#msg_content_to_display').text(content);
  setTimeout(function(){
  $('#common_dis_msg_box').fadeOut(500);
  },2000);
}

function getFav() {
    $.ajax({
        url: 'EP.php?key=myfav&uid=' + uid,
        type: 'get',
        success: function(e) {
            data = JSON.parse(e);
            if (parseInt(data.status)) {


            }
        }
    });
}
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
  getMyFav();
    $('.myfav').fadeIn(100);
}

function add_fav_tmp_ctrl(x) {
    cls_my_fav();
    add_fav(x);
}


var review = {
"status": true,
"data": [
{
"sno": "38",
"name": "mani",
"location":"chennai",
"profile":"default.jpg",
"rating": "4 stars",
"message":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
"created_at": "2023-09-09 22:04:02"
}
],
"message": "My Fav fetched"
}
var currentId = 0;

if(review.data.length!==0){
  setTimeout(loadNewTesti,1000);
}

function lSlide(){
  if(review.data.length > currentId){
    if(currentId == 0){
      currentId = review.data.length;
    }
    currentId=currentId-1;
  }
    $('.slider-box').css({'opacity':'0'});
//  $('.slider-box').css({'transform':'rotateY(90deg)'});
  setTimeout(loadNewTesti,500);
}
function rSlide(){
  if((review.data.length-1) > currentId){
    currentId+=1;
  }else if((review.data.length-1) == currentId){
    currentId = 0;
  }
  $('.slider-box').css({'opacity':'0','box-shadow':'0px 0px 0px 0px transparent'});
  setTimeout(loadNewTesti,500);
}
function loadNewTesti(){
  $('.slider-box').css({'opacity':'1','box-shadow':'0px 10px 10px 2px rgba(0,0,0,.2)'});
  x = review.data[currentId];
  $('#testi_profile').attr('src','assets/common-images/'+x.profile);
  $('#testi_name').text(x.name+', '+(x.sno));
  $('#testi_city').text(x.location);
  $('#testi_rating').text('Rating : '+x.rating);
  $('#testi_message').text(x.message);
  $('#testi_time').text(x.created_at);
 $('.slider-box').css('transform','rotateY(0deg)');
}


function add_to_cart(pos,p_id) {
  qnt = parseInt($('#quantity_'+pos).text());
  if(qnt == 0){
    dis_msg_box('#000','tomato','Zero quantity, Please increase quantity.');
  }else{
    performAjx('index.php', 'get','key=428b9259d7c24affcd994d23f74adc3090fbb8ae647ee79b703ec7c6356d44a3&controller=home&action=index&qnt='+qnt+'&p_id=' + p_id, (res) => {
      d = JSON.parse(res);
      if(d.status){
        dis_msg_box('#000','lightgreen',d.message);
      }else{
        dis_msg_box('#000','tomato',d.message);
      }
    });
  }
}


var mycart_data;

function dis_my_cart(x) {
    var arg;
    if (x == 'cart_filter') {
        arg = 'key=2327115e33e067c37233fe38f3a68ed9b9e95a7b7c8b6d169358c72703ed9e24&date=' + $('#cart_filter').val();
    } else {
        arg = 'key=2327115e33e067c37233fe38f3a68ed9b9e95a7b7c8b6d169358c72703ed9e24';
    }
    performAjx('index.php', 'get',arg, (res) => {
      d = JSON.parse(res)
      if(d.status){
        mycartComponent(JSON.parse(res));
      }
    });
}

function cls_my_cart() {
    $('.mycart').fadeOut(100);
}




function removefrommycart(x) {
    performAjx('index.php', 'get','key=4a107946f7b882778ffc1aff5ab8b7bcf8eed223f32cb23ee2a78379f01663f1&cartid='+x, (res) => {
      d = JSON.parse(res)
      if(d.status){
        dis_msg_box('#000','lightgreen',d.message);
      }else{
        dis_msg_box('#000','tomato',d.message);
      }
    });
}

function validate(){
	if($('#cate_name').val().trim()==''){
		return [false,'warning','Category field required !'];
	}else if($('#file').val().trim()==''){
		return [false,'warning','Please select image !'];
	}else if($('#p_name').val().trim()==''){
		return [false,'warning','Product name field required !'];
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
  flag = validate();
  if(flag[0]){
    performAjx('index.php', 'get',$('#frm').serialize()+'&controller=product', (res) => {
      d = JSON.parse(res)
      if(d.status){
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
