
// Get modal elements
const modal = document.getElementById('modal');
const openModalBtn = document.getElementById('openModalBtn'); // Correctly reference the button
const closeModalBtn = document.getElementById('closeModalBtn');

// Show the modal
openModalBtn.onclick = function () {
    modal.style.display = 'block';
};

// Close the modal
closeModalBtn.onclick = function () {
    modal.style.display = 'none';
};

// Close the modal if user clicks outside of it
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

// Handle form submission
document.getElementById('userDetailsForm').onsubmit = function (event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const mobile = document.getElementById('mobile').value;

    // Send data via AJAX
    fetch('validate_user.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, mobile }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // Redirect to order history page with fetched data
                window.location.href = 'orderhistory.php?email=' + encodeURIComponent(email) + '&mobile=' + encodeURIComponent(mobile);
   
            } else {
                alert(data.message);
            }
        })
        .catch((error) => console.error('Error:', error));
};
document.querySelectorAll('.product-slider').forEach((slider) => {
const prevButton = slider.querySelector('.prev');
const nextButton = slider.querySelector('.next');
const sliderContainer = slider.querySelector('.slider-container');
const productCards = slider.querySelectorAll('.product-card');

let index = 0;
let cardWidth = productCards[0].offsetWidth + 20; // Card width + margin
const totalCards = productCards.length;

function getVisibleCards() {
return Math.floor(slider.offsetWidth / productCards[0].offsetWidth);
}

function recalculateMaxIndex() {
cardWidth = productCards[0].offsetWidth + 20; // Update in case of resizing
const visibleCards = getVisibleCards();
return Math.max(0, totalCards - visibleCards);
}

let maxIndex = recalculateMaxIndex();

// Update slider position
function updateSlider() {
const offset = Math.min(index, maxIndex) * cardWidth; // Prevent overflow
sliderContainer.style.transition = "transform 0.3s ease";
sliderContainer.style.transform = `translateX(-${offset}px)`;

// Disable/enable buttons
prevButton.disabled = index === 0;
nextButton.disabled = index >= maxIndex;
}

// Button click handlers
prevButton.addEventListener('click', () => {
if (index > 0) index--;
updateSlider();
});

nextButton.addEventListener('click', () => {
if (index < maxIndex) index++;
updateSlider();
});

// Touch swipe handlers
let startX = 0;
let currentX = 0;

function handleTouchStart(e) {
startX = e.touches[0].clientX;
sliderContainer.style.transition = "none"; // Disable transition during touch
}

function handleTouchMove(e) {
currentX = e.touches[0].clientX;
const deltaX = startX - currentX;
const offset = index * cardWidth + deltaX;

// Prevent scrolling beyond bounds
const maxOffset = maxIndex * cardWidth;
const constrainedOffset = Math.min(Math.max(offset, 0), maxOffset);

sliderContainer.style.transform = `translateX(-${constrainedOffset}px)`;
}

function handleTouchEnd() {
const deltaX = startX - currentX;

// Check swipe threshold
if (deltaX > 50 && index < maxIndex) {
    index++;
} else if (deltaX < -50 && index > 0) {
    index--;
}
updateSlider();
}

sliderContainer.addEventListener('touchstart', handleTouchStart);
sliderContainer.addEventListener('touchmove', handleTouchMove);
sliderContainer.addEventListener('touchend', handleTouchEnd);

// Resize handler to adjust visible cards and max index
window.addEventListener('resize', () => {
maxIndex = recalculateMaxIndex();
updateSlider();
});

// Initialize the slider
window.addEventListener('load', () => {
maxIndex = recalculateMaxIndex();
updateSlider();
});
});


let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

