<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Persons of interest</title>
            
        <!-- CSS -->
        <link href="http://localhost/public/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://localhost/public/css/animate.min.css" rel="stylesheet">
        <link href="http://localhost/public/css/font-awesome.min.css" rel="stylesheet">
        <link href="http://localhost/public/css/form.css" rel="stylesheet">
        <link href="http://localhost/public/css/calendar.css" rel="stylesheet">
        <link href="http://localhost/public/css/style.css" rel="stylesheet">
        <link href="http://localhost/public/css/icons.css" rel="stylesheet">
        <link href="http://localhost/public/css/generics.css" rel="stylesheet">
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
                            <span class="menu-item">POI</span>
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
					<div class="flash-message">
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						  @if(Session::has('alert-' . $msg))

						  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
						  @endif
						@endforeach
					</div> <!-- end .flash-message -->
					
					
					<div align="right">
						<a class="btn btn-default" href="/public/poi_all_case">Return to Person of Interest List</a>&nbsp;
						<a class="btn btn-default" href="/public/">Add New Person </a>
					</div>
					
                    <h3 class="block-title">PERSON DETAIL</h3>
                    <br/>
						
					</br>
					
					<div class="row">
						<div class="col-md-6">
						
							<div class="tile p-15">
								<form role="form">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								@foreach ($tasks as $task)
								
									<div class="row">
										<div class="col-md-6">
												<div class="form-group">
													<label>Record ID</label>
													<input type="text" class="form-control" value="{{ $task->id }}" disabled>
												</div>
												
												<div class="form-group">
													<label>Created At</label>
													<input type="text" class="form-control" value="{{ $task->created_at }}" disabled>
												</div>
												
												<div class="form-group">
													<label>Updated At</label>
													<input type="text" class="form-control" value="{{ $task->updated_at }}" disabled>
												</div>
										</div>
										<div class="col-md-6">
												
												<div class="form-group">
													<label>Profile Picture</label>
													<img src ="http://localhost/public/images/{{ $task->PICTURE }}" onerror="this.src='http://localhost/public/images/poi_default_profile_pic.png';" height="150px" width="150px" />
												</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
												</br>
												<h4 class="block-title"><b>PERSONAL DETAILS</b></h4>
												</br></br>
												
													<label>First Name :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->FIRST_NAME }}</div>
															</div>
														</div>
													</div>
													
													<label>Surname :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->SURNAME }}</div>
															</div>
														</div>
													</div>
													
													<label>ID Number :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ID_NUMBER }}</div>
															</div>
														</div>
													</div>
													
													<label>Gender :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->SEX_TYPE }}</div>
															</div>
														</div>
													</div>
													
													<label>Nationality :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->NATIONALITY }}</div>
															</div>
														</div>
													</div>
													
													<label>Nickname :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->NICKNAME }}</div>
															</div>
														</div>
													</div>
													
													<label>Language Spoken :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->LANGUAGE_SPOKEN }}</div>
															</div>
														</div>
													</div>
													
													<label>Driver's License :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->DRIVER_LICENSE }}</div>
															</div>
														</div>
													</div>
													
													<label>Marital Status :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->MARITAL_STATUS }}</div>
															</div>
														</div>
													</div>
													
													<label>Address Home :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ADDRESS_HOME }}</div>
															</div>
														</div>
													</div>
													
													<label>Address Work :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ADDRESS_WORK }}</div>
															</div>
														</div>
													</div>
													
													<label>Contact Number 1 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->CONTACT_NUMBER_1 }}</div>
															</div>
														</div>
													</div>
													
													<label>Contact Number 2 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->CONTACT_NUMBER_2 }}</div>
															</div>
														</div>
													</div>
													
													<label>Contact Number 3 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->CONTACT_NUMBER_3 }}</div>
															</div>
														</div>
													</div>
													
													<label>Email Address :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->EMAIL_ADDRESS }}</div>
															</div>
														</div>
													</div>
													
													<label>Ethnic Group :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ETHNIC_GROUP }}</div>
															</div>
														</div>
													</div>
													
													<label>Birth Place :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->BIRTH_PLACE }}</div>
															</div>
														</div>
													</div>
													
													<label>Weight :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->WEIGHT }}</div>
															</div>
														</div>
													</div>
													
													<label>Height :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->HEIGHT }}</div>
															</div>
														</div>
													</div>
													
													<label>Scars :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->SCARS }}</div>
															</div>
														</div>
													</div>
													
													<label>Tattoo :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->TATTOO }}</div>
															</div>
														</div>
													</div>
													
												
										</div>
										
										<div class="col-md-6">
												</br>
												<h4 class="block-title"><b>CRIME DETAILS</b></h4>
												</br></br>
												
													<label>Crime Type 1 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->CRIME_TYPE_1 }}</div>
															</div>
														</div>
													</div>
													
													<label>Crime Type 2 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->CRIME_TYPE_2 }}</div>
															</div>
														</div>
													</div>
													
													<label>Crime Type 3 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->CRIME_TYPE_3 }}</div>
															</div>
														</div>
													</div>
													
													<label>Crime Type 4 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->CRIME_TYPE_4 }}</div>
															</div>
														</div>
													</div>
													
													<label>Crime Type 5 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->CRIME_TYPE_5 }}</div>
															</div>
														</div>
													</div>
												
												</br>
												<hr style="height:15px; background-color:black; border:none"/>
												</br>
												<h4 class="block-title"><b>ARREST RECORD</b></h4>
												</br></br>
													<label>Arrest Record 1 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ARREST_RECORD_1 }}</div>
															</div>
														</div>
													</div>
													
													<label>Arrest Record 2 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ARREST_RECORD_2 }}</div>
															</div>
														</div>
													</div>
													
													<label>Arrest Record 3 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ARREST_RECORD_3 }}</div>
															</div>
														</div>
													</div>
													
													<label>Arrest Record 4 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ARREST_RECORD_4 }}</div>
															</div>
														</div>
													</div>
													
													<label>Arrest Record 5 :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ARREST_RECORD_5 }}</div>
															</div>
														</div>
													</div>
													
												
												</br>
												<hr style="height:15px; background-color:black; border:none"/>
												</br>
												<h4 class="block-title"><b>OTHER DETAILS</b></h4>
												</br></br>
												
													<label>Number of Dependents :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->NUMBER_DEPENDENT }}</div>
															</div>
														</div>
													</div>
													
													<label>Travel Movements :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->TRAVEL_MOVEMENT }}</div>
															</div>
														</div>
													</div>
													
													<label>Employment History :</label>
													<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->EMPLOYMENT_HISTORY }}</div>
															</div>
														</div>
													</div>
													
												
										</div>
									</div>
									
									</br>
									<hr style="height:15px; background-color:black; border:none"/>
									</br>
									
									<div>
										<h4 class="block-title"><b>ACCOUNT & PROPERTY DETAILS</b></h4>
										</br></br>
										
											<label>Bank Name :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->BANK_NAME }}</div>
															</div>
														</div>
													</div>
													
											<label>Bank Account Name :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->BANK_ACCOUNT_NAME }}</div>
															</div>
														</div>
													</div>
													
											<label>Bank Branch Code :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->BANK_BRANCH_CODE }}</div>
															</div>
														</div>
													</div>
													
											<label>Bank Account Number :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->BANK_ACCOUNT_NUMBER }}</div>
															</div>
														</div>
													</div>
													
											<label>Accounts 1 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ACCOUNT_1 }}</div>
															</div>
														</div>
													</div>
											
											<label>Accounts 2 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ACCOUNT_2 }}</div>
															</div>
														</div>
													</div>
													
											<label>Accounts 3 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ACCOUNT_3 }}</div>
															</div>
														</div>
													</div>
													
											<label>Accounts 4 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ACCOUNT_4 }}</div>
															</div>
														</div>
													</div>
													
											<label>Accounts 5 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->ACCOUNT_5 }}</div>
															</div>
														</div>
													</div>
													
											<label>Credit Record :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->CREDIT_RECORD }}</div>
															</div>
														</div>
													</div>
													
											<label>Business Interest :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->BUSINESS_INTEREST }}</div>
															</div>
														</div>
													</div>
													
											<label>Known Associates :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->KNOWN_ASSOCIATE }}</div>
															</div>
														</div>
													</div>
													
											<label>Property Owned 1 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->PROPERTY_OWNED_1 }}</div>
															</div>
														</div>
													</div>
													
											<label>Property Owned 2 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->PROPERTY_OWNED_2 }}</div>
															</div>
														</div>
													</div>
													
											<label>Property Owned 3 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->PROPERTY_OWNED_3 }}</div>
															</div>
														</div>
													</div>
													
											<label>Property Rented 1 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->PROPERTY_RENTED_1 }}</div>
															</div>
														</div>
													</div>
													
											<label>Property Rented 2 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->PROPERTY_RENTED_2 }}</div>
															</div>
														</div>
													</div>
													
											<label>Property Rented 3 :</label>
											<div class="tile">
														<div class="media">
															<div class="media-body">
																<div style="padding:5px">{{ $task->PROPERTY_RENTED_3 }}</div>
															</div>
														</div>
													</div>
											
										
									</div>
												
											
												</br></br>
								@endforeach
									
								</form>
						
							</div>
						</div>
						<div class="col-md-4">
							<div class="tile p-15">
								<form role="form" action="/public/casedetail/{{ $task->id }}" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									
									<div class="block-area" id="textarea">
										<label>Add Note</label>
										<textarea class="form-control auto-size m-b-10" name="casenote" placeholder="Type your note here..."></textarea>
									</div>
									
									<div align="right">
									<button type="submit" class="btn btn-default">Add Note</button>
									</div>
								</form>
							</div>
							</br></br>
							<div>
								<h2 class="tile-title">NOTE LIST</h2>
							</div>
							</br>
							<div   style="overflow-y: scroll; height:300px;">
								<div class="listview narrow">
									@foreach ($notes as $note)
									
										<div class="media">
											<div class="media-body">
												<div><b>Note by {{ $note->USERNAME }} ON {{ $note->created_at }}</b></div>
												</br>{{ $note->CASE_NOTE }}
												<div class="clearfix"></div>
												
											</div>
										</div>
									
									@endforeach
								</div>
							</div>	
						</div>
						<div class="col-md-2" align="right">
							<form action="/public/poi_edit_case/{{ $task->id }}" method="GET">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<button class="btn btn-default" type="submit">Edit Person</button>
							</form>
							</br></br>
							<form action="/public/poi_all_case/{{ $task->id }}" method="POST">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										
										<button class="btn btn-default" onclick="return confirm('Are you really want to DELETE person {{ $task->SURNAME }}?')" type="submit">
											<i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp; Delete Person
										</button>
										
							</form>
						</div>
					</div>
            </section>
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script> <!-- jQuery Library -->
        
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        
        <!-- UX -->
        <script src="js/scroll.min.js"></script> <!-- Custom Scrollbar -->
        
        <!-- Other -->
        <script src="js/calendar.min.js"></script> <!-- Calendar -->
        <script src="js/feeds.min.js"></script> <!-- News Feeds -->
        
        
        <!-- All JS functions -->
        <script src="js/functions.js"></script>
    </body>
</html>

