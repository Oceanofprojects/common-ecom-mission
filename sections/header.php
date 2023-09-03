<style>
.menu {
    position: sticky;
    top: 0px;
    left: 0px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    background: #fff;
    padding: 15px 5px;
    box-shadow: 10px 0px 10px 1px rgba(0, 0, 0, .2);
}

.menu img {
    width: 50px
}

.menu ul {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.menu li {
    list-style: none
}

.menu li a {
    text-decoration: none;
    color: #000;
    padding: 0px 20px
}

.menu li a:hover {
    color: navy
}

#menu_icon {
    display: none
}
</style>
<header class="menu">
    <div>
        <img src="assets/common-images/logo.png" alt="asasas">
        <span id="menu_icon">X</span>
    </div>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Search</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Offer</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </nav>
</header>