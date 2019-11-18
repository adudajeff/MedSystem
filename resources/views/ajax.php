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

          //Delete record function
	 function deleterecord(link){
			
			var token = $("meta[name='csrf-token']").attr("content");
			if (confirm("Are you sure you want to delete this Record?")) {
					$.ajax(
					{
						url: link,
						type: 'GET',
						Datatype:'json',
						data: {					
							"_token": token,
						},
						success: function (data){
							console.log(data);
							alert(JSON.stringify(data.success));
							location.reload();
						},
						error: function (data) {
							console.log(data);
							alert(JSON.stringify(data.error));
							location.reload();
						}
					});
			}else{
				return false;
			}
	   
	}		
		
</script>