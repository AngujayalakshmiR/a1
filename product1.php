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
<style>
    .row {
    margin-left: 0 !important;
    margin-right: 0 !important;
}
.container-xxl,
.container-fluid {
    padding: 0;
    margin: 0 auto;
    width: 100%;
}
.container, .container-fluid, .container-xxl {
    width: 100%;
}


.container-xxl {
    max-width: none !important;
}
@media (max-width: 576px) {
    .top-banner {
        display: none;
    }
}
.top-banner {
    background-color: #1dcce0 ; /* Bootstrap Primary Blue */
    color: #fff; /* White text */
    text-align: center;
    padding: 10px 0; /* Vertical padding */
    width: 100%; /* Full width */
    font-size: 16px; /* Adjust text size */
    font-weight: bold; /* Bold text */
}
.shopify-section {
  padding-left: 60px;
  padding-right: 60px;
  padding-bottom: 20px;
}

.scroll-container {
  overflow-x: auto; /* Enables horizontal scrolling */
  overflow-y: hidden; /* Hides vertical scrolling */
  white-space: nowrap; /* Ensures all blocks are in one line */
  scrollbar-color: #1dcce0  transparent; /* Custom scrollbar color */
  scrollbar-width: thin; /* Thin scrollbar for modern browsers */
  margin-bottom: 10px; /* Adds some space below the scroll container */
  padding-bottom: 10px; /* Adds gap between images and the scrollbar */
}


/* Webkit Scrollbar Styling */
.scroll-container::-webkit-scrollbar {
  height: 6px; /* Thin scrollbar height */
}

.scroll-container::-webkit-scrollbar-thumb {
  background-color: #1dcce0 ; /* Scrollbar thumb color */
  border-radius: 3px; /* Rounded scrollbar */
}

.scroll-container::-webkit-scrollbar-track {
  background: transparent; /* Transparent track */
}

.image-with-text-wrapper {
  display: flex;
  gap: 25px; /* Spacing between items */
}

.block {
  flex: 0 0 auto; /* Prevent blocks from shrinking or growing */
  width: 175px; /* Fixed width for images */
  text-align: center;
}

.block img {
  width: 100%;
  height: 175px;
  object-fit: cover;
  border-radius: 5px; /* Optional: Rounded corners */
}

/* Responsive Adjustments */
@media screen and (max-width: 750px) {
  .shopify-section {
    padding: 10px;
  }

  .block {
    width: 150px; /* Adjust image width for smaller screens */
  }

  .block img {
    height: 150px; /* Adjust image height for smaller screens */
  }
}
.dropdown-menu .dropdown-item:hover {
    background-color: #1dcce0 ;
    color: #fff; /* Optional: Changes the text color for better visibility */
}

/* Base styles for buttons */
.btn-light {
    border: 1px solid #1dcce0 ;
    color: #1dcce0 ;
    background-color: white;
    transition: all 0.3s ease;
}

/* Hover effect */
.btn-light:hover {
    background: linear-gradient(45deg, #1dcce0 , #1dcce0 );
    color: white;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px); /* Slight lift effect */
}

/* Icon spacing on hover (optional, for emphasis) */
.btn-light:hover i {
    margin-right: 5px; /* Slightly increase icon spacing */
}
.abtn-light {
    border: 1px solid #1dcce0 ;
    color: white;
    background: linear-gradient(45deg, #8dd1de, #1dcce0 );
    transition: all 0.3s ease;
    border-radius: 5px;
}

/* Hover effect */
.abtn-light:hover {
    background: linear-gradient(45deg, #a0d2dc, #1dcce0 );
    color: white;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px); /* Slight lift effect */
}

/* Active state during click */
.abtn-light:active {
    border: 1px solid #1da5b4  ;
    color: white;
    background: #1998a7 ;
    transition: all 0.3s ease;
    border-radius: 5px;
}

/* Permanent active state */
.abtn-light.active {
    background: #1da5b4 ; /* Darker shaded background */
    border: 1px solid #1dcce0 ;
    color: white;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); /* Slight shadow */
}

