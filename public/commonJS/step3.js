document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", function (event) {
            event.preventDefault(); 
            
            let formData = new FormData(this);
            let actionUrl = this.getAttribute("action");

            document.querySelectorAll('.invalid-feedback').forEach((el) => {
                el.remove();
            });

            fetch(actionUrl, {
                method: "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect; 
                } else {

                    Object.entries(data.errors).forEach(([field, messages]) => {

                        const match = field.match(/^wildcards\.(\d+)$/); 
                        if (match) {
                            const index = match[1]; 

                            const inputField = document.querySelectorAll('input[name="wildcards[]"]')[index];

                            if (inputField) {
                                const errorElement = document.createElement('div');
                                errorElement.classList.add('invalid-feedback');
                                errorElement.textContent = messages[0];

                                inputField.classList.add('is-invalid');
                                inputField.parentElement.appendChild(errorElement);
                            }
                        }
                    });
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });

    document.querySelectorAll('input[name="wildcards[]"]').forEach((input) => {
        input.addEventListener('input', function () {
            if (this.classList.contains('is-invalid')) {
                this.classList.remove('is-invalid'); 
                const errorElement = this.parentElement.querySelector('.invalid-feedback');
                if (errorElement) {
                    errorElement.remove(); 
                }
            }
        });
    });
});