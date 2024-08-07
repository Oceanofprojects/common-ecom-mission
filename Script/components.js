function loadComponent(type, data, arr = []) {
  if (type == 'nor-card-view') {
    console.log(data)
    for (i = 0; i < data.data.length; i++) {
      off_price = calc_offer(data.data[i].price, data.data[i].offer);
      favRnd = Math.floor(Math.random() * 99999);
      boxIdtyRnd = Math.floor(Math.random() * 9999999);
      $('.item-container').append('<div class=\"box\"><h6 class=\"' + gen_fav_ind(data
        .data[i].favExistCid) + '\" id=\"myfav' + favRnd + '\" onclick=\"add_fav(\'myfav' + favRnd + '\',\'' + data.data[i].p_id +
        '\')\"></h6><div  onclick="window.open(\'index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid=' + data.data[i].p_id + '\')" class=\"img-src\" style=\"background:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1)),url(assets/product_images/' +
        data.data[i].p_img +
        ');background-size:cover;background-position:center;border-radius:5px;\"></div><br><h3 style="color:#555a" align="center">' +
        data.data[i].p_name +
        '</h3>' + isOff(data.data[i].price, data.data[i].offer, off_price) + '' +
        check_stock(boxIdtyRnd, data.data[i].stock, off_price, data.data[i].unit, data.data[
          i].p_name, data.data[i].p_id, data.data[i].default_cart) + '</div>');
    }

  } else if (type == 'layer-wt-nor-card-view') {
    heading = arr[0];//heading
    cateSetsRnd = Math.floor(Math.random() * 9999999);
    $('.cateSetProductsLoaderLayer').append('<br><br><div class="head-info"><h1 style="text-transform: capitalize;">' + heading + '</h1><p>Best Quality</p></div><br>');
    $('.cateSetProductsLoaderLayer').append('<div class="cateSetProductsLoaderLayerBox cateSetProductsLoader' + cateSetsRnd + '"></div>');
    for (i = 0; i < data.data.length; i++) {
      nxtVal = i;//get val after for loop
      off_price = calc_offer(data.data[i].price, data.data[i].offer);
      favRnd = Math.floor(Math.random() * 99999);
      boxIdtyRnd = Math.floor(Math.random() * 9999999);
      $(".cateSetProductsLoader" + cateSetsRnd).append('<div class=\"box\"><h6 class=\"' + gen_fav_ind(data
        .data[i].favExistCid) + '\" id=\"myfav' + favRnd + '\" onclick=\"add_fav(\'myfav' + favRnd + '\',\'' + data.data[i].p_id +
        '\')\"></h6><div class=\"img-src\" onclick="window.open(\'index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid=' + data.data[i].p_id + '\')" style=\"background:url(assets/product_images/' +
        data.data[i].p_img +
        ');background-size:cover;background-position:center;border-radius:5px\"></div><br><h3 style="color:#555a" align="center">' +
        data.data[i].p_name +
        '</h3>' + isOff(data.data[i].price, data.data[i].offer, off_price) + '' +
        check_stock(boxIdtyRnd, data.data[i].stock, off_price, data.data[i].unit, data.data[
          i].p_name, data.data[i].p_id, data.data[i].default_cart) + '</div>');
    }
    $('.cateSetProductsLoaderLayer').append('<br><br><center><a style="background:lightgreen;color:#000;text-decoration:none;padding:5px;border-radius:3px;" href="index.php?cate_id=' + data.data[nxtVal].cate_id + '&controller=product&action=index&key=ad2b90dede1c27608c507b022e625e0438288dd764529ec92be67f1f531aa6b7">Load More</a></center>');


  } else if (type == 'category-card-view') {
    if (arr[0] == 'all') {
      itr = data.length;
    } else {
      itr = (data.length > arr[0]) ? arr[0] : data.length;
    }
    $('.cate-container').empty();
    for (i = 0; i < itr; i++) {
      $('.cate-container').append('<a href="index.php?cate_id=' + data[i].cate_id + '&controller=product&action=index&key=ad2b90dede1c27608c507b022e625e0438288dd764529ec92be67f1f531aa6b7"><center><div class="cate-box" style="background:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2)),url(\'assets/category_images/' + data[i].cate_img + '\');background-size:cover;background-position:center"><span>' + ((data[i].starting_price != null) ? 'Starts @ ' + data[i].starting_price : 'View Products') + '</span></div><br><h2 align="center" style="color:#123">' + data[i].cate + '</h2></center></a>');
    }
  } else if (type == 'suggestion-card-view') {
    $('#mini-slider').empty();
    for (i = 0; i < data.data.length; i++) {
      $('#mini-slider').append('<div class="mini-slider-slide-box"><div class="mini-slider-img-dis"  style="background: url(\'assets/product_images/' + data.data[i].p_img + '\');background-position: center;background-size: cover;"></div><h1 style="padding:10px 0px;font-size:13pt;">' + data.data[i].p_name + '</h1>' + getSuggestPrice(data.data[i].price, data.data[i].offer) + '<a href="index.php?pid=' + data.data[i].p_id + '&controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4" style="padding:5px 10px;border-radius:3px;background:cornflowerblue;color:#ddd;text-decoration:none;font-size:9pt;">Order now&nbsp;&nbsp;<span class="fa fa-shopping-cart"></span></a></div>');
    }

  }
}//load components END