.owl-carousel-item img {
    width: 100%;
    height: 550px;
    object-fit: fill; /* Ensures consistent sizing */
}
/* Container for the entire product slider */
.product-slider {
    position: relative;
    overflow: hidden;
    width: 100%; 
    /* Ensure the slider takes up the full width of the parent container */
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease-in-out;
    width: max-content; 
    padding-right: 50px; /* Ensure the container stretches to fit the content */
    padding-left: 80px;
}


.slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #1dcce0 ;  /* Blue background */
    color: white;
    border: none;
    padding: 12px;  /* Adjust padding for better circle size */
    cursor: pointer;
    font-size: 24px;
    z-index: 10;
    border-radius: 50%;  /* Makes the button circular */
    width: 50px;  /* Fixed size */
    height: 50px;  /* Fixed size */
    display: flex;
    justify-content: center;
    align-items: center;
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}

.slider-nav:hover {
    background-color:#1dcce0 ;  /* Darker blue on hover */
}

.slider-nav:disabled {
    background-color: #d3d3d3;  /* Light gray when disabled */
    cursor: not-allowed;
}

/* Section Title Styles */
.section-title {
    position: relative;
    text-align: center;
    margin-bottom: 0px;
}

/* Blue bar beneath the title */
.blue-bar {
    position: relative;
    width: 220px;  /* Adjust width as needed */
    height: 5px;
    background-color: #1dcce0;  /* Your blue color */
    margin-top: 10px;  /* Space between title and bar */
    overflow: hidden;
    align-items: center;
    margin-left: auto;   /* Center horizontally */
    margin-right: auto;  /* Center horizontally */
}

/* Small white rectangle (moving box) */
.moving-box {
    position: absolute;
    top: 0;
    width: 18px;  /* Adjust the width of the moving box */
    height: 5px;  /* Match the height of the blue bar */
    background-color: white;  /* White color for the box */
    animation: move-box 3s ease-in-out infinite;  /* Apply animation */
}

/* Keyframes for animating the white box */
@keyframes move-box {
    0% {
        left: 0;  /* Start from the left */
    }
    50% {
        left: 100%;  /* Move to the right */
        transform: translateX(-100%);  /* Adjust for full movement */
    }
    100% {
        left: 0;  /* Move back to the left */
    }
}

/* Ensures the box-sizing applies to all elements */
*, *::before, *::after {
    box-sizing: border-box;
}

.responsive-image {
    width: 100%; /* Set width to 100% to make it responsive */
    height: 600px; /* Fixed height of 600px */
    object-fit: cover; /* Ensures the image covers the area without stretching */
    max-width: 100%; /* Ensures image doesn't stretch beyond its natural size */
    padding-top: 55px;
    padding-bottom: 55px;
}





.nav-tabss {
    list-style: none;
    display: flex;
    padding: 0;
    margin: 0;
    gap: 10px;
    flex-wrap: wrap;
}

.nav-items {
    cursor: pointer;
    padding: 10px 20px;
    background-color: #f0f0f0;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.nav-items.active {
    background-color: #1dcce0 ;
    color: white;
}


.navbar{
    z-index: 500;
}
.cart-modal {
    position: fixed;
    top: 0; /* Align to the top of the viewport */
    right: -100%; /* Fully hidden by default */
    bottom: 0; /* Extend to the bottom of the viewport */
    width: 500px; /* Default width */
    max-height: 100vh; /* Fit within the viewport height */
    background: #fff;
    box-shadow: -4px 0 10px rgba(0, 0, 0, 0.1);
    transition: right 0.3s ease-in-out; /* Smooth slide effect */
    z-index: 1000;
    overflow-y: auto;
    border-radius: 25px;
}

/* Open state */
.cart-modal.open {
    right: 0; /* Fully visible */
}

/* Close state */
.cart-modal.close {
    right: -100%; /* Fully hidden */
}
/* Cart Modal Header */
.cart-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #37afca; /* Blue background */
    padding: 15px; /* Padding for header */
    border-radius: 25px 25px 0 0; /* Rounded corners for the top */
    color: #fff; /* White text color */
}

.cart-modal-header h2 {
    font-size: 22px;
    font-weight: bold;
    margin: 0; /* Remove default margin */
    color: #fff;
}

.cart-modal-close {
    background: none;
    border: none;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    position: absolute; /* Position in the corner */
    top: 10px; /* Adjust positioning */
    right: 15px; /* Adjust positioning */
}

