$("#dataTable").on("click", ".btn-delete", function (e) {
	e.preventDefault();

	let url = $(this).attr("href");
	let id = $(this).attr("id");

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-primary mx-2",
			cancelButton: "btn btn-danger",
		},
		buttonsStyling: false,
	});

	swalWithBootstrapButtons
		.fire({
			title: "Apa Anda Yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya, Hapus!",
			cancelButtonText: "Tidak, Batal!",
			reverseButtons: true,
		})
		.then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: url,
					type: "POST",
					data: {
						id: id,
					},
					dataType: "json",
					success: function (response) {
						if (response.msg == "success") {
							$(function () {
								var Toast = Swal.mixin({
									toast: true,
									position: "top",
									showConfirmButton: false,
								});
								Toast.fire({
									icon: "success",
									title: "Your data  has been deleted!",
								});
							});
							setTimeout(function () {
								location.reload();
							}, 400);
						}

						if (response.msg == "error") {
							swalWithBootstrapButtons
								.fire("Deleted!", "Your data hasn't been deleted!", "error")
								.then((result) => {
									if (result.isConfirmed) {
										location.reload();
									}
								});
						}
					},
				});
			} else if (
				/* Read more about handling dismissals below */
				result.dismiss === Swal.DismissReason.cancel
			) {
				// swalWithBootstrapButtons.fire(
				// 	"Cancelled",
				// 	"Your data is safe :)",
				// 	"error"
				// );
			}
		});
});
