<?php
$page_js = 'pages_marketplace.js';
$page_css = 'pages_marketplace.css';
include '../includes/head.php';
include '../includes/bothpage.php';
?>

<!-- Top Bar with Tabs -->
<div id="topbarwithbtn" class="topbarwithbtn withbackbutton d-flex justify-content-between align-items-center">
    <h3 class="tabtitle">Market Place</h3>
    <div id="marketproducttabs">
        <button class="marketproducttabbtn active" data-tab="AllProducts">Products</button>
        <button class="marketproducttabbtn" data-tab="MyProducts">My Products</button>
    </div>
</div>

<!-- Filter Summary -->
<div class="filter-summary d-none" id="filterSummary">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <span id="productCount">0 products</span>
            <span id="filterSummaryText" class="ms-2 text-muted"></span>
        </div>
        <div>
            <button id="clearAllFilters" class="btn btn-sm btn-link">Clear all filters</button>
        </div>
    </div>
</div>

<!-- All Products Filters -->
<div class="filters-container" id="AllProductsFilters">
    <div class="row align-items-center mb-3">
        <div class="col-md-6 col-12 mb-3">
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                <input type="search" id="searchInputAllProducts" class="form-control" placeholder="Search products..." />
            </div>
        </div>
        <div class="col-md-3 col-12 mb-3">
            <select id="categoryFilterAllProducts" class="form-control">
                <option value="">All Categories</option>
            </select>
        </div>
        <div class="col-md-3 col-12 mb-3">
            <select id="priceSortAllProducts" class="form-control">
                <option value="">Sort by Price</option>
                <option value="low_high">Price: Low to High</option>
                <option value="high_low">Price: High to Low</option>
            </select>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-12">
            <button class="btn btn-sm btn-outline-secondary me-2" onclick="clearAllFilters('All')">Clear All</button>
            <button class="btn btn-sm btn-outline-primary me-2" onclick="applyQuickFilter('All', 'under100')">Under $100</button>
            <button class="btn btn-sm btn-outline-primary me-2" onclick="applyQuickFilter('All', 'under500')">Under $500</button>
        </div>
    </div>
</div>

<!-- My Products Filters -->
<div class="filters-container d-none" id="MyProductsFilters">
    <div class="row align-items-center mb-3">
        <div class="col-md-8 col-12 mb-3">
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                <input type="search" id="searchInputMyProducts" class="form-control" placeholder="Search my products..." />
            </div>
        </div>
        <div class="col-md-4 col-12 mb-3">
            <select id="categoryFilterMyProducts" class="form-control">
                <option value="">All Categories</option>
            </select>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-12">
            <button class="btn btn-sm btn-outline-secondary" onclick="clearAllFilters('My')">Clear All Filters</button>
        </div>
    </div>
</div>

<!-- Marketplace Tab Content -->
<div id="marketproducttabscontent">
    <div class="marketproducttabcontent" id="AllProducts">
        <div class="inner d-flex flex-wrap col-12" id="AllProductsContainer">
            <!-- Products will be loaded here -->
        </div>
    </div>

    <div class="marketproducttabcontent d-none" id="MyProducts">
        <div id="newProductButton"><i class="fa-solid fa-plus"></i> Add New Product</div>
        <div class="inner d-flex flex-wrap col-12" id="MyProductsContainer">
            <!-- My products will be loaded here -->
        </div>
    </div>
</div>

<!-- All Products Details -->
<div class="ProducttabcontentDetail d-none AllProducts" id="ProductsDetails">
    <div class="topbarwithbtn withbackbutton d-flex justify-content-between align-items-center" onclick="goBackToProducts()" style="cursor: pointer;">
        <h3><i class="fa-solid fa-arrow-left"></i> Product details</h3>
    </div>

    <div class="inner d-flex flex-wrap col-12 align-items-center" id="productsContainerDetail">
        <!-- Product details will be loaded here -->
    </div>
</div>

<!-- My Products Edit and new form -->
<div class="MyProductsDetailsform d-none" id="MyProductsDetailsform">
    <div class="topbarwithbtn" onclick="goBackToMyProducts()" style="cursor: pointer;">
        <h3><i class="fa-solid fa-arrow-left"></i> <span id="tabtitletabform">Product Details</span></h3>
    </div>

    <div class="inner">
        <form id="productForm" class="col-12">
            <input type="hidden" id="productId" value="">
            
            <div class="form-groupfield">
                <label for="productName" class="form-label">Product Name*</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter product name" required />
            </div>

            <div class="form-groupfield">
                <label for="productPrice" class="form-label">Price ($)*</label>
                <input type="number" class="form-control" id="productPrice" placeholder="0.00" min="0" step="0.01" required />
            </div>

            <div class="form-groupfield">
                <label for="productDescription" class="form-label">Description*</label>
                <textarea class="form-control" id="productDescription" rows="4" placeholder="Describe your product..." required></textarea>
            </div>

            <div class="form-groupfield">
                <label for="productCategory" class="form-label">Category*</label>
                <select id="productCategory" class="form-control" required>
                    <option value="">Select Category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Hammers">Hammers</option>
                    <option value="Drills">Drills</option>
                    <option value="Saws">Saws</option>
                    <option value="Tools">Tools</option>
                    <option value="Sports">Sports</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Automotive">Automotive</option>
                    <option value="Appliances">Appliances</option>
                </select>
            </div>

            <!-- Upload Box -->
            <div class="form-groupfield">
                <label class="form-label">Product Image*</label>
                <div class="upload-box" id="uploadBox">
                    <input type="file" id="productImage" accept="image/*" />
                    <div class="upload-content" id="uploadContent">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Click to upload image</p>
                        <small class="text-muted">JPG, PNG up to 5MB</small>
                    </div>
                </div>
                <div id="imagePreview"></div>
            </div>

            <!-- Seller Contact Info -->
            <div class="form-groupfield">
                <label for="sellerName" class="form-label">Your Name*</label>
                <input type="text" class="form-control" id="sellerName" placeholder="Enter your name" required />
            </div>

            <div class="form-groupfield">
                <label for="sellerPhone" class="form-label">Phone Number*</label>
                <input type="tel" class="form-control" id="sellerPhone" placeholder="Enter your phone number" required />
            </div>

            <div class="form-groupfield">
                <label for="sellerEmail" class="form-label">Email*</label>
                <input type="email" class="form-control" id="sellerEmail" placeholder="Enter your email" required />
            </div>

            <div class="form-groupfield">
                <label for="sellerLocation" class="form-label">Location*</label>
                <input type="text" class="form-control" id="sellerLocation" placeholder="Enter your location" required />
            </div>
        </form>
        <div class="d-flex gap-2 mt-4">
            <button type="button" id="MyProductsDetailsbtn" class="btn btn-primary">Add Product</button>
            <button type="button" onclick="goBackToMyProducts()" class="btn btn-secondary">Cancel</button>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>