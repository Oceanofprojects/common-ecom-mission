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

function check_stock(x, stock, off_price, unit, p_name, p_id, uid) {
    if (stock <= 0) {
        return "<h3 style='text-align:center;color:tomato'>OUT OF STOCK</h3><br><button  onclick=\"add_fav('" +
            p_id + "','" + uid + "')\" class=\"fa fa-heart btn-active \">&nbsp;&nbsp;Add to fav</button>";
    } else {
        return '<div style=\"padding-top:5px;border-top:.2px solid rgba(0,0,0,.1);display:flex;justify-content:space-between;align-items: center;\"><div class="quantity-control"><h2>' +
            unit + '</h2><span class="fa fa-minus" onclick="decr_quantity(' + (x + 1) + ',' + stock + ',' +
            off_price + ')"></span><small id="quantity_' + (x + 1) +
            '">0</small><span class="fa fa-plus" onclick="incr_quantity(' + (x + 1) + ',' + stock + ',' +
            off_price +
            ')"></span></div><span class=\"fa fa-long-arrow-right\"></span><div><span id=\"dis-cart-price-' + (x +
                1) + '\">0</span><sup>rs</sup></div></div><button id=\"id-ty-' + (x + 1) +
            '\" onclick=\"add_to_cart(' + (i + 1) + ',\'' + p_id + '\',\'' + off_price + '\',\'' + p_name +
            '\')\" class=\"fa fa-shopping-cart btn-active id-ty-' + (x + 1) + '\">&nbsp;&nbsp;Add to cart</button>';
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
