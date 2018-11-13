<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <title> SmartAdmin </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/main/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/main/css/font-awesome.min.css')}}">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/main/css/smartadmin-production-plugins.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/main/css/smartadmin-production.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/main/css/smartadmin-skins.min.css')}}">

    <!-- SmartAdmin RTL Support  -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/main/css/smartadmin-rtl.min.css')}}">

<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/main/css/your_style.css')}}"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/main/css/demo.min.css')}}">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- Specifying a Webpage Icon for Web Clip
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

</head>

<!--

TABLE OF CONTENTS.

Use search to find needed section.

===================================================================

|  01. #CSS Links                |  all CSS links and file paths  |
|  02. #FAVICONS                 |  Favicon links and file paths  |
|  03. #GOOGLE FONT              |  Google font link              |
|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
|  05. #BODY                     |  body tag                      |
|  06. #HEADER                   |  header tag                    |
|  07. #PROJECTS                 |  project lists                 |
|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
|  09. #MOBILE                   |  mobile view dropdown          |
|  10. #SEARCH                   |  search field                  |
|  11. #NAVIGATION               |  left panel & navigation       |
|  12. #RIGHT PANEL              |  right panel userlist          |
|  13. #MAIN PANEL               |  main panel                    |
|  14. #MAIN CONTENT             |  content holder                |
|  15. #PAGE FOOTER              |  page footer                   |
|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
|  17. #PLUGINS                  |  all scripts and plugins       |

===================================================================

-->

<!-- #BODY -->
<!-- Possible Classes

    * 'smart-style-{SKIN#}'
    * 'smart-rtl'         - Switch theme mode to RTL
    * 'menu-on-top'       - Switch to top navigation (no DOM change required)
    * 'no-menu'			  - Hides the menu completely
    * 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
    * 'fixed-header'      - Fixes the header
    * 'fixed-navigation'  - Fixes the main menu
    * 'fixed-ribbon'      - Fixes breadcrumb
    * 'fixed-page-footer' - Fixes footer
    * 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
-->
<body class="">

