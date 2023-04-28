 jQuery( window ).on( 'elementor/frontend/init', function() {
	if (typeof cymolthemes_carousel !== "function"){ return; }

	elementorFrontend.hooks.addAction( 'frontend/element_ready/cmt_project_element.default', function($scope, $){ cymolthemes_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cmt_team_element.default', function($scope, $){ cymolthemes_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cmt_service_element.default', function($scope, $){ cymolthemes_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cmt_blog_element.default', function($scope, $){ cymolthemes_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cmt_testimonial_element.default', function($scope, $){ cymolthemes_carousel(); });
} );  
