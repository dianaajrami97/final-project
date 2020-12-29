<html lang="en">
<head>
	@includeif('site.layout.components.header.header_meta')
</head>
<body>
	<!-- Start Header Section -->
	<header id="home">
		<div class="bg-img" style="background-image: url('./img/background1.jpg');">
	        <div class="overlay"></div>
	    </div>

	    <!-- Start Navbar -->
		@includeif('site.layout.components.header.nav')

		<!-- Start Home Weapper -->
		@includeif('site.layout.components.header.header')
	</header>

	<!-- Start About Section -->
	@includeif('site.layout.components.sections.about')

	<!-- Start Portfolio Section -->
	@includeif('site.layout.components.sections.portfolio')	

	<!-- Start Service Section -->
	@includeif('site.layout.components.sections.service')

	<!-- Start Features Section -->
	@includeif('site.layout.components.sections.features')

	<!-- Start Numbers Section -->
	@includeif('site.layout.components.sections.numbers')

	<!-- Start Pricing Section -->
	@includeif('site.layout.components.sections.pricing')

	<!-- Start Testimonial Section -->
	@includeif('site.layout.components.sections.testimonial')

	<!-- Start Team Section -->
	@includeif('site.layout.components.sections.team')

	<!-- Start Blog Section -->
	@includeif('site.layout.components.sections.blog')

	<!-- Start Contact Section -->
	@includeif('site.layout.components.sections.contact')



	<!-- Start Footer Section -->
	@includeif('site.layout.components.footer.footer')
	@includeif('site.layout.components.footer.footer_meta')

</body>
</html>