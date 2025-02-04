<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BigMoon</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Favicon -->
    <link href="img/bigmoon_logo_circle.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl  bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <div class="top-banner text-white text-center py-2">
            Get FLAT ₹500 OFF on order above 2499 | Code: CHRISTMAS
        </div>
        <div class="whatsapp-icon">
            <a href="https://wa.me/+919600362903"  title="Chat on WhatsApp">
              <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" />
            </a>
          </div>
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
                <img src="img/bigmoon_logo_circle.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                <h1 class="m-0 text-primary" style="font-family: 'Brush Script MT', cursive;">Bigmoon</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                      
        <div class="nav-item d-flex align-items-center ">
                    <a href="index.php" class="btn abtn-light  active me-2 ">
                        Home Furnishings
                    </a>
                </div>
                <div class="nav-item d-flex align-items-center">
                    <a href="babyessentials.php" class="btn abtn-light   me-2 ">
                        Baby Essentials
                    </a>
                </div>
                        <a href="ourstories.html" class="nav-link ">
                            Our Story
                        </a>
                        
                    <a href="blogs.html" class="nav-item nav-link ">Blogs</a>
                   
                        <a href="bigmoontestimonial.html" class="nav-link ">
                            Testimonial
                        </a>
                    <a href="getintouch.html" class="nav-item nav-link">Get in Touch</a>
                
                </div>
                <div class="d-flex align-items-center">
                    <a  class="btn btn-light rounded-pill me-2" id="openModalBtn">
                        <i class="fa fa-history me-1"></i> Order History
                    </a>
                    <a href="#" class="btn btn-light rounded-pill" id="cart-btn">
                        <i class="fa fa-shopping-cart me-1"></i> Cart <span id="cart-count">0</span>
                    </a>
                </div>    
            </div>
        </nav>

     <!-- Cart Modal -->
     <div class="cart-modal" id="cart-modal">
        <div class="cart-modal-header">
            <h2>Your Shopping Cart</h2>
            <button id="cart-close" type="button" aria-label="Close Cart" class="cart-modal-close">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="cart-modal-body">
            <div class="cart-empty" id="empty-cart-message">
                <h4>Your cart is empty!</h4>
                <p>Add your favorite items to your cart.</p>
                <p><a href="index.html">Shop Now</a></p>
            </div>
            <div id="cart-items-container"></div><!-- Cart items will be appended here -->
        </div>
        <div class="cart-modal-footer">
            <center><button id="proceed-to-checkout" class="btn btn-primary checkout-btn" style="display: none;">
                Proceed to Checkout
            </button></center>
        </div>
        
    </div>
<!-- Modal for Checkout -->
<div class="modal1" id="checkout-modal">
    <div class="modal-dialog1">
        <div class="modal-content1">
            <!-- Modal Header -->
            <div class="modal-header1">
                <h4 class="modal-title1" id="modal-title">Customer Details</h4>
                <button type="button" class="btn-close1" id="modal-close">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body1">
                <div class="row">
                    <!-- Left half: Steps for checkout -->
                    <div class="col-md-7">
                        <form id="customer-details-form" novalidate>
                            <div class="mb-3 d-flex justify-content-between">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" pattern="^\d{10}$" required>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email1" placeholder="Enter your email" required>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" required></textarea>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between">
                                <label for="state" class="form-label">State</label>
                                <select class="form-control dropdown" id="state" required>
                                    <option value="" disabled selected>Select a State</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Lakshadweep (UT)">Lakshadweep (UT)</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Puducherry (UT)">Puducherry (UT)</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between">
                                <label for="district" class="form-label">District</label>
                                <select class="form-control dropdown" id="district" required>
                                    <option value="" disabled selected>Select a District</option>
                                </select>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input type="text" class="form-control" id="pincode" placeholder="Enter your pincode" pattern="^\d{6}$" required>
                            </div>
                        </form>
                        <div id="form-errors" class="text-danger mt-3"></div> <!-- Container for error messages -->
                    </div>

                    <!-- Right half: Order Summary -->
                    <div class="col-md-5">
                        <div id="order-summary">
                            <h5>Order Summary</h5>
                            <div id="order-summary-container" class="order-summary">
                                <!-- Cart items will be dynamically added here -->
                            </div>
                            <div id="empty-cart-message" style="display: none;">
                                <p>Your cart is empty.</p>
                            </div>
                            <div id="total-amount" class="total-section">
                                <h6>Total: ₹<span id="total-amount-value">0</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer1">
                <button type="button" class="btn btn-secondary" id="cancel-button">Cancel</button>
                <button type="button" class="btn btn-primary" id="proceed-to-pay">Proceed to Pay</button>
            </div>
        </div>
    </div>
