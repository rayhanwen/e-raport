 <!-- Footer -->
 <footer class="sticky-footer bg-white">
 	<div class="container my-auto">
 		<div class="copyright text-center my-auto">
 			<span>Copyright &copy; Raihan Ramadhan 2024</span>
 		</div>
 	</div>
 </footer>
 <!-- End of Footer -->
 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
 <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
 <script src="<?= base_url('assets/js/demo/chart-pie-demo.js') ?>"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
 <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>

 <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> -->
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

 <script src="<?= base_url(); ?>assets/js/sweetalert2.min.js"></script>

 <script src="<?= base_url(); ?>assets/js/flash-data.js"></script>
 <script src="<?= base_url(); ?>assets/js/delete.js"></script>

 <script>
 	$('.modal').on('hidden.bs.modal', function() {
 		$(".invalid-feedback").html('');
 		$(".form-control").removeClass("is-valid");
 		$(".form-select").removeClass("is-valid");
 		$(".form-control").removeClass("is-invalid");
 		$(".form-select").removeClass("is-invalid");
 		$("form")[0].reset();
 		$("form").trigger("reset");
 		$(".js-example-basic-single").val('').trigger('change')
 		// $("#formCetak")[0].reset();
 	})
 </script>

 <script>
 	function goBack() {
 		window.history.back();
 	}

 	function goForward() {
 		window.history.forward();
 	}
 </script>

 <script>
 	// In your Javascript (external .js resource or <script> tag)
 	$(document).ready(function() {
 		$('.js-example-basic-single').select2({
 			allowClear: true,
 			theme: 'bootstrap-5'
 			// theme: 'bootstrap4',
 		});
 	});
 </script>

 </body>

 </html>