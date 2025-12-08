// pages_allbookings.js
// Complete Booking Management System

const { jsPDF } = window.jspdf;

// Placeholder image for demonstration
const placeholderImage = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0iI2RkZCIgLz48dGV4dCB4PSI1MCIgeT0iNTAiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzAwMCIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkltYWdlPC90ZXh0Pjwvc3ZnPg==';




// Current booking reference
let currentBooking = null;



// ========================================
// BOOKING DATA (10 Sample Bookings)
// ========================================
const bookingData = [
  {
    id: '0000001',
    date: '21/11/2025',
    status: 'pending',
    price: 10,
    user: 'John Doe Pending',
    phone: '111-111-1111',
    email: 'john.pending@example.com',
    address: '123 Pending St, City',
    service: 'Cleaning Service',
    hourlyRate: 5,
    serviceDate: '22/11/2025',
    serviceTime: '10:00 AM',
    startTime: '',
    beforeImages: [],
    afterImages: [],
    document: {
      services: [],
      notes: '',
      total: 0
    },
    invoice: {
      number: '',
      billTo: '',
      date: '',
      lines: [],
      subtotal: 0,
      tax: 0,
      total: 0
    },
    extraWork: '',
    invoiceAmount: 10,
    isUrgent: false,
    clientName: '',
    clientPhone: '',
    rejectReason: ''
  },
  {
    id: '0000002',
    date: '20/11/2025',
    status: 'assigned',
    price: 15,
    user: 'Jane Assigned',
    phone: '222-222-2222',
    email: 'jane.assigned@example.com',
    address: '456 Assigned Ave',
    service: 'Plumbing',
    hourlyRate: 8,
    serviceDate: '21/11/2025',
    serviceTime: '11:00 AM',
    startTime: '',
    beforeImages: [],
    afterImages: [],
    document: { services: [], notes: '', total: 0 },
    invoice: { number: '', billTo: '', date: '', lines: [], subtotal: 0, tax: 0, total: 0 },
    extraWork: '',
    invoiceAmount: 15,
    isUrgent: false,
    clientName: 'Client A',
    clientPhone: '0301-123-4567',
    rejectReason: ''
  },
  {
    id: '0000003',
    date: '19/11/2025',
    status: 'route',
    price: 20,
    user: 'Mike Route',
    phone: '333-333-3333',
    email: 'mike.route@example.com',
    address: '789 Route Blvd',
    service: 'Electrical',
    hourlyRate: 10,
    serviceDate: '20/11/2025',
    serviceTime: '12:00 PM',
    startTime: '',
    beforeImages: [],
    afterImages: [],
    document: { services: [], notes: '', total: 0 },
    invoice: { number: '', billTo: '', date: '', lines: [], subtotal: 0, tax: 0, total: 0 },
    extraWork: '',
    invoiceAmount: 20,
    isUrgent: false,
    clientName: 'Client B',
    clientPhone: '0301-234-5678',
    rejectReason: ''
  },
  {
    id: '0000004',
    date: '18/11/2025',
    status: 'started',
    price: 25,
    user: 'Emily Started',
    phone: '444-444-4444',
    email: 'emily.started@example.com',
    address: '101 Started Ln',
    service: 'Painting',
    hourlyRate: 12,
    serviceDate: '19/11/2025',
    serviceTime: '01:00 PM',
    startTime: '18/11/2025 01:00 PM',
    beforeImages: [placeholderImage, placeholderImage],
    afterImages: [],
    document: { services: [], notes: '', total: 0 },
    invoice: { number: '', billTo: '', date: '', lines: [], subtotal: 0, tax: 0, total: 0 },
    extraWork: '',
    invoiceAmount: 25,
    isUrgent: false,
    clientName: 'Client C',
    clientPhone: '0301-345-6789',
    rejectReason: ''
  },
  {
    id: '0000005',
    date: '17/11/2025',
    status: 'started',
    price: 30,
    user: 'Bob Started No Img',
    phone: '555-555-5555',
    email: 'bob.noimg@example.com',
    address: '202 Started Way',
    service: 'Gardening',
    hourlyRate: 15,
    serviceDate: '18/11/2025',
    serviceTime: '02:00 PM',
    startTime: '17/11/2025 02:00 PM',
    beforeImages: [],
    afterImages: [],
    document: {
      services: [
        { description: 'Basic Gardening', amount: 20 },
        { description: 'Lawn Mowing', amount: 10 }
      ],
      notes: 'Standard gardening service completed',
      total: 30
    },
    invoice: { number: '', billTo: '', date: '', lines: [], subtotal: 0, tax: 0, total: 0 },
    extraWork: '',
    invoiceAmount: 30,
    isUrgent: false,
    clientName: 'Client D',
    clientPhone: '0301-456-7890',
    rejectReason: ''
  },
  {
    id: '0000006',
    date: '16/11/2025',
    status: 'completed_unpaid',
    price: 35,
    user: 'Alice Unpaid',
    phone: '666-666-6666',
    email: 'alice.unpaid@example.com',
    address: '303 Unpaid Rd',
    service: 'Carpet Cleaning',
    hourlyRate: 18,
    serviceDate: '17/11/2025',
    serviceTime: '03:00 PM',
    startTime: '16/11/2025 03:00 PM',
    beforeImages: [placeholderImage],
    afterImages: [placeholderImage, placeholderImage],
    document: {
      services: [
        { description: 'Carpet Cleaning', amount: 20 },
        { description: 'Extra Stain Removal', amount: 15 }
      ],
      notes: 'Full clean completed, extra work on stains.',
      total: 35
    },
    invoice: {
      number: 'INV006',
      billTo: 'Alice Unpaid',
      date: '16/11/2025',
      lines: [
        { item: 'Carpet Cleaning', description: 'Standard', qty: 1, price: 20, total: 20 },
        { item: 'Extra', description: 'Stain Removal', qty: 1, price: 15, total: 15 }
      ],
      subtotal: 35,
      tax: 3.5,
      total: 38.5
    },
    extraWork: 'Extra stain removal',
    invoiceAmount: 38.5,
    isUrgent: false,
    clientName: 'Client E',
    clientPhone: '0301-567-8901',
    rejectReason: ''
  },
  {
    id: '0000007',
    date: '15/11/2025',
    status: 'completed',
    price: 40,
    user: 'Charlie Completed',
    phone: '777-777-7777',
    email: 'charlie.completed@example.com',
    address: '404 Completed Dr',
    service: 'General Repair',
    hourlyRate: 20,
    serviceDate: '16/11/2025',
    serviceTime: '04:00 PM',
    startTime: '15/11/2025 04:00 PM',
    beforeImages: [placeholderImage],
    afterImages: [placeholderImage],
    document: {
      services: [{ description: 'Repair', amount: 40 }],
      notes: 'Service completed.',
      total: 40
    },
    invoice: {
      number: 'INV007',
      billTo: 'Charlie Completed',
      date: '15/11/2025',
      lines: [{ item: 'Repair', description: 'General', qty: 1, price: 40, total: 40 }],
      subtotal: 40,
      tax: 4,
      total: 44
    },
    extraWork: '',
    invoiceAmount: 44,
    isUrgent: false,
    clientName: 'Client F',
    clientPhone: '0301-678-9012',
    rejectReason: ''
  },
  {
    id: '0000008',
    date: '14/11/2025',
    status: 'unpaid_urgent',
    price: 50,
    user: 'Dana Urgent',
    phone: '888-888-8888',
    email: 'dana.urgent@example.com',
    address: '505 Urgent Pl',
    service: 'Emergency Fix',
    hourlyRate: 25,
    serviceDate: '15/11/2025',
    serviceTime: '05:00 PM',
    startTime: '14/11/2025 05:00 PM',
    beforeImages: [placeholderImage, placeholderImage],
    afterImages: [placeholderImage, placeholderImage],
    document: {
      services: [
        { description: 'Emergency', amount: 50 },
        { description: 'Extra Rush', amount: 20 }
      ],
      notes: 'Urgent repair with overtime.',
      total: 70
    },
    invoice: {
      number: 'INV008',
      billTo: 'Dana Urgent',
      date: '14/11/2025',
      lines: [
        { item: 'Emergency', description: 'Fix', qty: 1, price: 50, total: 50 },
        { item: 'Extra', description: 'Rush', qty: 1, price: 20, total: 20 }
      ],
      subtotal: 70,
      tax: 7,
      total: 77
    },
    extraWork: 'Rush fee applied',
    invoiceAmount: 77,
    isUrgent: true,
    clientName: 'Client G',
    clientPhone: '0301-789-0123',
    rejectReason: ''
  },
  {
    id: '0000009',
    date: '13/11/2025',
    status: 'rejected',
    price: 12,
    user: 'Eve Rejected',
    phone: '999-999-9999',
    email: 'eve.rejected@example.com',
    address: '606 Rejected Ct',
    service: 'Inspection',
    hourlyRate: 6,
    serviceDate: '14/11/2025',
    serviceTime: '06:00 PM',
    startTime: '',
    beforeImages: [],
    afterImages: [],
    document: { services: [], notes: '', total: 0 },
    invoice: { number: '', billTo: '', date: '', lines: [], subtotal: 0, tax: 0, total: 0 },
    extraWork: '',
    invoiceAmount: 12,
    isUrgent: false,
    clientName: '',
    clientPhone: '',
    rejectReason: 'Not available on short notice'
  },
  {
    id: '0000010',
    date: '12/11/2025',
    status: 'pending',
    price: 18,
    user: 'Frank Pending2',
    phone: '000-000-0000',
    email: 'frank.pending2@example.com',
    address: '707 Pending2 Manor',
    service: 'Window Cleaning',
    hourlyRate: 9,
    serviceDate: '13/11/2025',
    serviceTime: '07:00 PM',
    startTime: '',
    beforeImages: [],
    afterImages: [],
    document: { services: [], notes: '', total: 0 },
    invoice: { number: '', billTo: '', date: '', lines: [], subtotal: 0, tax: 0, total: 0 },
    extraWork: '',
    invoiceAmount: 18,
    isUrgent: false,
    clientName: '',
    clientPhone: '',
    rejectReason: ''
  }
];