document.addEventListener('DOMContentLoaded', function () {
const cartBtn = document.getElementById('cart-btn');
const cartModal = document.getElementById('cart-modal');
const cartClose = document.getElementById('cart-close');
const cartItemsContainer = document.getElementById('cart-items-container');
const emptyCartMessage = document.getElementById('empty-cart-message');
const checkoutButton = document.getElementById('proceed-to-checkout');
const cartNotification = document.createElement('div');

// Add the notification div to the document
cartNotification.classList.add('cart-notification');
document.body.appendChild(cartNotification);

// Array to store cart items


// Function to show a notification message
function showNotification(message) {
cartNotification.textContent = message;
cartNotification.classList.add('show');
setTimeout(() => {
    cartNotification.classList.remove('show');
}, 2000);
}

// Function to update the cart display in the modal
function updateCartDisplay() {
if (cartItems.length === 0) {
    cartItemsContainer.innerHTML = ''; // Clear the cart items
    emptyCartMessage.style.display = 'block';
    checkoutButton.style.display = 'none'; // Hide checkout button
} else {
    emptyCartMessage.style.display = 'none'; // Hide empty cart message
    cartItemsContainer.innerHTML = cartItems.map((item, index) => `
        <div class="cart-item row position-relative">
            <!-- Image -->
            <div class="col-3">
                <img src="${item.image}" alt="${item.title}" class="cart-item-image img-fluid">
            </div>

            <!-- Title, Description, Price -->
            <div class="col-8">
                <div class="cart-item-info">
                    <h5 class="cart-item-title">${item.title}</h5>
                     <p class="cart-item-description" style="text-align:left">${item.description}</p>
                ${item.size && item.size !== "N/A" ? `<span class="cart-item-size"><strong>Size:</strong> ${item.size}</span>` : ""}
                <span class="cart-item-price">₹ ${item.price}</span>
                </div>
            </div>

            <!-- Remove Button and Quantity Controls -->
            <div class="col-1">
                <!-- Remove Button -->
                <div class="position-absolute top-0 end-0 p-2">
                    <button class="btn btn-danger" onclick="removeItem(${index})">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>

                <!-- Quantity Controls -->
                <div class="position-absolute bottom-0 end-0 p-2">
                    <div class="input-group">
                        <button class="btn btn-outline-secondary btn-decrement" onclick="decrementQuantity(${index})">-</button>
                        <input id="quantity-${index}" style="width:45px;padding:4px 8px;" value="${item.quantity}" min="1" class="form-control quantity-input" readonly />
                        <button class="btn btn-outline-secondary btn-increment" onclick="incrementQuantity(${index})">+</button>
                    </div>
                </div>
            </div>
        </div>
    `).join('');
    checkoutButton.style.display = 'block'; // Show checkout button
}

// Save the updated cart to localStorage
localStorage.setItem('cartItems', JSON.stringify(cartItems));

// Update cart count in the cart button
document.getElementById('cart-count').textContent = cartItems.length;
}

// Function to add an item to the cart
function addItemToCart(item) {
// Check if the product already exists in the cart
const existingItem = cartItems.find(cartItem => cartItem.title === item.title);
if (existingItem) {
    showNotification('The product you are trying to add is already in the cart. Please check it out.');
    return;
}

// If the item doesn't exist, add it to the cart
item.quantity = item.quantity || 1; // Set default quantity to 1
cartItems.push(item);
updateCartDisplay(); // Update cart display and cart count
showNotification('Product added to the cart successfully!');
cartModal.classList.add('open');
}

// Function to remove an item from the cart
window.removeItem = function (index) {
cartItems.splice(index, 1);
updateCartDisplay();
};

// Function to increment quantity
window.incrementQuantity = function (index) {
if (cartItems[index].quantity < 100) { // Check if quantity is less than 100
    cartItems[index].quantity++;
    updateCartDisplay();
}
};

// Function to decrement quantity
window.decrementQuantity = function (index) {
if (cartItems[index].quantity > 1) { // Ensure quantity does not go below 1
    cartItems[index].quantity--;
    updateCartDisplay();
}
};

// Open the cart modal
cartBtn.addEventListener('click', () => {
cartModal.classList.remove('close');
cartModal.classList.add('open');
updateCartDisplay();
});

// Close the cart modal
cartClose.addEventListener('click', () => {
cartModal.classList.remove('open');
cartModal.classList.add('close');
});

// Handle "Add to Cart" button click
document.querySelectorAll('.aadd-to-cart').forEach(button => {
button.addEventListener('click', function () {
    const productCard = this.closest('.aproduct-card');
    const productTitle = productCard.querySelector('.aproduct-title').textContent;
    const descriptionText = productCard.querySelector('.aproduct-description').innerHTML;
    const productSizeMatch = descriptionText.match(/<span>(.*?)<\/span>/);
    const productSize = productSizeMatch ? productSizeMatch[1] : "N/A";
    const productDescription = descriptionText.split('<br>')[0].trim();
    const descriptionHTML = productCard.querySelector('.aproduct-description').innerHTML;

// Extract price without size
    const cleanedDescription = descriptionHTML.replace(/<span>.*?<\/span>/, '').trim();
    const productPrice = cleanedDescription.split('₹')[1].trim();
    const productImage = productCard.querySelector('.aproduct-image').src;

    addItemToCart({
        title: productTitle,
        description: productDescription,
        price: productPrice,
        image: productImage,
        size: productSize
});

});
});

// Load the cart from localStorage on page load
updateCartDisplay();
});

