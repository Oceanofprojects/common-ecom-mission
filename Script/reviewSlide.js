// var review = {
// "status": true,
// "data": [
// {
// "sno": "38",
// "name": "mani",
// "location":"chennai",
// "profile":"default.jpg",
// "rating": "4 stars",
// "message":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
// "created_at": "2023-09-09 22:04:02"
// }
// ],
// "message": "My Fav fetched"
// }
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
  $('#testi_profile').attr('src','assets/common-images/profiles/'+x.profile+'.jpg');
  $('#testi_name').text(x.name+', ');
  $('#testi_city').text(x.location);
  $('#testi_rating').text('Rating : '+x.rating);
  $('#testi_message').html('<a href="index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid='+x.p_id+'">PID</a>'+x.review);
  $('#testi_time').text(x.created_at);
 $('.slider-box').css('transform','rotateY(0deg)');
}