</div>
<div class="shopify-section explore-collection">
    <div class="scroll-container">
      <div class="image-with-text-wrapper">
        <!-- Block 1 -->
        <div class="block">
          <a href="/collections/comforters">
            <img src="img/product catagories front images-01.png" alt="Comforters" class="desktop-img">
          </a>
        </div>
        <!-- Block 2 -->
        <div class="block">
          <a href="/collections/bedcover-set">
            <img src="img/product catagories front images-02.png" alt="Bedcover Set" class="desktop-img">
          </a>
        </div>
        <!-- Repeat for other blocks -->
        <div class="block">
          <a href="/collections/bedcover-set">
            <img src="img/product catagories front images-03.png" alt="Bedcover Set" class="desktop-img">
          </a>
        </div>
        <div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-04.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div>
          <div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-05.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div>
          <div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-06.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div>
          <div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-07.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div>
          <div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-08.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div><div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-09.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div><div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-10.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div><div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-11.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div><div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-12.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div><div class="block">
            <a href="/collections/bedcover-set">
              <img src="img/product catagories front images-13.png" alt="Bedcover Set" class="desktop-img">
            </a>
          </div>
        <!-- Add more blocks as needed -->
      </div>
    </div>
  </div>

<!-- Carousel Start -->
<div class="container-xxl container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative" >
        <!-- First Slide -->
        <div class="owl-carousel-item">
            <a href="#">
                <img class="img-fluid" style="object-fit: fill;" src="img/websitebanner1.png" alt="Image 1">
            </a>
        </div>
        <!-- Second Slide -->
        <div class="owl-carousel-item">
            <a href="#">
                <img class="img-fluid" style="object-fit: fill;" src="img/websitebanner2.png" alt="Image 2">
            </a>
        </div>
        <!-- Third Slide -->
        <div class="owl-carousel-item">
            <a href="#">
                <img class="img-fluid" style="object-fit: fill;" src="img/websitebanner3.png" alt="Image 3">
            </a>
        </div>
    </div>
</div>

