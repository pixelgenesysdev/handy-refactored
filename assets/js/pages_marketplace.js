// Product categories
const productCategories = [
    'Electronics',
    'Clothing',
    'Hammers',
    'Drills',
    'Saws',
    'Tools',
    'Sports',
    'Furniture',
    'Automotive',
    'Appliances'
];

// Enhanced product data
const AllProductsData = [
    { id: 1, name: 'Cordless Drill Pro', category: 'Drills', image: 'hands-wall-repair.webp', price: 129.99, description: 'Powerful cordless drill with lithium battery, 20V, 2-speed gearbox', sellerName: 'John Doe', sellerPhone: '1234567890', sellerEmail: 'owner1@example.com', sellerLocation: 'New York' },
    { id: 2, name: 'Hammer Set Professional', category: 'Hammers', image: 'hands-wall-repair.webp', price: 45.50, description: 'Professional hammer set with 3 different sizes, rubber grip handles', sellerName: 'Jane Smith', sellerPhone: '2345678901', sellerEmail: 'owner2@example.com', sellerLocation: 'Chicago' },
    { id: 3, name: 'Circular Saw 7.25"', category: 'Saws', image: 'hands-wall-repair.webp', price: 189.99, description: 'High-performance circular saw with laser guide and safety features', sellerName: 'Bob Johnson', sellerPhone: '3456789012', sellerEmail: 'owner3@example.com', sellerLocation: 'Los Angeles' },

    { id: 4, name: 'Electric Screwdriver Kit', category: 'Tools', image: 'hands-wall-repair.webp', price: 59.99, description: 'Rechargeable electric screwdriver with 30 bits included', sellerName: 'Laura Green', sellerPhone: '4567890123', sellerEmail: 'owner4@example.com', sellerLocation: 'Houston' },
    { id: 5, name: 'Heavy Duty Sledgehammer', category: 'Hammers', image: 'hands-wall-repair.webp', price: 39.99, description: '10 lb heavy-duty sledgehammer for construction use', sellerName: 'Peter Adams', sellerPhone: '5678901234', sellerEmail: 'owner5@example.com', sellerLocation: 'Phoenix' },
    { id: 6, name: 'Precision Hand Saw', category: 'Saws', image: 'hands-wall-repair.webp', price: 24.99, description: 'Fine-tooth hand saw perfect for woodworking', sellerName: 'Megan Cooper', sellerPhone: '6789012345', sellerEmail: 'owner6@example.com', sellerLocation: 'Philadelphia' },
    { id: 7, name: 'LED Work Light', category: 'Tools', image: 'hands-wall-repair.webp', price: 32.50, description: 'Portable LED work light with adjustable brightness', sellerName: 'Steven Lee', sellerPhone: '7890123456', sellerEmail: 'owner7@example.com', sellerLocation: 'San Antonio' },
    { id: 8, name: 'Electric Chainsaw 16"', category: 'Saws', image: 'hands-wall-repair.webp', price: 149.99, description: 'Electric chainsaw with 16-inch bar and safety lock', sellerName: 'Karen White', sellerPhone: '8901234567', sellerEmail: 'owner8@example.com', sellerLocation: 'San Diego' },
    { id: 9, name: 'Portable Air Compressor', category: 'Automotive', image: 'hands-wall-repair.webp', price: 89.99, description: 'Lightweight air compressor for tires and tools', sellerName: 'Chris Young', sellerPhone: '9012345678', sellerEmail: 'owner9@example.com', sellerLocation: 'Dallas' },
    { id: 10, name: 'Toolbox Organizer Set', category: 'Tools', image: 'hands-wall-repair.webp', price: 54.99, description: '4-piece toolbox organizer kit with compartments', sellerName: 'Olivia Brown', sellerPhone: '1122334455', sellerEmail: 'owner10@example.com', sellerLocation: 'San Jose' },

    { id: 11, name: 'Smart LED TV 55"', category: 'Electronics', image: 'hands-wall-repair.webp', price: 499.99, description: '4K UHD Smart TV with streaming apps built in', sellerName: 'Tom Wilson', sellerPhone: '2023344556', sellerEmail: 'owner11@example.com', sellerLocation: 'Austin' },
    { id: 12, name: 'Bluetooth Sports Headphones', category: 'Sports', image: 'hands-wall-repair.webp', price: 75.00, description: 'Water-resistant wireless headphones with long battery life', sellerName: 'Emma Davis', sellerPhone: '2233455667', sellerEmail: 'owner12@example.com', sellerLocation: 'Jacksonville' },
    { id: 13, name: 'Office Chair Ergonomic', category: 'Furniture', image: 'hands-wall-repair.webp', price: 129.00, description: 'Ergonomic chair with lumbar support and mesh back', sellerName: 'Richard Gray', sellerPhone: '3344556677', sellerEmail: 'owner13@example.com', sellerLocation: 'Columbus' },
    { id: 14, name: 'Stainless Steel Microwave', category: 'Appliances', image: 'hands-wall-repair.webp', price: 199.99, description: '1100W microwave with smart cooking presets', sellerName: 'Nina Patel', sellerPhone: '4455667788', sellerEmail: 'owner14@example.com', sellerLocation: 'Charlotte' },
    { id: 15, name: 'Electric Drill Basic', category: 'Drills', image: 'hands-wall-repair.webp', price: 89.99, description: 'Corded drill with variable speed control', sellerName: 'Jack Turner', sellerPhone: '5566778899', sellerEmail: 'owner15@example.com', sellerLocation: 'Fort Worth' },

    { id: 16, name: 'Rubber Mallet', category: 'Hammers', image: 'hands-wall-repair.webp', price: 12.99, description: 'Non-marring rubber mallet for delicate surfaces', sellerName: 'Lucy Carter', sellerPhone: '6677889900', sellerEmail: 'owner16@example.com', sellerLocation: 'Indianapolis' },
    { id: 17, name: 'Hand Saw Classic', category: 'Saws', image: 'hands-wall-repair.webp', price: 19.99, description: 'General-purpose hand saw with ergonomic handle', sellerName: 'George Baker', sellerPhone: '7788990011', sellerEmail: 'owner17@example.com', sellerLocation: 'Seattle' },
    { id: 18, name: 'Sports Backpack', category: 'Sports', image: 'hands-wall-repair.webp', price: 29.95, description: 'Durable lightweight backpack for sports and travel', sellerName: 'Sara Fox', sellerPhone: '8899001122', sellerEmail: 'owner18@example.com', sellerLocation: 'Denver' },
    { id: 19, name: 'Wooden Coffee Table', category: 'Furniture', image: 'hands-wall-repair.webp', price: 150.00, description: 'Solid wood coffee table with modern design', sellerName: 'Henry Foster', sellerPhone: '9900112233', sellerEmail: 'owner19@example.com', sellerLocation: 'Boston' },
    { id: 20, name: 'High-Speed Blender', category: 'Appliances', image: 'hands-wall-repair.webp', price: 99.99, description: '800W blender perfect for smoothies and sauces', sellerName: 'Diana Reed', sellerPhone: '1011121314', sellerEmail: 'owner20@example.com', sellerLocation: 'Detroit' }
];


