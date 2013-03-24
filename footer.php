</div>
		<!-- end #content -->
		<!-- begin footer -->
		<footer>
		 	<!-- begin .inner -->
		 	<div class="block">
		 		<!-- begin #copyright -->
		 		<div id="copyright">
		 		<?php echo of_get_option('shortnotes_footer_copyright');?><br/>
		 		Theme by <a href="http://www.s5themes.com">Site5 WordPress Themes</a>. Experts in <a href="http://gk.site5.com/t/571">WordPress Hosting</a>. 
		 		</div>
		 		<!-- end #copyright -->
		 	</div>
		 	<!-- end .block -->
		</footer>
		<!-- end footer -->
	</div>
	<!-- end #mainWrapper -->

	<!-- scripts are now optimized via Modernizr.load -->
	<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>                                                                                                 
	<!--[if lt IE 7 ]>
			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>