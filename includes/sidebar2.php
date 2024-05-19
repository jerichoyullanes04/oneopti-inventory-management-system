<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Opti Inventory Management System</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
    <link rel="icon" type="image/x-icon" href="../img/OneOpti.png">
    <style>
    .page-container {   
        position: fixed;
        top: 0;
        bottom: 0;
        position: fixed;
        height: inherit;
        display: flex;
    }
  #text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  }

  :root {
--nav-icon-width: 50px;
--nav-border-width: 8px;
}

html, body {
position: relative;
height: 100%;
margin: 0;
font-family: sans-serif;
}

.main {
height: inherit;
padding: 0;
padding-left: var(--nav-border-width);
overflow-y: auto;
}

.nav {
width: 200px;
height: inherit;
position: relative;
background-color: #DCDCDC;
transition: width 0.2s;
flex-shrink: 0;
}

.nav--collapsed {
width: var(--nav-icon-width);
}

.nav--collapsed .nav__label {
display: none;
}

.nav__link {
display: flex;
align-items: center;
color: rgba(0, 0, 0, 0.75);
text-decoration: none;
height: 75px;
}

.nav__link:hover {
background-color: #FF5349;
}

.nav__icon-container {
width: var(--nav-icon-width);
height: var(--nav-icon-width);
display: flex;
align-items: center;
justify-content: center;
flex-shrink: 0;
}

.nav__label {
justify-content: center;
white-space: nowrap;
padding-left: 5px;
}

.nav__border {
position: absolute;
left: 100%;
top: 0;
width: var(--nav-border-width);
height: inherit;
background-color: #FF5349;
transition: background-color 0.2s;
cursor: ew-resize;
}

.nav__border:hover {
background-color: #cccccc;
}

.sidebar-logo {
margin-left: 10px;
}
  
    </style>
</head>

<body>

    <div class="page-container">
        <nav class="nav">
            <div class="nav__border"></div>

            <div class="sidebar-brand-icon rotate-n-15">
            
            </div>

            <div class="nav__link">
            <img height="50dp" width="50dp" src="../img/OneOpti.png"><div class="nav__label">One Opti Inventory<br> Management<br> System</div></img>
            </div>

            <!-- HOME PAGE -->
            <a href="../php/sales_inventory2.php" class="nav__link">
                <div class="nav__icon-container">
                    <i class="material-icons">home</i>
                </div>
                <span id="home" class="nav__label">Home</span>
            </a>

            <!-- CUSTOMER PAGE 
            <a href="../php/customer.php" class="nav__link">
                <div class="nav__icon-container">
                    <i class="material-icons">person</i>
                </div>
                <span class="nav__label">Customer</span>
            </a> -->

            <!-- EMPLOYEE PAGE 
            <a href="../php/employee.php" class="nav__link">
                <div class="nav__icon-container">
                    <i class="material-icons">man</i>
                </div>
                <span class="nav__label">Employee</span>
            </a>-->
            
            
            <!-- ADD PRODUCT PAGE -->
            <a href="../php/addproduct.php" class="nav__link">
                <div class="nav__icon-container">
                    <i class="material-icons">add_box</i>
                </div>
                <span class="nav__label">Product</span>
            </a>

            <!-- PRODUCT PAGE -->
            <a href="../php/product.php" class="nav__link">
                <div class="nav__icon-container">
                    <i class="material-icons">inventory</i>
                </div>
                <span class="nav__label">Inventory</span>
            </a>

            <!-- TRANSACTION PAGE 
            <a href="../php/sales_transactions.php" class="nav__link">
                <div class="nav__icon-container">
                    <i class="material-icons">done_all</i>
                </div>
                <span class="nav__label">Transaction</span>
            </a> -->

            <!-- ACCOUNTS 
            <a href="../php/accounts.php" class="nav__link">
                <div class="nav__icon-container">
                    <i class="material-icons">groups</i>
                </div>
                <span class="nav__label">Accounts</span>
            </a>-->

            <!-- LOG OUT
            <a href="#" class="nav__link">
                <div class="nav__icon-container">
                    <i class="material-icons">power_settings_new</i>
                </div>
                <span class="nav__label">Log Out</span>
            </a> -->
        </nav>

        <main class="main">

        </main>
    </div>

  <script>
    // Collapse Navigation Bar Function
    {
      const collapsedClass = "nav--collapsed";
      const lsKey = "navCollapsed";
      const nav = document.querySelector(".nav");
      const navBorder = nav.querySelector(".nav__border");
      
      if (localStorage.getItem(lsKey) === "true") {
        nav.classList.add(collapsedClass);
      }
      navBorder.addEventListener("click", () => {
        nav.classList.toggle(collapsedClass);
        localStorage.setItem(lsKey, nav.classList.contains(collapsedClass));
      });
    }
  </script>

</body>

</html>