// My Products Data - Will be loaded from localStorage or API
let MyProductsData = [
    { id: 1001, name: 'My Cordless Drill', category: 'Drills', image: 'hands-wall-repair.webp', price: 120.00, description: 'Powerful cordless drill with lithium battery', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1002, name: 'My Hammer Set', category: 'Hammers', image: 'hands-wall-repair.webp', price: 45.00, description: 'Professional hammer set with different sizes', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },

    { id: 1003, name: 'My Old Circular Saw', category: 'Saws', image: 'hands-wall-repair.webp', price: 80.00, description: 'Used circular saw, still in good condition', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1004, name: 'My Adjustable Wrench', category: 'Tools', image: 'hands-wall-repair.webp', price: 15.00, description: 'Adjustable wrench lightly used', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1005, name: 'My Work Light', category: 'Tools', image: 'hands-wall-repair.webp', price: 20.00, description: 'Portable LED work light', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1006, name: 'My Sports Bag', category: 'Sports', image: 'hands-wall-repair.webp', price: 10.00, description: 'Sports bag in excellent condition', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1007, name: 'My Desk Lamp', category: 'Furniture', image: 'hands-wall-repair.webp', price: 25.00, description: 'LED desk lamp with adjustable arm', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1008, name: 'My Microwave', category: 'Appliances', image: 'hands-wall-repair.webp', price: 60.00, description: 'Used microwave still works great', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1009, name: 'My Basic Drill', category: 'Drills', image: 'hands-wall-repair.webp', price: 50.00, description: 'Basic corded drill', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1010, name: 'My Wooden Chair', category: 'Furniture', image: 'hands-wall-repair.webp', price: 35.00, description: 'Wooden chair with cushion', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1011, name: 'My Rubber Mallet', category: 'Hammers', image: 'hands-wall-repair.webp', price: 8.00, description: 'Lightly used rubber mallet', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' },
    { id: 1012, name: 'My Air Pump', category: 'Automotive', image: 'hands-wall-repair.webp', price: 18.00, description: 'Portable air pump for tires', sellerName: 'You', sellerPhone: '555-0123', sellerEmail: 'you@example.com', sellerLocation: 'Your City' }
];


// Save My Products to localStorage
function saveMyProductsToStorage() {
    localStorage.setItem('myProducts', JSON.stringify(MyProductsData));
}

// Filter states
let filterStateAll = {
    search: '',
    category: '',
    priceSort: '',
    quickFilter: ''
};

let filterStateMy = {
    search: '',
    category: ''
};

// DOM Elements - will be initialized in initializePage()
let AllProductsContainer;
let MyProductsContainer;
let AllProductsFilters;
let MyProductsFilters;
let filterSummary;
let productForm;
let productImageInput;
let uploadBox;
let uploadContent;
let imagePreview;

// Current editing product ID
let editingProductId = null;

// Initialize page
function initializePage() {
    // Initialize DOM elements
    AllProductsContainer = document.getElementById('AllProductsContainer');
    MyProductsContainer = document.getElementById('MyProductsContainer');
    AllProductsFilters = document.getElementById('AllProductsFilters');
    MyProductsFilters = document.getElementById('MyProductsFilters');
    filterSummary = document.getElementById('filterSummary');
    productForm = document.getElementById('productForm');
    productImageInput = document.getElementById('productImage');
    uploadBox = document.getElementById('uploadBox');
    uploadContent = document.getElementById('uploadContent');
    imagePreview = document.getElementById('imagePreview');
    
    // Check if elements exist
    if (!AllProductsContainer || !MyProductsContainer) {
        console.error('Marketplace: Required DOM elements not found');
        return;
    }
    
    populateCategoryFilters();
    renderAllProducts(AllProductsData);
    renderMyProducts(MyProductsData);
    setupEventListeners();
    updateFilterSummary();
}

// Populate category filters
function populateCategoryFilters() {
    const categoryFilterAll = document.getElementById('categoryFilterAllProducts');
    const categoryFilterMy = document.getElementById('categoryFilterMyProducts');
    
    categoryFilterAll.innerHTML = '<option value="">All Categories</option>';
    categoryFilterMy.innerHTML = '<option value="">All Categories</option>';
    
    productCategories.forEach(category => {
        const option1 = document.createElement('option');
        option1.value = category;
        option1.textContent = category;
        categoryFilterAll.appendChild(option1);
        
        const option2 = document.createElement('option');
        option2.value = category;
        option2.textContent = category;
        categoryFilterMy.appendChild(option2);
    });
}

// Render All Products
function renderAllProducts(products) {
    if (!AllProductsContainer) return;
    
    AllProductsContainer.innerHTML = '';
    
    if (products.length === 0) {
        AllProductsContainer.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fa-solid fa-box-open fa-3x text-muted mb-3"></i>
                <h4>No products found</h4>
                <p class="text-muted">Try adjusting your search or filter</p>
            </div>
        `;
        return;
    }
    
    products.forEach(product => {
        const productCard = document.createElement('div');
        productCard.classList.add('productcard', 'col-6', 'col-md-4', 'col-lg-3', 'mb-4');
        productCard.innerHTML = `
            <div class="productboxinner" onclick="showProductDetails(${product.id})">
                <img src="${SITE_URL}assets/images/services-images/${product.image}" alt="${product.name}">
                <div class="productcontent">
                    <span class="productcategory">${product.category}</span>
                    <h4 class="productname">${product.name}</h4>
                    <span class="productprice">$${product.price.toFixed(2)}</span>
                </div>
            </div>
        `;
        AllProductsContainer.appendChild(productCard);
    });
}

// Render My Products
function renderMyProducts(products) {
    if (!MyProductsContainer) return;
    MyProductsContainer.innerHTML = '';
    
    if (products.length === 0) {
        MyProductsContainer.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fa-solid fa-box-open fa-3x text-muted mb-3"></i>
                <h4>You haven't listed any products yet</h4>
                <p class="text-muted">Click "Add New Product" to get started</p>
            </div>
        `;
        return;
    }
    
    products.forEach(product => {
        const myProductBox = document.createElement('div');
        myProductBox.classList.add('myproductbox', 'col-12', 'col-md-12', 'col-lg-6', 'mb-4');
        myProductBox.innerHTML = `
            <div class="myproductboxcontentinner">
                <div class="myproductboximage">
                    <img src="${SITE_URL}assets/images/services-images/${product.image}" width="100%" alt="${product.name}">
                </div>
                <div class="myproductboxcontent">
                    <span class="category">${product.category}</span>
                    <h3 class="productname">${product.name}</h3>
                    <span class="productprice">$${product.price.toFixed(2)}</span>
                    <p class="productdescription">${product.description}</p>
                    <div class="myproductboxbuttons d-flex">
                        <button class="btn action-btn" onclick="editProduct(${product.id})">
                            <i class="fa-solid fa-pen-to-square"></i> 
                        </button>
                        <button class="btn action-btn delete-btn" onclick="deleteProduct(${product.id})">
                            <i class="fa-solid fa-trash"></i> 
                        </button>
                    </div>
                </div>
            </div>
        `;
        MyProductsContainer.appendChild(myProductBox);
    });
}

// Filter All Products
function filterAllProducts() {
    let filtered = [...AllProductsData];
    
    // Search filter
    if (filterStateAll.search) {
        const searchTerm = filterStateAll.search.toLowerCase();
        filtered = filtered.filter(product => 
            product.name.toLowerCase().includes(searchTerm) ||
            product.description.toLowerCase().includes(searchTerm) ||
            product.category.toLowerCase().includes(searchTerm) ||
            product.sellerName.toLowerCase().includes(searchTerm) ||
            product.sellerLocation.toLowerCase().includes(searchTerm)
        );
    }
    
    // Category filter
    if (filterStateAll.category) {
        filtered = filtered.filter(product => product.category === filterStateAll.category);
    }
    
    // Quick filters
    if (filterStateAll.quickFilter === 'under100') {
        filtered = filtered.filter(product => product.price < 100);
    } else if (filterStateAll.quickFilter === 'under500') {
        filtered = filtered.filter(product => product.price < 500);
    }
    
    // Price sort
    if (filterStateAll.priceSort === 'low_high') {
        filtered.sort((a, b) => a.price - b.price);
    } else if (filterStateAll.priceSort === 'high_low') {
        filtered.sort((a, b) => b.price - a.price);
    }
    
    if (AllProductsContainer) {
        renderAllProducts(filtered);
        updateFilterSummary();
    }
}

// Filter My Products
function filterMyProducts() {
    let filtered = [...MyProductsData];
    
    // Search filter
    if (filterStateMy.search) {
        const searchTerm = filterStateMy.search.toLowerCase();
        filtered = filtered.filter(product => 
            product.name.toLowerCase().includes(searchTerm) ||
            product.description.toLowerCase().includes(searchTerm) ||
            product.category.toLowerCase().includes(searchTerm)
        );
    }
    
    // Category filter
    if (filterStateMy.category) {
        filtered = filtered.filter(product => product.category === filterStateMy.category);
    }
    
    if (MyProductsContainer) {
        renderMyProducts(filtered);
        updateFilterSummary();
    }
}

// Setup event listeners
function setupEventListeners() {
    if (!AllProductsContainer || !MyProductsContainer) return;
    // All Products search
    document.getElementById('searchInputAllProducts').addEventListener('input', (e) => {
        filterStateAll.search = e.target.value;
        filterAllProducts();
    });
    
    // All Products category filter
    document.getElementById('categoryFilterAllProducts').addEventListener('change', (e) => {
        filterStateAll.category = e.target.value;
        filterAllProducts();
    });
    
    // All Products price sort
    document.getElementById('priceSortAllProducts').addEventListener('change', (e) => {
        filterStateAll.priceSort = e.target.value;
        filterAllProducts();
    });
    
    // My Products search
    document.getElementById('searchInputMyProducts').addEventListener('input', (e) => {
        filterStateMy.search = e.target.value;
        filterMyProducts();
    });
    
    // My Products category filter
    document.getElementById('categoryFilterMyProducts').addEventListener('change', (e) => {
        filterStateMy.category = e.target.value;
        filterMyProducts();
    });
    
    // Clear all filters button
    document.getElementById('clearAllFilters').addEventListener('click', () => {
        const activeTab = document.querySelector('.marketproducttabbtn.active');
        const tab = activeTab.getAttribute('data-tab');
        clearAllFilters(tab === 'AllProducts' ? 'All' : 'My');
    });
    
    // Tab switching
    const marketproducttabbuttons = document.querySelectorAll('.marketproducttabbtn');
    marketproducttabbuttons.forEach(button => {
        button.addEventListener('click', () => {
            const tab = button.getAttribute('data-tab');
            
            // Handle active button
            marketproducttabbuttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            
            // Update title
            document.querySelector('.tabtitle').textContent = tab === 'AllProducts' ? 'Marketplace' : 'My Products';
            
            // Toggle tab content
            document.querySelectorAll('.marketproducttabcontent').forEach(content => {
                content.classList.toggle('d-none', content.id !== tab);
            });
            
            // Show/hide appropriate filters
            if (tab === 'AllProducts') {
                if (AllProductsFilters) AllProductsFilters.classList.remove('d-none');
                if (MyProductsFilters) MyProductsFilters.classList.add('d-none');
            } else {
                if (AllProductsFilters) AllProductsFilters.classList.add('d-none');
                if (MyProductsFilters) MyProductsFilters.classList.remove('d-none');
            }
            
            updateFilterSummary();
        });
    });
    
    // New Product Button
    document.getElementById('newProductButton').addEventListener('click', () => {
        showProductForm(null);
    });
    
    // Form Submit Button
    document.getElementById('MyProductsDetailsbtn').addEventListener('click', handleProductSubmit);
    
    // Image upload
    if (productImageInput) {
        productImageInput.addEventListener('change', handleImageUpload);
    }
}

// Show product form for add/edit
function showProductForm(productId) {
    editingProductId = productId;
    const form = document.getElementById('MyProductsDetailsform');
    const title = document.getElementById('tabtitletabform');
    const button = document.getElementById('MyProductsDetailsbtn');
    
    // Reset form
    if (productForm) productForm.reset();
    if (imagePreview) imagePreview.innerHTML = '';
    
    if (productId === null) {
        // Add new product
        title.textContent = 'Add New Product';
        button.textContent = 'Add Product';
        button.classList.remove('btn-warning');
        button.classList.add('btn-primary');
        
        // Set default seller info
        document.getElementById('sellerName').value = 'You';
        document.getElementById('sellerPhone').value = '555-0123';
        document.getElementById('sellerEmail').value = 'you@example.com';
        document.getElementById('sellerLocation').value = 'Your City';
    } else {
        // Edit existing product
        title.textContent = 'Edit Product';
        button.textContent = 'Update Product';

        
        // Find product
        const product = MyProductsData.find(p => p.id === productId);
        if (product) {
            document.getElementById('productId').value = product.id;
            document.getElementById('productName').value = product.name;
            document.getElementById('productPrice').value = product.price;
            document.getElementById('productDescription').value = product.description;
            document.getElementById('productCategory').value = product.category;
            document.getElementById('sellerName').value = product.sellerName;
            document.getElementById('sellerPhone').value = product.sellerPhone;
            document.getElementById('sellerEmail').value = product.sellerEmail;
            document.getElementById('sellerLocation').value = product.sellerLocation;
            
            // Show existing image
            if (product.image && imagePreview) {
                imagePreview.innerHTML = `
                    <div class="current-image mt-2">
                        <p class="small text-muted">Current Image:</p>
                        <img src="${SITE_URL}assets/images/services-images/${product.image}" 
                             class="img-thumbnail" 
                             style="max-width: 200px;">
                    </div>
                `;
            }
        }
    }
    
    // Show form, hide other sections
    form.classList.remove('d-none');
    document.getElementById('marketproducttabscontent').classList.add('d-none');
    document.getElementById('topbarwithbtn').classList.add('d-none');
    if (AllProductsFilters) AllProductsFilters.classList.add('d-none');
    if (MyProductsFilters) MyProductsFilters.classList.add('d-none');
    if (filterSummary) filterSummary.classList.add('d-none');
}

// Handle image upload
function handleImageUpload(e) {
    const file = e.target.files[0];
    if (file && imagePreview) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.innerHTML = `
                <div class="new-image-preview mt-2">
                    <p class="small text-muted">New Image:</p>
                    <img src="${e.target.result}" 
                         class="img-thumbnail" 
                         style="max-width: 200px;">
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }
}

// Handle product form submission
function handleProductSubmit() {
    // Get form values
    const productId = document.getElementById('productId').value || Date.now(); // Generate ID if new
    const productName = document.getElementById('productName').value;
    const productPrice = parseFloat(document.getElementById('productPrice').value);
    const productDescription = document.getElementById('productDescription').value;
    const productCategory = document.getElementById('productCategory').value;
    const sellerName = document.getElementById('sellerName').value;
    const sellerPhone = document.getElementById('sellerPhone').value;
    const sellerEmail = document.getElementById('sellerEmail').value;
    const sellerLocation = document.getElementById('sellerLocation').value;
    
    // Basic validation
    if (!productName || !productPrice || !productDescription || !productCategory || 
        !sellerName || !sellerPhone || !sellerEmail || !sellerLocation) {
        alert('Please fill in all required fields');
        return;
    }
    
    // Create product object
    const product = {
        id: parseInt(productId),
        name: productName,
        price: productPrice,
        description: productDescription,
        category: productCategory,
        sellerName: sellerName,
        sellerPhone: sellerPhone,
        sellerEmail: sellerEmail,
        sellerLocation: sellerLocation,
        image: 'hands-wall-repair.webp' // Default image
    };
    
    if (editingProductId) {
        // Update existing product
        const index = MyProductsData.findIndex(p => p.id === editingProductId);
        if (index !== -1) {
            MyProductsData[index] = product;
        }
    } else {
        // Add new product
        MyProductsData.push(product);
    }
    
    // Save to localStorage
    saveMyProductsToStorage();
    
    // Update UI
    renderMyProducts(MyProductsData);
    filterMyProducts();
    
    // Show success message
    showPopup(
        editingProductId ? 'Product updated successfully!' : 'Product added successfully!',
        'success',
        'Successfully updated',
        'OK',
        () => {
            filterMyProducts();
            // Go back to My Products
            goBackToMyProducts();
        }
    );

}

// Edit product
function editProduct(productId) {
    showProductForm(productId);
}

// Delete product
function deleteProduct(productId) {

        MyProductsData = MyProductsData.filter(product => product.id !== productId);
        saveMyProductsToStorage();
        renderMyProducts(MyProductsData);
        filterMyProducts();
       showPopup(
            'Are you sure you want to delete this product?',
            'delete',
            'Product Delete?',
            'OK',
            () => {
                // When user confirms deletion
                setTimeout(() => {
                    showPopup(
                        'Product deleted successfully!',
                        'success',
                        'Product Deleted',
                        'OK',
                        () => {
                            filterMyProducts(); // Refresh products after deletion
                        }
                    );
                }, 100);
            }
        );
}

// Apply quick filter
function applyQuickFilter(tab, filterType) {
    if (tab === 'All') {
        filterStateAll.quickFilter = filterType;
        filterAllProducts();
    }
}

// Clear all filters
function clearAllFilters(tab) {
    if (tab === 'All') {
        filterStateAll = {
            search: '',
            category: '',
            priceSort: '',
            quickFilter: ''
        };
        
        document.getElementById('searchInputAllProducts').value = '';
        document.getElementById('categoryFilterAllProducts').value = '';
        document.getElementById('priceSortAllProducts').value = '';
        
        filterAllProducts();
    } else {
        filterStateMy = {
            search: '',
            category: ''
        };
        
        document.getElementById('searchInputMyProducts').value = '';
        document.getElementById('categoryFilterMyProducts').value = '';
        
        filterMyProducts();
    }
}

// Update filter summary
function updateFilterSummary() {
    if (!filterSummary) return;
    
    const activeTab = document.querySelector('.marketproducttabbtn.active');
    if (!activeTab) return;
    
    const tab = activeTab.getAttribute('data-tab');
    const container = tab === 'AllProducts' ? 'AllProductsContainer' : 'MyProductsContainer';
    const containerElement = document.getElementById(container);
    if (!containerElement) return;
    
    const productCount = containerElement.children.length;
    const productCountElement = document.getElementById('productCount');
    if (productCountElement) {
        productCountElement.textContent = `${productCount} ${productCount === 1 ? 'product' : 'products'}`;
    }
    
    // Show/hide filter summary
    const totalProducts = tab === 'AllProducts' ? AllProductsData.length : MyProductsData.length;
    if (productCount < totalProducts && productCount > 0) {
        filterSummary.classList.remove('d-none');
    } else {
        filterSummary.classList.add('d-none');
    }
}

// Product details functionality
showProductDetails = (productId) => {
    const product = AllProductsData.find(p => p.id === productId);
    if (product) {
        document.getElementById('productsContainerDetail').innerHTML = `
            <div class="productdetailsboximage col-lg-5 col-md-12 col-12">
                <img src="${SITE_URL}assets/images/services-images/${product.image}" alt="${product.name}">
            </div>
            <div class="productdetailsbox col-lg-7 col-md-12 col-12 p-2">
                <h3 class="productname">${product.name}</h3>
                <span class="category">${product.category}</span>
                <span class="productprice">$${product.price.toFixed(2)}</span>
                <p class="productdescription">${product.description}</p>
                <div class="ownerdetails">
                    <h4>Seller Details</h4>
                    <div class="ownerinfo">
                        <span class="ownername"><i class="fa-solid fa-user"></i> ${product.sellerName}</span>
                        <span class="ownerphone"><i class="fa-solid fa-phone"></i> ${product.sellerPhone}</span>
                        <span class="owneremail"><i class="fa-solid fa-envelope"></i> ${product.sellerEmail}</span>
                        <span class="ownerlocation"> <i class="fa-solid fa-location-dot"></i> ${product.sellerLocation}</span>
                    </div>    
                </div>
            </div>
        `;
    }
    document.getElementById('ProductsDetails').classList.remove('d-none');
    document.getElementById('marketproducttabscontent').classList.add('d-none');
    document.getElementById('topbarwithbtn').classList.add('d-none');
    if (AllProductsFilters) AllProductsFilters.classList.add('d-none');
    if (MyProductsFilters) MyProductsFilters.classList.add('d-none');
    if (filterSummary) filterSummary.classList.add('d-none');
}

// Go back to products
goBackToProducts = () => {
    document.getElementById('ProductsDetails').classList.add('d-none');
    document.getElementById('marketproducttabscontent').classList.remove('d-none');
    document.getElementById('topbarwithbtn').classList.remove('d-none');
    
    const activeTab = document.querySelector('.marketproducttabbtn.active');
    if (activeTab && activeTab.getAttribute('data-tab') === 'AllProducts') {
        if (AllProductsFilters) AllProductsFilters.classList.remove('d-none');
    } else {
        if (MyProductsFilters) MyProductsFilters.classList.remove('d-none');
    }
    
    updateFilterSummary();
}

// Go back to My Products
function goBackToMyProducts() {
    editingProductId = null;
    document.getElementById('MyProductsDetailsform').classList.add('d-none');
    document.getElementById('marketproducttabscontent').classList.remove('d-none');
    document.getElementById('topbarwithbtn').classList.remove('d-none');
    
    const activeTab = document.querySelector('.marketproducttabbtn.active');
    if (activeTab && activeTab.getAttribute('data-tab') === 'AllProducts') {
        if (AllProductsFilters) AllProductsFilters.classList.remove('d-none');
    } else {
        if (MyProductsFilters) MyProductsFilters.classList.remove('d-none');
    }
    
    updateFilterSummary();
}

// Initialize the page
document.addEventListener('DOMContentLoaded', initializePage);  