// Status text mapping
const statusTextMap = {
  pending: "Pending",
  assigned: "Assigned",
  route: "In Route",
  started: "Started",
  completed_unpaid: "Completed Unpaid",
  completed: "Completed",
  unpaid_urgent: "Unpaid Urgent",
  rejected: "Rejected"
};

// DOM Elements
const endTimeSection = document.getElementById('endTimeSection');
const detailendTime = document.getElementById('detailendTime');
const messageicon = document.getElementById('messageicon');
const topbarwithbtn = document.getElementById('topbarwithbtn');
const bookingListEl = document.getElementById('bookingList');
const searchInputEl = document.getElementById('searchInput');
const bookingDetailEl = document.getElementById('bookingDetail');
const backBtnbookingdetail = document.querySelector('.booking-detail #backBtn h3');
const Newreviewform = document.querySelector('#newreviewform');
const backBtnreviewform = document.querySelector('#newreviewform #backBtn h3');
const backBtnreviewformUser = document.querySelector('#newreviewform h3 span#providername');
 const filterSection = document.getElementById('filterSection');


// ========================================
// NEW: REJECTION MODAL VARIABLES
// ========================================
let rejectBooking = null;
let rejectModal = null;

// ========================================
// UTILITY: FILE TO BASE64 CONVERSION
// ========================================
function readFileAsBase64(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onload = () => resolve(reader.result);
    reader.onerror = reject;
    reader.readAsDataURL(file);
  });
}

// ========================================
// MODAL FUNCTIONS
// ========================================

function openDocumentModal(isEdit = false) {
  if (!currentBooking) {
    alert('No booking selected.');
    return;
  }
  document.getElementById('documentModal').classList.remove('hidden');
  handleDocument(currentBooking, isEdit);
}

function closeDocumentModal() {
  document.getElementById('documentModal').classList.add('hidden');
  document.getElementById('modalDocumentContent').innerHTML = '';
  document.getElementById('modalDownloadPdfBtn').classList.add('hidden');
}

function openInvoiceModal(isEdit = false, isView = true) {
  if (!currentBooking) {
    alert('No booking selected.');
    return;
  }
  document.getElementById('invoiceModal').classList.remove('hidden');
  handleInvoice(currentBooking, isEdit, isView);
}

function closeInvoiceModal() {
  document.getElementById('invoiceModal').classList.add('hidden');
  document.getElementById('modalInvoiceContent').innerHTML = '';
  document.getElementById('modalDownloadInvoiceBtn').classList.add('hidden');
}

// ========================================
// NEW: REJECTION MODAL FUNCTIONS
// ========================================
function openRejectModal() {
  if (!rejectBooking) return;
  
  // Create modal if it doesn't exist
  if (!rejectModal) {
    rejectModal = document.createElement('div');
    rejectModal.id = 'rejectModal';
    rejectModal.className = 'modal-overlay hidden';
    rejectModal.innerHTML = `
      <div class="modal-container" style="max-width: 500px;">
        <div class="modal-header">
          <h2>Reject Booking</h2>
          <span class="modal-close" onclick="closeRejectModal()">&times;</span>
        </div>
        <div class="modal-body">
          <p style="margin-bottom: 15px; color: #666;">Please provide a reason for rejecting this booking:</p>
          <textarea 
            id="rejectReasonInput" 
            rows="4" 
            style="width:100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;"
            placeholder="Enter rejection reason here..."></textarea>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="confirmReject()">
            <i class="fa fa-times"></i> Confirm Rejection
          </button>
          <button class="btn btn-secondary" onclick="closeRejectModal()">
            <i class="fa fa-times"></i> Cancel
          </button>
        </div>
      </div>
    `;
    document.body.appendChild(rejectModal);
  }
  
  rejectModal.classList.remove('hidden');
  document.getElementById('rejectReasonInput').value = '';
  setTimeout(() => {
    document.getElementById('rejectReasonInput').focus();
  }, 100);
}

