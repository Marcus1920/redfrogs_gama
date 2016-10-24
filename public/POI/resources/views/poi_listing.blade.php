<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Persons of interest</title>
		  <script src="js/query-2.2.1.js"></script>
         
		 
		 
        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/form.css" rel="stylesheet">
        <link href="css/calendar.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/icons.css" rel="stylesheet">
        <link href="css/generics.css" rel="stylesheet">
		
		<script>
			function updateTextArea() 
			{
					var text = "";
					$('input[type=checkbox]:checked').each( function() 
					{
						text += $(this).val() + ", ";
					});
					
					$('#associateTextArea').val( text );
				}

				$('input[type=checkbox]').change(function () {
					updateTextArea();
				});
			
		</script>
		
		
		
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
						<a class="btn btn-default" href="/public/poi_all_case">List Person of Interest </a>
					</div>
					
                    <h3 class="block-title">ADD NEW PERSON</h3>
                    <br/>
					</br>
					
					@if (count($errors) > 0)
						<!-- Form Error List -->
						<div class="alert alert-danger">
							<strong>Whoops! Something went wrong!</strong>

							<br><br>

							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					
						<div class="tile p-15">
							<form role="form" method="POST" action="{{ url('/poi_listing') }}" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
								<div class="row">
								
									<div class="col-md-4">
										<div class="jumbotron" style="background-color:transparent; padding:15px; border-right-style:solid; border-color:black">
											<h4 class="block-title">PERSONAL DETAILS</h4>
											<div class="form-group">
												<label>First Name</label>
												<input type="text" class="form-control" name="firstname">
											</div>
										
											<div class="form-group">
												<label>Surname</label>
												<input type="text" class="form-control" name="surname">
											</div>
										
											<div class="form-group">
												<label>ID Number</label>
												<input type="text" class="form-control" name="idnumber">
											</div>
											
											<div class="form-group">
												<label>Gender</label>
												<select class="form-control m-b-10" id="select" name="sextype">
													<option value="" selected>Please select ...</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										
											<div class="form-group">
												<label>Nationality</label>
												<select class="form-control m-b-10" id="select" name="nationality">
													<option value="" selected>Please select ...</option>
													<option value="Afghanistan">Afghanistan</option>
													<option value="Åland Islands">Åland Islands</option>
													<option value="Albania">Albania</option>
													<option value="Algeria">Algeria</option>
													<option value="American Samoa">American Samoa</option>
													<option value="Andorra">Andorra</option>
													<option value="Angola">Angola</option>
													<option value="Anguilla">Anguilla</option>
													<option value="Antarctica">Antarctica</option>
													<option value="Antigua and Barbuda">Antigua and Barbuda</option>
													<option value="Argentina">Argentina</option>
													<option value="Armenia">Armenia</option>
													<option value="Aruba">Aruba</option>
													<option value="Australia">Australia</option>
													<option value="Austria">Austria</option>
													<option value="Azerbaijan">Azerbaijan</option>
													<option value="Bahamas">Bahamas</option>
													<option value="Bahrain">Bahrain</option>
													<option value="Bangladesh">Bangladesh</option>
													<option value="Barbados">Barbados</option>
													<option value="Belarus">Belarus</option>
													<option value="Belgium">Belgium</option>
													<option value="Belize">Belize</option>
													<option value="Benin">Benin</option>
													<option value="Bermuda">Bermuda</option>
													<option value="Bhutan">Bhutan</option>
													<option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
													<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
													<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
													<option value="Botswana">Botswana</option>
													<option value="Bouvet Island">Bouvet Island</option>
													<option value="Brazil">Brazil</option>
													<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
													<option value="Brunei Darussalam">Brunei Darussalam</option>
													<option value="Bulgaria">Bulgaria</option>
													<option value="Burkina Faso">Burkina Faso</option>
													<option value="Burundi">Burundi</option>
													<option value="Cambodia">Cambodia</option>
													<option value="Cameroon">Cameroon</option>
													<option value="Canada">Canada</option>
													<option value="Cape Verde">Cape Verde</option>
													<option value="Cayman Islands">Cayman Islands</option>
													<option value="Central African Republic">Central African Republic</option>
													<option value="Chad">Chad</option>
													<option value="Chile">Chile</option>
													<option value="China">China</option>
													<option value="Christmas Island">Christmas Island</option>
													<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
													<option value="Colombia">Colombia</option>
													<option value="Comoros">Comoros</option>
													<option value="Congo">Congo</option>
													<option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
													<option value="Cook Islands">Cook Islands</option>
													<option value="Costa Rica">Costa Rica</option>
													<option value="Côte d'Ivoire">Côte d'Ivoire</option>
													<option value="Croatia">Croatia</option>
													<option value="Cuba">Cuba</option>
													<option value="Curaçao">Curaçao</option>
													<option value="Cyprus">Cyprus</option>
													<option value="Czech Republic">Czech Republic</option>
													<option value="Denmark">Denmark</option>
													<option value="Djibouti">Djibouti</option>
													<option value="Dominica">Dominica</option>
													<option value="Dominican Republic">Dominican Republic</option>
													<option value="Ecuador">Ecuador</option>
													<option value="Egypt">Egypt</option>
													<option value="El Salvador">El Salvador</option>
													<option value="Equatorial Guinea">Equatorial Guinea</option>
													<option value="Eritrea">Eritrea</option>
													<option value="Estonia">Estonia</option>
													<option value="Ethiopia">Ethiopia</option>
													<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
													<option value="Faroe Islands">Faroe Islands</option>
													<option value="Fiji">Fiji</option>
													<option value="Finland">Finland</option>
													<option value="France">France</option>
													<option value="French Guiana">French Guiana</option>
													<option value="French Polynesia">French Polynesia</option>
													<option value="French Southern Territories">French Southern Territories</option>
													<option value="Gabon">Gabon</option>
													<option value="Gambia">Gambia</option>
													<option value="Georgia">Georgia</option>
													<option value="Germany">Germany</option>
													<option value="Ghana">Ghana</option>
													<option value="Gibraltar">Gibraltar</option>
													<option value="Greece">Greece</option>
													<option value="Greenland">Greenland</option>
													<option value="Grenada">Grenada</option>
													<option value="Guadeloupe">Guadeloupe</option>
													<option value="Guam">Guam</option>
													<option value="Guatemala">Guatemala</option>
													<option value="Guernsey">Guernsey</option>
													<option value="Guinea">Guinea</option>
													<option value="Guinea-Bissau">Guinea-Bissau</option>
													<option value="Guyana">Guyana</option>
													<option value="Haiti">Haiti</option>
													<option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
													<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
													<option value="Honduras">Honduras</option>
													<option value="Hong Kong">Hong Kong</option>
													<option value="Hungary">Hungary</option>
													<option value="Iceland">Iceland</option>
													<option value="India">India</option>
													<option value="Indonesia">Indonesia</option>
													<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
													<option value="Iraq">Iraq</option>
													<option value="Ireland">Ireland</option>
													<option value="Isle of Man">Isle of Man</option>
													<option value="Israel">Israel</option>
													<option value="Italy">Italy</option>
													<option value="Jamaica">Jamaica</option>
													<option value="Japan">Japan</option>
													<option value="Jersey">Jersey</option>
													<option value="Jordan">Jordan</option>
													<option value="Kazakhstan">Kazakhstan</option>
													<option value="Kenya">Kenya</option>
													<option value="Kiribati">Kiribati</option>
													<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
													<option value="Korea, Republic of">Korea, Republic of</option>
													<option value="Kuwait">Kuwait</option>
													<option value="Kyrgyzstan">Kyrgyzstan</option>
													<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
													<option value="Latvia">Latvia</option>
													<option value="Lebanon">Lebanon</option>
													<option value="Lesotho">Lesotho</option>
													<option value="Liberia">Liberia</option>
													<option value="Libya">Libya</option>
													<option value="Liechtenstein">Liechtenstein</option>
													<option value="Lithuania">Lithuania</option>
													<option value="Luxembourg">Luxembourg</option>
													<option value="Macao">Macao</option>
													<option value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
													<option value="Madagascar">Madagascar</option>
													<option value="Malawi">Malawi</option>
													<option value="Malaysia">Malaysia</option>
													<option value="Maldives">Maldives</option>
													<option value="Mali">Mali</option>
													<option value="Malta">Malta</option>
													<option value="Marshall Islands">Marshall Islands</option>
													<option value="Martinique">Martinique</option>
													<option value="Mauritania">Mauritania</option>
													<option value="Mauritius">Mauritius</option>
													<option value="Mayotte">Mayotte</option>
													<option value="Mexico">Mexico</option>
													<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
													<option value="Moldova, Republic of">Moldova, Republic of</option>
													<option value="Monaco">Monaco</option>
													<option value="Mongolia">Mongolia</option>
													<option value="Montenegro">Montenegro</option>
													<option value="Montserrat">Montserrat</option>
													<option value="Morocco">Morocco</option>
													<option value="Mozambique">Mozambique</option>
													<option value="Myanmar">Myanmar</option>
													<option value="Namibia">Namibia</option>
													<option value="Nauru">Nauru</option>
													<option value="Nepal">Nepal</option>
													<option value="Netherlands">Netherlands</option>
													<option value="New Caledonia">New Caledonia</option>
													<option value="New Zealand">New Zealand</option>
													<option value="Nicaragua">Nicaragua</option>
													<option value="Niger">Niger</option>
													<option value="Nigeria">Nigeria</option>
													<option value="Niue">Niue</option>
													<option value="Norfolk Island">Norfolk Island</option>
													<option value="Northern Mariana Islands">Northern Mariana Islands</option>
													<option value="Norway">Norway</option>
													<option value="Oman">Oman</option>
													<option value="Pakistan">Pakistan</option>
													<option value="Palau">Palau</option>
													<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
													<option value="Panama">Panama</option>
													<option value="Papua New Guinea">Papua New Guinea</option>
													<option value="Paraguay">Paraguay</option>
													<option value="Peru">Peru</option>
													<option value="Philippines">Philippines</option>
													<option value="Pitcairn">Pitcairn</option>
													<option value="Poland">Poland</option>
													<option value="Portugal">Portugal</option>
													<option value="Puerto Rico">Puerto Rico</option>
													<option value="Qatar">Qatar</option>
													<option value="Réunion">Réunion</option>
													<option value="Romania">Romania</option>
													<option value="Russian Federation">Russian Federation</option>
													<option value="Rwanda">Rwanda</option>
													<option value="Saint Barthélemy">Saint Barthélemy</option>
													<option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
													<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
													<option value="Saint Lucia">Saint Lucia</option>
													<option value="Saint Martin (French part)">Saint Martin (French part)</option>
													<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
													<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
													<option value="Samoa">Samoa</option>
													<option value="San Marino">San Marino</option>
													<option value="Sao Tome and Principe">Sao Tome and Principe</option>
													<option value="Saudi Arabia">Saudi Arabia</option>
													<option value="Senegal">Senegal</option>
													<option value="Serbia">Serbia</option>
													<option value="Seychelles">Seychelles</option>
													<option value="Sierra Leone">Sierra Leone</option>
													<option value="Singapore">Singapore</option>
													<option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
													<option value="Slovakia">Slovakia</option>
													<option value="Slovenia">Slovenia</option>
													<option value="Solomon Islands">Solomon Islands</option>
													<option value="Somalia">Somalia</option>
													<option value="South Africa">South Africa</option>
													<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
													<option value="South Sudan">South Sudan</option>
													<option value="Spain">Spain</option>
													<option value="Sri Lanka">Sri Lanka</option>
													<option value="Sudan">Sudan</option>
													<option value="Suriname">Suriname</option>
													<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
													<option value="Swaziland">Swaziland</option>
													<option value="Sweden">Sweden</option>
													<option value="Switzerland">Switzerland</option>
													<option value="Syrian Arab Republic">Syrian Arab Republic</option>
													<option value="Taiwan, Province of China">Taiwan, Province of China</option>
													<option value="Tajikistan">Tajikistan</option>
													<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
													<option value="Thailand">Thailand</option>
													<option value="Timor-Leste">Timor-Leste</option>
													<option value="Togo">Togo</option>
													<option value="Tokelau">Tokelau</option>
													<option value="Tonga">Tonga</option>
													<option value="Trinidad and Tobago">Trinidad and Tobago</option>
													<option value="Tunisia">Tunisia</option>
													<option value="Turkey">Turkey</option>
													<option value="Turkmenistan">Turkmenistan</option>
													<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
													<option value="Tuvalu">Tuvalu</option>
													<option value="Uganda">Uganda</option>
													<option value="Ukraine">Ukraine</option>
													<option value="United Arab Emirates">United Arab Emirates</option>
													<option value="United Kingdom">United Kingdom</option>
													<option value="United States">United States</option>
													<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
													<option value="Uruguay">Uruguay</option>
													<option value="Uzbekistan">Uzbekistan</option>
													<option value="Vanuatu">Vanuatu</option>
													<option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
													<option value="Viet Nam">Viet Nam</option>
													<option value="Virgin Islands, British">Virgin Islands, British</option>
													<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
													<option value="Wallis and Futuna">Wallis and Futuna</option>
													<option value="Western Sahara">Western Sahara</option>
													<option value="Yemen">Yemen</option>
													<option value="Zambia">Zambia</option>
													<option value="Zimbabwe">Zimbabwe</option>
												</select>
											</div>

											<div class="form-group">
												<label>Nickname</label>
												<input type="text" class="form-control" name="nickname">
											</div>
															
											<div class="form-group">
												<label>Language Spoken</label>
												<input type="text" class="form-control" name="languagespoken">
											</div>
										
											<div class="form-group">
												<label>Driver's License</label>
												<input type="text" class="form-control" name="driverlicense">
											</div>
											
											<div class="form-group">
												<label>Marital Status</label>
												<input type="text" class="form-control" name="maritalstatus">
											</div>
															
											<div class="form-group">
												<label>Address Home</label>
												<input type="text" class="form-control" name="addresshome">
											</div>
										
											<div class="form-group">
												<label>Address Work</label>
												<input type="text" class="form-control" name="addresswork">
											</div>
											
											<div class="form-group">
												<label>Contact Number 1</label>
												<input type="text" class="form-control" name="contactnumber1">
											</div>
											
											<div class="form-group">
												<label>Contact Number 2</label>
												<input type="text" class="form-control" name="contactnumber2">
											</div>
											
											<div class="form-group">
												<label>Contact Number 3</label>
												<input type="text" class="form-control" name="contactnumber3">
											</div>
															
											<div class="form-group">
												<label>Email Address</label>
												<input type="text" class="form-control" name="emailaddress">
											</div>
											
											<div class="form-group">
												<label>Ethnic Group</label>
												<input type="text" class="form-control" name="ethnicgroup">
											</div>
										
											<div class="form-group">
												<label>Birth Place</label>
												<input type="text" class="form-control" name="birthplace">
											</div>
										
											<div class="form-group">
												<label>Weight</label>
												<input type="text" class="form-control" name="weight">
											</div>
										
											<div class="form-group">
												<label>Height</label>
												<input type="text" class="form-control" name="height">
											</div>

											<div class="form-group">
												<label>Scars</label>
												<input type="text" class="form-control" name="scars">
											</div>
															
											<div class="form-group">
												<label>Tattoo</label>
												<input type="text" class="form-control" name="tattoo">
											</div>
										
											</br></br>
										
											<p>Upload Picture</p>
											
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<span class="btn btn-file btn-sm btn-alt">
													<span class="fileupload-new">Select file</span>
													<span class="fileupload-exists">Change</span>
													<input type="file" type="file" name="imagename" accept="jpg"/>
												</span>
												<span class="fileupload-preview"></span>
												<a href="#" class="close close-pic fileupload-exists" data-dismiss="fileupload">
													<i class="fa fa-times"></i>
												</a>
											</div>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="jumbotron" style="background-color:transparent; padding:15px">
											<h4 class="block-title">OTHER DETAILS</h4>
											
										
											<div class="form-group">
												<label>Number of Dependents</label>
												<input type="text" class="form-control" name="numberdependent">
											</div>
											
											<div class="form-group">
												<label>Travel Movements</label>
												<textarea class="form-control overflow" name="travelmovement" rows="3"></textarea>
											</div>
										
											<div class="form-group">
												<label>Employment History</label>
												<textarea class="form-control overflow" name="employmenthistory" rows="3"></textarea>
											</div>
											
											</br>
											<hr style="height:15px; background-color:black; border:none"/>
											</br>
											<h4 class="block-title">CRIME DETAILS</h4>
											<div class="form-group">
												<label>Crime Type 1</label>
												<input type="text" class="form-control" name="crimetype1">
											</div>
											
											<div class="form-group">
												<label>Crime Type 2</label>
												<input type="text" class="form-control" name="crimetype2">
											</div>
											
											<div class="form-group">
												<label>Crime Type 3</label>
												<input type="text" class="form-control" name="crimetype3">
											</div>
											
											<div class="form-group">
												<label>Crime Type 4</label>
												<input type="text" class="form-control" name="crimetype4">
											</div>
											
											<div class="form-group">
												<label>Crime Type 5</label>
												<input type="text" class="form-control" name="crimetype5">
											</div>
											
											</br></br>
											<hr style="height:15px; background-color:black; border:none"/>
											</br>
											<h4 class="block-title">ARREST RECORD</h4>
											<div class="form-group">
												<label>Arrest Record 1</label>
												<input type="text" class="form-control" name="arrestrecord1">
											</div>
											
											<div class="form-group">
												<label>Arrest Record 2</label>
												<input type="text" class="form-control" name="arrestrecord2">
											</div>
											
											<div class="form-group">
												<label>Arrest Record 3</label>
												<input type="text" class="form-control" name="arrestrecord3">
											</div>
											
											<div class="form-group">
												<label>Arrest Record 4</label>
												<input type="text" class="form-control" name="arrestrecord4">
											</div>
											
											<div class="form-group">
												<label>Arrest Record 5</label>
												<input type="text" class="form-control" name="arrestrecord5">
											</div>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="jumbotron" style="background-color:transparent; padding:15px; border-left-style:solid; border-color:black">
											
											<h4 class="block-title">ACCOUNT & PROPERTY DETAILS</h4>
											<div class="form-group">
												<label>Bank Name</label>
												<input type="text" class="form-control" name="bankname">
											</div>
										
											<div class="form-group">
												<label>Bank Account Name</label>
												<input type="text" class="form-control" name="bankaccountname">
											</div>

											<div class="form-group">
												<label>Bank Branch Code</label>
												<input type="text" class="form-control" name="bankbranchcode">
											</div>
															
											<div class="form-group">
												<label>Bank Account Number</label>
												<input type="text" class="form-control" name="bankaccountnumber">
											</div>
										
											<div class="form-group">
												<label>Accounts 1</label>
												<input type="text" class="form-control" name="account1">
											</div>
											
											<div class="form-group">
												<label>Accounts 2</label>
												<input type="text" class="form-control" name="account2">
											</div>
											
											<div class="form-group">
												<label>Accounts 3</label>
												<input type="text" class="form-control" name="account3">
											</div>
											
											<div class="form-group">
												<label>Accounts 4</label>
												<input type="text" class="form-control" name="account4">
											</div>
											
											<div class="form-group">
												<label>Accounts 5</label>
												<input type="text" class="form-control" name="account5">
											</div>
											
											<div class="form-group">
												<label>Credit Record</label>
												<textarea class="form-control overflow" name="creditrecord" rows="3"></textarea>
											</div>
															
											<div class="form-group">
												<label>Business Interest</label>
												<textarea class="form-control overflow" name="businessinterest" rows="3"></textarea>
											</div>
											
											
											
										
											<div class="form-group">
												</br>
												<label>Known Associates</label></br>
												<div class="m-b-20">
														<a data-toggle="modal" href="#modalNarrower" class="btn btn-sm">Click to add associates</a>
												</div>
												<!-- Modal Narrower -->	
												<div class="modal fade" id="modalNarrower" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-sm">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<h4 class="modal-title">Associates List</h4>
															</div>
															<div class="modal-body">
																
																	<div class="listview narrow">
																		<div class="media">
																			<div class="media-body">
																				<div   style="overflow-y: scroll; height:300px;">
																					@foreach ($tasks as $task)
																					
																						<input type="checkbox" class="validate[minCheckbox[2]]" name="chkAssociate" id="inlineCheckbox1" value="{{ $task->FIRST_NAME }} {{ $task->SURNAME }}">
																						{{ $task->FIRST_NAME }} {{ $task->SURNAME }}
																					
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
												
												<textarea class="form-control overflow" id="associateTextArea" name="knownassociate" rows="3" onfocus="this.blur();alert('Warning!!\n\nYou cannot type on this box directly.')" ></textarea>
											</div>
											
											<div class="form-group">
												<label>Property Owned 1</label>
												<input type="text" class="form-control" name="propertyowned1">
											</div>
											
											<div class="form-group">
												<label>Property Owned 2</label>
												<input type="text" class="form-control" name="propertyowned2">
											</div>
											
											<div class="form-group">
												<label>Property Owned 3</label>
												<input type="text" class="form-control" name="propertyowned3">
											</div>
														
											<div class="form-group">
												<label>Property Rented 1</label>
												<input type="text" class="form-control" name="propertyrented1">
											</div>
											
											<div class="form-group">
												<label>Property Rented 2</label>
												<input type="text" class="form-control" name="propertyrented2">
											</div>
											
											<div class="form-group">
												<label>Property Rented 3</label>
												<input type="text" class="form-control" name="propertyrented3">
											</div>
										
										</div>
									</div>
								
									
								</div>
									
									<div align="center">
										<button type="submit" class="btn btn-default">Save Record</button>
									</div>
									
							</form>
                
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
		
		<!--  Form Related -->
        <script src="js/validation/validate.min.js"></script> <!-- jQuery Form Validation Library -->
        <script src="js/validation/validationEngine.min.js"></script> <!-- jQuery Form Validation Library - requirred with above js -->
        <script src="js/select.min.js"></script> <!-- Custom Select -->
        <script src="js/chosen.min.js"></script> <!-- Custom Multi Select -->
        <script src="js/datetimepicker.min.js"></script> <!-- Date & Time Picker -->
        <script src="js/colorpicker.min.js"></script> <!-- Color Picker -->
        <script src="js/icheck.js"></script> <!-- Custom Checkbox + Radio -->
        <script src="js/autosize.min.js"></script> <!-- Textare autosize -->
        <script src="js/toggler.min.js"></script> <!-- Toggler -->
        <script src="js/input-mask.min.js"></script> <!-- Input Mask -->
        <script src="js/spinner.min.js"></script> <!-- Spinner -->
        <script src="js/slider.min.js"></script> <!-- Input Slider -->
        <script src="js/fileupload.min.js"></script> <!-- File Upload -->
    </body>
</html>

