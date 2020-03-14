<?php get_header(); ?>
<div class="project-details-area pt-120 pb-90 ">
	<div class="container">
		<?php if (have_posts()):
			while (have_posts()): the_post();
				$aabot_portfolio_thumb = get_post_meta(get_the_ID(), 'portfolio_thumb', true);
				$project_images_gallerys = get_post_meta(get_the_ID(), 'project_images', true);
				$company_name = get_post_meta(get_the_ID(), 'company_name', true);
				$company_location = get_post_meta(get_the_ID(), 'company_location', true);
				$portfolio_date = get_post_meta(get_the_ID(), 'portfolio_date', true);
				$project_link = get_post_meta(get_the_ID(), 'project_link', true);
				?>
				<div class="row">
					<div class="col-xl-4 col-lg-4">
						<div class="project-status mb-30">
							<ul>
								<?php if ($portfolio_date) : ?>
									<li><b><?php esc_html_e('Date:', 'aabot-toolkit'); ?></b>
										<span><?php print ($portfolio_date != '') ? date('F, Y', strtotime($portfolio_date)) : ''; ?></span>
									</li>
								<?php endif; ?>

								<?php if ($company_location) : ?>
									<li><b><?php esc_html_e('Location:', 'aabot-toolkit'); ?></b>
										<span><?php print ($company_location != '') ? $company_location : ''; ?></span>
									</li>
								<?php endif; ?>

								<?php if ($company_name) : ?>
									<li><b><?php esc_html_e('Client:', 'aabot-toolkit'); ?></b>
										<span><?php print ($company_name != '') ? $company_name : ''; ?></span>
									</li>
								<?php endif; ?>

								<li><b><?php esc_html_e('Category:', 'aabot-toolkit'); ?></b>
									<span><?php print aabot_get_terms(get_the_ID(), 'portfolio_categories'); ?></span>
								</li>

								<?php if ($project_link) : ?>
									<li><b><?php esc_html_e('Project Link:', 'aabot-toolkit'); ?></b>
										<span><?php print ($project_link != '') ? $project_link : ''; ?></span></li>
								<?php endif; ?>
							</ul>
						</div>
						<?php do_action("evot_portfolio_sidebar"); ?>
					</div>
					<div class="col-xl-8 col-lg-8">
						<div class="project-details-content">
							<div class="project-thumb mb-30">
								<img src="<?php print esc_attr($aabot_portfolio_thumb); ?>"
								     alt="<?php the_title(); ?>"/>
							</div>
							<div class="project-desc">
								<?php the_content(); ?>
							</div>

							<?php
							if ($project_images_gallerys) { ?>
								<div class="project-desc row">

									<?php
									foreach ($project_images_gallerys as $key => $image) { ?>
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="project-gallery mb-30">
												<?php print wp_get_attachment_image($key, 'aabot-gallery-thumb');
												?>
											</div>
										</div>
									<?php } ?>

								</div>
							<?php } ?>

						</div>
					</div>
				</div>

			<?php
			endwhile;
		endif;
		?>
	</div>
</div>
<?php get_footer(); ?>          