function closeRejectModal() {
  if (rejectModal) {
    rejectModal.classList.add('hidden');
  }
  rejectBooking = null;
}

function confirmReject() {
  const reasonInput = document.getElementById('rejectReasonInput');
  const reason = reasonInput.value.trim();
  
  if (!reason) {
    showPopup('Please enter a rejection reason.', 'error', 'Error', 'Okay');
    reasonInput.focus();
    return;
  }
  
  if (rejectBooking) {
    rejectBooking.rejectReason = reason;
    rejectBooking.status = 'rejected';
    closeRejectModal();
    goBackAndRender();
  }
}

// ========================================
// UTILITY FUNCTIONS
// ========================================

function goBackAndRender() {
  bookingDetailEl.classList.add('hidden');
  bookingListEl.classList.remove('hidden');
  searchInputEl.classList.remove('hidden');
  topbarwithbtn.classList.remove('hidden');
  document.getElementById('imagesSection').classList.add('hidden');
  renderBookings();
}

function renderImageGrid(containerId, images, isBefore = true, editable = false) {
  const container = document.getElementById(containerId);
  if (!container) return;
  
  container.innerHTML = '';
  
  images.forEach((imgSrc, index) => {
    const item = document.createElement('div');
    item.className = 'image-item';
    item.innerHTML = `
      <img src="${imgSrc}" alt="${isBefore ? 'Before' : 'After'}">
      ${editable ? `<button class="remove-image" onclick="removeImage('${containerId}', ${index})">×</button>` : ''}
    `;
    container.appendChild(item);
  });
  
  if (editable && images.length < 4) {
    const addBtn = document.createElement('div');
    addBtn.className = 'image-item add-image';
    addBtn.innerHTML = '+';
    addBtn.addEventListener('click', async () => {
      const input = document.createElement('input');
      input.type = 'file';
      input.accept = 'image/*';
      input.multiple = true;
      input.onchange = async (e) => {
        const files = Array.from(e.target.files).slice(0, 4 - images.length);
        for (let file of files) {
          try {
            const base64 = await readFileAsBase64(file);
            currentBooking[isBefore ? 'beforeImages' : 'afterImages'].push(base64);
          } catch (error) {
            console.error('Error reading file:', error);
          }
        }
        renderImageGrid(containerId, currentBooking[isBefore ? 'beforeImages' : 'afterImages'], isBefore, editable);
      };
      input.click();
    });
    container.appendChild(addBtn);
  }
}

function removeImage(containerId, index) {
  if (!currentBooking) return;
  if (containerId === 'beforeImagesGrid') {
    currentBooking.beforeImages.splice(index, 1);
    renderImageGrid('beforeImagesGrid', currentBooking.beforeImages, true, true);
  } else {
    currentBooking.afterImages.splice(index, 1);
    renderImageGrid('afterImagesGrid', currentBooking.afterImages, false, true);
  }
}

// ========================================
// PDF GENERATION - UPDATED WITH IMAGES
// ========================================

function downloadDocumentPDF() {
  if (!currentBooking) return;
  
  const doc = new jsPDF();
  let y = 20;
  
  // Header
  doc.setFontSize(18);
  doc.setFont(undefined, 'bold');
  doc.text('WORK DOCUMENT', 105, y, { align: 'center' });
  y += 15;
  
  // Booking Info
  doc.setFontSize(12);
  doc.setFont(undefined, 'normal');
  doc.text(`Booking ID: ${currentBooking.id}`, 20, y);
  y += 7;
  doc.text(`Service: ${currentBooking.service}`, 20, y);
  y += 7;
  doc.text(`Customer: ${currentBooking.user}`, 20, y);
  y += 7;
  doc.text(`Address: ${currentBooking.address}`, 20, y);
  y += 7;
  doc.text(`Service Date: ${currentBooking.serviceDate}`, 20, y);
  y += 7;
  doc.text(`Start Time: ${currentBooking.startTime || 'N/A'}`, 20, y);
  y += 10;
  
  // Services Section
  doc.setFont(undefined, 'bold');
  doc.text('Services Performed:', 20, y);
  y += 7;
  doc.setFont(undefined, 'normal');
  
  currentBooking.document.services.forEach(svc => {
    doc.text(`• ${svc.description}: $${svc.amount}`, 25, y);
    y += 7;
  });
  
  y += 5;
  
  // Notes
  if (currentBooking.document.notes) {
    doc.setFont(undefined, 'bold');
    doc.text('Notes:', 20, y);
    y += 7;
    doc.setFont(undefined, 'normal');
    const splitNotes = doc.splitTextToSize(currentBooking.document.notes, 170);
    doc.text(splitNotes, 25, y);
    y += splitNotes.length * 7 + 5;
  }
  
  // Total
  doc.setFont(undefined, 'bold');
  doc.setFontSize(14);
  doc.text(`Total: $${currentBooking.document.total}`, 20, y);
  y += 15;
  
  // NEW: ADD BEFORE/AFTER IMAGES (MAX 4 EACH)
  const beforeImgs = currentBooking.beforeImages.slice(0, 4);
  const afterImgs = currentBooking.afterImages.slice(0, 4);
  
  // Function to add images to PDF
  const addImagesToPDF = (images, title) => {
    if (images.length === 0) return;
    
    // Check if we need a new page
    if (y > 150) {
      doc.addPage();
      y = 20;
    }
    
    doc.setFontSize(14);
    doc.setFont(undefined, 'bold');
    doc.text(title, 105, y, { align: 'center' });
    y += 10;
    
    let x = 20;
    for (let i = 0; i < images.length; i++) {
      if (i > 0 && i % 2 === 0) {
        y += 45;
        x = 20;
      }
      if (y > 250) {
        doc.addPage();
        y = 20;
        x = 20;
      }
      try {
        doc.addImage(images[i], 'JPEG', x, y, 40, 40);
      } catch (e) {
        console.error('Error adding image:', e);
      }
      x += 45;
    }
    y += 50;
  };
  
  if (beforeImgs.length > 0) {
    addImagesToPDF(beforeImgs, 'Before Work Images');
  }
  
  if (afterImgs.length > 0) {
    addImagesToPDF(afterImgs, 'After Work Images');
  }
  
  doc.save(`work_document_${currentBooking.id}.pdf`);
}