document.addEventListener('DOMContentLoaded', function() {
    // Function to populate "All" with all products
    function populateAllProducts() {
        const allProductsContainer = document.getElementById('all-products');
        allProductsContainer.innerHTML = ''; // Clear previous content
        
        // Collect all product grids
        document.querySelectorAll('.aproduct-grid').forEach(grid => {
            // Clone the grid's children (products)
            grid.querySelectorAll('.aproduct-card').forEach(card => {
                const clonedCard = card.cloneNode(true);
                allProductsContainer.appendChild(clonedCard);
            });
        });
    }

    // Initialize the "All" products on page load
    populateAllProducts();

    // Add event listeners for navigation items
    document.querySelectorAll('.nav-items').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.nav-items').forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');

            document.querySelectorAll('.aproduct-grid').forEach(grid => grid.classList.add('hidden'));

            const category = this.dataset.category;

            if (category === 'all') {
                populateAllProducts();
                document.getElementById('all-products').classList.remove('hidden');
            } else {
                document.getElementById(category).classList.remove('hidden');
            }
        });
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const checkoutModal = document.getElementById("checkout-modal");
    const proceedToPayButton = document.getElementById("proceed-to-pay");
    const cancelButton = document.getElementById("cancel-button");
    const modalClose = document.getElementById("modal-close");
    const orderSummaryContainer = document.getElementById("order-summary-container");
    const totalAmountValue = document.getElementById("total-amount-value");
    const proceedToCheckout = document.getElementById("proceed-to-checkout");

    // Event listener for closing the modal
    modalClose.addEventListener("click", function () {
        checkoutModal.style.display = "none";
    });

    // Close modal if user clicks outside it
    window.addEventListener("click", function (event) {
        if (event.target === checkoutModal) {
            checkoutModal.style.display = "none";
        }
    });

    // Show checkout modal and populate order summary
    proceedToCheckout.addEventListener("click", function () {
        checkoutModal.style.display = "block";
        populateOrderSummary();
    });

    // Handle proceed to pay button click
    proceedToPayButton.addEventListener("click", function () {
        const form = document.getElementById("customer-details-form");

        if (form.checkValidity()) {
            Swal.fire({
                title: 'Are you sure all details are correct?',
                text: "Click Yes to proceed with payment, or No to edit the details.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonColor: '#28a745', // Green color for Yes
                cancelButtonColor: '#dc3545', // Red color for No
            }).then((result) => {
                if (result.isConfirmed) {
                    const amount = parseFloat(totalAmountValue.textContent.trim()) * 100; // Razorpay uses paise

                    const options = {
                        "key": "rzp_live_8FEUrTWd4qCbuf", // Your Razorpay Key Id
                        "amount": amount,
                        "currency": "INR",
                        "name": "BIGMOON",
                        "description": "Order Payment",
                        "handler": function (response) {
    $.ajax({
        url: 'ajax-payment.php',
        type: 'POST',
        dataType: 'json',
        data: {
            razorpay_payment_id: response.razorpay_payment_id,
            totalAmount: amount,
        },
        success: function (data) {
    if (data.status) {
        // Get customer details from the form
        var customerData = {
            customername: $('#name').val(),
            mobilenumber: $('#phone').val(),
            email: $('#email1').val(),
            address: $('#address').val(),
            district: $('#district').val(),
            state: $('#state').val(),
            pincode: $('#pincode').val(),
            productname: cartItems.map(item => item.title).join(', '),  // Concatenate product names
            qty: cartItems.map(item => item.quantity).join(', '),  // Concatenate quantities
            size: cartItems.map(item => item.size).join(', '),  // Concatenate sizes
            price: cartItems.map(item => (parseFloat(item.price) * parseInt(item.quantity))).join(', ') + ',' + cartItems.reduce((total, item) => total + (parseFloat(item.price) * parseInt(item.quantity)), 0),
            paymentstatus: 'success',
            orderdate: new Date().toISOString().slice(0, 19).replace('T', ' '),  // Current date and time
            // Replace with receipt file if needed
            
        };

        // Send customer details to the server to save in the database
        $.ajax({
            url: 'save-customer.php',  // PHP script to handle saving data
            type: 'POST',
            data: customerData,
            success: function (response) {
                Swal.fire(
                    'Success!',
                    'Payment successfully paid!',
                    'success'
                ).then(() => {
                    window.location.href = `index.php`;  // Redirect after success
                });
            },
            error: function () {
                Swal.fire('Error', 'Payment and customer details could not be saved. Please try again.', 'error');
            }
        });
    } else {
        Swal.fire('Error', 'Payment failed. Please try again.', 'error');
    }
},
        error: function () {
            Swal.fire('Error', 'Payment failed due to a network issue.', 'error');
        }
    });
},

                        "theme": {
                            "color": "#528FF0"
                        }
                    };

                    const rzp = new Razorpay(options);
                    rzp.open();
                } else {
                    checkoutModal.style.display = "block";
                }
            });
        } else {
            form.reportValidity();
        }
    });

 // Populate order summary with cart items