.cart-modal-close:hover {
    color: #37afca; /* Red color on hover */
    background-color: white;
}

/* Cart Modal Body */
.cart-modal-body {
    display: flex;
    align-items: center;  /* Center content horizontally */
    flex-direction: column; /* Ensure content stacks in a column */
    padding-top: 20px; /* Add padding around content */
    padding-bottom: 20px;
    padding-left: 0px;
    padding-right: 0px;
    text-align: center; /* Center align text */
    min-height: 300px;
    flex: 1; /* Take remaining space */
    overflow-y: auto; /* Enable scrolling if content overflows */
     /* Ensure a minimum height for the modal body */
}

/* Empty Cart Message Styling */
.cart-empty h4 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
}

.cart-empty p {
    font-size: 14px;
    margin-bottom: 10px;
}


/* Medium screens */
@media (max-width: 768px) {
    .cart-modal {
        width: 90%; /* Smaller width for medium screens */
        border-radius: 15px;
    }
}

/* Small screens (mobile) */
@media (max-width: 480px) {
    .cart-modal {
        width: 100%; /* Fullscreen width */
        top: 0; /* Fullscreen top alignment */
        bottom: 0; /* Fullscreen bottom alignment */
        border-radius: 0; /* No border radius */
    }

    .cart-modal-header {
        padding: 15px;
        font-size: 16px;
    }

    .cart-modal-body {
        padding: 10px;
    }
}


/* Additional style for the close button and header */
.cart-modal-header {
    padding: 20px;
    background-color: #2cb8d7;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart-modal-close {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
}



.cart-item-image {
    width: 110px; /* Image width */
    height: 110px; /* Set image height to 110px */
    object-fit: cover;
    border-radius: 8px;
    margin-right: 15px; /* Adjusted margin for spacing */
}

.cart-modal-body {
    padding: 0; /* Remove extra padding from the modal body */
}




.quantity-controls {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 8px;
    margin-top: 8px;
}


.cart-item-title {
    font-size: 16px;
    font-weight: bold;
}

.cart-item-description {
    font-size: 14px;
    color: #555;
}

.cart-item-price {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-top: 4px;
}

.cart-item {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 10px;
    padding-left: 2px;
    padding-right: 2px;
    border-bottom: 1px solid #ddd;
    position: relative;
}

.cart-item-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 4px;
    flex-grow: 1;
    width: calc(100% - 20px); /* Leave space for image and delete button */
}

.cart-item-remove {
    position: absolute;
    top: 10px; /* Align to the top */
    right: 10px; /* Align to the right */
    font-size: 16px;
    color: #ff4d4d;
    cursor: pointer;
}

.cart-item-remove:hover {
    color: #ff0000;
}

.quantity-controls {
    position: absolute; /* Fix it at the bottom right */
    bottom: 10px;
    right: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.quantity-controls button {
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    padding: 4px 8px;
    cursor: pointer;
    font-size: 14px;
    border-radius: 4px;
}

.quantity-controls button:hover {
    background-color: #ddd;
}

.item-quantity {
    font-size: 14px;
    font-weight: bold;
}







/* Additional style for the close button and header */
.cart-modal-header {
    padding: 20px;
    background-color: #2cb8d7;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart-modal-close {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
}


.cart-item-image {
    width: 110px;
    height: 110px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 15px;
}

/* Empty Cart Message Styling */
.cart-empty {
    display: none; /* Hide initially */
    text-align: center;
}

.cart-empty h4 {
    font-size: 16px;
    font-weight: bold;
}

.cart-empty p {
    font-size: 14px;
    margin-bottom: 10px;
}

video {
    border-radius: 15px;
    height: 450px; /* Increase the video height */
    object-fit: fill;
  }

  /* Scroll-down animation for video */
  .video-anim {
    opacity: 0;
    transform: translateY(100px);
    animation: scroll-down 1s ease-out forwards;
  }

  @keyframes scroll-down {
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }


  /* Adjust modal width and height */
.modal-dialog {
  max-width: 300px; /* Reduces the width of the modal */
  width: 100%;
  align-items: center; /* You can use percentage for responsiveness */
}

.modal-content {
  height: 100%; /* Increases the height of the modal */
}

.modal-body {
  height: 100%; /* Makes sure the video fills the modal body */
  display: flex;
  justify-content: center;
  align-items: center;
}

/* vedio mobile view */
/* Media Queries for Mobile */
@media (max-width: 768px) {
  /* Hide all videos except the first 2 */
  .video-container:nth-child(n+3) {
    display: none;
  }

  /* Reduce the height of videos on mobile */
  .video-anim {
    height: 330px; /* Adjust as needed */
    object-fit: cover; /* Ensure the videos maintain aspect ratio */
  }
}
.whatsapp-icon {
  position: fixed;
  bottom: 40px;
  left: 20px;
  z-index: 1000;
}

.whatsapp-icon a img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
}

