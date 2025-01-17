function initializeDeleteAction(selector, ajaxUrl) {
    document.querySelectorAll(selector).forEach(link => {
        link.addEventListener('click', function () {
            const itemId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: ajaxUrl,
                        type: 'POST',
                        data: {
                            id: itemId,
                            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                                document.querySelector(`${selector}[data-id="${itemId}"]`).closest('tr').remove();
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.message || 'Something went wrong!',
                                    'error'
                                );
                            }
                        },
                        error: function () {
                            Swal.fire(
                                'Error!',
                                'Failed to delete the item. Please try again.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
}