function getSuggestPrice(price, offer) {
  if (offer > 0) {
    return '<div class="mini-slider-content"><h5 style="color:#555a;text-decoration:line-through;text-decoration-color:red">' + price + 'rs</h5><h6>' + offer + '%</h6><h3>' + calc_offer(price, offer) + 'rs</h3></div>';
  } else {
    return '<div class="mini-slider-content"><h3>' + price + 'rs</h3></div>';
  }
}

function isOff(price, offer, off_price) {
  if (offer == 0) {
    return '<p><span>' + off_price +
      'rs&nbsp;<small  style=\"color:lime;font-size: 8pt;\" class=\"fa fa-check-circle-o\"></small></span></p>';
  } else {
    return '<p><span style=\"color:#555;text-decoration:line-through;text-decoration-color:red;\">' +
      price + 'rs</span><sup>' + offer +
      '%</sup>&nbsp;&nbsp;<span>' + off_price +
      'rs&nbsp;<small  style=\"color:lime;font-size: 8pt;\" class=\"fa fa-check-circle-o\"></small></span></p>';
  }

}

function myfavComponent(data) {
  //  $('.myfav').fadeIn(100);
  $('#myfavtbl').empty();
  $('#myfavtbl').append(
    "<tr><th>sno</th><th>Product ID</th><th>Added On</th><th>Option</th>");
  if (data.data.length !== 0) {
    for (ci = 0; ci < data.data.length; ci++) {
      $('#myfavtbl').append("<tr><td>" + (ci + 1) +
        "</td><td><a href='index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&action=productDetail&pid=" + data.data[ci].p_id + "'>" + data
          .data[ci].p_id + "</a></td><td>" + data.data[ci].created_at +
        "</td><td><button class=\"btn fa fa-trash\" onclick=\"remove_fav('','" + data.data[
          ci].p_id + "');\"></button></td></tr>");
    }
  } else {
    $('#myfavtbl').append("<tr><th colspan='4' align='center'><br>Fav list empty ....</th></tr>");
  }
}

function mycartComponent(data) {
  total_price = 0;
  off_total_price = 0;

  if (data.status) {
    $('#mycarttbl').empty();
    $('#mycarttbl').append(
      "<tr><th></th><th>Item</th><th>Price</th><th>offer</th><th>Off Price</th><th>Qnty</th><th>total</th><th>Option</th></tr>"
    );
    if (data.data.length == 0) {
      $('#mycarttbl').append("<tr><td colspan='8' style='text-align:center'><span class='fa fa-chain-broken'></span>&nbsp;&nbsp;Empty cart !</td></tr>");
    } else {
      for (ci = 0; ci < data.data.length; ci++) {
        off_price = calc_offer(data.data[ci].price, data.data[ci].offer);
        total_price += data.data[ci].price * data.data[ci].quantity;
        off_total_price += off_price * data.data[ci].quantity;
        $('#mycarttbl').append("<tr id='cartDataRow" + ci + "'><td><a href='index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid=" + data.data[ci].p_id + "'><img  class='cart_img_holder' src='assets/product_images/" + data.data[
          ci].p_img + "' alt='" + data.data[ci].p_name + "'></a></td><td>" + data.data[
            ci].p_name + "" + get_stock_state(data.data[ci].stock_state) + "</td><td>" + data.data[ci].price + "rs</td><td>" + data.data[ci].offer + "%</td><td>" + off_price + "rs</td><td>" + data
              .data[ci].quantity + " (" + data.data[ci].unit + ")</td><td>" + (off_price * data.data[ci].quantity) +
          "rs</td><td><button class='btn fa fa-external-link' onclick='window.open(\"index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid=" + data.data[ci].p_id + "&editable=" + (Math.floor(Math.random() * 1000)) + "\")'></button><button class='btn fa fa-trash' onclick='removefrommycart(" +
          data.data[ci].cart_id + "," + ci + ")'></button></td></tr>");
      }
    }

    $('#mycarttbl').append("<tr><td colspan='8'><h3 align='center'>Total Price " + total_price + "rs</h3></td></tr><tr><td colspan='8'><h3 align='center'>( % ) Saving " + (total_price - off_total_price) + "rs</h3></td></tr><tr><td colspan='8'><h1 align='center'>Total Cost <b>" + off_total_price + "rs</b></h1></td></tr><tr><td colspan='8' style='text-align:center'><button style='background:cornflowerblue;' id='checkout' class='btn fa fa-check-circle' onclick='checkout()'>&nbsp;Check out</button></td></tr>");
  } else {
    $('.mycart').fadeIn(100);
    $('#mycarttbl').empty();
    $('#mycarttbl').append(
      "<tr><th></th><th>Item</th><th>price</th><th>offer</th><th>off price</th><th>quantity</th><th>total</th><th>Option</th></tr>"
    );
    $('#mycarttbl').append("<tr><td colspan='8' style='text-align:center'><span class='fa fa-chain-broken'></span>&nbsp;&nbsp;Empty cart !</td></tr>");
  }
}


function get_stock_state(stock_state = 0) {
  if (stock_state.length > 0) {
    return ' (<span style="color:red">' + stock_state + '</span>)';
  }
  return '';
}