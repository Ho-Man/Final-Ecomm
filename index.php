<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
     
      <div class="content-wrapper">
        <div class="container">

          <!-- Main content -->
          <section class="content">
            <div class="row">
                <div class="col-sm-9">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "
                                <div class='alert alert-danger'>
                                    ".$_SESSION['error']."
                                </div>
                            ";
                            unset($_SESSION['error']);
                        }
                    ?>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                          <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="item active">
                            <img src="images/banner1.png" alt="First slide">
                          </div>
                          <div class="item">
                            <img src="images/banner2.png" alt="Second slide">
                          </div>
                          <div class="item">
                            <img src="images/banner3.png" alt="Third slide">
                          </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                          <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                          <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                    <h2>Some product</h2>
<div class="row">
    <?php
        // Truy vấn SQL để lấy thông tin về sản phẩm
        $stmt = $conn->prepare("SELECT * FROM products LIMIT 3");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Hiển thị thông tin về sản phẩm
        foreach($products as $product) {
    ?>
    <div class="col-sm-4">
        <div class="thumbnail">
            <img src="images/<?php echo $product['photo']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
            <div class="caption">
                <h3><?php echo $product['name']; ?></h3>
               
            </div>
        </div>
    </div>
    <?php } ?>
</div>

                </div>
                <div class="col-sm-3">
                    <?php include 'includes/sidebar.php'; ?>
                </div>
            </div>
          </section>
         
        </div>
      </div>
  
    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
