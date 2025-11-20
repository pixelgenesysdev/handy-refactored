<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$page_js = 'pages_marketplace.js';
 include '../includes/head.php'; ?>


    <!-- Top Bar with Tabs -->

    <div id="topbarwithbtn" class="topbarwithbtn withbackbutton d-flex justify-content-between align-items-center">
        <h3 class="tabtitle">Market place</h3>
        <div id="marketproducttabs">
            <button class="marketproducttabbtn active" data-tab="AllProducts">Products</button>
            <button class="marketproducttabbtn" data-tab="MyProducts">My Products</button>
        </div>
    </div>

      <input type="search" id="searchInput" placeholder="Search Here" />

    <!-- Marketplace Tab Content -->

    <div id="marketproducttabscontent">

        <div class="marketproducttabcontent" id="AllProducts">
            <div class="inner d-flex flex-wrap col-12" id="AllProductsContainer">

            </div>
        </div>

        <div class="marketproducttabcontent d-none" id="MyProducts">
             <div id="newProductButton"><i class="fa-solid fa-plus"></i></div>
            <div class="inner d-flex flex-wrap col-12" id="MyProductsContainer">
                <div class="myproductbox col-12 col-md-12 col-lg-6 mb-6">
                    <div class="myproductboxcontentinner">
                        <div class="myproductboximage">
                            <img src="<?php echo SITE_URL; ?>assets/images/productimage.png" width="100%" alt="Product Image">
                        </div>
                        <div class="myproductboxcontent">
                        
                            <span class="category">Hammers  </span>
                            <h3 class="productname">Product Name</h3>
                            <span class="productprice">$500</span>
                            <p class="productdescription">This is a brief description of the product. It provides an overview of the product's features and benefits to attract potential buyers.</p>
                            <div class="myproductboxbuttons d-flex">
                                <button class="btn action-btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn action-btn"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- All Products Details -->

    <div class="ProducttabcontentDetail d-none AllProducts" id="ProductsDetails">
            <div class="topbarwithbtn" onclick="goBackToProducts()" class="withbackbutton d-flex justify-content-between align-items-center" style="cursor: pointer;">
                <h3><i class="fa-solid fa-arrow-left"></i>Product details</h3>
            </div>

            <div class="inner d-flex flex-wrap col-12  align-items-center" id="productsContainerDetail">
                <div class="productdetailsboximage col-12 col-md-6">
                    <img src="<?php echo SITE_URL; ?>assets/images/productimage.png" alt="Product Image">
                </div>
                <div class="productdetailsbox col-12 col-md-6">
                        <h3 class="productname">Product Name</h3>
                        <span class="category">Hammers  </span>
                        <span class="productprice">$500</span>
                        <p class="productdescription">This is a detailed description of the product. It provides all the necessary information that a potential buyer might need to make an informed decision about purchasing the product.</p>
                        <div class="ownerdetails">
                            <h4>Seller Details</h4>
                            <div class="ownerinfo">
                                <span class="ownername"><i class="fa-solid fa-user"></i></i>John Doe</span>
                                <span class="ownerphone"><i class="fa-solid fa-phone"></i> (123) 456-7890</span>
                                <span class="owneremail"><i class="fa-solid fa-envelope"></i> 1v2G2@example.com</span>
                                <span class="ownerlocation"> <i class="fa-solid fa-location-dot"></i> New York, USA</span>
                            </div>
                        </div>
                </div>
            </div>


    </div>


     <!-- My Products Edit and  new form -->
    <div class="MyProductsDetailsform d-none" id="MyProductsDetailsform">
        <div class="topbarwithbtn" onclick="goBackToMyProducts()" style="cursor: pointer;">
            <h3><i class="fa-solid fa-arrow-left"></i> <span id="tabtitletabform">Product Details</span></h3>
        </div>

        <div class="inner">
            <form class="col-12">
            <div class="form-groupfield">
                <label for="productName" class="form-label">Name*</label>
                <input type="text" class="form-control" id="productName" placeholder="Name Here" />
            </div>

            <div class="form-groupfield">
                <label for="productNumber" class="form-label">Phone Number*</label>
                <input type="text" class="form-control" id="productNumber" placeholder="Number Here" />
            </div>

            <div class="form-groupfield">
                <label for="productPrice" class="form-label">Price*</label>
                <input type="number" class="form-control" id="productPrice" placeholder="$0.00" />
            </div>

            <div class="form-groupfield">
                <label for="productDescription" class="form-label">Description*</label>
                <textarea class="form-control" id="productDescription" rows="4" placeholder="Description Here"></textarea>
            </div>

            <div class="form-groupfield">
                <label for="productCategory" class="form-label">Category*</label>
                <select id="productCategory" class="form-control">
                <option value="">Select Category</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="home">Home</option>
                </select>
            </div>

            <!-- ✅ Upload Box -->
            <div class="form-groupfield">
                <label class="form-label">Upload Image*</label>
                <div class="upload-box" id="uploadBox">
                <input type="file" id="productImage" accept="image/*" />
                <div class="upload-content" id="uploadContent">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p>Upload Image</p>
                </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>



<?php include '../includes/footer.php'; ?>