function populateOrderSummary() {
    const cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
    let totalAmount = 0;

    if (cartItems.length === 0) {
        orderSummaryContainer.innerHTML = "<p>Your cart is empty.</p>";
        totalAmountValue.textContent = "0";
    } else {
        orderSummaryContainer.innerHTML = cartItems.map(item => {
            const quantity = parseInt(item.quantity, 10);
            const price = parseFloat(item.price);

            if (isNaN(quantity) || isNaN(price)) {
                console.error("Invalid cart item:", item);
                return `<p style="color: red;">Invalid item data</p>`;
            }

            const itemTotal = quantity * price;
            totalAmount += itemTotal;

            // Ensure size is valid and NOT "N/A" (case insensitive, trimmed)
            let sizeDisplay = "";
            if (item.size && item.size.trim().toLowerCase() !== "n/a") {
                sizeDisplay = `<p>Size: ${item.size}</p>`;
            }

            return `
                <div class="order-item">
                    <div class="item-details">
                        <span>${item.title}</span>
                        <span>${quantity} x ₹${price.toFixed(2)}</span>
                        ${sizeDisplay} <!-- Only shows if size is valid -->
                    </div>
                    <div class="item-total">
                        ₹${itemTotal.toFixed(2)}
                    </div>
                </div>
            `;
        }).join("");

        totalAmountValue.textContent = totalAmount.toFixed(2);
    }
}




    });

