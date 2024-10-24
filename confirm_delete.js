// Alieyah Ordillano, 12/01/2023, IT 202-001, Section 001 Unit 11 Assignment, amo47@njit.edu

// Function to call confirm dialog
const deleteShoe = event => {
    // Creates confirm dialog to ask user
    const confirmDelete = confirm("Are you sure you want to delete this shoe item?");
    // Intervenes if user put cancel
    if (!confirmDelete) { 
        alert("Shoe item was not deleted.");
        // Don't allow form to be submitted
        event.preventDefault();  
    } 
};

// Adds event handler for all delete buttons when website is loaded
document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".delete_button");
    for (let button of buttons) button.addEventListener("click", deleteShoe);
});
