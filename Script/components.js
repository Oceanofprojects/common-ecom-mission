function loadComponent(type, data) {
    if (type == 'nor-card-view') {
      $('.item-container').empty();
      for (i = 0; i < data.data.length; i++) {
          off_price = calc_offer(data.data[i].price, data.data[i].offer);
          $('.item-container').append('<div class=\"box\"><h6 class=\"' + gen_fav_ind(data
                  .data[i].favExistCid) + '\" id=\"myfav'+i+'\" onclick=\"add_fav(\'myfav'+i+'\',\'' + data.data[i].p_id +
              '\')\"></h6><div class=\"img-src\" style=\"image-rendering: pixelated;background:url(assets/product_images/' +
              data.data[i].p_img +
              ');background-size:cover;background-position:center;border-radius:5px\"></div><br><h3 style="color:#555a" align="center" onclick="window.open(\'index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid='+data.data[i].p_id+'\')">' +
              data.data[i].p_name +
              '</h3><p><span style=\"color:#555;text-decoration:line-through;text-decoration-color:red;\">' +
              data.data[i].price + 'rs</span><sup>' + data.data[i].offer +
              '%</sup>&nbsp;&nbsp;<span>' + off_price +
              'rs&nbsp;<small  style=\"color:lime;font-size: 8pt;\" class=\"fa fa-check-circle-o\"></small></span></p>' +
              check_stock(i, data.data[i].stock, off_price, data.data[i].unit, data.data[
                  i].p_name, data.data[i].p_id) + '</div>');
      }
    }
    if(type == 'category-card-view'){
      itr = (data.length > 6)?6:data.length;
      $('.cate-container').empty();
      for(i=0;i<itr;i++){
        $('.cate-container').append('<a href="index.php?cate='+data[i].cate+'&cate_img='+data[i].cate_img+'&controller=product&action=index&key=ad2b90dede1c27608c507b022e625e0438288dd764529ec92be67f1f531aa6b7"><div class="cate-box" style="background:url(\'assets/category_images/'+data[i].cate_img+'\');background-size:cover;background-position:center"><span>'+data[i].cate+'</span><h1>90%</h1></div>');
      }
      // <a href="#">
      //   <div class="cate-box" style="background:url('assets/category_images/fruits.jpg');background-size:cover;background-position:center">
      //     <p>Cate1</p>
      //     <h1>90%</h1>
      //   </div>
    }
    //    alert(x + ' : ' + x1)
}

// function quantityControlComponent() {
//     v = '<div style="padding-top:5px;border-top:.2px solid rgba(0,0,0,.1);display:flex;justify-content:space-between;align-items: center;"><div class="quantity-control"><h2>KG</h2><span class="fa fa-minus" onclick="decr_quantity(2,20,40)"></span><small id="quantity_2">0</small><span class="fa fa-plus" onclick="incr_quantity(2,20,40)"></span></div><span class="fa fa-long-arrow-right"></span><div><span id="dis-cart-price-2">0</span><sup>rs</sup></div></div>';
//     return v;
// }


function myfavComponent(data){
  $('.myfav').fadeIn(100);
  $('#myfavtbl').empty();
  $('#myfavtbl').append(
      "<tr><th>sno</th><th>Product ID</th><th>Added On</th><th>Option</th>");
  for (ci = 0; ci < data.data.length; ci++) {
      $('#myfavtbl').append("<tr><td>" + (ci + 1) +
          "</td><td><a href='index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&action=productDetail&pid=" + data.data[ci].p_id + "'>" + data
          .data[ci].p_id + "</a></td><td>" + data.data[ci].created_at +
          "</td><td><button class=\"btn fa fa-trash\" onclick=\"add_fav_tmp_ctrl('" + data.data[
              ci].p_id + "')\"></button></td></tr>");
  }
}

function mycartComponent(data){
    total_price = 0;
    off_total_price = 0;

    if (data.status) {
        $('.mycart').fadeIn(100);
        $('#mycarttbl').empty();
        $('#mycarttbl').append(
            "<tr><th>Item</th><th>price</th><th>offer</th><th>off price</th><th>quantity</th><th>total</th><th>Option</tr>"
        );
        if(data.data.length == 0){
          $('#mycarttbl').append("<tr><td colspan='7' style='text-align:center'><span class='fa fa-chain-broken'></span>&nbsp;&nbsp;Empty cart !</td></tr>");
        }else{
            for (ci = 0; ci < data.data.length; ci++) {
              off_price = calc_offer(data.data[ci].price,data.data[ci].offer);
              if(data.old_r == true && data.data[ci].cart_edit_flag == '1' || data.old_r == true && data.data[ci].cart_edit_flag == '0' || data.old_r == false && data.data[ci].cart_edit_flag == '0'){
                $('#mycarttbl').append("<tr><td>" + data.data[
                        ci].p_name + "</td><td>" + data.data[ci].price + "rs</td><td>" + data.data[ci].offer + "%</td><td>" + off_price + "rs</td><td>" + data
                    .data[ci].quantity + " " + data.data[ci].unit + "</td><td>" + (off_price * data.data[ci].quantity) +
                    "rs</td><td>-</td></tr>");
              }else if(data.old_r == false && data.data[ci].cart_edit_flag == '1'){
                $('#mycarttbl').append("<tr id='cartDataRow"+ci+"'><td>" + data.data[
                        ci].p_name + "</td><td>" + data.data[ci].price + "rs</td><td>" + data.data[ci].offer + "%</td><td>" + off_price + "rs</td><td>" + data
                    .data[ci].quantity + " " + data.data[ci].unit + "</td><td>" + (off_price * data.data[ci].quantity) +
                    "rs</td><td><button class='btn fa fa-trash' onclick='removefrommycart(" +
                    data.data[ci].cart_id + ","+ci+")'></button></td></tr>");
                }
                  total_price += data.data[ci].price * data.data[ci].quantity;
                off_total_price += off_price * data.data[ci].quantity;
                //					console.log(data.data[ci].cart_id);
            }
          }
          $('#mycarttbl').append("<tr><td colspan='7'><h3 align='center'>Total Price " + total_price +"rs</h3></td></tr><tr><td colspan='7'><h3 align='center'>( - ) Saving "+(total_price-off_total_price)+"rs</h3></td></tr><tr><td colspan='7'><h1 align='center'>Total Cost "+off_total_price+"rs</h1></td></tr><tr><td colspan='7' style='text-align:center'><button style='background:cornflowerblue;' id='checkout' class='btn fa fa-check-circle' onclick='checkout()'>&nbsp;Check out</button></td></tr>");
          // <button id="checkout" class="btn fa fa-check-circle" onclick="checkout()">&nbsp;Check out</button>


        // $('#mycarttbl').append("<tr><td colspan='6'><h3 align='center'>Total : " + total_price +
        //     "rs</h3></td><td><h3>Off price : "+off_total_price+"</h3></td></tr>");
  }
}
