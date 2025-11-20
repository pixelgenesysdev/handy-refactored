const servicestype = [
    {id:1,name:'Cleaning',image:'cleaning_service_image.webp',discription:'Cleaning discription lorem ipsum dolor sit amet consectetur adipiscing elit',iconpath:'servicesiconbox.png'},
    {id:2,name:'Electrician',image:'electric_service_image.webp',discription:'Electrician discription lorem ipsum dolor sit amet consectetur adipiscing elit',iconpath:'servicesiconbox1.png'},
    {id:3,name:'Plumbing',image:'hands-plumbing.webp',discription:'Install or fix plumbing systems ensuring smooth water flow everywhere.',iconpath:'servicesiconbox2.png'},
    {id:4,name:'Carpentry',image:'cleaningimage.png',discription:'Carpentry discription',iconpath:'servicesiconbox3.png'},
    {id:5,name:'Painting',image:'painting_service_image.webp',discription:'Painting discription',iconpath:'servicesiconbox1.png'},
    {id:6,name:'Roof',image:'attractive-roof-shingle-repair.webp',discription:'Repair roof shingles to prevent leaks and maintain home safety.',iconpath:'servicesiconbox.png'},
    {id:7,name:'Ductwork',image:'closeup-hands-ductwork-modern-bright.webp',discription:'Install or repair ductwork ensuring proper airflow and ventilation efficiency.',iconpath:'servicesiconbox3.png'},
    {id:8,name:'Kitchen',image:'complete-kitchen-remodel.webp',discription:'Upgrade kitchen layout, cabinets, countertops, and overall modern functionality.',iconpath:'servicesiconbox2.png'},
    {id:9,name:'Renovation',image:'entire-house-renovation-3.webp',discription:'Complete home renovation improving structure, appearance, comfort, and value.',iconpath:'servicesiconbox1.png'},
    {id:10,name:'Mounting',image:'faceless-general-mounting.webp',discription:'Mount TVs, shelves, and items securely with professional installation support.',iconpath:'servicesiconbox2.png'},
    {id:11,name:'Wallpaper',image:'faceless-wallpaper-1.webp',discription:'Apply wallpaper neatly to refresh room interiors with style and texture.',iconpath:'servicesiconbox1.png'},
    {id:12,name:'Furniture',image:'full-scene-furniture-assembly.webp',discription:'Assemble household furniture quickly and safely with professional handling service.',iconpath:'servicesiconbox.png'},
    {id:13,name:'Concrete',image:'half-concrete-half-brick-painting.webp',discription:'Paint concrete or brick surfaces for a clean refreshed exterior look.',iconpath:'servicesiconbox3.png'},
    {id:14,name:'Chandelier',image:'hands-chandelier-installation.webp',discription:'Install chandeliers safely enhancing interior lighting and stylish home appearance.',iconpath:'servicesiconbox3.png'},
    {id:15,name:'Drywall',image:'hands-drywall-taping.webp',discription:'Smooth drywall taping creating clean surfaces ready for painting work.',iconpath:'servicesiconbox2.png'},
    {id:16,name:'Electrical',image:'hands-electrical-emergency.webp',discription:'Immediate electrical repair service handling dangerous faults and safety issues.',iconpath:'servicesiconbox3.png'},
    {id:17,name:'Hanging',image:'hands-hanging-items.webp',discription:'Hang heavy items like mirrors and frames securely and accurately.',iconpath:'servicesiconbox1.png'},
    {id:18,name:'SmallHanging',image:'hands-hanging-small-items.webp',discription:'Hang small decorative items neatly for organized stylish interior spaces.',iconpath:'servicesiconbox2.png'},
    {id:19,name:'KitchenUpgrade',image:'hands-kitchen-remodeling.webp',discription:'Affordable kitchen improvements enhancing usability, lighting, layout, and storage.',iconpath:'servicesiconbox.png'},
    {id:20,name:'Landscaping',image:'hands-landscaping.webp',discription:'Professional landscaping shaping beautiful outdoor lawns, gardens, and yards.',iconpath:'servicesiconbox2.png'},
    {id:21,name:'Lighting',image:'hands-lighting-installation.webp',discription:'Install lighting fixtures to brighten interiors and improve home ambiance.',iconpath:'servicesiconbox.png'},
    {id:22,name:'Mold',image:'hands-mold-removal.webp',discription:'Remove mold safely restoring clean, healthy, and breathable home environments.',iconpath:'servicesiconbox1.png'},
    {id:23,name:'Moving',image:'hands-moving-packing.webp',discription:'Pack and move belongings safely ensuring damage-free transportation anytime.',iconpath:'servicesiconbox1.png'},
    {id:24,name:'Lawn',image:'hands-push-mower.webp',discription:'Keep your lawn clean, even, and maintained using professional mowing.',iconpath:'servicesiconbox.png'},
    {id:25,name:'PVCFence',image:'hands-pvc-fence-installation.webp',discription:'Install strong and durable PVC fencing for privacy and security.',iconpath:'servicesiconbox3.png'},
    {id:26,name:'RecessedLight',image:'hands-recessed-light-installation.webp',discription:'Install recessed ceiling lights creating bright modern interior environments.',iconpath:'servicesiconbox.png'},
    {id:27,name:'Refrigerator',image:'hands-refrigerator-repair.webp',discription:'Repair refrigerator cooling issues restoring efficient and reliable performance.',iconpath:'servicesiconbox2.png'},
    {id:28,name:'Tile',image:'hands-tile-cutting.webp',discription:'Cut tiles with precision for flooring, kitchens, and bathroom installations.',iconpath:'servicesiconbox.png'},
    {id:29,name:'Manicure',image:'hands-travel-nail-manicure.webp',discription:'Mobile nail service offering professional manicure treatment at home.',iconpath:'servicesiconbox1.png'},
    {id:30,name:'Wall',image:'hands-wall-repair.webp',discription:'Repair damaged walls restoring smooth surfaces ready for painting.',iconpath:'servicesiconbox.png'},
    {id:31,name:'WashingMachine',image:'hands-washing-machine-repair.webp',discription:'Fix washing machine issues improving performance and extending appliance life.',iconpath:'servicesiconbox2.png'},
    {id:32,name:'WoodFlooring',image:'hands-wood-flooring-1.webp',discription:'Install or repair wood floors creating elegant, long-lasting interior finish.',iconpath:'servicesiconbox3.png'},
    {id:33,name:'HVAC',image:'high-angle-complete-hvac-system.webp',discription:'Install full HVAC systems providing reliable heating and cooling performance.',iconpath:'servicesiconbox3.png'},
    {id:34,name:'Gutter',image:'improved-gutter-repair.webp',discription:'Repair and clean gutters preventing blockages and water-related damages.',iconpath:'servicesiconbox2.png'},
    {id:35,name:'Landscape',image:'landscape-only.webp',discription:'Maintain outdoor landscape ensuring attractive, clean, and healthy yard areas.',iconpath:'servicesiconbox1.png'},
    {id:36,name:'Cabinet',image:'luxury-cabinet-repair.webp',discription:'Repair or restore cabinets improving home storage and interior appearance.',iconpath:'servicesiconbox.png'},
    {id:37,name:'CarWash',image:'luxury-mobile-car-wash-high-angle.webp',discription:'Professional mobile car wash providing convenient detailing at home.',iconpath:'servicesiconbox2.png'}
];

