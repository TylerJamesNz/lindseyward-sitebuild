/*
** Menu Dropdown for Lindsey Ward real estate website 2014 ver 1.0
*/

/* Variables
======================================== */
var menuButton = document.getElementById('menu-button');
var menuContainer = document.getElementById('head-navigation');

var mobileWidth = 480;

/* Initialization
======================================== */
initializeMenu();

menuButton.onclick = toggleMenu;
window.onresize = menuQueries;

/* Functionality
======================================== */
function initializeMenu() // If javascript is enabled hide the menu and display the button.
{
	if(mobileSize()) // If the viewport is in mobile view.
	{ 
		$(menuContainer).hide();
		menuButton.style.display = "block";
	}
	menuQueries();
}

function toggleMenu() // Toggle the visibility of the menu on button press.
{
	if(mobileSize()) // If the viewport is in mobile view.
	{
		if($(menuContainer).is(":visible")) // If the menu is visible slide it down.
		{
			$(menuContainer).slideUp();
		}
		else
		{
			$(menuContainer).slideDown();
		}
	}
}

function menuQueries() // Hides the menu button when no longer in mobile view.
{
	if(mobileSize()) // If the viewport is in mobile view.
	{
		$(menuButton).show();
		$(menuContainer).hide();
	}
	else
	{
		$(menuButton).hide();
		$(menuContainer).show();
	}
}

function mobileSize() // Returns true if size is mobile.
{
	if(window.innerWidth <= mobileWidth) {
		return true;
	}
	else
	{
		return false;
	}
}