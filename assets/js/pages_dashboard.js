const categorycontainer = document.getElementById('categoriesServices');

categorycontainer.innerHTML = "";

servicestype.forEach(service => {
    const item = document.createElement("div");
    item.classList.add("item");

    item.innerHTML = `
        <div class="servicebox" style="cursor: pointer;"
            onclick="window.location.href='${SITE_URL}pages/services_providers.php?category=${service.id}'">
            <div class="serviceicon">
                <img src="../assets/images/${service.iconpath}" alt="${service.name} Icon">
            </div>
            <h6>${service.name}</h6>
        </div>
    `;

    categorycontainer.appendChild(item);
});



// Initialize Owl Carousel
$(document).ready(function () {
    $("#categoriesServices").owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2500,
        smartSpeed: 600,
        navText: ["‹", "›"],
        responsive: {
            0: { items: 2 },
            480: { items: 3 },
            768: { items: 5 },
            1024: { items: 7 }
        }
    });
});
