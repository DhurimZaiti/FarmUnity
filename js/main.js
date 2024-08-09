// Bootstrap 5.3 Sidebar Custom JS
/* global bootstrap: false */
(() => {
    'use strict'
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(tooltipTriggerEl => {new bootstrap.Tooltip(tooltipTriggerEl)});
  })()
  