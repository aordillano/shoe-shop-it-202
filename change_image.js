// Alieyah Ordillano, 12/01/2023, IT 202-001, Section 001 Unit 11 Assignment, amo47@njit.edu

// Checks if document is ready
$(document).ready( () => {
    // Empties out image to put a new one
    $("#shoe_img").empty();

    // Changes current black and white photo to colored once the mouse hovers it
    $("#shoe_img").mouseover( function() {
        const src = $(this).attr('src');
        const new_src = src.replace("-modified.jpg", "-original.jpg");
        $(this).attr('src', new_src);
    });

    // Changes current colored photo to black and white once the mouse moves away from it
    $("#shoe_img").mouseout( function() {
        const src = $(this).attr('src');
        const new_src = src.replace("-original.jpg", "-modified.jpg");
        $(this).attr('src', new_src);
    });
});