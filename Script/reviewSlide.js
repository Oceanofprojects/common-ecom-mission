
var currentId = 0;
if(typeof(review) !== 'undefined'){
if(review.data.length!==0){
$('#review_bxs').empty();
  for(let i=0;i<review.data.length;i++){
    data = review.data[i];
    $('#review_bxs').append('<div class="slide swiper-slide"><div style="border:1px solid rgba(0,0,0,.4);border-radius:5px;box-shadow:2px 2px 10px 3px rgba(0,0,0,.3);background:#fff;padding:20px;margin:0px 10%;width:70%"><div style="display:flex;justify-content:flex-start;align-items:center"><img style="height:50px;width:50px;border-radius:50%" src="assets/common-images/profiles/'+data.profile+'.jpg" alt=""  id="testi_profile"/><div>&nbsp;&nbsp;<span id="testi_name">'+data.name.toUpperCase()+'</span> - <span id="testi_city">'+data.location+'</span>, <small id="testi_rating">'+getStarts(data.rating)+'</small></div></div><br/><p id="testi_message" style="padding:0px 10px;text-align:left">'+data.review+'</p><br/><h5 style="padding:10px" align="right" id="testi_time">'+data.created_at+'</h5></div></div>');
    
    // console.log(review.data[i].name)
  }
}
}
function getStarts(s){
  stars = '';
  for(i=1;i<=s;i++){
    stars+="<span class='fa fa-star' style='color:gold;text-shadow:0px 0px 1px rgba(0,0,0,.5)'></span> ";
  }
  return stars;
}

// console.log(review)
// function lSlide(){
//   if(review.data.length > currentId){
//     if(currentId == 0){
//       currentId = review.data.length;
//     }
//     currentId=currentId-1;
//   }
//       $('.slider-box').css({'opacity':'0'});
// //$('.slider-box').fadeOut(500)
//   //$('.slider-box').css({'transform':'rotateY(90deg)'});
//   setTimeout(loadNewTesti,500);
// }
// function rSlide(){
//   if((review.data.length-1) > currentId){
//     currentId+=1;
//   }else if((review.data.length-1) == currentId){
//     currentId = 0;
//   }
//   $('.slider-box').css({'opacity':'0','box-shadow':'0px 0px 0px 0px transparent'});
//   setTimeout(loadNewTesti,500);
// }
// function loadNewTesti(){
//    $('.slider-box').css({'opacity':'1','box-shadow':'0px 10px 10px 2px rgba(0,0,0,.2)'});
// //  $('.slider-box').css({'transform':'rotateY(0deg)'});
//   //$('.slider-box').fadeIn(500)
//   x = review.data[currentId];
//   $('#testi_profile').attr('src','assets/common-images/profiles/'+x.profile+'.jpg');
//   $('#testi_name').text(x.name+', ');
//   $('#testi_city').text(x.location);
//   $('#testi_rating').html('Rating : '+getStarts(x.rating));
//   $('#testi_message').html('<a href="index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid='+x.p_id+'">PID</a> '+x.review);
//   $('#testi_time').text(x.created_at);
//  $('.slider-box').css('transform','rotateY(0deg)');
// }
// function getStarts(s){
//   stars = '';
//   for(i=1;i<=s;i++){
//     stars+="<span class='fa fa-star' style='color:gold'></span> ";
//   }
//   return stars;
// }