// NEW: INVOICE PDF DOWNLOAD FUNCTION
function downloadInvoicePDF() {
  if (!currentBooking) return;
  
  const doc = new jsPDF();
  let y = 20;
  
  // Header
  doc.setFontSize(20);
  doc.setFont(undefined, 'bold');
  doc.text('INVOICE', 105, y, { align: 'center' });
  y += 10;
  doc.setFontSize(12);
  doc.setFont(undefined, 'normal');
  doc.text(`Invoice #${currentBooking.invoice.number}`, 105, y, { align: 'center' });
  y += 15;
  
  // Bill To and Date
  doc.setFontSize(12);
  doc.text(`Bill To: ${currentBooking.invoice.billTo}`, 20, y);
  doc.text(`Date: ${currentBooking.invoice.date}`, 160, y);
  y += 15;
  
  // Address
  doc.text(`Address: ${currentBooking.address}`, 20, y);
  y += 10;
  
  // Line items table header
  doc.setFont(undefined, 'bold');
  doc.text('Item', 20, y);
  doc.text('Description', 60, y);
  doc.text('Qty', 110, y);
  doc.text('Price', 130, y);
  doc.text('Total', 160, y);
  y += 7;
  doc.setFont(undefined, 'normal');
  
  // Line items
  currentBooking.invoice.lines.forEach(line => {
    doc.text(line.item, 20, y);
    doc.text(line.description, 60, y);
    doc.text(line.qty.toString(), 110, y);
    doc.text(`$${line.price.toFixed(2)}`, 130, y);
    doc.text(`$${line.total.toFixed(2)}`, 160, y);
    y += 7;
  });
  
  y += 10;
  
  // Totals
  doc.setFont(undefined, 'bold');
  doc.text('Subtotal:', 130, y);
  doc.text(`$${currentBooking.invoice.subtotal.toFixed(2)}`, 160, y);
  y += 7;
  doc.text('Tax (10%):', 130, y);
  doc.text(`$${currentBooking.invoice.tax.toFixed(2)}`, 160, y);
  y += 7;
  doc.setFontSize(14);
  doc.text('Total:', 130, y);
  doc.text(`$${currentBooking.invoice.total.toFixed(2)}`, 160, y);
  
  doc.save(`invoice_${currentBooking.id}.pdf`);
}

// ========================================
// BOOKING ACTIONS
// ========================================

function handleApprove(booking) {
  showPopup(
    'Appointment has been approved successfully',
    'success',
    'Approve Booking',
    'Yes',
    () => {
      booking.status = 'assigned';
      booking.clientName = 'Client Assigned';
      booking.clientPhone = '0301-111-2222';
      goBackAndRender();
    }
  ); 
}

function handleReject(booking) {
  rejectBooking = booking;
  openRejectModal();
}

function handleGoing(booking) {
  showPopup(
    'Are you sure you want to mark this booking as going?',
    'delete',
    'Mark Going',
    'Yes',
    () => {
      booking.status = 'route';
      goBackAndRender();
    }
  );
}

function handleStartWork(booking) {
  // Show upload interface
  document.getElementById('imagesSection').classList.remove('hidden');
  document.getElementById('imagesTitle').textContent = 'Upload Pictures Before Work (Max 4)';
  document.getElementById('beforeWorkDiv').classList.remove('hidden');
  document.getElementById('afterWorkDiv').classList.add('hidden');
  renderImageGrid('beforeImagesGrid', booking.beforeImages, true, true);

  const actionsSection = document.getElementById('actionsSection');
  actionsSection.innerHTML = `
    <button class="btn btn-info btn-primary" onclick="confirmStartWork()">
      <i class="fa fa-check"></i> Confirm and Start Work
    </button>
    <button class="btn btn-secondary btn-primary black" onclick="showBookingDetail(currentBooking)">
      <i class="fa fa-times"></i> Cancel
    </button>
  `;
}

function confirmStartWork() {
  if (currentBooking.beforeImages.length === 0) {
    showPopup(
      'Please upload at least one before image to start work.',
      'error',
      'Error Found',
      'Okay'
    );
    return;
  }
  
  currentBooking.startTime = new Date().toLocaleString('en-US', {
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit',
    hour12: true
  });
  currentBooking.status = 'started';
  
  showPopup(
    'Are you sure you want to start work?',
    'success',
    'Start Work',
    'Okay',
    () => {
      document.getElementById('imagesSection').classList.add('hidden');
      goBackAndRender();
    }
  );
}

function handleMarkComplete(booking) {
  // Show after images upload interface
  document.getElementById('imagesSection').classList.remove('hidden');
  document.getElementById('imagesTitle').textContent = 'Upload Pictures After Work (Max 4)';
  document.getElementById('beforeWorkDiv').classList.add('hidden');
  document.getElementById('afterWorkDiv').classList.remove('hidden');
  renderImageGrid('afterImagesGrid', booking.afterImages, false, true);

  const actionsSection = document.getElementById('actionsSection');
  actionsSection.innerHTML = `
    <button class="btn btn-warning btn-primary" onclick="confirmMarkComplete()">
      <i class="fa fa-check-circle"></i> Confirm Completion
    </button>
    <button class="btn btn-secondary btn-primary black" onclick="showBookingDetail(currentBooking)">
      <i class="fa fa-times"></i> Cancel
    </button>
  `;
}

function confirmMarkComplete() {
  if (currentBooking.afterImages.length === 0) {
    showPopup(
      'Please upload at least one after image to mark work as complete.',
      'error',
      'Error Found',
      'Okay'
    );
    return;
  }
  
  currentBooking.status = currentBooking.isUrgent ? 'unpaid_urgent' : 'completed_unpaid';
  
  // Initialize invoice if not exists
  if (currentBooking.invoice.lines.length === 0) {
    initializeInvoice(currentBooking);
  }
  
  showPopup(
    'Are you sure you want to mark work as complete?',
    'delete',
    'Mark Work Complete',
    'yes',
    () => {
      document.getElementById('imagesSection').classList.add('hidden');
      goBackAndRender();
    }
  );
}

// ========================================
// DOCUMENT HANDLING - UPDATED WITH IMAGES
// ========================================