stateDistrictMap = {
        "Andhra Pradesh": [  
            "Anantapur",
            "Chittoor",
            "East Godavari",
            "Guntur",
            "Krishna",
            "Kurnool",
            "Nellore",
            "Prakasam",
            "Srikakulam",
            "Visakhapatnam",
            "Vizianagaram",
            "West Godavari",
            "YSR Kadapa"
         ],
        "Arunachal Pradesh":[  
            "Tawang",
            "West Kameng",
            "East Kameng",
            "Papum Pare",
            "Kurung Kumey",
            "Kra Daadi",
            "Lower Subansiri",
            "Upper Subansiri",
            "West Siang",
            "East Siang",
            "Siang",
            "Upper Siang",
            "Lower Siang",
            "Lower Dibang Valley",
            "Dibang Valley",
            "Anjaw",
            "Lohit",
            "Namsai",
            "Changlang",
            "Tirap",
            "Longding"
         ],
        "Assam": [  
            "Baksa",
            "Barpeta",
            "Biswanath",
            "Bongaigaon",
            "Cachar",
            "Charaideo",
            "Chirang",
            "Darrang",
            "Dhemaji",
            "Dhubri",
            "Dibrugarh",
            "Goalpara",
            "Golaghat",
            "Hailakandi",
            "Hojai",
            "Jorhat",
            "Kamrup Metropolitan",
            "Kamrup",
            "Karbi Anglong",
            "Karimganj",
            "Kokrajhar",
            "Lakhimpur",
            "Majuli",
            "Morigaon",
            "Nagaon",
            "Nalbari",
            "Dima Hasao",
            "Sivasagar",
            "Sonitpur",
            "South Salmara-Mankachar",
            "Tinsukia",
            "Udalguri",
            "West Karbi Anglong"
         ],
        "Bihar": [  
            "Araria",
            "Arwal",
            "Aurangabad",
            "Banka",
            "Begusarai",
            "Bhagalpur",
            "Bhojpur",
            "Buxar",
            "Darbhanga",
            "East Champaran (Motihari)",
            "Gaya",
            "Gopalganj",
            "Jamui",
            "Jehanabad",
            "Kaimur (Bhabua)",
            "Katihar",
            "Khagaria",
            "Kishanganj",
            "Lakhisarai",
            "Madhepura",
            "Madhubani",
            "Munger (Monghyr)",
            "Muzaffarpur",
            "Nalanda",
            "Nawada",
            "Patna",
            "Purnia (Purnea)",
            "Rohtas",
            "Saharsa",
            "Samastipur",
            "Saran",
            "Sheikhpura",
            "Sheohar",
            "Sitamarhi",
            "Siwan",
            "Supaul",
            "Vaishali",
            "West Champaran"
         ],
        "Chhattisgarh": [  
            "Balod",
            "Baloda Bazar",
            "Balrampur",
            "Bastar",
            "Bemetara",
            "Bijapur",
            "Bilaspur",
            "Dantewada (South Bastar)",
            "Dhamtari",
            "Durg",
            "Gariyaband",
            "Janjgir-Champa",
            "Jashpur",
            "Kabirdham (Kawardha)",
            "Kanker (North Bastar)",
            "Kondagaon",
            "Korba",
            "Korea (Koriya)",
            "Mahasamund",
            "Mungeli",
            "Narayanpur",
            "Raigarh",
            "Raipur",
            "Rajnandgaon",
            "Sukma",
            "Surajpur  ",
            "Surguja"
         ],
         "Delhi":[  
            "Central Delhi",
            "East Delhi",
            "New Delhi",
            "North Delhi",
            "North East  Delhi",
            "North West  Delhi",
            "Shahdara",
            "South Delhi",
            "South East Delhi",
            "South West  Delhi",
            "West Delhi"
         ],
        "Goa": ["North Goa", "South Goa"],
        
        "Gujarat": [  
            "Ahmedabad",
            "Amreli",
            "Anand",
            "Aravalli",
            "Banaskantha (Palanpur)",
            "Bharuch",
            "Bhavnagar",
            "Botad",
            "Chhota Udepur",
            "Dahod",
            "Dangs (Ahwa)",
            "Devbhoomi Dwarka",
            "Gandhinagar",
            "Gir Somnath",
            "Jamnagar",
            "Junagadh",
            "Kachchh",
            "Kheda (Nadiad)",
            "Mahisagar",
            "Mehsana",
            "Morbi",
            "Narmada (Rajpipla)",
            "Navsari",
            "Panchmahal (Godhra)",
            "Patan",
            "Porbandar",
            "Rajkot",
            "Sabarkantha (Himmatnagar)",
            "Surat",
            "Surendranagar",
            "Tapi (Vyara)",
            "Vadodara",
            "Valsad"
         ],
        "Haryana":[  
            "Ambala",
            "Bhiwani",
            "Charkhi Dadri",
            "Faridabad",
            "Fatehabad",
            "Gurgaon",
            "Hisar",
            "Jhajjar",
            "Jind",
            "Kaithal",
            "Karnal",
            "Kurukshetra",
            "Mahendragarh",
            "Mewat",
            "Palwal",
            "Panchkula",
            "Panipat",
            "Rewari",
            "Rohtak",
            "Sirsa",
            "Sonipat",
            "Yamunanagar"
         ],
        "Himachal Pradesh":[  
            "Bilaspur",
            "Chamba",
            "Hamirpur",
            "Kangra",
            "Kinnaur",
            "Kullu",
            "Lahaul &amp; Spiti",
            "Mandi",
            "Shimla",
            "Sirmaur (Sirmour)",
            "Solan",
            "Una"
         ],
         "Jammu and Kashmir":[  
            "Anantnag",
            "Bandipore",
            "Baramulla",
            "Budgam",
            "Doda",
            "Ganderbal",
            "Jammu",
            "Kargil",
            "Kathua",
            "Kishtwar",
            "Kulgam",
            "Kupwara",
            "Leh",
            "Poonch",
            "Pulwama",
            "Rajouri",
            "Ramban",
            "Reasi",
            "Samba",
            "Shopian",
            "Srinagar",
            "Udhampur"
         ],
        "Jharkhand":[  
            "Bokaro",
            "Chatra",
            "Deoghar",
            "Dhanbad",
            "Dumka",
            "East Singhbhum",
            "Garhwa",
            "Giridih",
            "Godda",
            "Gumla",
            "Hazaribag",
            "Jamtara",
            "Khunti",
            "Koderma",
            "Latehar",
            "Lohardaga",
            "Pakur",
            "Palamu",
            "Ramgarh",
            "Ranchi",
            "Sahibganj",
            "Seraikela-Kharsawan",
            "Simdega",
            "West Singhbhum"
         ],
        "Karnataka": [  
            "Bagalkot",
            "Ballari (Bellary)",
            "Belagavi (Belgaum)",
            "Bengaluru (Bangalore) Rural",
            "Bengaluru (Bangalore) Urban",
            "Bidar",
            "Chamarajanagar",
            "Chikballapur",
            "Chikkamagaluru (Chikmagalur)",
            "Chitradurga",
            "Dakshina Kannada",
            "Davangere",
            "Dharwad",
            "Gadag",
            "Hassan",
            "Haveri",
            "Kalaburagi (Gulbarga)",
            "Kodagu",
            "Kolar",
            "Koppal",
            "Mandya",
            "Mysuru (Mysore)",
            "Raichur",
            "Ramanagara",
            "Shivamogga (Shimoga)",
            "Tumakuru (Tumkur)",
            "Udupi",
            "Uttara Kannada (Karwar)",
            "Vijayapura (Bijapur)",
            "Yadgir"
         ],

        "Kerala": [  
            "Alappuzha",
            "Ernakulam",
            "Idukki",
            "Kannur",
            "Kasaragod",
            "Kollam",
            "Kottayam",
            "Kozhikode",
            "Malappuram",
            "Palakkad",
            "Pathanamthitta",
            "Thiruvananthapuram",
            "Thrissur",
            "Wayanad"
         ],
         "Lakshadweep (UT)":[  
            "Agatti",
            "Amini",
            "Androth",
            "Bithra",
            "Chethlath",
            "Kavaratti",
            "Kadmath",
            "Kalpeni",
            "Kilthan",
            "Minicoy"
         ],
        "Madhya Pradesh": [  
            "Agar Malwa",
            "Alirajpur",
            "Anuppur",
            "Ashoknagar",
            "Balaghat",
            "Barwani",
            "Betul",
            "Bhind",
            "Bhopal",
            "Burhanpur",
            "Chhatarpur",
            "Chhindwara",
            "Damoh",
            "Datia",
            "Dewas",
            "Dhar",
            "Dindori",
            "Guna",
            "Gwalior",
            "Harda",
            "Hoshangabad",
            "Indore",
            "Jabalpur",
            "Jhabua",
            "Katni",
            "Khandwa",
            "Khargone",
            "Mandla",
            "Mandsaur",
            "Morena",
            "Narsinghpur",
            "Neemuch",
            "Panna",
            "Raisen",
            "Rajgarh",
            "Ratlam",
            "Rewa",
            "Sagar",
            "Satna",
            "Sehore",
            "Seoni",
            "Shahdol",
            "Shajapur",
            "Sheopur",
            "Shivpuri",
            "Sidhi",
            "Singrauli",
            "Tikamgarh",
            "Ujjain",
            "Umaria",
            "Vidisha"
         ],
        "Maharashtra": [  
            "Ahmednagar",
            "Akola",
            "Amravati",
            "Aurangabad",
            "Beed",
            "Bhandara",
            "Buldhana",
            "Chandrapur",
            "Dhule",
            "Gadchiroli",
            "Gondia",
            "Hingoli",
            "Jalgaon",
            "Jalna",
            "Kolhapur",
            "Latur",
            "Mumbai City",
            "Mumbai Suburban",
            "Nagpur",
            "Nanded",
            "Nandurbar",
            "Nashik",
            "Osmanabad",
            "Palghar",
            "Parbhani",
            "Pune",
            "Raigad",
            "Ratnagiri",
            "Sangli",
            "Satara",
            "Sindhudurg",
            "Solapur",
            "Thane",
            "Wardha",
            "Washim",
            "Yavatmal"
         ],
        "Manipur": [  
            "Bishnupur",
            "Chandel",
            "Churachandpur",
            "Imphal East",
            "Imphal West",
            "Jiribam",
            "Kakching",
            "Kamjong",
            "Kangpokpi",
            "Noney",
            "Pherzawl",
            "Senapati",
            "Tamenglong",
            "Tengnoupal",
            "Thoubal",
            "Ukhrul"
         ],
        "Meghalaya": [  
            "East Garo Hills",
            "East Jaintia Hills",
            "East Khasi Hills",
            "North Garo Hills",
            "Ri Bhoi",
            "South Garo Hills",
            "South West Garo Hills ",
            "South West Khasi Hills",
            "West Garo Hills",
            "West Jaintia Hills",
            "West Khasi Hills"
         ],
        "Mizoram": [  
            "Aizawl",
            "Champhai",
            "Kolasib",
            "Lawngtlai",
            "Lunglei",
            "Mamit",
            "Saiha",
            "Serchhip"
         ],
    
        "Nagaland": [  
            "Dimapur",
            "Kiphire",
            "Kohima",
            "Longleng",
            "Mokokchung",
            "Mon",
            "Peren",
            "Phek",
            "Tuensang",
            "Wokha",
            "Zunheboto"
         ],
        "Odisha": [  
            "Angul",
            "Balangir",
            "Balasore",
            "Bargarh",
            "Bhadrak",
            "Boudh",
            "Cuttack",
            "Deogarh",
            "Dhenkanal",
            "Gajapati",
            "Ganjam",
            "Jagatsinghapur",
            "Jajpur",
            "Jharsuguda",
            "Kalahandi",
            "Kandhamal",
            "Kendrapara",
            "Kendujhar (Keonjhar)",
            "Khordha",
            "Koraput",
            "Malkangiri",
            "Mayurbhanj",
            "Nabarangpur",
            "Nayagarh",
            "Nuapada",
            "Puri",
            "Rayagada",
            "Sambalpur",
            "Sonepur",
            "Sundargarh"
         ],
         "Puducherry (UT)":[  
            "Karaikal",
            "Mahe",
            "Pondicherry",
            "Yanam"
         ],
        "Punjab": [  
            "Amritsar",
            "Barnala",
            "Bathinda",
            "Faridkot",
            "Fatehgarh Sahib",
            "Fazilka",
            "Ferozepur",
            "Gurdaspur",
            "Hoshiarpur",
            "Jalandhar",
            "Kapurthala",
            "Ludhiana",
            "Mansa",
            "Moga",
            "Muktsar",
            "Nawanshahr (Shahid Bhagat Singh Nagar)",
            "Pathankot",
            "Patiala",
            "Rupnagar",
            "Sahibzada Ajit Singh Nagar (Mohali)",
            "Sangrur",
            "Tarn Taran"
         ],
        "Rajasthan":[  
            "Ajmer",
            "Alwar",
            "Banswara",
            "Baran",
            "Barmer",
            "Bharatpur",
            "Bhilwara",
            "Bikaner",
            "Bundi",
            "Chittorgarh",
            "Churu",
            "Dausa",
            "Dholpur",
            "Dungarpur",
            "Hanumangarh",
            "Jaipur",
            "Jaisalmer",
            "Jalore",
            "Jhalawar",
            "Jhunjhunu",
            "Jodhpur",
            "Karauli",
            "Kota",
            "Nagaur",
            "Pali",
            "Pratapgarh",
            "Rajsamand",
            "Sawai Madhopur",
            "Sikar",
            "Sirohi",
            "Sri Ganganagar",
            "Tonk",
            "Udaipur"
         ],
        "Sikkim": ["Gangtok", "Namchi", "Jorethang", "Mangan", "Rangpo", "Soreng"],
    
        "Tamil Nadu": [  
            "Ariyalur",
            "Chennai",
            "Coimbatore",
            "Cuddalore",
            "Dharmapuri",
            "Dindigul",
            "Erode",
            "Kanchipuram",
            "Kanyakumari",
            "Karur",
            "Krishnagiri",
            "Madurai",
            "Nagapattinam",
            "Namakkal",
            "Nilgiris",
            "Perambalur",
            "Pudukkottai",
            "Ramanathapuram",
            "Salem",
            "Sivaganga",
            "Thanjavur",
            "Theni",
            "Thoothukudi (Tuticorin)",
            "Tiruchirappalli",
            "Tirunelveli",
            "Tiruppur",
            "Tiruvallur",
            "Tiruvannamalai",
            "Tiruvarur",
            "Vellore",
            "Viluppuram",
            "Virudhunagar"
         ],
        "Telangana": [  
            "Adilabad",
            "Bhadradri Kothagudem",
            "Hyderabad",
            "Jagtial",
            "Jangaon",
            "Jayashankar Bhoopalpally",
            "Jogulamba Gadwal",
            "Kamareddy",
            "Karimnagar",
            "Khammam",
            "Komaram Bheem Asifabad",
            "Mahabubabad",
            "Mahabubnagar",
            "Mancherial",
            "Medak",
            "Medchal",
            "Nagarkurnool",
            "Nalgonda",
            "Nirmal",
            "Nizamabad",
            "Peddapalli",
            "Rajanna Sircilla",
            "Rangareddy",
            "Sangareddy",
            "Siddipet",
            "Suryapet",
            "Vikarabad",
            "Wanaparthy",
            "Warangal (Rural)",
            "Warangal (Urban)",
            "Yadadri Bhuvanagiri"
         ],
        "Tripura": [  
            "Dhalai",
            "Gomati",
            "Khowai",
            "North Tripura",
            "Sepahijala",
            "South Tripura",
            "Unakoti",
            "West Tripura"
         ],
         "Uttarakhand":[  
            "Almora",
            "Bageshwar",
            "Chamoli",
            "Champawat",
            "Dehradun",
            "Haridwar",
            "Nainital",
            "Pauri Garhwal",
            "Pithoragarh",
            "Rudraprayag",
            "Tehri Garhwal",
            "Udham Singh Nagar",
            "Uttarkashi"
         ],
        "Uttar Pradesh": [  
            "Agra",
            "Aligarh",
            "Allahabad",
            "Ambedkar Nagar",
            "Amethi (Chatrapati Sahuji Mahraj Nagar)",
            "Amroha (J.P. Nagar)",
            "Auraiya",
            "Azamgarh",
            "Baghpat",
            "Bahraich",
            "Ballia",
            "Balrampur",
            "Banda",
            "Barabanki",
            "Bareilly",
            "Basti",
            "Bhadohi",
            "Bijnor",
            "Budaun",
            "Bulandshahr",
            "Chandauli",
            "Chitrakoot",
            "Deoria",
            "Etah",
            "Etawah",
            "Faizabad",
            "Farrukhabad",
            "Fatehpur",
            "Firozabad",
            "Gautam Buddha Nagar",
            "Ghaziabad",
            "Ghazipur",
            "Gonda",
            "Gorakhpur",
            "Hamirpur",
            "Hapur (Panchsheel Nagar)",
            "Hardoi",
            "Hathras",
            "Jalaun",
            "Jaunpur",
            "Jhansi",
            "Kannauj",
            "Kanpur Dehat",
            "Kanpur Nagar",
            "Kanshiram Nagar (Kasganj)",
            "Kaushambi",
            "Kushinagar (Padrauna)",
            "Lakhimpur - Kheri",
            "Lalitpur",
            "Lucknow",
            "Maharajganj",
            "Mahoba",
            "Mainpuri",
            "Mathura",
            "Mau",
            "Meerut",
            "Mirzapur",
            "Moradabad",
            "Muzaffarnagar",
            "Pilibhit",
            "Pratapgarh",
            "RaeBareli",
            "Rampur",
            "Saharanpur",
            "Sambhal (Bhim Nagar)",
            "Sant Kabir Nagar",
            "Shahjahanpur",
            "Shamali (Prabuddh Nagar)",
            "Shravasti",
            "Siddharth Nagar",
            "Sitapur",
            "Sonbhadra",
            "Sultanpur",
            "Unnao",
            "Varanasi"
         ],
    
        "West Bengal": [  
            "Alipurduar",
            "Bankura",
            "Birbhum",
            "Burdwan (Bardhaman)",
            "Cooch Behar",
            "Dakshin Dinajpur (South Dinajpur)",
            "Darjeeling",
            "Hooghly",
            "Howrah",
            "Jalpaiguri",
            "Kalimpong",
            "Kolkata",
            "Malda",
            "Murshidabad",
            "Nadia",
            "North 24 Parganas",
            "Paschim Medinipur (West Medinipur)",
            "Purba Medinipur (East Medinipur)",
            "Purulia",
            "South 24 Parganas",
            "Uttar Dinajpur (North Dinajpur)"
         ]
    }; 

    document.getElementById('state').addEventListener('change', function () {
        const state = this.value;
        const districtSelect = document.getElementById('district');
        districtSelect.innerHTML = '<option value="" disabled selected>Select a District</option>'; // Clear previous options

        if (state && stateDistrictMap[state]) {
            stateDistrictMap[state].forEach(function(district) {
                const option = document.createElement("option");
                option.value = district;
                option.textContent = district;
                districtSelect.appendChild(option);
            });
        }
    });

    // Event listener for "!" button to show validation error message for the email input
    document.getElementById("show-email-error").addEventListener("click", function () {
        var emailInput = document.getElementById("email1");
        var emailFeedback = emailInput.nextElementSibling;

        if (!emailInput.checkValidity()) {
            emailFeedback.style.display = "block"; // Show error message
        } else {
            emailFeedback.style.display = "none"; // Hide error message if valid
        }
    });

    // Form validation on submit
    document.getElementById("proceed-to-pay").addEventListener("click", function(event) {
        var form = document.getElementById("customer-details-form");
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });


     // Change big image on thumbnail click
     function changeImage(img) {
        const bigImage = document.getElementById('bigImage');
        bigImage.src = img.src;
        document.querySelectorAll('.product-thumbnails img').forEach(thumbnail => {
            thumbnail.classList.remove('active');
        });
        img.classList.add('active');
    }

    // Update quantity
    function updateQuantity(change) {
        const quantityInput = document.getElementById('quantity');
        const newValue = parseInt(quantityInput.value) + change;
        if (newValue > 0) quantityInput.value = newValue;
    }