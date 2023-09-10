function loadComponent(type, data) {
    if (type == 'nor-card-view') {
      $('.item-container').empty();
      uid =1234;
      for (i = 0; i < data.data.length; i++) {
          off_price = calc_offer(data.data[i].price, data.data[i].offer);
          $('.item-container').append('<div class=\"box\" onclick="window.open(\'index.php?controller=product&action=productDetail&pid='+data.data[i].p_id+'\')"><h6 class=\"' + gen_fav_ind(data
                  .data[i].favExistCid) + '\" onclick=\"add_fav(\'' + data.data[i].p_id +
              '\')\"></h6><div class=\"img-src\" style=\"background:ur(assets/product_images/' +
              data.data[i].p_img +
              ');background-size:cover;background-position:center;border-radius:5px\"></div><br><h3 style="color:#555a" align="center">' +
              data.data[i].p_name +
              '</h3><p><span style=\"color:#555;text-decoration:line-through;text-decoration-color:red;\">' +
              data.data[i].price + 'rs</span><sup>' + data.data[i].offer +
              '%</sup>&nbsp;&nbsp;<span>' + off_price +
              'rs&nbsp;<small  style=\"color:lime;font-size: 8pt;\" class=\"fa fa-check-circle-o\"></small></span></p>' +
              check_stock(i, data.data[i].stock, off_price, data.data[i].unit, data.data[
                  i].p_name, data.data[i].p_id, uid) + '</div>');
      }
//        layout = '<div class="box"><div style = "display:flex;justify-content:space-between;align-items:center"><h6 class="fa fa-share-alt" style="color:#555"onclick="add_fav(\'3QC469\',\'1234\')"></h6><h6 class="fa fa-heart-o" onclick="add_fav(\'3QC469\',\'1234\')"></h6></div><div class = "img-src" style = "background:lime;background-size:cover;background-position:center;border-radius:5px"></div><br> <h3 style="color:#555a" align="center">Brinjal</h3><p><span style = "color:#555;text.-decoration:line-through;text-decoration-color:red;">40rs</span> <sup>0%</sup>&nbsp;&nbsp;<span>40rs& nbsp;<small style="color:lime;font-size:8pt;" class="fa fa-check-circle-o"></small></span></p>'+quantityControlComponent()+'<button id = "id-ty-2" onclick = "add_to_cart(2,\'3QC469\',\'40\',\'Brinjal\')" class="fa fa-shopping-cart btn-active id-ty-2">&nbsp;&nbsp;Add to cart</button></div> ';
  //      $('.item-container').append(layout);
    }
    //    alert(x + ' : ' + x1)
}

function quantityControlComponent() {
    v = '<div style="padding-top:5px;border-top:.2px solid rgba(0,0,0,.1);display:flex;justify-content:space-between;align-items: center;"><div class="quantity-control"><h2>KG</h2><span class="fa fa-minus" onclick="decr_quantity(2,20,40)"></span><small id="quantity_2">0</small><span class="fa fa-plus" onclick="incr_quantity(2,20,40)"></span></div><span class="fa fa-long-arrow-right"></span><div><span id="dis-cart-price-2">0</span><sup>rs</sup></div></div>';
    return v;
}


function myfavComponent(data){
  $('.myfav').fadeIn(100);
  $('#myfavtbl').empty();
  $('#myfavtbl').append(
      "<tr><th>sno</th><th>Product ID</th><th>Added On</th><th>Option</th>");
  for (ci = 0; ci < data.data.length; ci++) {
      $('#myfavtbl').append("<tr><td>" + (ci + 1) +
          "</td><td><a href='view_product.php?pid=" + data.data[ci].p_id + "'>" + data
          .data[ci].p_id + "</a></td><td>" + data.data[ci].created_at +
          "</td><td><button class=\"btn fa fa-trash\" onclick=\"add_fav_tmp_ctrl('" + data.data[
              ci].p_id + "')\"></button></td></tr>");
  }
}