function handleDocument(booking, isEdit = false) {
  const content = document.getElementById('modalDocumentContent');
  
  if (isEdit) {
    // Initialize with default service if empty
    if (booking.document.services.length === 0) {
      booking.document.services = [
        { description: booking.service, amount: booking.price }
      ];
    }
    
    content.innerHTML = `
      <h5 style="margin-bottom: 20px;">Edit Services Performed</h5>
      <table class="invoice-table">
        <thead>
          <tr>
            <th style="width: 60%;">Description</th>
            <th style="width: 25%;">Amount ($)</th>
            <th style="width: 15%;">Action</th>
          </tr>
        </thead>
        <tbody id="servicesTable">
          ${booking.document.services.map((svc, idx) => `
            <tr>
              <td><input type="text" value="${svc.description || ''}" onchange="updateService(${idx}, 'desc', this.value)"></td>
              <td><input type="number" step="0.01" value="${svc.amount || 0}" onchange="updateService(${idx}, 'amt', this.value)"></td>
              <td><button class="btn btn-danger btn-sm" onclick="removeService(${idx})"><i class="fa fa-trash"></i></button></td>
            </tr>
          `).join('')}
        </tbody>
      </table>
      <button class="btn btn-success btn-sm btn-primary" onclick="addService()" style="margin-top: 10px;">
        <i class="fa fa-plus"></i> Add Service
      </button>
      
      <div style="margin-top: 25px;">
        <label style="font-weight: 600; margin-bottom: 8px; display: block;">Notes:</label>
        <textarea id="docNotes" rows="4" style="width:100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" onchange="updateNotes(this.value)">${booking.document.notes || ''}</textarea>
      </div>
      
      <div style="margin-top: 25px; padding: 15px; background: #f5f5f5; border-radius: 8px;">
        <h5 style="margin: 0 0 10px 0;">Total: $<span id="docTotal">${booking.document.total || 0}</span></h5>
        <button class="btn btn-primary" onclick="updateDocumentTotal()" style="width: 100%;">
          <i class="fa fa-save"></i> Update Total & Save
        </button>
      </div>
    `;
  } else {
    // View mode with template
    const beforeImgs = booking.beforeImages.slice(0, 4);
    const afterImgs = booking.afterImages.slice(0, 4);
    
    content.innerHTML = `
      <div style="line-height: 1.8;">
        <h5 style="color: #ff6b35; margin-bottom: 15px;">Work Document Details</h5>
        
        <h6 style="margin-top: 20px; color: #333;">1. Services Performed:</h6>
        <p style="margin-left: 15px; color: #666;">
          A detailed list of all services performed:
        </p>
        <ul style="margin-left: 30px; color: #666;">
          ${booking.document.services.map(s => `<li>${s.description} - <strong>$${s.amount}</strong></li>`).join('')}
        </ul>
        
        <h6 style="margin-top: 20px; color: #333;">2. Equipment and Materials Used:</h6>
        <p style="margin-left: 15px; color: #666;">
          List of equipment and materials used for ${booking.service}. All necessary tools and supplies were utilized to ensure quality service delivery.
        </p>
        
        ${booking.document.notes ? `
          <h6 style="margin-top: 20px; color: #333;">3. Additional Notes:</h6>
          <p style="margin-left: 15px; color: #666; background: #f9f9f9; padding: 15px; border-radius: 5px;">
            ${booking.document.notes}
          </p>
        ` : ''}
        
        <div style="margin-top: 25px; padding: 15px; background: #f5f5f5; border-radius: 8px;">
          <h5 style="margin: 0; color: #ff6b35;">Total Amount: $${booking.document.total}</h5>
        </div>
        
        ${(beforeImgs.length > 0 || afterImgs.length > 0) ? `
          <h6 style="margin-top: 25px; color: #333;">Work Images (Max 4 each):</h6>
          <div class="document-images" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-top: 15px;">
            ${beforeImgs.map((img, idx) => `
              <div style="text-align: center;">
                <p style="margin: 0 0 8px 0; font-weight: 600; color: #666; font-size: 12px;">Before ${idx + 1}</p>
                <img src="${img}" alt="Before" style="width: 100%; max-height: 120px; object-fit: cover; border-radius: 5px; border: 1px solid #ddd;">
              </div>
            `).join('')}
            ${afterImgs.map((img, idx) => `
              <div style="text-align: center;">
                <p style="margin: 0 0 8px 0; font-weight: 600; color: #666; font-size: 12px;">After ${idx + 1}</p>
                <img src="${img}" alt="After" style="width: 100%; max-height: 120px; object-fit: cover; border-radius: 5px; border: 1px solid #ddd;">
              </div>
            `).join('')}
          </div>
        ` : ''}
      </div>
    `;
    
    document.getElementById('modalDownloadPdfBtn').classList.remove('hidden');
  }
}

function updateService(idx, field, value) {
  if (!currentBooking) return;
  if (field === 'desc') {
    currentBooking.document.services[idx].description = value;
  } else {
    currentBooking.document.services[idx].amount = parseFloat(value) || 0;
  }
  updateDocumentTotalDisplay();
}

function removeService(idx) {
  if (!currentBooking) return;
  currentBooking.document.services.splice(idx, 1);
  handleDocument(currentBooking, true);
}

function addService() {
  if (!currentBooking) return;
  currentBooking.document.services.push({ description: '', amount: 0 });
  handleDocument(currentBooking, true);
}

function updateNotes(value) {
  if (!currentBooking) return;
  currentBooking.document.notes = value;
}

function updateDocumentTotalDisplay() {
  const totalEl = document.getElementById('docTotal');
  if (totalEl && currentBooking) {
    const total = currentBooking.document.services.reduce((sum, s) => sum + (parseFloat(s.amount) || 0), 0);
    totalEl.textContent = total.toFixed(2);
  }
}

function updateDocumentTotal() {
  if (!currentBooking) return;
  
  // Calculate total from services
  currentBooking.document.total = currentBooking.document.services.reduce((sum, s) => sum + (parseFloat(s.amount) || 0), 0);
  currentBooking.invoiceAmount = currentBooking.document.total;
  
  alert('Document updated successfully!');
  closeDocumentModal();
  showBookingDetail(currentBooking);
}

// ========================================
// INVOICE HANDLING - UPDATED WITH DOWNLOAD
// ========================================

function initializeInvoice(booking) {
  if (booking.invoice.lines.length === 0) {
    // Create invoice from document services
    booking.invoice.number = `INV${booking.id}`;
    booking.invoice.billTo = booking.user;
    booking.invoice.date = new Date().toISOString().split('T')[0];
    
    if (booking.document.services.length > 0) {
      booking.invoice.lines = booking.document.services.map(svc => ({
        item: svc.description,
        description: 'Service',
        qty: 1,
        price: svc.amount,
        total: svc.amount
      }));
    } else {
      booking.invoice.lines = [{
        item: booking.service,
        description: 'Standard Service',
        qty: 1,
        price: booking.price,
        total: booking.price
      }];
    }
    
    calculateInvoiceTotals(booking);
  }
}

function calculateInvoiceTotals(booking) {
  booking.invoice.subtotal = booking.invoice.lines.reduce((sum, l) => sum + (parseFloat(l.total) || 0), 0);
  booking.invoice.tax = booking.invoice.subtotal * 0.1; // 10% tax
  booking.invoice.total = booking.invoice.subtotal + booking.invoice.tax;
  booking.invoiceAmount = booking.invoice.total;
}

