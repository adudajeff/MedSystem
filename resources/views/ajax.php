<script type="text/javascript">
		$(document).ready(function() {
		  $("#btnadd1").click(function() {   //button id
			 var loginForm = $("#form_sample_1");  //form id
			 loginForm.submit(function(e){
				 e.preventDefault();
				 var formData = loginForm.serialize();
				 /*alert(formData);*/
					$.ajax({
						url:"/Patients/addnew",
						type:'post',
						Datatype:'json',
						data:formData,
						success:function(msg){
							//console.log(data);
							$('.alert-success').html(msg.msg);
						},
						error: function (msg) {
							//console.log(data);
							alert(JSON.stringify(msg.msg));
						}
					});
				});
		/*alert('Successfully Loaded');*/
			});                 
		});
</script>