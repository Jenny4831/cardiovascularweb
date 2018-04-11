
var DROPDOWN_FADE_DELAY = 100;

var NAV_HOVER_OPACITY = 0.7;
var NAV_HOVER_DELAY = 150;

var hoverDropdownItems; //Items that show a dropdown on hover
var clickDropdownItems; //Items that show a dropdown on click
var currentDropdown = null; //The currently open dropdown
var dropdownLocked = false; //Whether a click is needed to close the dropdown

var links;
var searchBox;
var usernameBox;

//On document loaded
$(document).ready(function() {
    //Listen for hover on nav links
    links = $("nav a, #search-button, #user-button");
    links.hover(mouseEnterLink, mouseLeaveLink);
    
    //Listen for hover on items with hover dropdown
    hoverDropdownItems = $("[data-dropdown=\"hover\"]");
    hoverDropdownItems.hover(mouseEnterItem, mouseLeaveItem);
    
    //Listen for click on items with click dropdown
    clickDropdownItems = $("[data-dropdown=\"click\"]");
    clickDropdownItems.click(clickItem);
    
    //Listen for click on the whole page
    $("body").click(onClick);
    
    //Listen for keydown on the whole page
    $("body").keydown(onKeyDown);
    
    //Listen for keypresses in the search box
    searchBox = $("#search-box");
    searchBox.keydown(searchKeyDown);
    
    usernameBox = $("#login_username");
});

function mouseEnterLink(event)
{
    var link = $(event.delegateTarget);
    link.stop();
    link.fadeTo(NAV_HOVER_DELAY, NAV_HOVER_OPACITY);
}

function mouseLeaveLink(event)
{
    var link = $(event.delegateTarget);
    link.stop();
    link.fadeTo(NAV_HOVER_DELAY, 1);
}

function showDropdown(dropdown, lock) {
    if (currentDropdown != null) {
        //Switch instantly
        currentDropdown.stop(true);
        currentDropdown.fadeOut(0);
        dropdown.fadeIn(0);
    }
    else {
        //Animate the dropdown
        dropdown.fadeIn(DROPDOWN_FADE_DELAY);
    }
    currentDropdown = dropdown;
    dropdownLocked = lock;
    
    //Move nested navigation lists to centre at the associated button
    var list = dropdown.children("ul");
    var button = dropdown.parent("li");
    if (list.length > 0 && button.length > 0) {
        var listX = button.position().left + 0.2 * button.width() - 0.5 * list.width();
        list.css({"left": (listX + "px")});
    }
}

function clearDropdown() {
    if (currentDropdown != null) {
        //Fade the dropdown out, updating current dropdown once completed
        currentDropdown.fadeOut(DROPDOWN_FADE_DELAY, function() {
            currentDropdown = null;
        });
    }
}

function mouseEnterItem(event) {
    //Get the associated dropdown
    var dropdown = getItemDropdown($(event.delegateTarget));
    //Show if dropdown is not currently locked
    if (currentDropdown == null || !dropdownLocked) {
        showDropdown(dropdown, false);
    }
}

function mouseLeaveItem(event) {
    if (!dropdownLocked) {
        clearDropdown();
    }
}

function clickItem(event) {
    var target = $(event.target);

    //Get the associated dropdown
    var dropdown = getItemDropdown($(event.delegateTarget));
    var oldDropdown = currentDropdown;
    showDropdown(dropdown, true);

    //Handle search click
    if (target.is("#search-button")) {
        searchBox.focus();
        searchBox.select();
        //If the search dropdown was already open
        if (oldDropdown != null && oldDropdown.is("#search-area")) {
            performSearch();
        }
    }
    
    //Handle user click
    if (target.is("#user-button")) {
        usernameBox.focus();
        usernameBox.select();
    }
    
    //If it was the click dropdown button being clicked
    if (target.parent().data("dropdown") == "click")
    {
        //Cancel click event to prevent closing the dropdown
        return false;
    }
}

//Gets the dropdown for the specified list item
function getItemDropdown(item) {
    return item.children(".nav-dropdown");
}

//On click anywhere on the page
function onClick(event) {
    
    //If there is a locked dropdown currently open
    if (currentDropdown != null && dropdownLocked) {
        var target = $(event.target);
        //If somewhere other than the dropdown, its children or dialog button was clicked
        if (event.target !== currentDropdown[0] && target.closest(currentDropdown).length == 0
            && !target.is("button")) {
            //Unless it was a click item clicked
            var parent = target.parent();
            if (parent.data("dropdown") != "click") {
                //Show the associated dropdown
                showDropdown(getItemDropdown(parent));
                //Cancel the click event to prevent following link
                event.preventDefault();
                return false;
            }
            else {
                clearDropdown();
            }
        }
        
    }
}

function onKeyDown(event) {
    //Escape
    if (event.keyCode == 27)
    {
        clearDropdown();
    }
}

function searchKeyDown(event)
{
    //Enter
    if (event.keyCode == 13) {
        performSearch();
        //Cancel form submission
        event.preventDefault();
        return false;
    }
}

function performSearch()
{
    var value = searchBox.val().trim();
    if (value.length > 0)
    {
        searchBox.val("");
        clearDropdown();
        
        //Go to the search page
        window.location.href = "search.php?q=" + value;
    }
}