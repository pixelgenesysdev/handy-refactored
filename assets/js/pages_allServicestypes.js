   const allServicestypesDiv = document.getElementById('allServicestypes');
   const allServicestypesnextbut = document.getElementById('allServicestypesnext');

    servicestype.forEach(service => {
        const item = document.createElement("div");
        item.classList.add("serviceboxmain");
        item.innerHTML = `
            <div class="servicebox" style="cursor: pointer;">
                <div class="serviceicon">
                    <img src="../assets/images/${service.iconpath}" alt="${service.name} Icon">
                </div>
                <h6>${service.name}</h6>
            </div>
        `;
        allServicestypesDiv.appendChild(item);
    });

    let selectedServiceId = null;

    const allBoxes = document.querySelectorAll(".serviceboxmain");

    allBoxes.forEach((box, index) => {
        box.addEventListener("click", () => {
            // Remove active from ALL boxes
            allBoxes.forEach(b => b.classList.remove("active"));

            // Add active to the clicked box
            box.classList.add("active");

            // Update selected ID
            selectedServiceId = servicestype[index].id;

            console.log("Selected service ID:", selectedServiceId);
        });
    });

    allServicestypesnextbut.addEventListener('click', () => {
        if (selectedServiceId == null) {
            showPopup('Please select a service type', 'error', 'Error', 'OK');
        }
        else {
            window.location.href = `create-service.php?serviceid=${selectedServiceId}`;
        }
    });