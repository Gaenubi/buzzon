<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <script type="test/javascript" src="{{asset('js/script.js') }}"></script>
    <title>Buzzon</title>
</head>
<body>
    <div class="top-nav">
        <img src="" alt="buzzon logo">
        <div class="Nav-item">
            <div>
                <img src="" alt="Location pin">
            </div>
            <div>
                <h4>Deliver to</h4>
                <h4>Nigeria</h4>
            </div>
        </div>
        <div class="Nav-item">
        <button class="Nav-item searchbar" id="filtbtn"> Dropdown </button>
            <div class="Dropdown" id="filtdd"> 
                <a href="#">All departments</a>
                <a href="#">Arts and craft</a>
                <a href="#">Automotive</a>
            </div>
        
        <div class="Nav-item">
            <input class="searchbox" type="text" placeholder="Search Buzzon">
            <input class="searchbar" type="submit">
        </div>
        </div>
        <div>
            <div class="Nav-item" id="langbtn">
                <img src="" alt="">
                <h4>EN</h4>
            </div>
            <div class="Dropdown" id="langdd">
                <select name="Language" id="">
                    <option value="Japanese">Japanese</option>
                    <option value="French">French</option>
                    <option value="Russian">Russian</option>
                </select>
            </div>
        </div>
        <div>
            @guest
                <button class="Dropbtn" id="accountbtn" onclick="SHowdd('account')">
                <h4>Hello, Sign in</h4>
                <h4>Accounts & Lists</h4>
                </button>
            @endguest
            
            <div class="Dropdown" id="accountdd">
                <div>
                    @guest
                       <button><a href="login">Sign in</a></button>
                       <div><h5>New customer?</h5> <a href="register">Start here.</a></div>
                    @endguest
                </div>
                <div>
                    <div>
                       <h3><strong>Your Lists</strong></h3> 
                       <a href="#" >Create a new list.</a>
                       <a href="#" >Find a list or registry</a>
                    </div>
                    <div>
                        <h3><strong>Your Account</strong></h3>
                        <a href="#" >Account</a>
                        <a href="#" >Orders</a>
                        <a href="#" >Recommendations</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="Nav-item" href="#">Orders</a>
        <div class="Nav-item">
            <div>
            <img src="" alt="">
            <h4>0</h4>
            </div>
            <h4>Cart</h4>
        </div>
    </div>
    <div class="bop-nav">
        <button onclick="function Showdd(const dd='all')" id="allbtn">All</button>
        <div>
            <div class="Dropdown" id="alldd">
                <h1>Shop by department</h1>
                <a href="#"><button>Electronics</button></a>
                <a href="#"><button>Computers</button></a>
                <a href="#"><button>Smart Home</button></a>
                <a href="#"><button>Arts and craft</button></a>
                <h1>Programs and Features</h1>
                <a href="#"><button>Gift cards</button></a>
                <a href="#"><button>Shop by interest</button></a>           
            </div>
        </div>
        <a href="#"><button>Today's deals</button></a>
        <a href="#"><button>Sell</button></a>
    </div>
</body>
</html>