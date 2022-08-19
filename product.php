<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Products</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="cust.php"> <img class="btn"  src="seewans.png" alt="" width="72" height="57"> </a>
    <a class="navbar-brand" href="cust.php"><h2>Seewans Bakery</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="cust.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus1.php">AboutUs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="#">Product</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="wishlist.php">Wishlist</a>
              </li> 
              <li class="nav-item">
              <a class="btn btn-outline-light btn-floating m-1" href="cart.php" role="button">
                <i class="fa-solid fa-cart-shopping"></i>
              </a>
              </li>
              
            </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
      <a href="index.php"><button class="btn btn-outline-warning" type="submit">Logout</button></a>
    </div>
  </div>
</nav>

<h2> Breads & Buns </h2>
<section id="section-a" class="grid">

<style>
body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #333;
    color: #fff;
    font-size: 1.1em;
    line-height: 1.5;
    text-align: center;
  }
      #section-a {
    padding: 2em 1em 1em;
  }
  
  #section-a ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  #section-a li {
    margin-bottom: 1em;
    background: #fff;
    color: #333;
  }
  
  .card-content {
    padding: 1.5em;
  }
  
  #main-footer {
    padding: 1em;
    background: #000;
    color: #fff;
    text-align: center;
  }
  
  #main-footer a {
    color: #2690d4;
    text-decoration: none;
  }
  
  @media (min-width: 700px) {
    .grid {
      display: grid;
      grid-template-columns: 1fr repeat(2, minmax(auto, 25em)) 1fr;
    }
  
    .content-wrap,
    #section-a ul {
      grid-column: 2/4;
    }
  
    .box,
    #main-footer div {
      grid-column: span 2;
    }
  
    #section-a ul {
      display: flex;
      justify-content: space-around;
    }
  
    #section-a li {
      width: 31%;
    }
    input[type=button] {
  background-color: #fa9200;
  border: none;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 25px;
}
  }
</style>
      <ul>
        <li>
          <div class="card">
            <img src="pavbhajibread.jpeg" alt= "width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> Pav Bhaji Bread </h3>
              <p>Pav Bhaji bread</p>      
              <p>₹36 per pack</p>       
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="https://www.escoffieronline.com/wp-content/uploads/2013/04/iStock-995038782-small.jpg" alt= "width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> Wheat Breads </h3>
              <p>Brown Sandwich Bread</p> 
              <p>₹50 per pack</p>           
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="https://www.vegrecipesofindia.com/wp-content/uploads/2021/01/bread-recipe-1-500x500.jpg" alt= "width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title">White Bread</h3>
              <p>White Sandwich Bread</p>   
              <p>₹65 per pack</p>         
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
      </ul>
    </section>
<section id="section-b" class="grid">

<style>
body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #333;
    color: #fff;
    font-size: 1.1em;
    line-height: 1.5;
    text-align: center;
  }
      #section-b {
    padding: 2em 1em 1em;
  }
  
  #section-b ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  #section-b li {
    margin-bottom: 1em;
    background: #fff;
    color: #333;
  }
  
  .card-content {
    padding: 1.5em;
  }
  
  #main-footer {
    padding: 1em;
    background: #000;
    color: #fff;
    text-align: center;
  }
  
  #main-footer b {
    color: #2690d4;
    text-decoration: none;
  }
  
  @media (min-width: 700px) {
    .grid {
      display: grid;
      grid-template-columns: 1fr repeat(2, minmax(auto, 25em)) 1fr;
    }
  
    .content-wrap,
    #section-b ul {
      grid-column: 2/4;
    }
  
    .box,
    #main-footer div {
      grid-column: span 2;
    }
  
    #section-b ul {
      display: flex;
      justify-content: space-around;
    }
  
    #section-b li {
      width: 31%;
    }
    input[type=button] {
  background-color: #fa9200;
  border: none;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 25px;
}
  }
</style>
      <ul>
        <li>
          <div class="card">
            <img src="bun.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title">Burger Buns</h3>
              <p>Burger Bun</p>
              <p>₹40 per pack</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="hotdog.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title">Hotdog Buns</h3>
              <p>Hot Dog Bun</p>
              <p>₹60 per pack</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="bun1.jpeg" alt= "width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title">Dabeli Buns</h3>
              <p>Dabeli Bun</p> 
              <p>₹36 per pack</p>           
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
      </ul>
    </section>



    

    <h2> Cakes and Pastries </h2>
    <section id="section-c" class="grid"> 
    <style>
      body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #333;
    color: #fff;
    font-size: 1.1em;
    line-height: 1.5;
    text-align: center;
  }

      #section-c 
      {
        padding: 2em 1em 1em;
      }
  
  #section-c ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  #section-c li {
    margin-bottom: 1em;
    background: #fff;
    color: #333;
  }
  
  .card-content {
    padding: 1.5em;
  }
  
  #main-footer {
    padding: 1em;
    background: #000;
    color: #fff;
    text-align: center;
  }
  
  @media (min-width: 700px) {
    .grid {
      display: grid;
      grid-template-columns: 1fr repeat(2, minmax(auto, 25em)) 1fr;
    }
  
    .content-wrap,
    #section-c ul {
      grid-column: 2/4;
    }
  
    .box,
    #main-footer div {
      grid-column: span 2;
    }
  
    #section-c ul {
      display: flex;
      justify-content: space-around;
    }
  
    #section-c li {
      width: 31%;
    }
    input[type=button] {
  background-color: #fa9200;
  border: none;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 25px;
}
  }
  
