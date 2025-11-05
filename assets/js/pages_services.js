// Extracted from: pages/services.php

const serviceslistcontainer = document.getElementById('ServicesLists');
    const servicesData= [
        { id: 1, name: 'Cleaning', image: 'cleaningimage.png', discription: 'Cleaning discription lorem ipsum dolor sit amet consectetur adipiscing elit',iconpath: 'servicesiconbox.png', },
        { id: 2, name: 'Electrician', image: 'cleaningimage.png', discription: 'Electrician discription  lorem ipsum dolor sit amet consectetur adipiscing elit',iconpath: 'servicesiconbox.png',  },
        { id: 3, name: 'Plumbing', image: 'cleaningimage.png', discription: 'Plumbing discription  lorem ipsum dolor sit amet consectetur adipiscing elit',iconpath: 'servicesiconbox.png',  },
        { id: 4, name: 'Carpentry', image: 'cleaningimage.png', discription: 'Carpentry discription',iconpath: 'servicesiconbox.png',  },
        { id: 5, name: 'Painting', image: 'cleaningimage.png', discription: 'Painting discription',iconpath: 'servicesiconbox.png',  },
        { id: 6, name: 'Landscaping', image: 'cleaningimage.png', discription: 'Landscaping discription',iconpath: 'servicesiconbox.png',  },
        { id: 7, name: 'Landscaping', image: 'cleaningimage.png', discription: 'Landscaping discription',iconpath: 'servicesiconbox.png',  },
        { id: 8, name: 'Landscaping', image: 'cleaningimage.png', discription: 'Landscaping discription',iconpath: 'servicesiconbox.png',  },
        { id: 9, name: 'Landscaping', image: 'cleaningimage.png', discription: 'Landscaping discription',iconpath: 'servicesiconbox.png',  },
    ];


    serviceslistcontainer.innerHTML = '';

    servicesData.forEach(service => {
        const serviceItem = document.createElement('div');
        serviceItem.classList.add('col-12', 'col-md-6', 'col-lg-4', 'mb-4','Listofservicesitem');

        serviceItem.innerHTML = `
            <div class="servicebox">
                <div class="serviceimage">
                    <img src="../assets/images/${service.image}" alt="${service.name} Icon">
                </div>
                <div class="servicename">
                    <div class="serviceicon">
                        <img src="../assets/images/${service.iconpath}" alt="${service.name} Icon">
                    </div>
                    <fdiv class="servicetext">    
                        <h5>${service.name}</h5>
                        <p>${service.discription}</p>
                        <a class="btntransparent" href="${SITE_URL}pages/services_providers.php">Read More</a>
                    </div>
                </div>
            </div>
        `;

        serviceslistcontainer.appendChild(serviceItem);
    });