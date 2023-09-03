<style>
* {
    padding: 0px;
    margin: 0px
}

.details {
    display: flex;
    justify-content: space-around;
    background-color: #ddd;
    flex-wrap: wrap;
}

.details-box-layer {
    flex: 1;
    margin: 20px;
}

.details-box-content-layer {
    flex: 2;
    min-width: 200px;
    margin: 10px;
}

.details-box-content-layer h1 {
    font-size: 3em;
}

.details-box-content-layer p {
    font-size: 1.5em;
    padding: 20px 0px;
}

.details-box-layer {
    background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwixnX9_EXei7itvuaLzBWKhrCj0ypC78jLA&usqp=CAU');
    background-position: center;
    background-size: cover;
}

.details-box-head {
    background: linear-gradient(0deg, transparent, rgba(0, 0, 0, .3) 95%);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 5px;
}

.details-box-head a {
    text-decoration: none;
    font-size: 15pt;
    ;
    color: #fff;
    margin: 10px;
}

.details-box-main-img {
    min-width: 200px;
    height: 300px;
    width: 100%;
}

.details-sub-imgs {
    backdrop-filter: blur(5px);
    display: flex;
    justify-content: space-around;
    align-items: center;
    background: linear-gradient(0deg, rgba(0, 0, 0, .8), rgba(0, 0, 0, .6), rgba(0, 0, 0, .4) 50%, transparent);
}

.details-sub-imgs img {
    border: 1px solid #555;
    height: 50px;
    width: 50px;
    margin: 10px;
}

.details-sub-imgs img:hover {
    box-shadow: 0px 0px 10px 2px #ddda;
    cursor: pointer;
}
</style>
<section class="details">

    <div class="details-box-layer">
        <div class="details-box-head">
            <a href="#" class="fa fa-share-alt"></a>
            <a href="#" class="fa fa-heart"></a>
        </div>
        <div class="details-box-main-img"></div>
        <div class="details-sub-imgs">
            <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwixnX9_EXei7itvuaLzBWKhrCj0ypC78jLA&usqp=CAU">
            <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwixnX9_EXei7itvuaLzBWKhrCj0ypC78jLA&usqp=CAU">
            <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwixnX9_EXei7itvuaLzBWKhrCj0ypC78jLA&usqp=CAU">
            <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwixnX9_EXei7itvuaLzBWKhrCj0ypC78jLA&usqp=CAU">
        </div>
    </div>

    <div class="details-box-content-layer">
        <h1>Jhsa jas as #1212</h1>
        <p width="100">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae
            inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit
            similique laudantium minus et debitis numquam!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima
            laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae
            sapiente. Pariatur.a sa sas
            aks aks ka aks as</p>
    </div>

</section>