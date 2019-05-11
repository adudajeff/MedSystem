<?php 
 ?>
</div>
	   <script>    
		   $(document).ready(function()
            {
                $('#calendar1').fullCalendar(
                {
				   theme: true,
				  plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
				  height: 'parent',
				  header: {
					left: 'prevYear,prev,next,nextYear today',
					center: 'title',
					left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
				  },
                    //header:
                  //  {
                 //       left: 'prev,next today',
                 //       center: 'title',
                 //       right: 'month,agendaWeek,agendaDay'
                 //   },
				    
				    defaultDate: '<?php echo date('Y-m-d'); ?>',
                    editable: true,
					navLinks: true,
                    eventLimit: true, // allow "more" link when too many events					 
                    events: [
					<?php 
					    foreach($appointments as $key)
						 {						  
					  ?>
						   {
							title: '<?php echo $key->FirstName.':'.$key->Note; ?>',							
							start: '<?php echo date('Y-m-d',strtotime($key->Appointmentdate)).'T'.$key->Start; ?>'
							//end: '<?php echo date('Y-m-d',strtotime($key->Appointmentdate)).'T'.$key->End; ?>'
							},
					<?php 
				       }
					?>
                    {
                        title: 'Help? Kindly Follow',
                        url: 'support.fortunekenya.com',
                        start: '2019-02-30'
                    }]
                });
            });
        </script>