function handleInvoice(booking, isEdit = false, isView = false) {
  const content = document.getElementById('modalInvoiceContent');
  
  // Initialize invoice if empty
  if (booking.invoice.lines.length === 0) {
    initializeInvoice(booking);
  }
  
  if (isEdit) {
    content.innerHTML = `
      <h5 style="margin-bottom: 20px;">Edit Invoice</h5>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
        <div>
          <label style="font-weight: 600; margin-bottom: 5px; display: block;">Invoice Number:</label>
          <input type="text" style="width:100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" value="${booking.invoice.number}" onchange="updateInvoiceField('number', this.value)">
        </div>
        <div>
          <label style="font-weight: 600; margin-bottom: 5px; display: block;">Date:</label>
          <input type="date" style="width:100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" value="${booking.invoice.date}" onchange="updateInvoiceField('date', this.value)">
        </div>
      </div>
      
      <div style="margin-bottom: 20px;">
        <label style="font-weight: 600; margin-bottom: 5px; display: block;">Bill To:</label>
        <input type="text" style="width:100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" value="${booking.invoice.billTo}" onchange="updateInvoiceField('billTo', this.value)">
      </div>
      
      <h6 style="margin: 20px 0 10px 0;">Invoice Items:</h6>
      <table class="invoice-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>Description</th>
            <th style="width: 80px;">Qty</th>
            <th style="width: 100px;">Price ($)</th>
            <th style="width: 100px;">Total ($)</th>
            <th style="width: 80px;">Action</th>
          </tr>
        </thead>
        <tbody id="invoiceLines">
          ${booking.invoice.lines.map((line, idx) => `
            <tr>
              <td><input type="text" value="${line.item || ''}" onchange="updateInvoiceLine(${idx}, 'item', this.value)"></td>
              <td><input type="text" value="${line.description || ''}" onchange="updateInvoiceLine(${idx}, 'desc', this.value)"></td>
              <td><input type="number" min="1" value="${line.qty || 1}" onchange="updateInvoiceLine(${idx}, 'qty', this.value)"></td>
              <td><input type="number" step="0.01" value="${line.price || 0}" onchange="updateInvoiceLine(${idx}, 'price', this.value)"></td>
              <td style="text-align: right; font-weight: 600;">${(line.total || 0).toFixed(2)}</td>
              <td><button class="btn btn-danger btn-sm" onclick="removeInvoiceLine(${idx})"><i class="fa fa-trash"></i></button></td>
            </tr>
          `).join('')}
        </tbody>
      </table>
      <button class="btn btn-success btn-primary btn-sm" onclick="addInvoiceLine()" style="margin-top: 10px;">
        <i class="fa fa-plus"></i> Add Line Item
      </button>
      
      <div style="margin-top: 25px; padding: 20px; background: #f5f5f5; border-radius: 8px;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
          <span style="font-weight: 600;">Subtotal:</span>
          <span style="font-weight: 600;">${booking.invoice.subtotal.toFixed(2)}</span>
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
          <span style="font-weight: 600;">Tax (10%):</span>
          <span style="font-weight: 600;">${booking.invoice.tax.toFixed(2)}</span>
        </div>
        <div style="display: flex; justify-content: space-between; padding-top: 10px; border-top: 2px solid #ddd;">
          <span style="font-weight: 700; font-size: 1.2em; color: #ff6b35;">Total:</span>
          <span style="font-weight: 700; font-size: 1.2em; color: #ff6b35;">${booking.invoice.total.toFixed(2)}</span>
        </div>
      </div>
      
      <button class="btn btn-primary" onclick="updateInvoiceTotals()" style="width: 100%; margin-top: 20px;">
        <i class="fa fa-save"></i> Update Totals & Save Invoice
      </button>
    `;
    
    // Hide download button in edit mode
    document.getElementById('modalDownloadInvoiceBtn').classList.add('hidden');
  } else if (isView) {
    content.innerHTML = `
      <div style="padding: 20px; background: white; border: 2px solid #f0f0f0; border-radius: 8px;">
        <div style="text-align: center; margin-bottom: 30px;">
          <h3 style="color: #ff6b35; margin: 0;">INVOICE</h3>
          <p style="color: #666; margin: 5px 0 0 0;">Invoice #${booking.invoice.number}</p>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
          <div>
            <h6 style="color: #666; margin: 0 0 10px 0;">Bill To:</h6>
            <p style="font-weight: 600; margin: 0;">${booking.invoice.billTo}</p>
            <p style="color: #666; margin: 5px 0 0 0;">${booking.address}</p>
          </div>
          <div style="text-align: right;">
            <h6 style="color: #666; margin: 0 0 10px 0;">Invoice Date:</h6>
            <p style="font-weight: 600; margin: 0;">${booking.invoice.date}</p>
          </div>
        </div>
        
        <table class="invoice-table">
          <thead>
            <tr>
              <th>Item</th>
              <th>Description</th>
              <th style="text-align: center;">Qty</th>
              <th style="text-align: right;">Price</th>
              <th style="text-align: right;">Total</th>
            </tr>
          </thead>
          <tbody>
            ${booking.invoice.lines.map(line => `
              <tr>
                <td>${line.item || ''}</td>
                <td>${line.description || ''}</td>
                <td style="text-align: center;">${line.qty || 0}</td>
                <td style="text-align: right;">${(line.price || 0).toFixed(2)}</td>
                <td style="text-align: right; font-weight: 600;">${(line.total || 0).toFixed(2)}</td>
              </tr>
            `).join('')}
          </tbody>
        </table>
        
        <div style="margin-top: 30px; padding: 20px; background: #f5f5f5; border-radius: 8px;">
          <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
            <span style="font-weight: 600;">Subtotal:</span>
            <span style="font-weight: 600;">${booking.invoice.subtotal.toFixed(2)}</span>
          </div>
          <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
            <span style="font-weight: 600;">Tax (10%):</span>
            <span style="font-weight: 600;">${booking.invoice.tax.toFixed(2)}</span>
          </div>
          <div style="display: flex; justify-content: space-between; padding-top: 15px; border-top: 2px solid #ddd;">
            <span style="font-weight: 700; font-size: 1.3em; color: #ff6b35;">Total Due:</span>
            <span style="font-weight: 700; font-size: 1.3em; color: #ff6b35;">${booking.invoice.total.toFixed(2)}</span>
          </div>
        </div>
      </div>
    `;
    
    // Show download button in view mode
    document.getElementById('modalDownloadInvoiceBtn').classList.remove('hidden');
  }
}

function updateInvoiceField(field, value) {
  if (!currentBooking) return;
  currentBooking.invoice[field] = value;
}

function updateInvoiceLine(idx, field, value) {
  if (!currentBooking) return;
  
  if (field === 'qty' || field === 'price') {
    value = parseFloat(value) || 0;
    currentBooking.invoice.lines[idx][field] = value;
    currentBooking.invoice.lines[idx].total = currentBooking.invoice.lines[idx].qty * currentBooking.invoice.lines[idx].price;
  } else if (field === 'desc') {
    currentBooking.invoice.lines[idx].description = value;
  } else {
    currentBooking.invoice.lines[idx][field] = value;
  }
  
  // Update display
  calculateInvoiceTotals(currentBooking);
  handleInvoice(currentBooking, true);
}

function removeInvoiceLine(idx) {
  if (!currentBooking) return;
  currentBooking.invoice.lines.splice(idx, 1);
  calculateInvoiceTotals(currentBooking);
  handleInvoice(currentBooking, true);
}

function addInvoiceLine() {
  if (!currentBooking) return;
  currentBooking.invoice.lines.push({ 
    item: '', 
    description: '', 
    qty: 1, 
    price: 0, 
    total: 0 
  });
  handleInvoice(currentBooking, true);
}

function updateInvoiceTotals() {
  if (!currentBooking) return;
  calculateInvoiceTotals(currentBooking);
  alert('Invoice updated successfully!');
  closeInvoiceModal();
  showBookingDetail(currentBooking);
}

// ========================================
// MARK PAID
// ========================================

function handleMarkPaid(booking) {
  showPopup(
    'Are you sure you want to mark this booking as paid and completed?',
    'delete',
    'Mark as Paid',
    'Yes',
    () => {
      setTimeout(() => {
        showPopup(
          'Booking marked as paid and completed!',
          'success', 
          'Success', 
          'Close', 
          () => {
            booking.status = 'completed';
            goBackAndRender();
          }
        );
      }, 1000);
    }
  );
}

