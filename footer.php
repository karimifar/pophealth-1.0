<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pophealth_1.0
 */

?>

<footer role="complementary">
	<div class="footer-row ">
		<div class="footer-logos d-flex justify-content-center">
			<!-- <img src="./assets/img/logo.svg" alt=""> -->
			<img src= <?php echo get_template_directory_uri() . "/img/uts-logo.svg" ?> alt="UT system logo">
		</div>
		<p>For more information on the Texas Child Mental Health Care Consortium, please contact <a href= "mailto:tcmhcc@utsystem.edu">tcmhcc@utsystem.edu</a></p>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
