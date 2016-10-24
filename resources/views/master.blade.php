<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">
        <meta name="description" content="Siyaleader Ethekwini Case Console Management">
        <meta name="keywords" content="Siyaleader, Ethekwini, Ethekwini,Ethekwini Management System,Incidents Management System">
        <link rel="icon" type="image/x-icon" sizes="16x16" href="{{ asset('/img/favicon.ico?v1') }}">

        <title>Redfrogs </title>

        <!-- CSS -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/calendar.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/generics.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/token-input.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/icons.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/lightbox.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/media-player.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/file-manager.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/buttons.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/HoldOn.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-switch.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/incl/animate.css') }}" rel="stylesheet">


        <!-- jQuery Library -->
        <script src="{{ asset('/js/jquery.min.js') }}"></script>

        <!-- DataTables CSS -->
        <link href="{{ asset('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{ asset('/bower_components/datatables-responsive/css/responsive.dataTables.scss') }}" rel="stylesheet">

		 <style>  

 body {
	 

	  
	   background-image: url("{{ asset('/img/web_bg_red.jpg') }}");
	 
 }    


		 </style>
		
    </head>
    <body>

        <header id="header" class="media">
            <a href="" id="menu-toggle"></a>
            <a class="logo pull-left" href="#">
           
            </a>

            <div class="media-body">
                <div class="media" id="top-menu">

                   <div class="pull-left tm-icon">
                        <a data-drawer="messages" class="drawer-toggle">
                            <i class="fa fa-envelope-o fa-2x"></i>
                            <i class="n-count animated" id='countPrivateMessages'>{{ count($noPrivateMessages,0) }}</i>

                        </a>
                    </div>

                    <div class="pull-left tm-icon">

                        <a href="" data-toggle="modal" onClick="launchAddress();" data-target=".modalAddress" >
                            <i class="fa fa-book fa-2x"></i>
                            <i class="n-count animated">{{ count($addressBookNumber,0) }}</i>
                        </a>
                    </div>


                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
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
                            <img class="profile-pic animated" src="{{ asset('/img/profile-pics.jpg') }}" alt="">
                        </a>

                        <ul class="dropdown-menu profile-menu">
                            <li><a href="{{ url('all-messages') }}">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="{{ url('/auth/logout') }}">Sign Out</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                        </ul>
                        @if (Auth::user())
                            <h4 class="m-0">
                                {{ Auth::user()->name }}  {{ Auth::user()->surname }}
                            </h4>
                            {{ $systemRole->name }}<br>
                            {{ Auth::user()->email }}
                        @endif


                    </div>

                    @if (Request::is('message-detail/*') || Request::is('all-messages'))
                          @include('messages.message-widget')
                    @endif

                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
					 <div style="height:auto;">
                       
                    </div>
		
                </div>

                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
				

                @if(isset($userViewCalendarPermission) && $userViewCalendarPermission->permission_id =='13')
                    <li {{ (Request::is('map') ? "class=active" : '') }}>
                        <a class="sa-side-home" href="{{ url('map') }}">
                            <span class="menu-item">map</span>
                        </a>
                    </li>
                @endif
	     

                @if(isset($userViewCalendarPermission) && $userViewCalendarPermission->permission_id =='13')
                    <li {{ (Request::is('calendar') ? "class=active" : '') }}>
                        <a class="sa-side-calendar" href="{{ url('calendar') }}">
                            <span class="menu-item">Calendar</span>
                        </a>
                    </li>
                @endif
			
                @if(isset($userViewCasesPermission) && $userViewCasesPermission->permission_id =='15')
                    <li {{ (Request::is('home') ? "class=active" : '') }}>
                        <a class="sa-side-folder" href="{{ url('home') }}">
                            <span class="menu-item">My Cases</span>
                        </a>
                    </li>
                @endif
				
					
			
                @if(isset($userViewAdministrationPermission) && $userViewAdministrationPermission->permission_id =='14')

                    <li {{ (Request::is('list-users') ? "class=active dropdown" : 'dropdown') }}>

                        <a class="sa-side-ui" href="">
                            <span class="menu-item">Administration</span>
                        </a>
                        <ul class="list-unstyled menu-item">



                            @if(isset($userViewAffiliationPermission) && $userViewAffiliationPermission->permission_id =='1')
                                <li><a href="{{ url('list-affiliations') }}"><span class="badge badge-r">{{ count($noAffiliations,0) }}</span>Affiliations</a></li>
                            @endif

                            @if(isset($userViewCasePriorityPermission) && $userViewCasePriorityPermission->permission_id =='2')
                            <li><a href="{{ url('list-priorities') }}"><span class="badge badge-r">{{ count($noCasesPriorities,0) }}</span>Cases Priorities</a></li>
                            @endif

                            @if(isset($userViewCaseStatusPermission) && $userViewCaseStatusPermission->permission_id =='3')

                            <li><a href="{{ url('list-statuses') }}"><span class="badge badge-r">{{ count($noCaseStatuses,0) }}</span>Cases Statuses</a></li>

                            @endif

                            @if(isset($userViewDepartmentsPermission) && $userViewDepartmentsPermission->permission_id =='4')


                            <li><a href="{{ url('list-departments') }}"><span class="badge badge-r">{{ count($noDepartments,0) }}</span>Departments</a></li>

                             @endif

                            @if(isset($userViewMeetingsPermission) && $userViewMeetingsPermission->permission_id =='5')

                            <li><a href="{{ url('list-meetings') }}"><span class="badge badge-r">{{ count($noMeetings,0) }}</span>Meetings</a></li>

                            @endif

                            @if(isset($userViewPositionsPermission) && $userViewPositionsPermission->permission_id =='6')

                            <li><a href="{{ url('list-positions') }}"><span class="badge badge-r">{{ count($noPositions,0) }}</span>Positions</a></li>

                            @endif
                            @if(isset($userViewProvincesPermission) && $userViewProvincesPermission->permission_id =='7')

                            <li><a href="{{ url('list-provinces') }}"><span class="badge badge-r">{{ count($noProvinces,0) }}</span>Provinces</a></li>
                            @endif
                            @if(isset($userViewRelationshipsPermission) && $userViewRelationshipsPermission->permission_id =='8')
                            <li><a href="{{ url('list-relationships') }}"><span class="badge badge-r">{{ count($noRelationships,0) }}</span>Relationships</a></li>
                            @endif
                            @if(isset($userViewUserGroupsPermission) && $userViewUserGroupsPermission->permission_id =='9')

                            <li><a href="{{ url('list-roles') }}"><span class="badge badge-r">{{ count($noRoles,0) }}</span>User Groups</a></li>
                            @endif
                            @if(isset($userViewUsersPermission) && $userViewUsersPermission->permission_id =='10')

                            <li><a href="{{ url('list-users') }}"><span class="badge badge-r">{{ count($noUsers,0) }}</span>Users</a></li>
							
                             @endif
							 
							 @if(isset($userViewPOIPermission) && $userViewPOIPermission->permission_id =='11')

                            <li><a href="{{ url('list-poi-users') }}"><span class="badge badge-r">{{ count($noPOIUsers,0) }}</span>POI</a></li>
                            @endif
                          

                            @if(isset($userViewPermissionsPermission) && $userViewPermissionsPermission->permission_id =='12')
                              <li><a href="{{ url('list-permissions') }}"><span class="badge badge-r">{{ count($noPermissions,0) }}</span>Permissions</a></li>
                             @endif

                        </ul>
                    </li>
                  @endif
                  @if(isset($userViewReportsPermission) && $userViewReportsPermission->permission_id =='16')

                    <li {{ (Request::is('reports') ? "class=active" : '') }}>
                        <a class="sa-side-chart" href="{{ url('reports') }}">
                            <span class="menu-item">Reports</span>
                        </a>
                    </li>
                   @endif

                </ul>
				
			
            </aside>
				 
			
        	
            <!-- Content -->
            <section id="content" class="container">
                @include('messages.list')
                @include('messages.add')
                @yield('content')
                @include('addressbook.list')
                @include('addressbook.global')
                @include('addressbook.globalAdd')
                @include('chat.list')
            </section>
			
			
			
        </section>

        <!-- Javascript Libraries -->
        <!-- jQuery -->


        <script src="{{ asset('/js/jquery-ui.min.js') }}"></script> <!-- jQuery UI -->
        <script src="{{ asset('/js/jquery.easing.1.3.js') }}"></script> <!-- jQuery Easing - Requirred for Lightbox + Pie Charts-->

        <!-- Bootstrap -->
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

        <!-- Charts -->
        <script src="{{ asset('/js/charts/jquery.flot.js') }}"></script> <!-- Flot Main -->
        <script src="{{ asset('/js/charts/jquery.flot.time.js') }}"></script> <!-- Flot sub -->
        <script src="{{ asset('/js/charts/jquery.flot.animator.min.js') }}"></script> <!-- Flot sub -->
        <script src="{{ asset('/js/charts/jquery.flot.resize.min.js') }}"></script> <!-- Flot sub - for repaint when resizing the screen -->
        <script src="{{ asset('/js/charts/jquery.flot.pie.min.js') }}"></script> <!-- Flot Pie chart -->


        <script src="{{ asset('/js/sparkline.min.js') }}"></script> <!-- Sparkline - Tiny charts -->
        <script src="{{ asset('/js/easypiechart.js') }}"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="{{ asset('/js/charts.js') }}"></script> <!-- All the above chart related functions -->

        <!-- Map -->
        <script src="{{ asset('/js/maps/jvectormap.min.js') }}"></script> <!-- jVectorMap main library -->
        <script src="{{ asset('/js/maps/usa.js') }}"></script> <!-- USA Map for jVectorMap -->

        <!--  Form Related -->
        <script src="{{ asset('/js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->

        <!-- UX -->
        <script src="{{ asset('/js/scroll.min.js') }}"></script> <!-- Custom Scrollbar -->

        <!-- Other -->
        <script src="{{ asset('/js/calendar.min.js') }}"></script> <!-- Calendar -->
        <script src="{{ asset('/js/feeds.min.js') }}"></script> <!-- News Feeds -->


         <!--  Form Related -->
        <script src="{{ asset('/js/validation/validate.min.js') }}"></script> <!-- jQuery Form Validation Library -->
        <script src="{{ asset('/js/validation/validationEngine.min.js') }}"></script> <!-- jQuery Form Validation Library - requirred with above js -->


        <!-- All JS functions -->
        <script src="{{ asset('/js/functions.js') }}"></script>


         <!-- Token Input -->
        <script src="{{ asset('/js/jquery.tokeninput.js') }}"></script> <!-- Token Input -->


        <!-- Noty JavaScript -->
        <script src="{{ asset('/bower_components/noty/js/noty/packaged/jquery.noty.packaged.js') }}"></script>

         <!-- DataTables JavaScript -->
        <script src="{{ asset('/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>



        <!-- Jquery Bootstrap Maxlength -->
        <script src="{{ asset('/bower_components/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>


        <!-- Media -->
        <script src="{{ asset('/js/media-player.min.js') }}"></script> <!-- Video Player -->
        <script src="{{ asset('/js/pirobox.min.js') }}"></script> <!-- Lightbox -->
        <script src="{{ asset('js/file-manager/elfinder.js') }}"></script> <!-- File Manager -->


        <script type="text/javascript" src="{{ asset('/incl/oms.min.js') }}"></script>



        <!-- File Upload -->
        <script src="{{ asset('/js/fileupload.min.js') }}"></script> <!-- File Upload -->

        <!-- Spinner -->
        <script src="{{ asset('/js/HoldOn.min.js') }}"></script> <!-- Spinner -->

        <!-- bootstrap-switch. -->
        <script src="{{ asset('/js/bootstrap-switch.js') }}"></script> <!-- bootstrap-switch. -->

        <!-- Date & Time Picker -->
        <script src="{{ asset('/js/datetimepicker.min.js') }}"></script> <!-- Date & Time Picker -->

        <!-- Buttons HTML5 -->
        <script src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('/js/jszip.min.js') }}"></script>
        <script src="{{ asset('/js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('/js/vfs_fonts.js') }}"></script>
        <!--  Buttons HTML5 -->

        <script src="{{ asset('js/socket.io.js') }}"></script>

        <script src="{{ asset('js/calendar.min.js') }}"></script> <!-- Calendar -->

        <script>


        function pressed(e) {

            if ( (window.event ? event.keyCode : e.which) == 13) {

                  var myForm   = $("#chatForm")[0];
                  var formData = new FormData(myForm);
                  var token    = $('input[name="_token"]').val();
                  $.ajax({
                  type    :"POST",
                  data    : formData,
                  contentType: false,
                  processData: false,
                  headers : { 'X-CSRF-Token': token },
                  url     :"{!! url('/postChat')!!}",
                  success : function(data) {

                    var loggedUser = {!! Auth::user()->id !!};

                      if (data.result == "success") {

                          $("#messageChat").val('');
                          var objDiv = document.getElementById("chat-body");
                          objDiv.scrollTop = objDiv.scrollHeight;

                      }


                  }

                  });
            }
        }

        var socket = io('http://41.216.130.6:3000');
        //var socket = io('http://localhost:3000');
        var html   = "";
        var count  = 0;
        var Class  = "";
        socket.on("test-channel:App\\Events\\MyEventNameHere", function(message){

        var loggedUser = {!! Auth::user()->id !!};

          if (message.data.type == 'noUnreadprivatemsg') {

                if(message.data.dest = loggedUser) {

                    var noPrivateMessages =  parseInt($("#countPrivateMessages").html()) + 1;
                    $("#countPrivateMessages").html(noPrivateMessages);
                    $.ajax({
                        type    :"GET",
                        url     :"getOfflineMessage",
                        success : function(data) {

                            $("#listOfflineMessages").html(data);

                    }});

                    $("#messages").addClass('toggled');

                }

          }

          if (message.data.type == 'assignCases' && message.data.userID == loggedUser) {


            var textMessage = "<strong>Case " + message.data.caseID + " has been assigned to you!</strong>";

            var n = noty({
                    text: textMessage,
                    layout:'top',
                    type:'information',
                    maxVisible: 5,
                    callback: {
                        onShow: function() {},
                        afterShow: function() {},
                        onClose: function() { location.reload();},
                        afterClose: function() {},
                        onCloseClick: function() {},
                    },
                    animation: {
                        open: {height: 'toggle'},
                        close: {height: 'toggle'},
                        easing: 'swing',
                        speed:2000
                    }
                    });

          }

         if (message.data.type == 'noreadprivatemsg') {

                if(message.data.dest = loggedUser) {


                    $("#countPrivateMessages").html('0');

                }

          }

            if (message.data.type == 'chat') {


                     count ++;

                     if (count % 2 == 1) {

                        Class = "pull-right";
                     }
                     else {

                        Class = "pull-left";
                     }



                    if ( message.data.dest == loggedUser ) {

                         $('.chat .chat-list').removeClass('toggled');

                         $('#chatForm #to').val(message.data.origin);

                         if ( $('.chat').hasClass( "toggled" ) ) {

                         }
                         else
                         {
                            $('.chat').toggleClass('toggled');
                         }
                         $("#colleague").html(message.data.author);

                    }

                    if ( message.data.dest == loggedUser  || message.data.origin == loggedUser) {

                        html += '<div class="media"><img class="'+ Class +'" src="img/profile-pics/7.png" width="30" alt="" /><div class="media-body '+ Class +'">'+ message.data.message +'<small>'+ message.data.author +'</small></div></div>';
                        $('#chat-body').html(html);
                        var height = $('#chat-body')[0].scrollHeight;
                        $('#chat-body').scrollTop(height);
                }




                }




         });
        </script>

        @include('functions.caseModal')
        @yield('footer')
	  
		  <div class="s-widget m-b-25" style="">		 
            
       <img class="" src="{{ asset('/images/dashboard_logo.png') }}"  style="display: block;  width:150px;"  alt="">   </p>
           
       </div>
      
    </body>
</html>