// ========================================
// RENDER BOOKING LIST
// ========================================

// ========================================
// RENDER BOOKING LIST WITH FILTERS
// ========================================

function renderBookings(filter = '', filters = {}) {
  bookingListEl.innerHTML = '';
  filterSection.classList.remove('nopermission');
  let filteredBookings = bookingData.filter(b => {
    // Search filter
    if (filter) {
      const searchLower = filter.toLowerCase();
      if (!(
        b.id.toLowerCase().includes(searchLower) || 
        b.user.toLowerCase().includes(searchLower) ||
        b.email.toLowerCase().includes(searchLower) ||
        b.phone.toLowerCase().includes(searchLower) ||
        b.address.toLowerCase().includes(searchLower) ||
        b.service.toLowerCase().includes(searchLower)
      )) {
        return false;
      }
    }
    
    // Status filter
    if (filters.status && filters.status !== 'all' && b.status !== filters.status) {
      return false;
    }
    
    // Date filter
    if (filters.dateFrom) {
      const bookingDate = parseDate(b.date);
      const fromDate = new Date(filters.dateFrom);
      if (bookingDate < fromDate) return false;
    }
    
    if (filters.dateTo) {
      const bookingDate = parseDate(b.date);
      const toDate = new Date(filters.dateTo);
      toDate.setHours(23, 59, 59, 999);
      if (bookingDate > toDate) return false;
    }
    
    // Service filter
    if (filters.service && filters.service !== 'all' && b.service !== filters.service) {
      return false;
    }
    
    // Price filter
    if (filters.priceMin !== null && b.price < filters.priceMin) {
      return false;
    }
    
    if (filters.priceMax !== null && b.price > filters.priceMax) {
      return false;
    }
    
    // Urgent filter
    if (filters.urgentOnly && !b.isUrgent) {
      return false;
    }
    
    return true;
  });

  if (filteredBookings.length === 0) {
    bookingListEl.innerHTML = '<p style="text-align: center; padding: 40px; color: #999;">No bookings found</p>';
    return;
  }

  filteredBookings.forEach(booking => {
    const item = document.createElement('div');
    item.className = 'booking-item';
    
    const urgentClass = booking.isUrgent ? 'urgent bell' : '';
    
    item.innerHTML = `
      <div class="booking-left">
        <div class="booking-date">${booking.date}</div>
        <div class="booking-id">Booking ID: <strong>#${booking.id}</strong></div>
      </div>
      <div class="booking-right ${urgentClass}">
        <div class="booking-status ${booking.status}">${statusTextMap[booking.status] || booking.status}</div>
      </div>
    `;
    
    item.addEventListener('click', () => showBookingDetail(booking));
    bookingListEl.appendChild(item);
  });
}



// Price filters with debounce
let priceTimeout;
['priceMinFilter', 'priceMaxFilter'].forEach(id => {
  document.getElementById(id).addEventListener('input', function() {
    clearTimeout(priceTimeout);
    priceTimeout = setTimeout(applyFilters, 500);
  });
});

// Search input
searchInputEl.addEventListener('input', (e) => {
  applyFilters();
});



// ========================================
// SHOW BOOKING DETAIL - UPDATED HIDE IMAGES
// ========================================

function showBookingDetail(booking) {
  currentBooking = booking;
  
  // Hide list, show detail
  bookingListEl.classList.add('hidden');
  searchInputEl.classList.add('hidden');
  bookingDetailEl.classList.remove('hidden');
  topbarwithbtn.classList.add('hidden');
  filterSection.classList.add('nopermission');

  if (filterSection.classList.contains('nopermission')) {
    filterSection.innerHTML = '';
  }


  // ALWAYS HIDE IMAGES SECTION ON MAIN DETAIL PAGE
  document.getElementById('imagesSection').classList.add('hidden');

  // Basic details
  document.getElementById('detailId').textContent = `#${booking.id}`;
  document.getElementById('detailStatus').textContent = statusTextMap[booking.status] || booking.status;
  
  const detailStatusEl = document.getElementById('detailStatus');
  detailStatusEl.className = `status-badge ${booking.status}` + (booking.isUrgent ? ' urgent' : '');
  
  document.getElementById('detailService').textContent = booking.service;
  document.getElementById('detailCharges').textContent = `${booking.price}`;
  document.getElementById('detailRate').textContent = `${booking.hourlyRate}`;
  document.getElementById('detailUser').textContent = booking.user;
  document.getElementById('detailPhone').textContent = booking.phone;
  document.getElementById('detailEmail').textContent = booking.email;
  document.getElementById('detailAddress').textContent = booking.address;
  document.getElementById('detailServiceDate').textContent = booking.serviceDate;
  document.getElementById('detailServiceTime').textContent = booking.serviceTime;
  document.getElementById('detailDate').textContent = booking.date;

  // Hide all conditional sections initially
  ['providerSection', 'startTimeSection', 'documentIconSection', 'invoiceIconSection', 'rejectedSection'].forEach(id => {
    document.getElementById(id).classList.add('hidden');
  });
  endTimeSection.classList.add('hidden');
  
  // Clear actions
  document.getElementById('actionsSection').innerHTML = '';
  messageicon.classList.add('hidden');

  // Show chat icon if status is "route" (In Route)
  if (booking.status === 'route') {
    messageicon.classList.remove('hidden');
    messageicon.onclick = function() {
      window.location.href = SITE_URL + 'pages/messages.php';
    };
  }

  // Show provider details if assigned or later
  if (['assigned', 'route', 'started', 'completed_unpaid', 'completed', 'unpaid_urgent'].includes(booking.status) && booking.clientName) {
    document.getElementById('providerSection').classList.remove('hidden');
    document.getElementById('detailProviderName').textContent = booking.clientName;
    document.getElementById('detailProviderPhone').textContent = booking.clientPhone;
  }

  // Show start time if work started
  if (booking.startTime && ['started', 'completed_unpaid', 'completed', 'unpaid_urgent'].includes(booking.status)) {
    document.getElementById('startTimeSection').classList.remove('hidden');
    document.getElementById('detailStartTime').textContent = booking.startTime;
  }

  // Show document icon if document exists
  if (booking.status === 'completed' || booking.status === 'completed_unpaid' || booking.status === 'unpaid_urgent' || booking.status === 'started') {
    document.getElementById('documentIconSection').classList.remove('hidden');
  }

  // Show invoice icon if invoice exists
  if (['completed_unpaid', 'completed', 'unpaid_urgent'].includes(booking.status) && booking.invoice.lines.length > 0) {
    document.getElementById('invoiceIconSection').classList.remove('hidden');
  }

  // Show end time if completed
  if (booking.status === 'completed' || booking.status === 'completed_unpaid') {
    endTimeSection.classList.remove('hidden');
    detailendTime.textContent = new Date().toLocaleDateString('en-GB') + ' ' + new Date().toLocaleTimeString('en-GB');
  }

  // Show rejection reason
  if (booking.status === 'rejected') {
    document.getElementById('rejectedSection').classList.remove('hidden');
    document.getElementById('rejectedReason').textContent = booking.rejectReason || 'No reason provided';
  }

  // Render action buttons based on status
  renderActionButtons(booking);
}

