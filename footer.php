<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>			<footer class="bg-black sp-y">
				<div class="container-fluid sp-x">
					<div class="row justify-content-center">
						<div class="col-10 col-sm-8 col-lg-5">
							<form id="newsletter">
								<div class="fld">
									<input type="text" placeholder="Stay up to date" />
									<button class="btn btn__effect">Subscribe<span data-text="Subscribe"></span></button>
								</div>
							</form>
						</div>
						<div class="w-100 d-lg-none"></div>
						<div class="col-12 offset-lg-1 col-sm-1">
							<h5>Follow us</h5>
						</div>
						<div class="col-2 col-lg-1">
							icon
						</div>
						<div class="col-2 col-lg-1">
							icon
						</div>
						<div class="col-2 col-lg-1">
							icon
						</div>
					</div>
				</div>
			</footer>
		</div><!-- End: all-content / parallax__front -->
	</div><!-- End: parallax -->
<?php wp_footer(); ?>
</body>
</html>