.whatsapp-icon a img:hover {
  transform: scale(1.1);
}
.product-slider {
    position: relative;
    overflow: hidden;
    width: 100%; 
    /* Ensure the slider takes up the full width of the parent container */
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease-in-out;
    width: max-content; 
    padding-right: 50px; /* Ensure the container stretches to fit the content */
    padding-left: 25px;
}

/* Product Card */
.product-card {
    position: relative;
    min-width: 305px;
    max-height: 550px;
    box-sizing: border-box;
    margin: 10px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}


/* Hover Effects */
.product-card:hover {
    transform: scale(1.05); /* Slight zoom on hover */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); /* Add shadow */
    border-color: #1dcce0 ; /* Change border color */
}


/* Product Image */
.product-image {
    width: 305px;
    height: 280px;
    border-bottom: 1px solid #ddd; /* Separator between image and info */
}

/* Product Info */
.product-info {
    text-align: center;
    padding: 15px;
}

/* Product Title */
.product-title {
    font-size: 18px;
    color: #333; /* Dark gray */
    margin-bottom: 10px;
}

/* Product Description */
.product-description {
    font-size: 14px;
    color: #777; /* Light gray */
    margin-bottom: 15px;
}

/* Add to Cart Button */
.add-to-cart {
    background-color: #1dcce0 ; /* Blue background */
    color: white; /* White text */
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px; /* Rounded corners */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */
    display: inline-flex; /* Align icon and text horizontally */
    align-items: center; /* Vertically center icon and text */
    justify-content: center; /* Center text */
    position: relative; /* Allows for absolute positioning of icon */
    font-weight: bold; /* Make the text bold */
    text-align: center; /* Ensure text inside the button is centered */
    padding-right: 35px;
}

/* Cart Icon */
.cart-icon {
    font-size: 18px; /* Icon size */
    color: white; /* White icon */
    margin-right: 10px; /* Space between icon and text */
    opacity: 0; /* Hidden by default */
    position: absolute; /* Position the icon absolutely inside the button */
    left: 10px; /* Position to the left of the button */
    transition: opacity 0.3s ease, transform 0.3s ease; /* Smooth reveal */
    padding-left: 5px;
    padding-right: 10px;
}

/* Add to Cart Hover */
.add-to-cart:hover {
    background-color: #1dcce0 ; /* Darker blue on hover */
    transform: scale(1.1); /* Slight button scale */
    padding-right: 15px;
}

/* Show Cart Icon on Hover */
.add-to-cart:hover .cart-icon {
    opacity: 1; /* Show icon */
    transform: translateX(0); /* Move to original position */
    padding-right: 10px;
}

/* Button Text */
.button-text {
    display: inline-block; /* Ensures text is treated as a block element within the button */
    visibility: visible; /* Ensure text stays visible */
}




.slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #1dcce0 ;  /* Blue background */
    color: white;
    border: none;
    padding: 8px;  /* Adjust padding for better circle size */
    cursor: pointer;
    font-size: 24px;
    z-index: 10;
    border-radius: 50%;  /* Makes the button circular */
    width: 50px;  /* Fixed size */
    height: 50px;  /* Fixed size */
    display: flex;
    justify-content: center;
    align-items: center;
}

.prev {
    left: 5px;
}

.next {
    right: 5px;
}

.slider-nav:hover {
    background-color:#1dcce0 ;  /* Darker blue on hover */
}