// ========================================
// RENDER ACTION BUTTONS
// ========================================

function renderActionButtons(booking) {
  const actionsSection = document.getElementById('actionsSection');
  actionsSection.innerHTML = '';

  switch (booking.status) {
    case 'pending':
      actionsSection.innerHTML = `
        <button class="btn btn-success btn-primary btn-primary" onclick="handleApprove(currentBooking)">
          <i class="fa fa-check"></i> Approve Booking
        </button>
        <button class="btn btn-danger btn-primary black" onclick="handleReject(currentBooking)">
          <i class="fa fa-times"></i> Reject Booking
        </button>
      `;
      break;

    case 'assigned':
      actionsSection.innerHTML = `
        <button class="btn btn-primary" onclick="handleGoing(currentBooking)">
          <i class="fa fa-route"></i> Going to Location
        </button>
      `;
      break;

    case 'route':
      actionsSection.innerHTML = `
        <button class="btn btn-primary" onclick="handleStartWork(currentBooking)">
          <i class="fa fa-play-circle"></i> Start Work
        </button>
      `;
      break;

    case 'started':
      actionsSection.innerHTML = `
        <button class="btn btn-secondary btn-primary black" onclick="openDocumentModal(true)">
          <i class="fa fa-file-alt"></i> Document Work
        </button>
        <button class="btn btn-warning btn-primary" onclick="handleMarkComplete(currentBooking)">
          <i class="fa fa-check-circle"></i> Mark as Complete
        </button>
      `;
      break;

    case 'completed_unpaid':
      actionsSection.innerHTML = `
        <button class="btn btn-primary black" onclick="openInvoiceModal(true)">
          <i class="fa fa-edit"></i> Update Invoice
        </button>
        <button class="btn btn-success btn-primary" onclick="handleMarkPaid(currentBooking)">
          <i class="fa fa-dollar-sign"></i> Mark as Paid
        </button>
      `;
      break;

    case 'unpaid_urgent':
      actionsSection.innerHTML = `
        <button class="btn btn-info btn-primary" onclick="openInvoiceModal(false, true)">
          <i class="fa fa-eye"></i> View Invoice
        </button>
        <button class="btn btn-warning btn-primary black" onclick="openInvoiceModal(true)">
          <i class="fa fa-edit"></i> Update Invoice (Extra Charges)
        </button>
        <button class="btn btn-success" onclick="handleMarkPaid(currentBooking)">
          <i class="fa fa-dollar-sign"></i> Mark as Paid
        </button>
      `;
      break;

    case 'completed':
      actionsSection.innerHTML = `
        <button class="btn btn-info btn-primary" onclick="openInvoiceModal(false, true)">
          <i class="fa fa-file-invoice"></i> View Invoice
        </button>
      `;
      break;

    case 'rejected':
      // No actions for rejected bookings
      break;
  }
}

// ========================================
// EVENT LISTENERS
// ========================================

// Back button from detail to list
backBtnbookingdetail.addEventListener('click', goBackAndRender);

// Back button from review to detail
backBtnreviewform.addEventListener('click', () => {
  Newreviewform.classList.add('d-none');
  bookingDetailEl.classList.remove('hidden');
});

// Search input
searchInputEl.addEventListener('input', (e) => {
  renderBookings(e.target.value.trim());
});

// Close modals on backdrop click
document.getElementById('documentModal').addEventListener('click', (e) => {
  if (e.target.id === 'documentModal') {
    closeDocumentModal();
  }
});

document.getElementById('invoiceModal').addEventListener('click', (e) => {
  if (e.target.id === 'invoiceModal') {
    closeInvoiceModal();
  }
});

// ========================================
// INITIALIZE
// ========================================

// Initial render
renderBookings();

// Check URL parameter for job ID and show detail if present
function checkUrlForJobId() {
  const urlParams = new URLSearchParams(window.location.search);
  const jobId = urlParams.get('job');
  
  if (jobId) {
    // Find the booking by ID
    const booking = bookingData.find(b => b.id === jobId);
    if (booking) {
      // Wait a bit for DOM to be ready, then show detail
      setTimeout(() => {
        showBookingDetail(booking);
      }, 300);
    }
  }
}

// Check URL after initial render
setTimeout(() => {
  checkUrlForJobId();
}, 200);




// ADD ये functions यहाँ पर (currentBooking के बाद):
// ========================================
// FILTER FUNCTIONS
// ========================================

function toggleFilterSection() {
 
  if (filterSection.style.display === 'none' || filterSection.style.display === '') {
    filterSection.style.display = 'block';
  } else {
    filterSection.style.display = 'none';
  }
}

function applyFilters() {
  // Get filter values
  const status = document.getElementById('statusFilter').value;
  const dateFrom = document.getElementById('dateFromFilter').value;
  const dateTo = document.getElementById('dateToFilter').value;
  const service = document.getElementById('serviceFilter').value;
  const priceMin = document.getElementById('priceMinFilter').value;
  const priceMax = document.getElementById('priceMaxFilter').value;
  const urgentOnly = document.getElementById('urgentFilter').checked;
  const searchTerm = document.getElementById('searchInput').value.toLowerCase();
  
  // Call renderBookings with filters
  renderBookings(searchTerm, {
    status,
    dateFrom,
    dateTo,
    service,
    priceMin: priceMin ? parseFloat(priceMin) : null,
    priceMax: priceMax ? parseFloat(priceMax) : null,
    urgentOnly
  });
}

function clearFilters() {
  document.getElementById('statusFilter').value = 'all';
  document.getElementById('dateFromFilter').value = '';
  document.getElementById('dateToFilter').value = '';
  document.getElementById('serviceFilter').value = 'all';
  document.getElementById('priceMinFilter').value = '';
  document.getElementById('priceMaxFilter').value = '';
  document.getElementById('urgentFilter').checked = false;
  document.getElementById('searchInput').value = '';
  
  // Trigger filtering
  applyFilters();
}

// Helper function to parse date
function parseDate(dateStr) {
  const [day, month, year] = dateStr.split('/');
  return new Date(year, month - 1, day);
}



// Add ये code JavaScript file के अंत में, renderBookings(); के बाद:

// Filter event listeners
document.getElementById('applyFiltersBtn').addEventListener('click', applyFilters);
document.getElementById('clearFiltersBtn').addEventListener('click', clearFilters);

// Auto-apply filters on change
document.getElementById('statusFilter').addEventListener('change', applyFilters);
document.getElementById('dateFromFilter').addEventListener('change', applyFilters);
document.getElementById('dateToFilter').addEventListener('change', applyFilters);
document.getElementById('serviceFilter').addEventListener('change', applyFilters);
document.getElementById('urgentFilter').addEventListener('change', applyFilters);