<!-- Carousel End -->
        <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 0px;">
            <!-- News & Events Section Title -->
            <div class="section-title text-center position-relative pb-2 mb-3 mx-auto" style="max-width: 600px; height:auto;">
                <h5 class="fw-bold text-primary text-uppercase">Products</h5>    
                <!-- Blue bar container -->
                <div class="blue-bar">
                    <div class="moving-box"></div>  <!-- Small white rectangle -->
                </div>
            </div>				
        </div>
        
        <section class="aproduct-section " style="padding: 15px;">
            <nav class="aproduct-navs wow fadeInUp" data-wow-delay="0.2s">
                <ul class="nav-tabss">
                    <li class="nav-items active" data-category="all">All</li>
                    <li class="nav-items" data-category="Cotton Towels">Cotton Towels</li>
                    <li class="nav-items" data-category="Cushion Covers">Cushion Covers</li>
                    <li class="nav-items" data-category="Table Covers">Table Covers</li>
                    <li class="nav-items" data-category="Cotton Bedsheets">Cotton Bedsheets</li>
                    <li class="nav-items" data-category="Bed Quilts">Bed Quilts</li>
                    <li class="nav-items" data-category="Cosmetic Pouch">Cosmetic Pouch</li>
                    <li class="nav-items" data-category="Travel Pouch">Travel Pouch</li>
                </ul>
            </nav>
        <div class="wow fadeInUp" data-wow-delay="0.3s">
            <div class="aproduct-container" >
                <div class="aproduct-grid" id="all-products">
                    <!-- All products will be appended here -->
                </div>
                <div class="aproduct-grid hidden" id="Cotton Towels">
                    <div class="aproduct-card  ">
                        <a href="product1.html" class="product-link">
                            <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458461121/MC/ZD/YY/145876533/grey-minimalist-interior-design-instagram-post-7-500x500.png" alt="Product 1" class="aproduct-image">
                        </a>
                        <div class="aproduct-info">
                            <h3 class="aproduct-title">Turkish Bath Towels1</h3>
                            <p class="aproduct-description">Turkish Towels (70 x 40 Inches) <br>₹ 1/ Piece</p>                  
                            <button class="aadd-to-cart">
                                <!-- <i class="fa-solid fa-cart-shopping acart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <span class="abutton-text">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                    <div class="aproduct-card  " >
                        <a href="/products/product-1" class="product-link">
                            <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458453990/ES/MG/FL/145876533/grey-minimalist-interior-design-instagram-post-14-500x500.png" alt="Product 1" class="aproduct-image">
                        </a>
                        <div class="aproduct-info">
                            <h3 class="aproduct-title">Turkish Bath Towels2</h3>
                            <p class="aproduct-description">Turkish Towels (70 x 40 Inches)<br>₹ 1/ Piece</p>                    
                            <button class="aadd-to-cart">
                                <!-- <i class="fa-solid fa-cart-shopping acart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <span class="abutton-text">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                    <div class="aproduct-card " >
                        <a href="/products/product-1" class="product-link">
                            <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458430624/WF/XB/HA/145876533/grey-minimalist-interior-design-instagram-post-5-500x500.png" alt="Product 1" class="aproduct-image">
                        </a>
                        <div class="aproduct-info">
                            <h3 class="aproduct-title">Turkish Bath Towels3</h3>
                            <p class="aproduct-description">Turkish Towels (70 x 40 Inches)<br>₹ 125/ Piece</p>                    
                            <button class="aadd-to-cart">
                                <!-- <i class="fa-solid fa-cart-shopping acart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <span class="abutton-text">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                    <div class="aproduct-card  " >
                        <a href="/products/product-1" class="product-link">
                            <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458430624/WF/XB/HA/145876533/grey-minimalist-interior-design-instagram-post-5-500x500.png" alt="Product 1" class="aproduct-image">
                        </a>
                        <div class="aproduct-info">
                            <h3 class="aproduct-title">Turkish Bath Towels4</h3>
                            <p class="aproduct-description">Turkish Towels (70 x 40 Inches)<br>₹ 125/ Piece</p>                    
                            <button class="aadd-to-cart">
                                <!-- <i class="fa-solid fa-cart-shopping acart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <span class="abutton-text">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                    <div class="aproduct-card  " >
                        <a href="/products/product-1" class="product-link">
                            <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458430624/WF/XB/HA/145876533/grey-minimalist-interior-design-instagram-post-5-500x500.png" alt="Product 1" class="aproduct-image">
                        </a>
                        <div class="aproduct-info">
                            <h3 class="aproduct-title">Turkish Bath Towels5</h3>
                            <p class="aproduct-description">Turkish Towels (70 x 40 Inches)<br>₹ 125/ Piece</p>                    
                            <button class="aadd-to-cart">
                                <!-- <i class="fa-solid fa-cart-shopping acart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <span class="abutton-text">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                    <div class="aproduct-card  ">
                        <a href="/products/product-1" class="product-link">
                            <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458430624/WF/XB/HA/145876533/grey-minimalist-interior-design-instagram-post-5-500x500.png" alt="Product 1" class="aproduct-image">
                        </a>
                        <div class="aproduct-info">
                            <h3 class="aproduct-title">Turkish Bath Towels6</h3>
                            <p class="aproduct-description">Turkish Towels (70 x 40 Inches)<br>₹ 125/ Piece</p>                    
                            <button class="aadd-to-cart">
                                <!-- <i class="fa-solid fa-cart-shopping acart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <span class="abutton-text">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                   
                </div>
        
                <div class="aproduct-grid hidden" id="cushion-cover">
                    <!-- Similar structure for Cushion Cover products -->
                </div>
        
                <div class="aproduct-grid hidden" id="table-runner">
                    <!-- Similar structure for Table Runner products -->
                </div>
        
                <div class="aproduct-grid hidden" id="bath-towels">
                    <!-- Similar structure for Bath Towels products -->
                </div>
            </div>
            <div class="aproduct-container" >
                <div class="aproduct-grid hidden" id="Cushion Covers">
                    <div class="aproduct-card" >
                        <a href="/products/product-1" class="product-link">
                            <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458430624/WF/XB/HA/145876533/grey-minimalist-interior-design-instagram-post-5-500x500.png" alt="Product 1" class="aproduct-image">
                        </a>
                        <div class="aproduct-info">
                            <h3 class="aproduct-title">Turkish Bath Towels</h3>
                            <p class="aproduct-description">Turkish Towels (70 x 40 Inches)<br>₹ 125/ Piece</p>                    
                            <button class="aadd-to-cart">
                                <!-- <i class="fa-solid fa-cart-shopping acart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <span class="abutton-text">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                    <div class="aproduct-card" >
                        <a href="/products/product-1" class="product-link">
                            <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458430624/WF/XB/HA/145876533/grey-minimalist-interior-design-instagram-post-5-500x500.png" alt="Product 1" class="aproduct-image">
                        </a>
                        <div class="aproduct-info">
                            <h3 class="aproduct-title">Turkish Bath Towels</h3>
                            <p class="aproduct-description">Turkish Towels (70 x 40 Inches)<br>₹ 125/ Piece</p>                    
                            <button class="aadd-to-cart">
                                <!-- <i class="fa-solid fa-cart-shopping acart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <span class="abutton-text">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                    
                   
                </div>
        
                <div class="aproduct-grid hidden" id="cushion-cover">
                    <!-- Similar structure for Cushion Cover products -->
                </div>
        
                <div class="aproduct-grid hidden" id="table-runner">
                    <!-- Similar structure for Table Runner products -->
                </div>
        
                <div class="aproduct-grid hidden" id="bath-towels">
                    <!-- Similar structure for Bath Towels products -->
                </div>
            </div></div>
        </section>

        <img src="img/headimg1.webp" alt="Responsive Image" class="responsive-image wow fadeInUp" style="object-fit: fill;" data-wow-delay="0.1s">
        <section class="product-slider" style="padding-top: 15px;padding-bottom: 15px;">
            <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
                <!-- News & Events Section Title -->
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px; height:auto;">
                    <h5 class="fw-bold text-primary text-uppercase">New Arrivals</h5>    
                    <!-- Blue bar container -->
                    <div class="blue-bar">
                        <div class="moving-box"></div>  <!-- Small white rectangle -->
                    </div>
                </div>				
            </div>
            <div class="slider-container">
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.3s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 1</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.5s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 2</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.7s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 3</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.9s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 4</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.3s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 5</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.3s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 6</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <!-- Repeat similar product-card divs for other products -->
            </div>
          
            <button class="slider-nav prev">&lt;</button>
            <button class="slider-nav next">&gt;</button>
        </section>

        <img src="img/headimg1.webp" alt="Responsive Image" class="responsive-image wow fadeInUp" style="object-fit: fill;" data-wow-delay="0.1s">
        <section class="product-slider" style="padding-top: 15px;padding-bottom: 15px;">
            <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
                <!-- News & Events Section Title -->
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px; height:auto;">
                    <h5 class="fw-bold text-primary text-uppercase">Best Sellers</h5>    
                    <!-- Blue bar container -->
                    <div class="blue-bar">
                        <div class="moving-box"></div>  <!-- Small white rectangle -->
                    </div>
                </div>				
            </div>
            <div class="slider-container">
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.3s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 1</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.5s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 2</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.7s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 3</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.9s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 4</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.3s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 5</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <div class="product-card aproduct-card wow fadeInUp" data-wow-delay="0.3s">
                    <div class="discount-badge">25% OFF</div>

                    <a href="/products/product-1" class="product-link">
                        <img src="img/p1.webp" alt="Product 1" class="product-image aproduct-image">
                    </a>
                    <div class="product-info aproduct-info">
                        <h3 class="product-title aproduct-title">Product 6</h3>
                        <p class="product-description aproduct-description">Description of product 1<br>₹ 125/ Piece</p>
                                             
                        <button class="add-to-cart aadd-to-cart">
                            <i class="fa-solid fa-cart-shopping cart-icon"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="button-text abutton-text">Add to Cart</span>
                        </button>
                    </div>
                </div>
                <!-- Repeat similar product-card divs for other products -->
            </div>
          
            <button class="slider-nav prev">&lt;</button>
            <button class="slider-nav next">&gt;</button>
        </section>
        
        <section class="video-gallery py-5">
            <div class=" wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Video Gallery</h5>
                    <div class="blue-bar">
                        <div class="moving-box"></div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row g-4">
                  <!-- Video 1 -->
                  <div class="col-6 col-sm-6 col-md-4 col-lg-2 video-container">
                    <video class="w-100 video-anim" data-bs-toggle="modal" data-bs-target="#videoModal1" autoplay loop muted>
                      <source src="img/videosample.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>    
                  </div>
                  <!-- Video 2 -->
                  <div class="col-6 col-sm-6 col-md-4 col-lg-2 video-container">
                    <video class="w-100 video-anim" data-bs-toggle="modal" data-bs-target="#videoModal2" autoplay loop muted>
                      <source src="img/videosample.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <!-- Video 3 -->
                  <div class="col-6 col-sm-6 col-md-4 col-lg-2 video-container">
                    <video class="w-100 video-anim" data-bs-toggle="modal" data-bs-target="#videoModal3" autoplay loop muted>
                      <source src="img/videosample.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <!-- Video 4 -->
                  <div class="col-6 col-sm-6 col-md-4 col-lg-2 video-container">
                    <video class="w-100 video-anim" data-bs-toggle="modal" data-bs-target="#videoModal4" autoplay loop muted>
                      <source src="img/videosample.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <!-- Video 5 -->
                  <div class="col-6 col-sm-6 col-md-4 col-lg-2 video-container">
                    <video class="w-100 video-anim" data-bs-toggle="modal" data-bs-target="#videoModal5" autoplay loop muted>
                      <source src="img/videosample.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <!-- Video 6 -->
                  <div class="col-6 col-sm-6 col-md-4 col-lg-2 video-container">
                    <video class="w-100 video-anim" data-bs-toggle="modal" data-bs-target="#videoModal6" autoplay loop muted>
                      <source src="img/videosample.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                </div>
              </div>
   
            <!-- Modals -->
            <div class="modal fade" id="videoModal1" tabindex="-1" aria-labelledby="videoModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="videoModalLabel1">Video 1</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <video  controls autoplay loop muted class="w-100 video-height">
                        <source src="img/videosample.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                    </div>
                  </div>
                </div>
              </div>
              
          
            <!-- Repeat modals for Video 2 to Video 6 -->
            <!-- Example for Video 2 -->
            <div class="modal fade" id="videoModal2" tabindex="-1" aria-labelledby="videoModalLabel2" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel2">Video 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <video controls autoplay loop muted class="w-100 video-height">
                      <source src="img/videosample.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="videoModal3" tabindex="-1" aria-labelledby="videoModalLabel2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="videoModalLabel3">Video 3</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <video controls autoplay loop muted class="w-100 video-height">
                        <source src="img/videosample.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="videoModal4" tabindex="-1" aria-labelledby="videoModalLabel2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="videoModalLabel4">Video 4</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <video controls autoplay loop muted class="w-100 video-height">
                        <source src="img/videosample.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="videoModal5" tabindex="-1" aria-labelledby="videoModalLabel2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="videoModalLabel5">Video 5</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <video controls autoplay loop muted class="w-100 video-height">
                        <source src="img/videosample.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="videoModal6" tabindex="-1" aria-labelledby="videoModalLabel2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="videoModalLabel6">Video 6</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <video controls autoplay loop muted class="w-100 video-height">
                        <source src="img/videosample.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                    </div>
                  </div>
                </div>
              </div>
          
            <!-- Add similar modal structure for Videos 3, 4, 5, and 6 -->
          </section>   
  
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5" style="padding-left: 35px;">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4" style="font-family: 'Brush Script MT', cursive;">Our Location</h3>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>66, Mettu Street, Karur, TN, India</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 9600362903</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>bigmoonrknd@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="mailto:bigmoonrknd@gmail.com">
                                <i class="fas fa-envelope" style="font-size: 20px;"></i>
                            </a>
                            <a class="btn btn-outline-light btn-social" href="https://wa.me/+919600362903" target="_blank">
                                <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
                            </a>
                            
                            <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/bigmoon_homify/?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw%3D%3D"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.amazon.in/s?me=A22U1QWK6VZ1QN&fbclid=PAZXh0bgNhZW0CMTEAAaaj4vKNNPZNJ494Q7AhNWU3b2j92mFRfiVCF8ildciR1ArwVV1nVbdyF1s_aem_ZmFrZWR1bW15MTZieXRlcw&ref=sf_seller_app_share_new">
                                <i class="fab fa-amazon"></i>
                            </a>
                            <a class="btn btn-outline-light btn-social" href="https://www.flipkart.com">
                                <img src="img/flipkart.png" alt="Flipkart" style="width: 20px; height: 20px;">
                            </a>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4" style="font-family: 'Brush Script MT', cursive;">Home Furnishings</h3>
                        <a class="btn btn-link text-white-50" href="#">Cotton Towels</a>
                        <a class="btn btn-link text-white-50" href="#">Pillow Covers</a>
                        <a class="btn btn-link text-white-50" href="#">Table Covers</a>
                        <a class="btn btn-link text-white-50" href="#">Cotton Bedsheets</a>
                        <a class="btn btn-link text-white-50" href="#">Bed Quilts</a>
                        <a class="btn btn-link text-white-50" href="#">Cosmetic Pouch</a>
                        <a class="btn btn-link text-white-50" href="#">Travel Pouch</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4" style="font-family: 'Brush Script MT', cursive;">Baby Essentials</h3>
                        <a class="btn btn-link text-white-50" href="#">Baby Swadles</a>
                        <a class="btn btn-link text-white-50" href="#">Baby Wipes</a>
                        <a class="btn btn-link text-white-50" href="#">Baby Napkins</a>
                        <a class="btn btn-link text-white-50" href="#">Baby Towels</a>
                        <a class="btn btn-link text-white-50" href="#">Baby Blankets</a>
                    </div>
                    <div class="col-lg-3 col-md-6" >
                        <h3 class="text-white mb-4" style="font-family: 'Brush Script MT', cursive;">Newsletter</h3>
                        <p>For all latest product updates, let us know your mail!</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Enter</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom section -->
            <div class="container text-center pt-4 pb-4">
                <div class="copyright">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-3 mb-md-0">
                            <a class="border-bottom" href="index.html">BigMoon Rknd</a>, Designed &
                            <!--/* This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. */-->
                            All Rights Reserved by &copy; Jayalakshmi & Durga</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <div id="modal" class="amodal">
        <div class="amodal-content">
            <span id="closeModalBtn" class="aclose">&times;</span>
            <div class="amodal-header">
                <img src="img/orderhistory_banner.png" alt="Modal Header Image" class="amodal-image">
            </div>
            <div class="amodal-body" >
                <form id="userDetailsForm">
                    <label class="alabel" for="email">Email:</label>
                    <input class="ainput" type="email" id="email" name="email" required>
                    <label class="alabel" for="mobile">Mobile Number:</label>
                    <input class="ainput" type="tel" id="mobile" name="mobile" required>
                    <center>
                        <button type="submit" class="abutton" style="align-items: center; justify-content: center;">Submit</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
   
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
        <!-- JavaScript Libraries -->
    
</body>
</html>