{{--<!-- HEADER -->--}}
{{--<header id="header">--}}
    {{--<!-- projects dropdown -->--}}
    {{--<div class="project-context hidden-xs">--}}

        {{--<span class="label">Projects:</span>--}}
        {{--<span class="project-selector dropdown-toggle" data-toggle="dropdown">Recent projects <i class="fa fa-angle-down"></i></span>--}}

        {{--<!-- Suggestion: populate this list with fetch and push technique -->--}}
        {{--<ul class="dropdown-menu">--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);">Notes on pipeline upgradee</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);">Assesment Report for merchant account</a>--}}
            {{--</li>--}}
            {{--<li class="divider"></li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<!-- end dropdown-menu-->--}}

    {{--</div>--}}
    {{--<!-- end projects dropdown -->--}}

    {{--<!-- pulled right: nav area -->--}}
    {{--<div class="pull-right">--}}

        {{--<!-- collapse menu button -->--}}
        {{--<div id="hide-menu" class="btn-header pull-right">--}}
            {{--<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>--}}
        {{--</div>--}}
        {{--<!-- end collapse menu -->--}}

        {{--<!-- #MOBILE -->--}}
        {{--<!-- Top menu profile link : this shows only when top menu is active -->--}}
        {{--<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">--}}
            {{--<li class="">--}}
                {{--<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">--}}
                    {{--<img src="{{asset('resources/assets/main/img/avatars/sunny.png')}}">--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu pull-right">--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        {{--</ul>--}}

        {{--<!-- logout button -->--}}
        {{--<div id="logout" class="btn-header transparent pull-right">--}}
            {{--<span> <a href="login.html" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>--}}
        {{--</div>--}}
        {{--<!-- end logout button -->--}}

        {{--<!-- search mobile button (this is hidden till mobile view port) -->--}}
        {{--<div id="search-mobile" class="btn-header transparent pull-right">--}}
            {{--<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>--}}
        {{--</div>--}}
        {{--<!-- end search mobile button -->--}}

        {{--<!-- input: search field -->--}}
        {{--<form action="search.html" class="header-search pull-right">--}}
            {{--<input id="search-fld"  type="text" name="param" placeholder="Find reports and more" data-autocomplete='[--}}
					{{--"ActionScript",--}}
					{{--"AppleScript",--}}
					{{--"Asp",--}}
					{{--"BASIC",--}}
					{{--"C",--}}
					{{--"C++",--}}
					{{--"Clojure",--}}
					{{--"COBOL",--}}
					{{--"ColdFusion",--}}
					{{--"Erlang",--}}
					{{--"Fortran",--}}
					{{--"Groovy",--}}
					{{--"Haskell",--}}
					{{--"Java",--}}
					{{--"JavaScript",--}}
					{{--"Lisp",--}}
					{{--"Perl",--}}
					{{--"PHP",--}}
					{{--"Python",--}}
					{{--"Ruby",--}}
					{{--"Scala",--}}
					{{--"Scheme"]'>--}}
            {{--<button type="submit">--}}
                {{--<i class="fa fa-search"></i>--}}
            {{--</button>--}}
            {{--<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>--}}
        {{--</form>--}}
        {{--<!-- end input: search field -->--}}

        {{--<!-- fullscreen button -->--}}
        {{--<div id="fullscreen" class="btn-header transparent pull-right">--}}
            {{--<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>--}}
        {{--</div>--}}
        {{--<!-- end fullscreen button -->--}}

        {{--<!-- #Voice Command: Start Speech -->--}}
        {{--<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">--}}
            {{--<div>--}}
                {{--<a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a>--}}
                {{--<div class="popover bottom"><div class="arrow"></div>--}}
                    {{--<div class="popover-content">--}}
                        {{--<h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>--}}
                        {{--<h4 class="vc-title-error text-center">--}}
                            {{--<i class="fa fa-microphone-slash"></i> Voice command failed--}}
                            {{--<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>--}}
                            {{--<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>--}}
                        {{--</h4>--}}
                        {{--<a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a>--}}
                        {{--<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- end voice command -->--}}

        {{--<!-- multiple lang dropdown : find all flags in the flags page -->--}}
        {{--<ul class="header-dropdown-list hidden-xs">--}}
            {{--<li>--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-us">--}}
                    {{--<ul class="dropdown-menu pull-right">--}}
                        {{--<li class="active">--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-us">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-fr">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-es">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-de">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-jp">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-cn">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-it">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-pt">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-ru">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);"><img src="{{asset('resources/assets/main/img/blank.gif')}} class="flag flag-kr">--}}
                        {{--</li>--}}

                    {{--</ul>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<!-- end multiple lang -->--}}

    {{--</div>--}}
    {{--<!-- end pulled right: nav area -->--}}

{{--</header>--}}
<!-- END HEADER -->

<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

						<span>
							Admin
						</span>

				</span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <!--
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        <ul>
            <li>
                <a style="width:100%; margin-bottom:20px;" href={{route('upload')}} class="btn btn-primary btn-lg">+ Add scan</a>
            </li>
            <li class="active open">
                <a href="{{route('home')}}" title="Dashboard"><i class="fa fa-lg fa-fw fa-search"></i> <span class="menu-item-parent">Scans</span></a>
                {{--<ul style="display: block;">--}}
                    {{--<li class="active">--}}
                        {{--<a href="index.html" title="Dashboard"><span class="menu-item-parent">Searches</span></a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            </li>
            {{--<li class="top-menu-invisible">--}}
                {{--<a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">SmartAdmin Intel</span></a>--}}
                {{--<ul>--}}
                    {{--<li class="">--}}
                        {{--<a href="layouts.html" title="Dashboard"><i class="fa fa-lg fa-fw fa-gear"></i> <span class="menu-item-parent">App Layouts</span></a>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="skins.html" title="Dashboard"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Prebuilt Skins</span></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="applayout.html"><i class="fa fa-cube"></i> App Settings</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

        </ul>
        </li>
        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>
<!-- END NAVIGATION -->