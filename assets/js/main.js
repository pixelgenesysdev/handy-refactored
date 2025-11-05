/*
  Global frontend helper (assets/js/main.js)
  - Provides `apiFetch` wrapper to call JSON API endpoints under /api/
  - Demo function `loadServices()` to populate a container with dummy service items
*/

async function apiFetch(path, options = {}) {
  const base = (typeof SITE_URL !== 'undefined') ? SITE_URL : '';
  const url = path.startsWith('http') ? path : base + '/api/' + path;
  try {
    const res = await fetch(url, options);
    if (!res.ok) throw new Error('Network error: ' + res.status);
    return await res.json();
  } catch (err) {
    console.error('apiFetch error', err);
    return { error: err.message };
  }
}

// Demo: load services into element with id "services-list"
async function loadServices() {
  const container = document.getElementById('services-list');
  if (!container) return;
  const data = await apiFetch('get_services.php');
  if (data && Array.isArray(data.services)) {
    container.innerHTML = data.services.map(s => `
      <div class="service-item">
        <img src="${s.image}" alt="${s.title}" loading="lazy" />
        <h4>${s.title}</h4>
        <p>${s.description}</p>
      </div>`).join('');
  } else {
    container.innerHTML = '<div class="empty">No services available (dummy)</div>';
  }
}

// Auto-run demo loader when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
  // Expose apiFetch globally for inline scripts if needed
  window.apiFetch = apiFetch;
  // Try to load services if element exists
  loadServices();
});
