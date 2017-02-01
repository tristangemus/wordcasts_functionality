<?php

class WC_Featured_Meta_Box extends WC_Meta_Box {

    public function __construct() {
        $this->title = 'Featured Content';
        $this->slug = 'wordcasts-featured-content';

        $this->fields = array(
            array(
                'name' => 'featured_content',
                'type' => 'wysiwyg',
                'label' => 'Featured Content',
                'single' => true
            )
        );

        parent::__construct();
    }

}
