// Extracted from: pages/dashboard.php

const categorycontainer = document.getElementById('categoriesServices');

    const categoriesData= [
        { id: 1, name: 'Cleaning', icon: 'cleaning_icon.png', discription: 'Cleaning discription' },
        { id: 2, name: 'Electrician', icon: 'electric_icon.png', discription: 'Electrician discription' },
        { id: 3, name: 'Plumbing', icon: 'plumbing_icon.png', discription: 'Plumbing discription' },
        { id: 4, name: 'Painting', icon: 'painter_icon.png', discription: 'Painting discription' },
        { id: 5, name: 'Landscaping', icon: 'cleaning_icon.png', discription: 'Landscaping discription' },
        { id: 6, name: 'Carpentry', icon: 'electric_icon.png', discription: 'Carpentry discription' },
        { id: 7, name: 'Landscaping', icon: 'plumbing_icon.png', discription: 'Landscaping discription' },
        { id: 8, name: 'Landscaping', icon: 'painter_icon.png', discription: 'Landscaping discription' },
    ];

    categorycontainer.innerHTML = '';

    categoriesData.forEach(category => {
        const categoryItem = document.createElement('li');
        categoryItem.classList.add('categoryserviceitem');

        categoryItem.innerHTML = `
            <div class="servicebox" style="cursor: pointer;" onclick="window.location.href='../pages/services.php?category=${category.id}'">
                <div class="serviceicon">
                    <img src="../assets/images/categoryIcons/${category.icon}" alt="${category.name} Icon">
                </div>
                <h6>${category.name}</h6>
            </div>
        `;

        categorycontainer.appendChild(categoryItem);
    });