.slider-nav:disabled {
    background-color: #d3d3d3;  /* Light gray when disabled */
    cursor: not-allowed;
}

/* Section Title Styles */
.section-title {
    position: relative;
    text-align: center;
}
@media (max-width: 901px) {
    .product-card {
        width: 74px;
        margin-bottom: 20px;
    }

    .product-info {
        padding: 10px;
    }

    .discount-badge {
        top: 5px;
        left: 5px;
    }

    .product-title {
        font-size: 16px;
    }

    .product-description {
        font-size: 12px;
    }

    .add-to-cart {
        padding: 8px 16px;
    }

    .slider-nav {
        font-size: 18px;
    }
}

/* Medium Devices (Tablet) */
@media (min-width: 301px) and (max-width: 400px) {
    .product-card {
        width: 25px;
    }

    .slider-nav {
        font-size: 18px;
    }
}
/* Medium Devices (Tablet) */
@media (min-width: 401px) and (max-width: 500px) {
    .product-card {
        width: 25px;
    }

    .slider-nav {
        font-size: 10px;
    }
}

/* Large Devices (Desktop) */
@media (min-width: 993px) {
    .product-card {
        width: 23%;
    }

    .slider-nav {
        font-size: 22px;
    }
}

/* Extra Large Devices (Large Desktop) */
@media (min-width: 1200px) {
    .product-card {
        width: 20%;
    }
}
*, *::before, *::after {
    box-sizing: border-box;
}
.discount-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #1dcce0 ; /* Blue color */
    color: white;
    font-size: 14px;
    font-weight: bold;
    padding: 10px;
    border-radius: 50%; /* Makes it circular */
    width: 50px; /* Fixed size for circle */
    height: 50px; /* Fixed size for circle */
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow */
    z-index: 2; /* Ensure it appears above other elements */
}

.responsive-image {
    width: 100%; /* Set width to 100% to make it responsive */
    height: 600px; /* Fixed height of 600px */
    object-fit: cover; /* Ensures the image covers the area without stretching */
    max-width: 100%; /* Ensures image doesn't stretch beyond its natural size */
    padding-top: 55px;
    padding-bottom: 55px;
}
@media (max-width: 576px) {
    .responsive-image {
        width: 100%;
        height: 300px;
    }
}
/* General styles for product cards */
.product-card {
    display: inline-block;
    vertical-align: top;
    text-align: center;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Mobile-specific styles for screens below 550px */
@media screen and (max-width: 550px) {
    .slider-container {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        margin-left: 10px;
        gap: 10px;
        padding: 20px 0;
        padding-top: 0px;
    }
    .product-card {
        flex: 0 0 auto;
        min-width: 170px !important;
        margin-right: 0px;
        height: 360px !important;
        scroll-snap-align: center;
    }
    .product-card img {
        max-width: 100%;
        height: 200px;
    }
    .product-info {
        padding: 10px;
    }
    .discount-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #1dcce0 ; /* Blue color */
    color: white;
    font-size: 11px;
    font-weight: bold;
    padding: 10px;
    border-radius: 50%; /* Makes it circular */
    width: 40px; /* Fixed size for circle */
    height: 40px; /* Fixed size for circle */
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow */
    z-index: 2; /* Ensure it appears above other elements */
}
.nav-tabss{
    justify-content: center;
    align-items: center;
}

.responsive-image{
    padding-top: 0px;
    padding-bottom: 20px;
}
.section-title{
    margin-bottom: 5px !important;
}
.video-gallery{
    padding: 2px 0 !important;
}
.modal-dialog {
  max-width: 300px; /* Reduces the width of the modal */
  width: 100%;
  align-items: center; /* You can use percentage for responsiveness */
  justify-content: center;
  left: 40px;
}
.modal-body {
  height: 100%; /* Makes sure the video fills the modal body */
  display: flex;
  justify-content: center;
  align-items: center;
}
.modal{
    align-items: center;
    justify-content: center;
}
}

/* Optional hover effects */
.product-card:hover {
    transform: scale(1.05);
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
}
.text-primary{
    color: #1dcce0 !important;
}
.btn-primary{
    background-color: #1dcce0 !important;
}

