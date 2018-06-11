
/**
 * Initializing of w3 slideshow object.
 * @slideshow w3.slideshow()
 */
function initSlider(){
  return w3.slideshow('.slide', 8000);
}

/**
 * Toggle between showing and hiding the sidebar, and add overlay effect
 * @returns {void}
 */
function toggleSidebar() {
  w3.toggleShow("#mySidebar");
  w3.toggleShow("#myOverlay");
}

/**
 * Initializing Modals.
 */
w3.toggleShow("#login");
w3.toggleShow("#reg");