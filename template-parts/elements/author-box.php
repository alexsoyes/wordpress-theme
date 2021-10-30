<div class="author entry-content" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
    <div class="author-image">
        <figure>
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
        </figure>
    </div>
    <div class="author-meta">
        <small>
			<?php esc_html_e( 'Written by', 'soyes' ); ?>
        </small>
        <div class="author-name">
            <span itemprop="name">
              <span itemprop="givenName">
                  <?php the_author_meta( 'first_name' ); ?>
              </span>
              <span itemprop="familyName">
                  <?php the_author_meta( 'last_name' ); ?>
              </span>
          </span>
        </div>
        <div class="author-description">
			<?php the_author_meta( 'description' ); ?>
        </div>
    </div>
</div>