const myservices = [
    {id:1,name:'Cleaning',image:'cleaning_service_image.webp',discription:'Cleaning discription lorem ipsum dolor sit amet consectetur adipiscing elit',iconpath:'servicesiconbox.png'},
    {id:2,name:'Electrician',image:'electric_service_image.webp',discription:'Electrician discription lorem ipsum dolor sit amet consectetur adipiscing elit',iconpath:'servicesiconbox1.png'},
    {id:3,name:'Plumbing',image:'hands-plumbing.webp',discription:'Install or fix plumbing systems ensuring smooth water flow everywhere.',iconpath:'servicesiconbox2.png'},
    {id:4,name:'Carpentry',image:'cleaningimage.png',discription:'Carpentry discription',iconpath:'servicesiconbox3.png'},
    {id:5,name:'Painting',image:'painting_service_image.webp',discription:'Painting discription',iconpath:'servicesiconbox1.png'},
];




// Global myJobs data
// Global Jobs Array
const myJobs = [
    {
        id: 1,
        title: 'Car Wash',
        description: 'Professional mobile car wash providing convenient detailing at home.',
        images: ['luxury-mobile-car-wash-high-angle.webp'],
        status: 'Pending',
        type: 'urgent',
        visitCharges: 40,
        hourlyRate: 10,
        searchSetting: true,
        availableDates: ['2025-11-18','2025-11-19','2025-11-20','2025-11-21','2025-11-22'],
        quickService: true
    },
    {
        id: 2,
        title: 'Home Cleaning',
        description: 'Complete home cleaning including bathrooms, kitchen, and living room.',
        images: ['home-cleaning.webp'],
        status: 'Pending',
        type: 'normal',
        visitCharges: 250,
        hourlyRate: 10,
        searchSetting: true,
        availableDates: ['2025-11-18','2025-11-19','2025-11-21','2025-11-23','2025-11-25'],
        quickService: false
    },
    {
        id: 3,
        title: 'Gardening Service',
        description: 'Professional gardening services: trimming, planting, lawn care.',
        images: ['gardening-service.webp'],
        status: 'Upcoming',
        type: 'normal',
        visitCharges: 500,
        hourlyRate: 15,
        searchSetting: true,
        availableDates: ['2025-11-20','2025-11-21','2025-11-22','2025-11-24'],
        quickService: true
    },
    {
        id: 4,
        title: 'Plumbing',
        description: 'Expert plumbing services for home and office.',
        images: ['plumbing-service.webp'],
        status: 'Pending',
        type: 'urgent',
        visitCharges: 300,
        hourlyRate: 20,
        searchSetting: false,
        availableDates: ['2025-11-18','2025-11-20','2025-11-22','2025-11-25'],
        quickService: true
    },
    {
        id: 5,
        title: 'Electrical Repair',
        description: 'Certified electricians for all types of electrical repairs and installations.',
        images: ['electrical-repair.webp'],
        status: 'Upcoming',
        type: 'normal',
        visitCharges: 350,
        hourlyRate: 25,
        searchSetting: true,
        availableDates: ['2025-11-19','2025-11-21','2025-11-23','2025-11-24'],
        quickService: false
    }
];







