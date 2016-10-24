<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Persons of interest</title>
		<script src="http://localhost/public/js/query-2.2.1.js"></script>
            
        <!-- CSS -->
        <link href="http://localhost/public/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://localhost/public/css/animate.min.css" rel="stylesheet">
        <link href="http://localhost/public/css/font-awesome.min.css" rel="stylesheet">
        <link href="http://localhost/public/css/form.css" rel="stylesheet">
        <link href="http://localhost/public/css/calendar.css" rel="stylesheet">
        <link href="http://localhost/public/css/style.css" rel="stylesheet">
        <link href="http://localhost/public/css/icons.css" rel="stylesheet">
        <link href="http://localhost/public/css/generics.css" rel="stylesheet">
		
		<script>
			function updateTextArea() 
			{
					var text = "";
					$('input[type=checkbox]:checked').each( function() 
					{
						text += $(this).val() + ",";
					});
					
					$('#associateTextArea').val( text );
			}

				$('input[type=checkbox]').change(function () {
					updateTextArea();
				});
			
		</script>
		<!--<script>
			function listTextAreaValue()
			{
				var options = document.getElementById('associateTextArea');
				var options2 = options.split(',');
				for(var i = 0; i < options.length; i++){
					if(options[i]) document.querySelectorAll('input[value="'+options[i]+'"][type="checkbox"]')[0].checked = true;
				}
			}
		</script>-->
    </head>
    <body id="skin-blur-blue">
        <header id="header" class="media">
            <a href="" id="menu-toggle"></a> 
            <a class="logo pull-left" href="index.html">Siyaleader 3.x</a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    <div class="pull-left tm-icon">
                        <a data-drawer="messages" class="drawer-toggle" href="">
                            <i class="sa-top-message"></i>
                            <i class="n-count animated">5</i>
                            <span>Messages</span>
                        </a>
                    </div>
                    <div class="pull-left tm-icon">
                        <a data-drawer="notifications" class="drawer-toggle" href="">
                            <i class="sa-top-updates"></i>
                            <i class="n-count animated">9</i>
                            <span>Updates</span>
                        </a>
                    </div>
                    
                    

                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
                    </div>

                    <div class="media-body">
                        <input type="text" class="main-search">
                    </div>
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
            <aside id="sidebar">
                
                <!-- Sidbar Widgets -->
                <div class="side-widgets overflow">
                    <!-- Profile Menu -->
                    <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                        <a href="" data-toggle="dropdown">
                            <img class="profile-pic animated" src="img/profile-pic.jpg" alt="">
                        </a>
                        <ul class="dropdown-menu profile-menu">
                            <li><a href="">My Profile</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Settings</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Sign Out</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                        </ul>
                        <h4 class="m-0">Rupert Meyer</h4>
                        rupert@ubulwembu.co.za
                    </div>
                    
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Feeds -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                           News Feeds
                        </h2>
                        
                        <div class="s-widget-body">
                            <div id="news-feed"></div>
                        </div>
                    </div>
                    
                    <!-- Projects -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                            Projects on going
                        </h2>
                        
                        <div class="s-widget-body">
                            <div class="side-border">
                                <small>Joomla Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="progress-bar tooltips progress-bar-danger" style="width: 60%;" data-original-title="60%">
                                          <span class="sr-only">60% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Opencart E-Commerce Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-info" style="width: 43%;" data-original-title="43%">
                                          <span class="sr-only">43% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Social Media API</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-warning" style="width: 81%;" data-original-title="81%">
                                          <span class="sr-only">81% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>VB.Net Software Package</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 10%;" data-original-title="10%">
                                          <span class="sr-only">10% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Chrome Extension</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 95%;" data-original-title="95%">
                                          <span class="sr-only">95% Complete</span>
                                     </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
                    <li>
                        <a class="sa-side-home" href="index.html">
                            <span class="menu-item">Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="sa-side-typography" href="typography.html">
                            <span class="menu-item">Typography</span>
                        </a>
                    </li>
                    <li>
                        <a class="sa-side-widget" href="content-widgets.html">
                            <span class="menu-item">Widgets</span>
                        </a>
                    </li>
                    <li>
                        <a class="sa-side-table" href="tables.html">
                            <span class="menu-item animated">Tables</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">Form</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="form-elements.html">Basic Form Elements</a></li>
                            <li><a href="form-components.html">Form Components</a></li>
                            <li><a href="form-examples.html">Form Examples</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-ui" href="">
                            <span class="menu-item">User Interface</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="labels.html">Labels</a></li>
                            <li><a href="images-icons.html">Images &amp; Icons</a></li>
                            <li><a href="alerts.html">Alerts</a></li>
                            <li><a href="media.html">Media</a></li>
                            <li><a href="components.html">Components</a></li>
                            <li><a href="other-components.html">Others</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-photos" href="">
                            <span class="menu-item">PHOTO GALLERY</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="photo-gallery.html">Google Images like</a></li>
                            <li><a href="photo-gallery-alt.html">Photo Gallery - 2</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="sa-side-chart" href="charts.html">
                            <span class="menu-item">Charts</span>
                        </a>
                    </li>
                    <li>
                        <a class="sa-side-folder" href="file-manager.html">
                            <span class="menu-item">File Manager</span>
                        </a>
                    </li>
                    <li>
                        <a class="sa-side-calendar" href="calendar.html">
                            <span class="menu-item">Calendar</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-page" href="">
                            <span class="menu-item">Pages</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="list-view.html">List View</a></li>
                            <li><a href="profile-page.html">Profile Page</a></li>
                            <li><a href="messages.html">Messages</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="404.html">404 Error</a></li>
                        </ul>
                    </li>
                </ul>
                
            </aside>
            
            <!-- Content -->
            <section id="content" class="container">
            
                <!-- Messages Drawer -->
                <div id="messages" class="tile drawer animated">
                    <div class="listview news narrow">
                        <div class="media">
                            <a href="">Send a New Message</a>
                            <span class="drawer-close">&times;</span>
                            
                        </div>
                        <div class="overflow" style="height: 254px">
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Nadin Jackson - 2 Hours ago</small><br>
                                    <a class="news-title" href="">Mauris consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">David Villa - 5 Hours ago</small><br>
                                    <a class="news-title" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Harris worgon - On 15/12/2013</small><br>
                                    <a class="news-title" href="">Maecenas venenatis enim condimentum ultrices fringilla. Nulla eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar, ornare turpis id</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Mitch Bradberry - On 14/12/2013</small><br>
                                    <a class="news-title" href="">Phasellus interdum felis enim, eu bibendum ipsum tristique vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Nadin Jackson - On 15/12/2013</small><br>
                                    <a class="news-title" href="">Ipsum wintoo consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">David Villa - On 16/12/2013</small><br>
                                    <a class="news-title" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Harris worgon - On 17/12/2013</small><br>
                                    <a class="news-title" href="">Maecenas venenatis enim condimentum ultrices fringilla. Nulla eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar, ornare turpis id</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Mitch Bradberry - On 18/12/2013</small><br>
                                    <a class="news-title" href="">Phasellus interdum felis enim, eu bibendum ipsum tristique vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/5.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Wendy Mitchell - On 19/12/2013</small><br>
                                    <a class="news-title" href="">Integer a eros dapibus, vehicula quam accumsan, tincidunt purus</a>
                                </div>
                            </div>
                        </div>
                        <div class="media text-center whiter l-100">
                            <a href="">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                
                <!-- Notification Drawer -->
                <div id="notifications" class="tile drawer animated">
                    <div class="listview news narrow">
                        <div class="media">
                            <a href="">Notification Settings</a>
                            <span class="drawer-close">&times;</span>
                        </div>
                        <div class="overflow" style="height: 254px">
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Nadin Jackson - 2 Hours ago</small><br>
                                    <a class="news-title" href="">Mauris consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">David Villa - 5 Hours ago</small><br>
                                    <a class="news-title" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Harris worgon - On 15/12/2013</small><br>
                                    <a class="news-title" href="">Maecenas venenatis enim condimentum ultrices fringilla. Nulla eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar, ornare turpis id</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Mitch Bradberry - On 14/12/2013</small><br>
                                    <a class="news-title" href="">Phasellus interdum felis enim, eu bibendum ipsum tristique vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Nadin Jackson - On 15/12/2013</small><br>
                                    <a class="news-title" href="">Ipsum wintoo consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">David Villa - On 16/12/2013</small><br>
                                    <a class="news-title" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                        </div>
                        <div class="media text-center whiter l-100">
                            <a href="">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                
                
                <!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Typography</a></li>
                    <li class="active">Data</li>
                </ol>
                
                <h4 class="page-title">PERSONS OF INTEREST</h4>
                                
                <!-- Paragraph -->
                <article id="paragraph" class="block-area">
					
					<div align="right">
						<a class="btn btn-default" href="/public/poi_all_case">Return to Person of Interest List</a>&nbsp;
						<a class="btn btn-default" href="/public/">Add New Person </a>
					</div>
					
                    <h3 class="block-title">UPDATE PERSON</h3>
                    <br/>
						
					</br>
					
					
						
							<div class="tile p-15">
							@foreach ($tasks as $task)
								<form role="form" action="/public/poi_case_detail/{{ $task->id }}" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									
									<div class="form-group">
										<label>Record ID: {{ $task->id }}</label>
									</div>
									
									<div class="row">		
											<div class="col-md-4">
												<div class="jumbotron" style="background-color:transparent; padding:15px; border-right-style:solid; border-color:black">		
													<h4 class="block-title">PERSONAL DETAILS</h4>
													
													<div class="form-group">
														<label>First Name</label>
														<input type="text" class="form-control" name="firstname" value="{{ $task->FIRST_NAME }}" >
													</div>
												
													<div class="form-group">
														<label>Surname</label>
														<input type="text" class="form-control" name="surname" value="{{ $task->SURNAME }}" >
													</div>
												
													<div class="form-group">
														<label>ID Number</label>
														<input type="text" class="form-control" name="idnumber" value="{{ $task->ID_NUMBER }}" disabled>
													</div>
													
													<div class="form-group">
														<label>Gender</label>
														<input type="text" class="form-control" name="idnumber" value="{{ $task->SEX_TYPE }}" disabled>
													</div>
												
													<div class="form-group">
														<label>Nationality</label>
														<input type="text" class="form-control" name="nationality" value="{{ $task->NATIONALITY }}" disabled>
													</div>

													<div class="form-group">
														<label>Nickname</label>
														<input type="text" class="form-control" name="nickname" value="{{ $task->NICKNAME }}" >
													</div>
																	
													<div class="form-group">
														<label>Language Spoken</label>
														<input type="text" class="form-control" name="languagespoken" value="{{ $task->LANGUAGE_SPOKEN }}" >
													</div>
												
													<div class="form-group">
														<label>Driver's License</label>
														<input type="text" class="form-control" name="driverlicense" value="{{ $task->DRIVER_LICENSE }}" >
													</div>
													
													<div class="form-group">
														<label>Marital Status</label>
														<input type="text" class="form-control" name="maritalstatus" value="{{ $task->MARITAL_STATUS }}" >
													</div>
																	
													<div class="form-group">
														<label>Address Home</label>
														<input type="text" class="form-control" name="addresshome" value="{{ $task->ADDRESS_HOME }}" >
													</div>
												
													<div class="form-group">
														<label>Address Work</label>
														<input type="text" class="form-control" name="addresswork" value="{{ $task->ADDRESS_WORK }}" >
													</div>
													
													<div class="form-group">
														<label>Contact Number</label>
														<input type="text" class="form-control" name="contactnumber" value="{{ $task->CONTACT_NUMBER }}" >
													</div>
																	
													<div class="form-group">
														<label>Email Address</label>
														<input type="text" class="form-control" name="emailaddress" value="{{ $task->EMAIL_ADDRESS }}" >
													</div>
													
													<div class="form-group">
														<label>Ethnic Group</label>
														<input type="text" class="form-control" name="ethnicgroup" value="{{ $task->ETHNIC_GROUP }}" >
													</div>
												
													<div class="form-group">
														<label>Birth Place</label>
														<input type="text" class="form-control" name="birthplace" value="{{ $task->BIRTH_PLACE }}" >
													</div>
												
													<div class="form-group">
														<label>Weight</label>
														<input type="text" class="form-control" name="weight" value="{{ $task->WEIGHT }}" >
													</div>
												
													<div class="form-group">
														<label>Height</label>
														<input type="text" class="form-control" name="height" value="{{ $task->HEIGHT }}" >
													</div>

													<div class="form-group">
														<label>Scars</label>
														<input type="text" class="form-control" name="scars" value="{{ $task->SCARS }}" >
													</div>
																	
													<div class="form-group">
														<label>Tattoo</label>
														<input type="text" class="form-control" name="tattoo" value="{{ $task->TATTOO }}" >
													</div>
												</div>
											</div>	
													
											<div class="col-md-4">
												<div class="jumbotron" style="background-color:transparent; padding:15px">
													
													<h4 class="block-title">OTHER DETAILS</h4>
													<div class="form-group">
														<label>Number of Dependents</label>
														<input type="text" class="form-control" name="numberdependent" value="{{ $task->NUMBER_DEPENDENT }}" >
													</div>
													
													<div class="form-group">
														<label>Travel Movements</label>
														<textarea class="form-control overflow" name="travelmovement" rows="3">{{ $task->TRAVEL_MOVEMENT }}</textarea>
													</div>
												
													<div class="form-group">
														<label>Employment History</label>
														<textarea class="form-control overflow" name="employmenthistory" rows="3">{{ $task->EMPLOYMENT_HISTORY }}</textarea>
													</div>
													
													</br></br>
													<hr style="height:15px; background-color:black; border:none"/>
													</br>
													
													<h4 class="block-title">CRIME DETAILS</h4>
													<div class="form-group">
														<label>Crime Type 1</label>
														<input type="text" class="form-control" name="crimetype1" value="{{ $task->CRIME_TYPE_1 }}" >
													</div>
													
													<div class="form-group">
														<label>Crime Type 2</label>
														<input type="text" class="form-control" name="crimetype2" value="{{ $task->CRIME_TYPE_2 }}" >
													</div>
													
													<div class="form-group">
														<label>Crime Type 3</label>
														<input type="text" class="form-control" name="crimetype3" value="{{ $task->CRIME_TYPE_3 }}" >
													</div>
													
													<div class="form-group">
														<label>Crime Type 4</label>
														<input type="text" class="form-control" name="crimetype4" value="{{ $task->CRIME_TYPE_4 }}" >
													</div>
													
													<div class="form-group">
														<label>Crime Type 5</label>
														<input type="text" class="form-control" name="crimetype5" value="{{ $task->CRIME_TYPE_5 }}" >
													</div>
													
													</br></br>
													<hr style="height:15px; background-color:black; border:none"/>
													</br>
													</br>
													<h4 class="block-title">ARREST RECORD</h4>
												
													<div class="form-group">
														<label>Arrest Record 1</label>
														<input type="text" class="form-control" name="arrestrecord1" value="{{ $task->ARREST_RECORD_1 }}" >
													</div>
													
													<div class="form-group">
														<label>Arrest Record 2</label>
														<input type="text" class="form-control" name="arrestrecord2" value="{{ $task->ARREST_RECORD_2 }}" >
													</div>
													
													<div class="form-group">
														<label>Arrest Record 3</label>
														<input type="text" class="form-control" name="arrestrecord3" value="{{ $task->ARREST_RECORD_3 }}" >
													</div>
													
													<div class="form-group">
														<label>Arrest Record 4</label>
														<input type="text" class="form-control" name="arrestrecord4" value="{{ $task->ARREST_RECORD_4 }}" >
													</div>
													
													<div class="form-group">
														<label>Arrest Record 5</label>
														<input type="text" class="form-control" name="arrestrecord5" value="{{ $task->ARREST_RECORD_5 }}" >
													</div>
												</div>
											</div>
													
											<div class="col-md-4">
												<div class="jumbotron" style="background-color:transparent; padding:15px; border-left-style:solid; border-color:black">		
													<h4 class="block-title">ACCOUNT & PROPERTY DETAILS</h4>
													<div class="form-group">
														<label>Bank Name</label>
														<input type="text" class="form-control" name="bankname" value="{{ $task->BANK_NAME }}" >
													</div>
												
													<div class="form-group">
														<label>Bank Account Name</label>
														<input type="text" class="form-control" name="bankaccountname" value="{{ $task->BANK_ACCOUNT_NAME }}" >
													</div>

													<div class="form-group">
														<label>Bank Branch Code</label>
														<input type="text" class="form-control" name="bankbranchcode" value="{{ $task->BANK_BRANCH_CODE }}" >
													</div>
																	
													<div class="form-group">
														<label>Bank Account Number</label>
														<input type="text" class="form-control" name="bankaccountnumber" value="{{ $task->BANK_ACCOUNT_NUMBER }}" >
													</div>
												
													<div class="form-group">
														<label>Accounts 1</label>
														<input type="text" class="form-control" name="account1" value="{{ $task->ACCOUNT_1 }}" >
													</div>
													
													<div class="form-group">
														<label>Accounts 2</label>
														<input type="text" class="form-control" name="account2" value="{{ $task->ACCOUNT_2 }}" >
													</div>
													
													<div class="form-group">
														<label>Accounts 3</label>
														<input type="text" class="form-control" name="account3" value="{{ $task->ACCOUNT_3 }}" >
													</div>
													
													<div class="form-group">
														<label>Accounts 4</label>
														<input type="text" class="form-control" name="account4" value="{{ $task->ACCOUNT_4 }}" >
													</div>
													
													<div class="form-group">
														<label>Accounts 5</label>
														<input type="text" class="form-control" name="account5" value="{{ $task->ACCOUNT_5 }}" >
													</div>
													
													<div class="form-group">
														<label>Credit Record</label>
														<textarea class="form-control overflow" name="creditrecord" rows="3">{{ $task->CREDIT_RECORD }}</textarea>
													</div>
																	
													<div class="form-group">
														<label>Business Interest</label>
														<textarea class="form-control overflow" name="businessinterest" rows="3">{{ $task->BUSINESS_INTEREST }}</textarea>
													</div>
												
													<div class="form-group">
														</br>
														<label>Known Associates</label></br>
														<div class="m-b-20">
														<a data-toggle="modal" href="#modalNarrower" class="btn btn-sm" onClick="associateTextArea()">Click to add associates</a>
												</div>
												<!-- Modal Narrower -->	
												<div class="modal fade" id="modalNarrower" tabindex="-1" role="dialog" aria-hidden="true" >
													<div class="modal-dialog modal-sm">
														<div class="modal-content" onload="listTextAreaValue()">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<h4 class="modal-title">Associates List</h4>
															</div>
															<div class="modal-body">
																
																	<div class="listview narrow">
																		<div class="media">
																			<div class="media-body" >
																				<div   style="overflow-y: scroll; height:300px;">
																					@foreach ($associates as $associate)
																								
																								<input type="checkbox" style="" name="chkAssociate" id="inlineCheckbox1" value="{{ $associate->FIRST_NAME }} {{ $associate->SURNAME }}">
																								{{ $associate->FIRST_NAME }} {{ $associate->SURNAME }}
																							
																							</br></br>
																							@endforeach
																				</div>
																			</div>
																		</div>
																	</div>
																
															</div>
															<hr style="height:5px; background-color:black; border:none"/>
															
															
															<div class="modal-footer">
																<button type="button" class="btn btn-sm" onClick="updateTextArea()">Add / Remove</button>
																<button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
														
														
														
														<textarea class="form-control overflow" id="associateTextArea" name="knownassociate" rows="3" onfocus="this.blur();alert('Warning!!\n\nYou cannot type on this box directly.')" >{{ $task->KNOWN_ASSOCIATE }}</textarea>
													</div>
													
													<div class="form-group">
														<label>Property Owned 1</label>
														<input type="text" class="form-control" name="propertyowned1" value="{{ $task->PROPERTY_OWNED_1 }}" >
													</div>
													
													<div class="form-group">
														<label>Property Owned 2</label>
														<input type="text" class="form-control" name="propertyowned2" value="{{ $task->PROPERTY_OWNED_2 }}" >
													</div>
													
													<div class="form-group">
														<label>Property Owned 3</label>
														<input type="text" class="form-control" name="propertyowned3" value="{{ $task->PROPERTY_OWNED_3 }}" >
													</div>
																
													<div class="form-group">
														<label>Property Rented 1</label>
														<input type="text" class="form-control" name="propertyrented1" value="{{ $task->PROPERTY_RENTED_1 }}" >
													</div>
													
													<div class="form-group">
														<label>Property Rented 2</label>
														<input type="text" class="form-control" name="propertyrented2" value="{{ $task->PROPERTY_RENTED_2 }}" >
													</div>
													
													<div class="form-group">
														<label>Property Rented 3</label>
														<input type="text" class="form-control" name="propertyrented3" value="{{ $task->PROPERTY_RENTED_3 }}" >
													</div>
												</div>
											</div>
									</div>			
													</br></br>
									
								
													<div align="center">
														<button type="submit" class="btn btn-default">Save Updates</button>
													</div>
													
													
													
								</form>
						@endforeach
							</div>
            </section>
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="http://localhost/public/js/jquery.min.js"></script> <!-- jQuery Library -->
        
        <!-- Bootstrap -->
        <script src="http://localhost/public/js/bootstrap.min.js"></script>
        
        <!-- UX -->
        <script src="http://localhost/public/js/scroll.min.js"></script> <!-- Custom Scrollbar -->
        
        <!-- Other -->
        <script src="http://localhost/public/js/calendar.min.js"></script> <!-- Calendar -->
        <script src="http://localhost/public/js/feeds.min.js"></script> <!-- News Feeds -->
        
        
        <!-- All JS functions -->
        <script src="http://localhost/public/js/functions.js"></script>
		
		<!--  Form Related -->
        <script src="http://localhost/public/js/validation/validate.min.js"></script> <!-- jQuery Form Validation Library -->
        <script src="http://localhost/public/js/validation/validationEngine.min.js"></script> <!-- jQuery Form Validation Library - requirred with above js -->
        <script src="http://localhost/public/js/select.min.js"></script> <!-- Custom Select -->
        <script src="http://localhost/public/js/chosen.min.js"></script> <!-- Custom Multi Select -->
        <script src="http://localhost/public/js/datetimepicker.min.js"></script> <!-- Date & Time Picker -->
        <script src="http://localhost/public/js/colorpicker.min.js"></script> <!-- Color Picker -->
        <script src="http://localhost/public/js/icheck.js"></script> <!-- Custom Checkbox + Radio -->
        <script src="http://localhost/public/js/autosize.min.js"></script> <!-- Textare autosize -->
        <script src="http://localhost/public/js/toggler.min.js"></script> <!-- Toggler -->
        <script src="http://localhost/public/js/input-mask.min.js"></script> <!-- Input Mask -->
        <script src="http://localhost/public/js/spinner.min.js"></script> <!-- Spinner -->
        <script src="http://localhost/public/js/slider.min.js"></script> <!-- Input Slider -->
        <script src="http://localhost/public/js/fileupload.min.js"></script> <!-- File Upload -->
    </body>
</html>

