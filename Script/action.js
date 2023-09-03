function get_all(x = '723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6') {
    performAjx('model/EP.php', 'get', 'key=' + x, (res) => {
        if (typeof(res) !== 'undefined') {
            loadComponent('nor-card-view', JSON.parse(res));
        }
    });
}

function add_fav(p_id, c_id) {
  performAjx('model/EP.php', 'get','key=f0fbe9802db9070478c7bf0a10abf99e0ea9088ea9d9334bd7d4d778f20de42e&c_id=' + c_id + '&p_id=' + p_id, (res) => {
    console.log(res)
  });
    if (c_id.trim().length !== 0) {
        // $.ajax({
        //     url: 'EP.php?key=addToFav&c_id=' + c_id + '&p_id=' + p_id,
        //     type: 'get',
        //     success: function(add_fav_res) {
        //         data = JSON.parse(add_fav_res);
        //         if (parseInt(data.status)) {
        //             if (parseInt(data.flag)) {
        //                 get_all(search);
        //             }
        //         } else {
        //             alert(data.data)
        //         }
        //     }
        // });

    } else {
        alert('Please login to save product !');
    }
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
