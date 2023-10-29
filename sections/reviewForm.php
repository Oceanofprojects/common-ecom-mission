<style>
.rating_layout {
    min-width: 250px;
    width: 50%;
    text-align: center;
    border-radius: 5px;
    ;
    padding: 10px;
    background: #fff;
    box-shadow: 0px 0px 20px 2px rgba(0, 0, 0, .4)
}

.rating_layout textarea {
    padding: 20px 0px;
    width: 90%;
    max-width: 100%;
    height: 150px;
    outline: none;
}

.rating_layer {
    padding: 20px 0px;
    ;
    font-size: 2em;
    display: flex;
    justify-content: center;
    align-items: center;
}

.rating_layer span {
    padding: 0px 5px;
    ;
    -webkit-text-stroke-width: .1px;
    color: #555a;
    padding: 10px;
}
</style>
<center><br>
    <form class="rating_layout" id="reviewFrm">
        <br><br>
        <textarea name="reviewmsg" id="review_msg" placeholder="Write your reviews..."></textarea>
        <div class="rating_layer"><span id="star1" class="fa fa-star-o" onclick="rating(1)"></span>
            <span id="star2" class="fa fa-star-o" onclick="rating(2)"></span>
            <span id="star3" class="fa fa-star-o" onclick="rating(3)"></span>
            <span id="star4" class="fa fa-star-o" onclick="rating(4)"></span>
            <span id="star5" class="fa fa-star-o" onclick="rating(5)"></span>
        </div><br><br>
        <input type="text" name="p_id" value="<?php echo $p_id;?>" hidden>
        <input type="text" name="rating" value="0" id="rating" hidden>
        <input type="button" class="btn" style="background:cornflowerblue" value="Send Feedback" onclick="sendReview()">
        <br><br>
    </form>
</center>