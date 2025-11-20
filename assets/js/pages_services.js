// Extracted from: pages/services.php

const serviceslistcontainer = document.getElementById('ServicesLists');





    serviceslistcontainer.innerHTML = '';

    servicestype.forEach(service => {
        const serviceItem = document.createElement('div');
        serviceItem.classList.add('col-12', 'col-md-6', 'col-lg-4', 'mb-4','Listofservicesitem');

        serviceItem.innerHTML = `
            <div class="servicebox" id="serviceboxmain">
                <div class="serviceimage">
                    <img src="../assets/images/services-images/${service.image}" alt="${service.name} Icon">
                </div>
                <div class="servicename">
                    <div class="serviceicon">
                        <img src="${SITE_URL}assets/images/${service.iconpath}" alt="${service.name} Icon">
                    </div>
                    <div class="servicetext">    
                        <h5>${service.name}</h5>
                        <p>${service.discription}</p>
                         <!--
                        <a class="btntransparent" href="${SITE_URL}pages/services_providers.php">Read More</a>
                         -->
                    </div>
                </div>
            </div>
        `;

        // Get the service box inside this serviceItem
        const serviceBox = serviceItem.querySelector('.servicebox');
        serviceBox.style.cursor = 'pointer';

        // Add click event
        serviceBox.addEventListener('click', () => {
            window.location.href = `${SITE_URL}pages/services_providers.php`;
        });
        
        serviceslistcontainer.appendChild(serviceItem);
    });