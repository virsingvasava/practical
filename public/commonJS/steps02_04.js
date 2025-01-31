document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            
            let formData = new FormData(this);
            let actionUrl = this.getAttribute("action");

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
                    alert("Error: " + data.message);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});