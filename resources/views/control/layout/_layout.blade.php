<!DOCTYPE html>
<html lang="en">
<head>
	@includeif('control.layout.components.header.header_meta')
	<style type="text/css">
		.error {
			color: red;
		}
	</style>
	@yield('style')
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
	<div class="page-wrapper">
	    <!-- BEGIN HEADER -->
		@includeif('control.layout.components.header.header')

		<div class="clearfix"> </div>

		<div class="page-container">

		@includeif('control.layout.components.sidebar')
		<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                	@if(session()->has('success'))
                		<div class="alert alert-success">{{ session()->get('success') }}</div>                	
            		@elseif(session()->has('success'))
                		<div class="alert alert-danger">{{ session()->get('error') }}</div>
            		@endif

                	@yield('content')
                </div>

            </div>

        </div>
		@includeif('control.layout.components.footer.footer')
	</div>
		@includeif('control.layout.components.footer.footer_meta')
		@yield('script')



</body>
</html>