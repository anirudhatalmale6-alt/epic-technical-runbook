// EPIC Blog Post Branding & Block Patterns
// Add as WPCode snippet: PHP Snippet, Run Everywhere

// 1. Add EPIC brand styles to all blog posts
add_action('wp_head', function() {
    if (is_single() || is_page()) {
        echo '<style>
/* EPIC Blog Post Styles */
.entry-content h1, .entry-content h2 {
    color: #001F3F;
    font-weight: 700;
    padding-bottom: 10px;
    border-bottom: 2px solid #E2E8F0;
    margin-top: 32px;
    margin-bottom: 16px;
}
.entry-content h3 {
    color: #1A365D;
    font-weight: 600;
    margin-top: 24px;
    margin-bottom: 8px;
}
.entry-content h2:first-child { margin-top: 0; }

/* Tip Box - use the "Verse" block or add CSS class "epic-tip" */
.entry-content .epic-tip,
.entry-content .wp-block-verse.epic-tip {
    background: #FFFBEB;
    border: 1px solid #FDE68A;
    border-radius: 6px;
    padding: 16px 20px;
    margin: 16px 0;
    font-size: 14px;
    color: #92400E;
    font-family: inherit;
    white-space: normal;
}
.entry-content .epic-tip strong { color: #78350F; }

/* Info Box - blue variant */
.entry-content .epic-info {
    background: #EFF6FF;
    border: 1px solid #BFDBFE;
    border-radius: 6px;
    padding: 16px 20px;
    margin: 16px 0;
    font-size: 14px;
    color: #1E40AF;
}

/* Warning Box - red variant */
.entry-content .epic-warning {
    background: #FEF2F2;
    border: 1px solid #FECACA;
    border-radius: 6px;
    padding: 16px 20px;
    margin: 16px 0;
    font-size: 14px;
    color: #991B1B;
}

/* Numbered Steps - use an ordered list with class "epic-steps" */
.entry-content ol.epic-steps {
    counter-reset: step;
    list-style: none;
    padding-left: 0;
}
.entry-content ol.epic-steps li {
    counter-increment: step;
    position: relative;
    padding-left: 40px;
    margin-bottom: 14px;
    line-height: 1.7;
}
.entry-content ol.epic-steps li::before {
    content: counter(step);
    position: absolute;
    left: 0;
    top: 2px;
    width: 26px;
    height: 26px;
    background: #001F3F;
    color: #fff;
    border-radius: 50%;
    font-size: 13px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* CTA Buttons - applies to WP button blocks */
.entry-content .wp-block-button .wp-block-button__link {
    background: #001F3F;
    color: #fff;
    border-radius: 6px;
    padding: 12px 28px;
    font-weight: 600;
    font-size: 15px;
    transition: background 0.2s;
}
.entry-content .wp-block-button .wp-block-button__link:hover {
    background: #003366;
}
.entry-content .wp-block-button.is-style-outline .wp-block-button__link {
    background: transparent;
    color: #001F3F;
    border: 2px solid #001F3F;
}
.entry-content .wp-block-button.is-style-outline .wp-block-button__link:hover {
    background: #001F3F;
    color: #fff;
}

/* Gold accent button variant - add class "epic-gold" to button block */
.entry-content .wp-block-button.epic-gold .wp-block-button__link {
    background: #D4AF37;
    color: #001F3F;
}
.entry-content .wp-block-button.epic-gold .wp-block-button__link:hover {
    background: #C4A030;
}

/* Section cards */
.entry-content .epic-section {
    background: #fff;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    padding: 28px;
    margin-bottom: 20px;
}

/* Feature grid using WP columns */
.entry-content .epic-features .wp-block-column {
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    padding: 20px;
}

/* Table styling */
.entry-content table {
    border-collapse: collapse;
    width: 100%;
    margin: 16px 0;
}
.entry-content table th {
    background: #001F3F;
    color: #fff;
    padding: 10px 14px;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
}
.entry-content table td {
    padding: 10px 14px;
    border-bottom: 1px solid #E2E8F0;
    font-size: 14px;
}
.entry-content table tr:hover td { background: #F8FAFC; }

/* Blockquote styling */
.entry-content blockquote {
    border-left: 4px solid #D4AF37;
    background: #FAFAF5;
    padding: 16px 24px;
    margin: 16px 0;
    font-style: italic;
    color: #4A5568;
}
</style>';
    }
});

// 2. Also add styles to the block editor so authors see the branding while writing
add_action('enqueue_block_editor_assets', function() {
    wp_add_inline_style('wp-edit-blocks', '
        .editor-styles-wrapper h2 { color: #001F3F; font-weight: 700; }
        .editor-styles-wrapper h3 { color: #1A365D; font-weight: 600; }
        .editor-styles-wrapper .wp-block-button .wp-block-button__link { background: #001F3F; border-radius: 6px; }
    ');
});

// 3. Register reusable block patterns
add_action('init', function() {
    register_block_pattern_category('epic-blog', array(
        'label' => 'EPIC Blog'
    ));

    register_block_pattern('epic/tip-box', array(
        'title' => 'EPIC Tip Box',
        'categories' => array('epic-blog'),
        'content' => '<!-- wp:paragraph {"className":"epic-tip"} --><p class="epic-tip"><strong>Tip:</strong> Your tip text goes here.</p><!-- /wp:paragraph -->'
    ));

    register_block_pattern('epic/info-box', array(
        'title' => 'EPIC Info Box',
        'categories' => array('epic-blog'),
        'content' => '<!-- wp:paragraph {"className":"epic-info"} --><p class="epic-info">Important information goes here.</p><!-- /wp:paragraph -->'
    ));

    register_block_pattern('epic/warning-box', array(
        'title' => 'EPIC Warning Box',
        'categories' => array('epic-blog'),
        'content' => '<!-- wp:paragraph {"className":"epic-warning"} --><p class="epic-warning"><strong>Warning:</strong> Warning text goes here.</p><!-- /wp:paragraph -->'
    ));

    register_block_pattern('epic/cta-section', array(
        'title' => 'EPIC Call to Action',
        'categories' => array('epic-blog'),
        'content' => '<!-- wp:group {"className":"epic-section","layout":{"type":"constrained"}} --><div class="wp-block-group epic-section"><!-- wp:heading {"level":3} --><h3>Ready to Get Started?</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Contact us today to learn more about our translation and interpretation services.</p><!-- /wp:paragraph --><!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Contact Us</a></div><!-- /wp:button --><!-- wp:button {"className":"is-style-outline"} --><div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/request-quote/">Request a Quote</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:group -->'
    ));

    register_block_pattern('epic/numbered-steps', array(
        'title' => 'EPIC Numbered Steps',
        'categories' => array('epic-blog'),
        'content' => '<!-- wp:list {"ordered":true,"className":"epic-steps"} --><ol class="epic-steps"><li>First step description goes here.</li><li>Second step description goes here.</li><li>Third step description goes here.</li></ol><!-- /wp:list -->'
    ));

    register_block_pattern('epic/blog-post-template', array(
        'title' => 'EPIC Blog Post Template',
        'categories' => array('epic-blog'),
        'content' => '<!-- wp:heading --><h2>Introduction</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Write your introduction here. Set the context for your readers.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Key Points</h2><!-- /wp:heading --><!-- wp:list {"ordered":true,"className":"epic-steps"} --><ol class="epic-steps"><li>First key point or step.</li><li>Second key point or step.</li><li>Third key point or step.</li></ol><!-- /wp:list --><!-- wp:paragraph {"className":"epic-tip"} --><p class="epic-tip"><strong>Tip:</strong> Add a helpful tip for your readers here.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Details</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Expand on your topic with more detail here.</p><!-- /wp:paragraph --><!-- wp:group {"className":"epic-section","layout":{"type":"constrained"}} --><div class="wp-block-group epic-section"><!-- wp:heading {"level":3} --><h3>Need Help?</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Our team is ready to assist you with your translation and interpretation needs.</p><!-- /wp:paragraph --><!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Contact Us Today</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:group -->'
    ));
});