.quantity-controls {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .quantity-controls button {
            padding: 4px 8px;
            font-size: 16px;
        }

        .quantity-controls input {
            width: 35px;
            text-align: center;
            font-size: 16px;
        }
</style>
<style>


.abutton {
  padding: 10px 20px;
  background-color: #555;
  color: white;
  border: none;
  cursor: pointer;
}

.abutton:hover {
  background-color: #777;
}

/* Modal styles */
.amodal {
  display: none; /* Hidden by default */
  position: absolute;
  z-index: 100000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.amodal-content {
  background-color: white;
  margin: 10% auto;
  width: 40%;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.amodal-header {
  height: 30%;
  overflow: hidden;
  padding: 0px 0px;
}

.amodal-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 10px;
}

.amodal-body {
  height: 70%;
  padding-left: 60px;
  padding-right: 60px;
  padding-top: 10px;
  padding-bottom: 10px;
  display: flex;
  flex-direction: column;
}

.alabel {
  margin-top: 10px;
}

.ainput {
  padding: 8px;
  margin-bottom: 10px;
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.abutton[type="submit"] {
  background-color: #3e23c8;
  color: white;
  padding: 10px;
  padding-left: 20px;
  padding-right: 20px;
  border-radius: 5px;
  border: none;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  float: center;
}

.abutton[type="submit"]:hover {
  background-color: #5740cdc7;
  color: white;
}

.aclose {
  position: absolute;
  top: 130px;
  right: 400px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}

.aclose:hover,
.aclose:focus {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}
@media (min-width:1400px) and (max-width: 1500px){
    .aclose {
  position: absolute;
  top: 150px;
  right: 470px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:1300px) and (max-width: 1400px) {
.aclose {
  position: absolute;
  top: 130px;
  right: 430px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:1200px) and (max-width: 1300px) {
.aclose {
  position: absolute;
  top: 125px;
  right: 395px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:1100px) and (max-width: 1200px){
    .aclose {
  position: absolute;
  top: 115px;
  right: 365px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:1000px) and (max-width: 1100px){
    .aclose {
  position: absolute;
  top: 110px;
  right: 340px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:900px) and (max-width: 1000px){
    .aclose {
  position: absolute;
  top: 95px;
  right: 310px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}@media (min-width:800px) and (max-width: 900px){
    .aclose {
  position: absolute;
  top:80px;
  right: 270px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:700px) and (max-width: 800px){
    .aclose {
  position: absolute;
  top:70px;
  right: 245px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:600px) and (max-width: 700px){
    .aclose {
  position: absolute;
  top:60px;
  right: 108px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:500px) and (max-width: 600px){
    .aclose {
  position: absolute;
  top:50px;
  right: 100px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:400px) and (max-width: 500px){
    .aclose {
  position: absolute;
  top:40px;
  right: 30px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
@media (min-width:300px) and (max-width: 400px){
    .aclose {
  position: absolute;
  top:30px;
  right: 30px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
  color: #fffefe;
  z-index: 100;
}}
/* Responsive Styles */
@media screen and (max-width: 700px) {
  .amodal-content {
    width: 70%;
  }

  .amodal-body {
    padding: 15px;
  }

  .abutton {
    padding: 8px 16px;
  }

  .abutton[type="submit"] {
    padding: 10px;
  }

  
}

@media screen and (max-width: 500px) {
  .amodal-content {
    width: 90%;
  }

  .amodal-body {
    padding: 10px;
  }

  .abutton {
    padding: 6px 12px;
  }

  .abutton[type="submit"] {
    padding: 8px;
  }

  
}
</style>
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
                <h1 class="m-0 text-primary">Bigmoon</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                      
        <div class="nav-item d-flex align-items-center ">
                    <a href="index.php" class="btn abtn-light   me-2 ">
                        Home Furnishings
                    </a>
                </div>
                <div class="nav-item d-flex align-items-center">
                    <a href="babyessentials.php" class="btn abtn-light  me-2 ">
                        Baby Essentials
                    </a>
                </div>
                    <!-- Baby Products Dropdown 
                    <div class="nav-item dropdown">
                        <a href="babyessentials.html" class="nav-link ">
                            Baby Essentials
                        </a>
                         
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="baby-blankets.html" class="dropdown-item">Baby Blankets</a>
                            <a href="baby-pillows.html" class="dropdown-item">Baby Pillows</a>
                            <a href="baby-towels.html" class="dropdown-item">Baby Towels</a>
                        </div> -->
                    
                   
                        <a href="ourstories.html" class="nav-link ">
                            Our Story
                        </a>
                        
                    <a href="blogs.html" class="nav-item nav-link ">Blogs</a>
                   
                        <a href="bigmoontestimonial.html" class="nav-link ">
                            Testimonial
                        </a>
                    <a href="getintouch.html" class="nav-item nav-link">Get in Touch</a>
                    <!--
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="facility.html" class="dropdown-item">School Facilities</a>
                            <a href="team.html" class="dropdown-item">Popular Teachers</a>
                            <a href="call-to-action.html" class="dropdown-item">Become A Teachers</a>
                            <a href="appointment.html" class="dropdown-item">Make Appointment</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                        </div>
                    </div>-->
        
                    
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

<style>


    .cart-modal-footer {
    position: sticky; /* Keep the footer fixed at the bottom of the modal */
    bottom: 10px;
    background-color: transparent;
    padding: 10px;
    text-align: center;
    z-index: 1000;
    }
    .checkout-btn {
    display: none; /* Initially hidden */
    padding: 0.8rem 2rem;
    font-size: 1rem;
    font-weight: bold;
    border: none;
    border-radius: 50px;
    background-color: rgba(0, 123, 255, 0.7);
    color: #fff;
    cursor: pointer;
    animation: glow 1.5s infinite ease-in-out; /* Infinite glowing animation */
}

@keyframes glow {
    0% {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.7);
    }
    50% {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.9), 0 0 10px rgba(0, 123, 255, 0.6);
    }
    100% {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.7);
    }
}

.checkout-btn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.checkout-btn.show {
    display: inline-block; /* Show when items are in the cart */
}


@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.text-white-50{
            text-decoration: none;
        }
        .product-image-preview {
            width: 100%;
            height: 450px;
            border: 3px solid #0eb5d6;
            border-radius: 20px;
        }
        .product-thumbnails img {
            width: -50%;
            height: auto;
            cursor: pointer;
            border: 3px solid transparent;
            border-radius: 10px;
        }
        .product-thumbnails img:hover,
        .product-thumbnails img.active {
            border-color: #0eb5d6;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn-cart,
        .btn-buy {
            background-color: #0eb5d6;
            color: white;
            font-weight: bold;
            width: 100%;
            border-radius: 5px;
        }
        .btn-cart:hover,
        .btn-buy:hover {
            background-color: #5dc1e6;
        }

        .custom-btn {
        border-color: #5dc1e6;
    }

    .custom-btn:hover {
        background-color: #0eb5d6;
        border-color: #0eb5d6;
    }

    /* Optional: You can also modify the focus state if needed */
    .custom-btn:focus {
        box-shadow: 0 0 0 0.2rem rgba(14, 181, 214, 0.5);
    }
    .pp::placeholder{
        color: #777;
    }
</style>
<div class="container my-5">
    <div class="row aproduct-card">
        <!-- Left Side: Images -->
        <div class="col-md-6">
            <div>
                 <a href="/products/product-1" class="product-link">
                 <img src="img/p1.webp"alt="Product Preview" id="bigImage" class="aproduct-image product-image-preview">
                 </a>
            </div>
            <div class="mt-3 product-thumbnails  gap-2">
                <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458461121/MC/ZD/YY/145876533/grey-minimalist-interior-design-instagram-post-7-500x500.png" 
                     alt="Thumbnail" onclick="changeImage(this)" class="active" style="width: 70px;height: 70px;">
                <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458461121/MC/ZD/YY/145876533/grey-minimalist-interior-design-instagram-post-7-500x500.png" 
                     alt="Thumbnail" onclick="changeImage(this)" style="width: 70px;height: 70px;">
                <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458453990/ES/MG/FL/145876533/grey-minimalist-interior-design-instagram-post-14-500x500.png" 
                     alt="Thumbnail" onclick="changeImage(this)" style="width: 70px;height: 70px;">
                <img src="https://5.imimg.com/data5/SELLER/Default/2024/10/458453990/ES/MG/FL/145876533/grey-minimalist-interior-design-instagram-post-14-500x500.png" 
                     alt="Thumbnail" onclick="changeImage(this)" style="width: 70px;height: 70px;">
                     
            </div>
        </div>
        
        <!-- Right Side: Details -->
        <div class="col-md-6 ">
            <h2 class="aproduct-title">Turkish Bath Towels</h2>
            <p class="text-muted">Category: Cotton Towels</p>
            <p class="mt-3 aproduct-description">Luxuriously soft Turkish bath towels, perfect for every home. <br>           
                <span class="text-danger" style="font-size: 24px;"><b>₹125</b> <span class="ms-3" style="color:#0eb5d6;font-size: 18px;"><del>₹150</del></span></span>
            </p>
            <p><strong>Size:</strong> Large</p>
            <p><strong>Color:</strong> <span style="color:#0eb5d6;">Sky Blue</span></p>
            
            <!-- Quantity Selector -->
            <div class="quantity-selector mt-3">
                <button class="btn btn-outline-primary custom-btn" onclick="updateQuantity(-1)">-</button>
                <input id="quantity" value="1" class="text-center" style="width: 60px; border: 3px solid #5dc1e6; border-radius:5px" min="1" max="100" onchange="validateQuantity()">
                <button class="btn btn-outline-primary custom-btn" onclick="updateQuantity(1)">+</button>
            </div>

            <!-- Add to Cart Button -->
            <button class="btn btn-primary mt-3 aadd-to-cart">Add to Cart</button>
        </div>
    </div>
</div>

<!-- Carousel End -->
<img src="img/headimg1.webp" alt="Responsive Image" class="responsive-image wow fadeInUp" style="object-fit: fill;" data-wow-delay="0.1s">
        <section class="product-slider" style="padding-top: 15px;padding-bottom: 15px;">
            <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
                <!-- News & Events Section Title -->
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px; height:auto;">
                    <h5 class="fw-bold text-primary text-uppercase">Best Seller</h5>    
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
          <!-- Footer Start -->
          <div class="container-fluid text-white-50 footer pt-5 mt-5 wow fadeIn" style="background-color: #103741 !important;" data-wow-delay="0.1s">
            <div class="container py-5" style="padding-left: 35px;">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Our Location</h3>
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
                        <h3 class="text-white mb-4">Home Furnishings</h3>
                        <a class="btn btn-link text-white-50" href="#">Cotton Towels</a>
                        <a class="btn btn-link text-white-50" href="#">Pillow Covers</a>
                        <a class="btn btn-link text-white-50" href="#">Table Covers</a>
                        <a class="btn btn-link text-white-50" href="#">Cotton Bedsheets</a>
                        <a class="btn btn-link text-white-50" href="#">Bed Quilts</a>
                        <a class="btn btn-link text-white-50" href="#">Cosmetic Pouch</a>
                        <a class="btn btn-link text-white-50" href="#">Travel Pouch</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Baby Essentials</h3>
                        <a class="btn btn-link text-white-50" href="#">Baby Swadles</a>
                        <a class="btn btn-link text-white-50" href="#">Baby Wipes</a>
                        <a class="btn btn-link text-white-50" href="#">Baby Napkins</a>
                        <a class="btn btn-link text-white-50" href="#">Baby Towels</a>
                        <a class="btn btn-link text-white-50" href="#">Baby Blankets</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Newsletter</h3>
                        <p class="text-white-50" style="color: #777;">For all latest product updates, let us know your mail!</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control pp bg-transparent w-100 py-3 ps-4 pe-5" style="color: #fcfafa;" type="text" placeholder="Your email">
                            <button type="button" class="btn py-2 position-absolute top-0 end-0 mt-2 me-2" style="background-color: #0eb5d6;color: white;">Enter</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom section -->
            <div class="container text-center pt-4 pb-4">
                <div class="copyright">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-3 mb-md-0">
                            <a class="border-bottom" href="index.html" style="text-decoration: none;">BigMoon Rknd</a>, Designed &
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            All Rights Reserved by &copy; Jayalakshmi & Durga</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="background-color: #0eb5d6;border-color: #0eb5d6;"><i class="bi bi-arrow-up"></i></a>
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