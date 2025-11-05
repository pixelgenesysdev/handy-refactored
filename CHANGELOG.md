# Changelog - Updated Project (handy)

## Summary of changes
- Consolidated front-end includes to use a single global stylesheet: `assets/css/style.css`
- Added a single global JS file: `assets/js/main.js` which provides `apiFetch()` helper and demo loader
- Created basic API endpoints that return dummy JSON data:
  - `/api/get_services.php` - returns list of services
  - `/api/login.php` - dummy login endpoint (accepts JSON body)
  - `/api/get_user.php` - returns dummy user info
- Modified `includes/head.php` to reference only the global CSS and JS files
- Added minimal global CSS if missing
- Added backups of modified files where applicable (e.g., `includes/head.php.bak`)

## How to use (quick)
- Place project on a PHP-capable webserver (Apache/Nginx + PHP). Ensure `SITE_URL` constant in `global.inc.php` is correctly set.
- API endpoints are available under `/api/` and return dummy JSON. Replace with real DB logic as needed.
- Frontend JS helper `apiFetch('get_services.php')` will call `SITE_URL + '/api/get_services.php'`.
- To test login API, POST JSON to `/api/login.php` with `{"email":"test@example.com","password":"password"}`

## Notes & Recommendations
- These are non-destructive changes, but review and test locally before deploying to production.
- Next steps: wire API endpoints to real DB and authentication, add CSRF protection, and remove dummy data.


# CHANGELOG - Automated Refactor

Refactor performed at 2025-11-05T21:53:20.079519Z

Summary: Extracted inline <style> and inline <script> blocks from PHP files into dedicated per-page CSS/JS files under `assets/css/` and `assets/js/` respectively.

Files processed:
- auth/indextest.php  => css: -, js: auth_indextest.php.js
- auth/otp.php  => css: -, js: auth_otp.php.js
- auth/reset-password.php  => css: -, js: auth_reset-password.php.js
- includes/popup.php  => css: includes_popup.php.css, js: includes_popup.php.js
- pages/affiliate.php  => css: -, js: pages_affiliate.php.js
- pages/allbookings.php  => css: -, js: pages_allbookings.php.js
- pages/appointment_booking.php  => css: pages_appointment_booking.php.css, js: pages_appointment_booking.php.js
- pages/contact.php  => css: pages_contact.php.css, js: -
- pages/dashboard.php  => css: -, js: pages_dashboard.php.js
- pages/marketplace.php  => css: -, js: pages_marketplace.php.js
- pages/messages.php  => css: -, js: pages_messages.php.js
- pages/notification.php  => css: -, js: pages_notification.php.js
- pages/reviews.php  => css: pages_reviews.php.css, js: pages_reviews.php.js
- pages/services.php  => css: -, js: pages_services.php.js
- pages/services_providers.php  => css: pages_services_providers.php.css, js: -
- pages/transactionhistory.php  => css: -, js: pages_transactionhistory.php.js
- pages/user_setting.php  => css: -, js: pages_user_setting.php.js

Notes:
- includes/head.php updated to load global and per-page assets via $page_css and $page_js.
- Backups of modified PHP files created with suffix .bak_refactor in their original locations.
