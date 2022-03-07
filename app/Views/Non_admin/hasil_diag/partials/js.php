<script src="assets/js/jquery.min.js"></script>
<script>
	var main_param={};
$(document).ready(function(){
	$(document).on('click','.edit',function(){
		var data_form=$(this).attr('data-id');
		main_param.a=data_form;
		$("#modal-edit").html("<h2>Loading</h2>");
		$.ajax({
			url:"?a=Ker/form_edit",
			method:"POST",
			data:main_param,
			success:function(hasil){
				$("#modal-edit").html(hasil);

			}
		});
	});
});
</script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/jquery.dataTables.js"></script>
<script src="assets/js/dataTables.bootstrap4.js"></script>
<script src="assets/js/sb-admin.min.js"></script>
<script src="assets/js/datatables-demo.js"></script>
