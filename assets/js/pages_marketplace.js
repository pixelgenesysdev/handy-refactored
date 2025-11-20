// Extracted from: pages/marketplace.php

const productImage = document.getElementById('productImage');
        const uploadBox = document.getElementById('uploadBox');
        const uploadContent = document.getElementById('uploadContent');

        productImage.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Remove old preview if any
                let oldImg = uploadBox.querySelector('img');
                if (oldImg) oldImg.remove();

                // Create new preview
                const img = document.createElement('img');
                img.src = e.target.result;
                uploadBox.appendChild(img);

                // Hide upload text and icon
                uploadContent.style.display = 'none';
                img.style.display = 'block';
            };
            reader.readAsDataURL(file);
            } else {
            // If file removed, restore upload content
            uploadContent.style.display = 'block';
            const oldImg = uploadBox.querySelector('img');
            if (oldImg) oldImg.remove();
            }
        });


        const productCategory = [
            'Electronics',
            'Clothing',
            'hammers',
            'Books',
            'drills',
            'Sports',
            'Beauty',
            'saws'
        ]

        const productCategorySelect = document.getElementById('productCategory');
        productCategory.forEach(category => {
            const option = document.createElement('option');
            option.value = category;
            option.textContent = category;
            productCategorySelect.appendChild(option);
        }); 

         // Tabs functionality Marketplace Page
        const marketproducttabbuttons = document.querySelectorAll('.marketproducttabbtn');
        const marketproducttabcontents = document.querySelectorAll('.marketproducttabcontent');
        const tabtitletabcontentDetails = document.querySelector('.tabtitle');

        // Show default tab on load
        document.querySelector('#AllProducts').classList.remove('d-none');

        marketproducttabbuttons.forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.getAttribute('data-tab');

                // Handle active button
                marketproducttabbuttons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // Toggle tab content
                marketproducttabcontents.forEach(content => {
                    content.classList.toggle('d-none', content.id !== tab);
                });

                // Update title dynamically
                tabtitletabcontentDetails.textContent = tab === 'AllProducts' ? 'Marketplace' : 'My Products';
            });
        });





        const AllProductsContainer = document.getElementById('AllProductsContainer');
        const AllProductsData = [
            { 
                id: 1, 
                name: 'Product 1', 
                image: 'hands-wall-repair.webp', 
                price: '500', 
                description: 'Description for Product 1', 
                owner: { 
                    name: 'Owner 1', 
                    phone: '1234567890', 
                    email: 'owner1@example.com', 
                    location: 'Location 1' 
                }
            },
            { 
                id: 2, 
                name: 'Product 2', 
                image: 'hands-wall-repair.webp', 
                price: '600', 
                description: 'Description for Product 2', 
                owner: { 
                    name: 'Owner 2', 
                    phone: '2345678901', 
                    email: 'owner2@example.com', 
                    location: 'Location 2' 
                }
            },
            { 
                id: 3, 
                name: 'Product 3', 
                image: 'hands-wall-repair.webp', 
                price: '700', 
                description: 'Description for Product 3', 
                owner: { 
                    name: 'Owner 3', 
                    phone: '3456789012', 
                    email: 'owner3@example.com', 
                    location: 'Location 3' 
                }
            },
            { 
                id: 4, 
                name: 'Product 4', 
                image: 'hands-wall-repair.webp', 
                price: '800', 
                description: 'Description for Product 4', 
                owner: { 
                    name: 'Owner 4', 
                    phone: '4567890123', 
                    email: 'owner4@example.com', 
                    location: 'Location 4' 
                }
            },
            { 
                id: 5, 
                name: 'Product 5', 
                image: 'hands-wall-repair.webp', 
                price: '900', 
                description: 'Description for Product 5', 
                owner: { 
                    name: 'Owner 5', 
                    phone: '5678901234', 
                    email: 'owner5@example.com', 
                    location: 'Location 5' 
                }
            },
            { 
                id: 6, 
                name: 'Product 6', 
                image: 'hands-wall-repair.webp', 
                price: '1000', 
                description: 'Description for Product 6', 
                owner: { 
                    name: 'Owner 6', 
                    phone: '6789012345', 
                    email: 'owner6@example.com', 
                    location: 'Location 6' 
                }
            },
            { 
                id: 7, 
                name: 'Product 7', 
                image: 'hands-wall-repair.webp', 
                price: '1100', 
                description: 'Description for Product 7', 
                owner: { 
                    name: 'Owner 7', 
                    phone: '7890123456', 
                    email: 'owner7@example.com', 
                    location: 'Location 7' 
                }
            },
            { 
                id: 8, 
                name: 'Product 8', 
                image: 'hands-wall-repair.webp', 
                price: '1200', 
                description: 'Description for Product 8', 
                owner: { 
                    name: 'Owner 8', 
                    phone: '8901234567', 
                    email: 'owner8@example.com', 
                    location: 'Location 8' 
                }
            },
            { 
                id: 9, 
                name: 'Product 9', 
                image: 'hands-wall-repair.webp', 
                price: '1300', 
                description: 'Description for Product 9', 
                owner: { 
                    name: 'Owner 9', 
                    phone: '9012345678', 
                    email: 'owner9@example.com', 
                    location: 'Location 9' 
                }
            },
            { 
                id: 10, 
                name: 'Product 10', 
                image: 'hands-wall-repair.webp', 
                price: '1400', 
                description: 'Description for Product 10', 
                owner: { 
                    name: 'Owner 10', 
                    phone: '0123456789', 
                    email: 'owner10@example.com', 
                    location: 'Location 10' 
                }
            },
            { 
                id: 11, 
                name: 'Product 11', 
                image: 'hands-wall-repair.webp', 
                price: '1500', 
                description: 'Description for Product 11', 
                owner: { 
                    name: 'Owner 11', 
                    phone: '1234567891', 
                    email: 'owner11@example.com', 
                    location: 'Location 11' 
                }
            },
            { 
                id: 12, 
                name: 'Product 12', 
                image: 'hands-wall-repair.webp', 
                price: '1600', 
                description: 'Description for Product 12', 
                owner: { 
                    name: 'Owner 12', 
                    phone: '2345678902', 
                    email: 'owner12@example.com', 
                    location: 'Location 12' 
                }
            },
            { 
                id: 13, 
                name: 'Product 13', 
                image: 'hands-wall-repair.webp', 
                price: '1700', 
                description: 'Description for Product 13', 
                owner: { 
                    name: 'Owner 13', 
                    phone: '3456789013', 
                    email: 'owner13@example.com', 
                    location: 'Location 13' 
                }
            },
            { 
                id: 14, 
                name: 'Product 14', 
                image: 'hands-wall-repair.webp', 
                price: '1800', 
                description: 'Description for Product 14', 
                owner: { 
                    name: 'Owner 14', 
                    phone: '4567890124', 
                    email: 'owner14@example.com', 
                    location: 'Location 14' 
                }
            },
            { 
                id: 15, 
                name: 'Product 15', 
                image: 'hands-wall-repair.webp', 
                price: '1900', 
                description: 'Description for Product 15', 
                owner: { 
                    name: 'Owner 15', 
                    phone: '5678901235', 
                    email: 'owner15@example.com', 
                    location: 'Location 15' 
                }
            },
            { 
                id: 16, 
                name: 'Product 16', 
                image: 'hands-wall-repair.webp', 
                price: '2000', 
                description: 'Description for Product 16', 
                owner: { 
                    name: 'Owner 16', 
                    phone: '6789012346', 
                    email: 'owner16@example.com', 
                    location: 'Location 16' 
                }
            },
            { 
                id: 17, 
                name: 'Product 17', 
                image: 'hands-wall-repair.webp', 
                price: '2100', 
                description: 'Description for Product 17', 
                owner: { 
                    name: 'Owner 17', 
                    phone: '7890123457', 
                    email: 'owner17@example.com', 
                    location: 'Location 17' 
                }
            },
            { 
                id: 18, 
                name: 'Product 18', 
                image: 'hands-wall-repair.webp', 
                price: '2200', 
                description: 'Description for Product 18', 
                owner: { 
                    name: 'Owner 18', 
                    phone: '8901234568', 
                    email: 'owner18@example.com', 
                    location: 'Location 18' 
                }
            },
            { 
                id: 19, 
                name: 'Product 19', 
                image: 'hands-wall-repair.webp', 
                price: '2300', 
                description: 'Description for Product 19', 
                owner: { 
                    name: 'Owner 19', 
                    phone: '9012345679', 
                    email: 'owner19@example.com', 
                    location: 'Location 19' 
                }
            },
            { 
                id: 20, 
                name: 'Product 20', 
                image: 'hands-wall-repair.webp', 
                price: '2400', 
                description: 'Description for Product 20', 
                owner: { 
                    name: 'Owner 20', 
                    phone: '0123456790', 
                    email: 'owner20@example.com', 
                    location: 'Location 20' 
                }
            }
        ];
 
        // Populate All Products
        AllProductsContainer.innerHTML = '';
        AllProductsData.forEach(product => {
            const productCard = document.createElement('div');
            productCard.classList.add('productcard', 'col-6', 'col-md-4', 'col-lg-2', 'mb-2');
            productCard.innerHTML = `
                <div class="productboxinner" onclick="showProductDetails(${product.id})">
                    <img src="${SITE_URL}assets/images/services-images/${product.image}" alt="${product.name}">
                    <div class="productcontent">
                        <h4>${product.name}</h4>
                        <span class="productprice">$${product.price}</span>
                    </div>   
                </div>    
            `;
            AllProductsContainer.appendChild(productCard);
            


        });

        const productsContainerDetail = document.getElementById('productsContainerDetail');
        productsContainerDetail.innerHTML = '';
        showProductDetails = (productId) => {
            const product = AllProductsData.find(p => p.id === productId);
            if (product) {
                productsContainerDetail.innerHTML = `
                    <div class="productdetailsboximage col-lg-5 col-md-12 col-12">
                        <img src="${SITE_URL}assets/images/services-images/${product.image}" alt="${product.name}">
                    </div>
                    <div class="productdetailsbox col-lg-7 col-md-12 col-12 p-2">
                            <h3 class="productname">${product.name}</h3>
                            <span class="category">Category</span>
                            <span class="productprice">$${product.price}</span>
                            <p class="productdescription">${product.description}</p>
                            <div class="ownerdetails">
                                <h4>Owner Details</h4>
                                <div class="ownerinfo">
                                    <span class="ownername"><i class="fa-solid fa-user"></i>${product.owner.name}</span>
                                    <span class="ownerphone"><i class="fa-solid fa-phone"></i> ${product.owner.phone}</span>
                                    <span class="owneremail"><i class="fa-solid fa-envelope"></i> ${product.owner.email}</span>
                                    <span class="ownerlocation"> <i class="fa-solid fa-location-dot"></i> ${product.owner.location}</span>
                                </div>    
                            </div>
                    </div>
                `;
            }
            document.getElementById('ProductsDetails').classList.remove('d-none');
            document.getElementById('marketproducttabscontent').classList.add('d-none');
            document.getElementById('topbarwithbtn').classList.add('d-none');
        }

        goBackToProducts = () => {
            document.getElementById('ProductsDetails').classList.add('d-none');
            document.getElementById('marketproducttabscontent').classList.remove('d-none');
            document.getElementById('topbarwithbtn').classList.remove('d-none');
        }


        const MyProductsContainer = document.getElementById('MyProductsContainer');
        MyProductsContainer.innerHTML = '';

        MyProductsData = [
            { 
                id: 1, 
                name: 'My Product 1', 
                categpory: 'Hammers',
                image: 'hands-wall-repair.webp', 
                price: '500', 
                description: 'Description for My Product 1'
            },
            { 
                id: 2, 
                name: 'My Product 2', 
                categpory: 'Drills',
                image: 'hands-wall-repair.webp', 
                price: '600', 
                description: 'Description for My Product 2'
            },
            { 
                id: 3, 
                name: 'My Product 3', 
                categpory: 'Saws',
                image: 'hands-wall-repair.webp', 
                price: '700', 
                description: 'Description for My Product 3'
            },
            { 
                id: 4, 
                name: 'My Product 4', 
                categpory: 'Saws',
                image: 'hands-wall-repair.webp', 
                price: '800', 
                description: 'Description for My Product 4'
            },
            { 
                id: 5, 
                name: 'My Product 5', 
                categpory: 'Saws',
                image: 'hands-wall-repair.webp', 
                price: '900', 
                description: 'Description for My Product 5'
            }
        ]

        MyProductsData.forEach(product => {
            const myProductBox = document.createElement('div');
            myProductBox.classList.add('myproductbox', 'col-12', 'col-md-12', 'col-lg-6', 'mb-6');
            myProductBox.innerHTML = `
                <div class="myproductboxcontentinner">
                    <div class="myproductboximage">
                        <img src="${SITE_URL}assets/images/services-images/${product.image}" width="100%" alt="Product Image">
                    </div>
                    <div class="myproductboxcontent">
                    
                        <span class="category">${product.categpory}  </span>
                        <h3 class="productname">${product.name}</h3>
                        <span class="productprice">$${product.price}</span>
                        <p class="productdescription">${product.description}</p>
                        <div class="myproductboxbuttons d-flex">
                            <button class="btn action-btn" id="editbuttonmyproduct" onclick="editbuttonform(${product.id})"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn action-btn" id="deletebuttonmyproduct" onclick="deletebuttonmyproduct(${product.id})"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            `;
            MyProductsContainer.appendChild(myProductBox);  
        })


        // edit and new product form functionality
        const MyProductsDetailsform = document.getElementById('MyProductsDetailsform');
        const editButtons = document.querySelectorAll('.myproductboxbuttons .action-btn:first-child');
        const tabtitletabform = document.getElementById('tabtitletabform');

        function editbuttonform(productid){
                MyProductsDetailsform.classList.remove('d-none');
                MyProductsDetailsform.querySelector('form button[type="submit"]').textContent = 'Update';
                MyProductsDetailsform.classList.add('edit-mode');
                document.getElementById('marketproducttabscontent').classList.add('d-none');
                document.getElementById('topbarwithbtn').classList.add('d-none');
                tabtitletabform.textContent = 'Edit Product';

                //  Populate form with product data

                const product = MyProductsData.find(p => p.id === productid);
                if (product) {
                    document.getElementById('productName').value = product.name;
                    document.getElementById('productNumber').value = product.id;
                    document.getElementById('productPrice').value = product.price;
                    document.getElementById('productDescription').value = product.description;
                    // Assuming category is part of product data
                    document.getElementById('productCategory').value = product.categpory.toLowerCase();

                    // Display existing image
                    let oldImg = uploadBox.querySelector('img');
                    if (oldImg) oldImg.remove();
                    const img = document.createElement('img');
                    img.src = `${SITE_URL}assets/images/${product.image}`;
                    uploadBox.appendChild(img);
                    uploadContent.style.display = 'none';
                    img.style.display = 'block';
                }

        }

        const newProductButton = document.getElementById('newProductButton');
        newProductButton.addEventListener('click', () => {
            MyProductsDetailsform.classList.remove('d-none');
            MyProductsDetailsform.classList.add('New-mode');
            document.getElementById('marketproducttabscontent').classList.add('d-none');
            document.getElementById('topbarwithbtn').classList.add('d-none');
            tabtitletabform.textContent = 'New Product';
            MyProductsDetailsform.querySelector('form button[type="submit"]').textContent = 'Add';
        });

        function goBackToMyProducts() {
            MyProductsDetailsform.classList.add('d-none');
            document.getElementById('marketproducttabscontent').classList.remove('d-none');
            document.getElementById('topbarwithbtn').classList.remove('d-none');
        }
        // Delete product confirmation popup

        function deletebuttonmyproduct(){
 
               showPopup(
                    'Are you sure you want to delete this product?',
                    'delete',
                    'Delete This Product?',
                    'Yes',
                    () => {
                        // Simulate deletion or API call
                        setTimeout(() => {
                            showPopup(
                                'Product has been Deleted Successfully',
                                'success',
                                'Successfully Deleted',
                                'OK',
                                () => {
                                    window.location.reload();
                                }
                            );
                        }, 300); // 300ms delay lets the delete popup close first
                    }
                );

        }