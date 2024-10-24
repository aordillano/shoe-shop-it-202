// Alieyah Ordillano, 12/01/2023, IT 202-001, Section 001 Unit 11 Assignment, amo47@njit.edu

// Made function because it is used constantly
const select = selector => document.querySelector(selector);

const validateCreate = () => {
    // Gets values from input text fields
    const code = select("#shoe_code");
    const name = select("#shoe_name");
    const desc = select("#description");
    const price = select("#price");

    // Flag
    let isValid = true;
    
    // Validates shoe code based on criteria
    if (code.value == "") {
        code.nextElementSibling.textContent = "This field is required.";
        isValid = false;
    } else if (code.value.length < 4) {
        code.nextElementSibling.textContent = "Shoe code has to be at least 4 characters.";
        isValid = false;
    } else if (code.value.length > 10) {
        code.nextElementSibling.textContent = "Shoe code has to be at most 10 characters.";
        isValid = false;
    } else {
        code.nextElementSibling.textContent = "";
    }

    // Validates shoe name based on criteria
    if (name.value == "") {
        name.nextElementSibling.textContent = "This field is required.";
        isValid = false;
    } else if (name.value.length < 10) {
        name.nextElementSibling.textContent = "Shoe name has to be at least 10 characters.";
        isValid = false;
    } else if (name.value.length > 100) {
        name.nextElementSibling.textContent = "Shoe name has to be at most 100 characters.";
        isValid = false;
    } else {
        name.nextElementSibling.textContent = "";
    }

    // Validates shoe description based on criteria
    if (desc.value == "") {
        desc.nextElementSibling.textContent = "This field is required.";
        isValid = false;
    } else if (desc.value.length < 10) {
        desc.nextElementSibling.textContent = "Description has to be at least 10 characters.";
        isValid = false;
    } else if (desc.value.length > 255) {
        desc.nextElementSibling.textContent = "Description has to be at most 255 characters.";
        isValid = false;
    } else {
        desc.nextElementSibling.textContent = "";
    }

    // Validates shoe price based on criteria
    const price_value = parseInt(price.value);
    if (price_value == "") { 
        price.nextElementSibling.textContent = "This field is required.";
        isValid = false;
    } else if (isNaN(price_value) || price_value <= 0) {
        price.nextElementSibling.textContent = "Price must be a valid, positive number greater than 0.";
        isValid = false;
    } else if (price_value > 100000) {
        price.nextElementSibling.textContent = "Price must not exceed $100,000.";
        isValid = false;
    } else {
        price.nextElementSibling.textContent = "";
    }

    // Submits form if there are no problems
    if (isValid == true) {
        select("form").submit();
    }
}

// Resets form
const resetForm = () => {
    select("#shoe_code").value = "";
    select("#shoe_name").value = "";
    select("#description").value = "";
    select("#price").value = "";
    select("#shoe_code").nextElementSibling.textContent = "*";
    select("#shoe_name").nextElementSibling.textContent = "*";
    select("#description").nextElementSibling.textContent = "*";
    select("#price").nextElementSibling.textContent = "*";
    select("#shoe_code").focus();
};

// Adds event handlers to buttons
document.addEventListener("DOMContentLoaded", () => {
    select("#add_shoe_button").addEventListener("click", validateCreate);
    select("#reset_button").addEventListener("click", resetForm);  
    select("#shoe_code").focus();   
});