</style>
      <ul>
        <li>
          <div class="card">
            <img src="chcake.jpeg" alt= "width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title">Chocolate</h3>
              <p>Used high quality chocolate</p>
              <p>₹390</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="rvcake.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> Red Velvet</h3>
              <p>Red Velvet cake</p>
              <p>₹400</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="chpas.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> Chocolate Pastry </h3>
              <p>Made with royal chocolate.</p>
              <p>₹60 per piece</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
      </ul>
    </section>



    <section id="section-d" class="grid"> 
    <style>
      body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #333;
    color: #fff;
    font-size: 1.1em;
    line-height: 1.5;
    text-align: center;
  }

      #section-d 
      {
        padding: 2em 1em 1em;
      }
  
  #section-d ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  #section-d li {
    margin-bottom: 1em;
    background: #fff;
    color: #333;
  }
  
  .card-content {
    padding: 1.5em;
  }
  
  #main-footer {
    padding: 1em;
    background: #000;
    color: #fff;
    text-align: center;
  }
  
  @media (min-width: 700px) {
    .grid {
      display: grid;
      grid-template-columns: 1fr repeat(2, minmax(auto, 25em)) 1fr;
    }
  
    .content-wrap,
    #section-d ul {
      grid-column: 2/4;
    }
  
    .box,
    #main-footer div {
      grid-column: span 2;
    }
  
    #section-d ul {
      display: flex;
      justify-content: space-around;
    }
  
    #section-d li {
      width: 31%;
    }
    input[type=button] {
  background-color: #fa9200;
  border: none;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 25px;
}
  }
  
</style>
      <ul>
        <li>
          <div class="card">
            <img src="bluech.jpeg" alt= "width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title">Blue Smash</h3>
              <p>Blue coated cake</p>
              <p>₹360</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="royalch.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> Royal Chocolate </h3>
              <p>Royal Chocolate</p>
              <p>₹450</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="gold.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> 24K Gold Cake </h3>
              <p>Used eatable 24K gold</p>
              <p>₹3000</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
      </ul>
    </section>

    <h2> Chocolates </h2>
    <section id="section-e" class="grid"> 
    <style>
      body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #333;
    color: #fff;
    font-size: 1.1em;
    line-height: 1.5;
    text-align: center;
  }

      #section-e
      {
        padding: 2em 1em 1em;
      }
  
  #section-e ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  #section-e li {
    margin-bottom: 1em;
    background: #fff;
    color: #333;
  }
  
  .card-content {
    padding: 1.5em;
  }
  
  #main-footer {
    padding: 1em;
    background: #000;
    color: #fff;
    text-align: center;
  }
  
  @media (min-width: 700px) {
    .grid {
      display: grid;
      grid-template-columns: 1fr repeat(2, minmax(auto, 25em)) 1fr;
    }
  
    .content-wrap,
    #section-e ul {
      grid-column: 2/4;
    }
  
    .box,
    #main-footer div {
      grid-column: span 2;
    }
  
    #section-e ul {
      display: flex;
      justify-content: space-around;
    }
  
    #section-e li {
      width: 31%;
    }
    input[type=button] {
  background-color: #fa9200;
  border: none;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 25px;
}
  }
  
</style>
      <ul>
        <li>
          <div class="card">
            <img src="dmsilk.jpeg" alt= "width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title">Cadbury Silk</h3>
              <p>₹80 per pack</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="amuldc.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> Amul Chocolate </h3>
              <p>₹50 per pack</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="mrbeast.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> MrBeast Bar </h3>
              <p>₹100 per pack</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
      </ul>
    </section>

    <section id="section-f" class="grid"> 
    <style>
      body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #333;
    color: #fff;
    font-size: 1.1em;
    line-height: 1.5;
    text-align: center;
  }

      #section-f
      {
        padding: 2em 1em 1em;
      }
  
  #section-f ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  #section-f li {
    margin-bottom: 1em;
    background: #fff;
    color: #333;
  }
  
  .card-content {
    padding: 1.5em;
  }
  
  #main-footer {
    padding: 1em;
    background: #000;
    color: #fff;
    text-align: center;
  }
  
  @media (min-width: 700px) {
    .grid {
      display: grid;
      grid-template-columns: 1fr repeat(2, minmax(auto, 25em)) 1fr;
    }
  
    .content-wrap,
    #section-f ul {
      grid-column: 2/4;
    }
  
    .box,
    #main-footer div {
      grid-column: span 2;
    }
  
    #section-f ul {
      display: flex;
      justify-content: space-around;
    }
  
    #section-f li {
      width: 31%;
    }
    input[type=button] {
  background-color: #fa9200;
  border: none;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 25px;
}
  }
  
</style>
      <ul>
        <li>
          <div class="card">
            <img src="kitkatdark.jpeg" alt= "width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title">KitKat Dark</h3>
              <p>₹30 per pack</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="galaxy.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> Galaxy </h3>
              <p>₹15 per pack</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
        <li>
          <div class="card">
            <img src="kitkat.jpeg" alt="width= "300" height="200"">
            <div class="card-content">
              <h3 class="card-title"> KitKat </h3>
              <p>₹10 per pack</p>
            </div>
            <input type="button" value="Add to Cart">
          </div>
        </li>
      </ul>
    </section>
    <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>