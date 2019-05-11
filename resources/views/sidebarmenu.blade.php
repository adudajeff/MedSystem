			<div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="/home" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Home</span>
                                    </a>
                                </li>
                            </ul>   
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Main Menu</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">Patients/Staffs</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/Patients" class="nav-link ">
                                        <span class="title">All Staffs/Patients</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/Patients/newpatient" class="nav-link ">
                                        <span class="title">New patient/Staff</span>
                                    </a>
                                </li>  
								<li class="nav-item  divider">
                                    <a href="/Patients/assigncover" class="nav-link ">
                                        <span class="title">Assign Cover</span>
                                    </a>
                                </li> 
								
                            </ul>
                        </li> 
						<li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-calendar"></i>
                                <span class="title">Appointments</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/Appointments" class="nav-link ">
                                        <span class="title">All Appointsments</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/Appointments/newappointment" class="nav-link ">
                                        <span class="title">New Appointment</span>
                                    </a>
                                </li> 							                                
                            </ul>
                        </li>
						<li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Insurance Cover </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/covers/allcovers" class="nav-link ">
                                        <span class="title">All Insurance Covers</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/covers/assignnewcover" class="nav-link ">
                                        <span class="title">Assign Insurance Cover</span>
                                    </a>
                                </li>  
								<li class="nav-item  ">
                                    <a href="#" class="nav-link ">
                                        <span class="title">New Insurance Cover</span>
                                    </a>
                                </li>                                
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Doctors & Contacts</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/Alldoctors" class="nav-link ">
                                        <span class="title">All Doctors</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="/Doctors/newdoctor" class="nav-link ">
                                        <span class="title">New Doctors</span>                                        
                                    </a>
                                </li>
                                <li class="divider"></li>
                            </ul>
                        </li>
						<li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-upload"></i>
                                <span class="title">Invoice Uploads</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/Uploadreceipt/allreceiptposts" class="nav-link ">
                                        <span class="title">All Invoice uploads</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/Uploadreceipt/newpost" class="nav-link ">
                                        <span class="title">New Invoice Uploads</span>                                        
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="/Uploadreceipt/billsum/invoiceno" class="nav-link ">
                                        <span class="title">New Bill Summary Form</span>                                        
                                    </a>
                                </li>
                                
                            </ul>
                        </li> 		
						<li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-dollar"></i>
                                <span class="title">Billing & Reconcilaitions</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/reconcile/reconcilecover" class="nav-link ">
                                        <span class="title">Reconcile Covers</span>
                                    </a>
                                </li> 
								<li class="nav-item  ">
                                    <a href="/reconcile/reconcilebill" class="nav-link ">
                                        <span class="title">Reconcile Bill</span>
                                    </a>
                                </li> 
                            </ul>
                        </li> 			
						<li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-file"></i>
                                <span class="title">Reports</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/reports/billsummary" class="nav-link ">
                                        <span class="title">Bill Summary Reports</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/reports/Allcovers" class="nav-link ">
                                        <span class="title">All Staffs/Patients By Cover</span>                                        
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="#" class="nav-link ">
                                        <span class="title">All Receipt/Invoice Uploads</span>                                        
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="#" class="nav-link ">
                                        <span class="title">All Appointment Listings</span>                                        
                                    </a>
                                </li>
									<li class="nav-item  ">
                                    <a href="#" class="nav-link ">
                                        <span class="title">All Appointments In Calendar</span>                                        
                                    </a>
                                </li>
                                
                            </ul>
                        </li> 
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Settings</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="maps_google.html" class="nav-link ">
                                        <span class="title">Google Maps</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="maps_vector.html" class="nav-link ">
                                        <span class="title">Vector Maps</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>