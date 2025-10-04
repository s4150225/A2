document.addEventListener('DOMContentLoaded', function() {
    
    // --- Image Extension Validation for Add Skill Form ---
    const addSkillForm = document.getElementById('addSkillForm');
    if (addSkillForm) {
        const imageInput = document.getElementById('image');
        const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        addSkillForm.addEventListener('submit', function(event) {
            const fileName = imageInput.value;
            if (fileName) {
                const fileExtension = fileName.split('.').pop().toLowerCase();
                if (!allowedExtensions.includes(fileExtension)) {
                    alert('Invalid file type. Please upload a JPG, JPEG, PNG, GIF, or WEBP file.');
                    event.preventDefault(); // Prevent form submission
                    imageInput.value = ''; // Clear the invalid input
                }
            }
        });
    }

    // --- Bootstrap Modal Logic for Images ---
    // This handles modals on both details.php and gallery.php
    const imageModal = document.getElementById('imageModal');
    if (imageModal) {
        imageModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            const triggerElement = event.relatedTarget;
            
            // Extract image source from data-bs-img-src attribute
            const imageSrc = triggerElement.getAttribute('data-bs-img-src');
            
            // Update the modal's image
            const modalImage = imageModal.querySelector('#modalImage');
            modalImage.src = imageSrc;
        });
    }

});