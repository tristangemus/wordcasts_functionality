<?php foreach ( $data[ 'taxonomies' ] as $taxonomy ) : if ( empty( $taxonomy[ 'terms' ] ) ) continue; ?>
    <p><strong><?php echo $taxonomy[ 'name' ]; ?></strong></p>
    <ul>
        <?php foreach ( $taxonomy[ 'terms' ] as $term ) : ?>
            <li><a href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>