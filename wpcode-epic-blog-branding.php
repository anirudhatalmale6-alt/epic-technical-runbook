// EPIC Blog Post Branding & Block Patterns v2
// Add as WPCode snippet: PHP Snippet, Run Everywhere

// 1. Add EPIC brand styles to all blog posts
add_action('wp_head', function() {
    if (is_single() || is_page()) {
        echo '<style>
/* EPIC Blog Post Styles v2 - Help Guide look */
article.ast-article-single .entry-content,
.entry-content {
    max-width: 820px;
    font-size: 15px;
    line-height: 1.8;
    color: #2D3748;
}

/* Headings - navy with gold underline accent */
article .entry-content h1,
article .entry-content h2,
.entry-content h1,
.entry-content h2 {
    color: #001F3F !important;
    font-weight: 700 !important;
    padding-bottom: 12px !important;
    border-bottom: 3px solid #D4AF37 !important;
    margin-top: 40px !important;
    margin-bottom: 20px !important;
    font-size: 24px !important;
}
article .entry-content h3,
.entry-content h3 {
    color: #1A365D !important;
    font-weight: 600 !important;
    margin-top: 28px !important;
    margin-bottom: 10px !important;
    font-size: 18px !important;
}
article .entry-content h2:first-child,
.entry-content h2:first-child { margin-top: 0 !important; }

/* Paragraphs */
article .entry-content p,
.entry-content p {
    color: #4A5568;
    margin-bottom: 14px;
    font-size: 15px;
}

/* Lists */
article .entry-content ul li,
article .entry-content ol li,
.entry-content ul li,
.entry-content ol li {
    color: #4A5568;
    margin-bottom: 6px;
}

/* Section wrapper for content blocks */
article .entry-content .wp-block-group,
.entry-content .wp-block-group {
    background: #fff;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    padding: 28px;
    margin-bottom: 20px;
}

/* Tip Box */
article .entry-content .epic-tip,
.entry-content .epic-tip {
    background: #FFFBEB !important;
    border: 1px solid #FDE68A !important;
    border-radius: 6px !important;
    padding: 16px 20px !important;
    margin: 16px 0 !important;
    font-size: 14px !important;
    color: #92400E !important;
    font-style: normal !important;
    white-space: normal !important;
}
.entry-content .epic-tip strong { color: #78350F !important; }

/* Info Box */
article .entry-content .epic-info,
.entry-content .epic-info {
    background: #EFF6FF !important;
    border: 1px solid #BFDBFE !important;
    border-radius: 6px !important;
    padding: 16px 20px !important;
    margin: 16px 0 !important;
    font-size: 14px !important;
    color: #1E40AF !important;
}

/* Warning Box */
article .entry-content .epic-warning,
.entry-content .epic-warning {
    background: #FEF2F2 !important;
    border: 1px solid #FECACA !important;
    border-radius: 6px !important;
    padding: 16px 20px !important;
    margin: 16px 0 !important;
    font-size: 14px !important;
    color: #991B1B !important;
}

/* Numbered Steps */
article .entry-content ol.epic-steps,
.entry-content ol.epic-steps {
    counter-reset: step;
    list-style: none !important;
    padding-left: 0 !important;
}
article .entry-content ol.epic-steps li,
.entry-content ol.epic-steps li {
    counter-increment: step;
    position: relative;
    padding-left: 44px !important;
    margin-bottom: 16px !important;
    line-height: 1.7;
}
article .entry-content ol.epic-steps li::before,
.entry-content ol.epic-steps li::before {
    content: counter(step);
    position: absolute;
    left: 0;
    top: 2px;
    width: 28px;
    height: 28px;
    background: #001F3F;
    color: #fff;
    border-radius: 50%;
    font-size: 13px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* CTA Buttons */
article .entry-content .wp-block-button .wp-block-button__link,
.entry-content .wp-block-button .wp-block-button__link {
    background: #001F3F !important;
    color: #fff !important;
    border-radius: 6px !important;
    padding: 14px 32px !important;
    font-weight: 600 !important;
    font-size: 15px !important;
    transition: background 0.2s !important;
    text-decoration: none !important;
}
article .entry-content .wp-block-button .wp-block-button__link:hover,
.entry-content .wp-block-button .wp-block-button__link:hover {
    background: #003366 !important;
}
article .entry-content .wp-block-button.is-style-outline .wp-block-button__link,
.entry-content .wp-block-button.is-style-outline .wp-block-button__link {
    background: transparent !important;
    color: #001F3F !important;
    border: 2px solid #001F3F !important;
}
article .entry-content .wp-block-button.is-style-outline .wp-block-button__link:hover,
.entry-content .wp-block-button.is-style-outline .wp-block-button__link:hover {
    background: #001F3F !important;
    color: #fff !important;
}

/* Gold CTA variant */
article .entry-content .wp-block-button.epic-gold .wp-block-button__link,
.entry-content .wp-block-button.epic-gold .wp-block-button__link {
    background: #D4AF37 !important;
    color: #001F3F !important;
}

/* Section card style */
article .entry-content .epic-section,
.entry-content .epic-section {
    background: #F8FAFC !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 10px !important;
    padding: 32px !important;
    margin: 24px 0 !important;
}

/* Tables */
article .entry-content table,
.entry-content table {
    border-collapse: collapse;
    width: 100%;
    margin: 16px 0;
    border-radius: 8px;
    overflow: hidden;
}
article .entry-content table th,
.entry-content table th {
    background: #001F3F !important;
    color: #fff !important;
    padding: 12px 16px !important;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
}
article .entry-content table td,
.entry-content table td {
    padding: 12px 16px !important;
    border-bottom: 1px solid #E2E8F0 !important;
    font-size: 14px;
}
article .entry-content table tr:hover td,
.entry-content table tr:hover td { background: #F8FAFC; }

/* Blockquotes - gold accent */
article .entry-content blockquote,
.entry-content blockquote {
    border-left: 4px solid #D4AF37 !important;
    background: #FAFAF5 !important;
    padding: 20px 28px !important;
    margin: 20px 0 !important;
    font-style: italic;
    color: #4A5568 !important;
    border-radius: 0 6px 6px 0 !important;
}

/* Images - subtle shadow */
article .entry-content img,
.entry-content img {
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

/* Separators - gold */
article .entry-content hr,
.entry-content hr {
    border: none !important;
    border-top: 2px solid #D4AF37 !important;
    margin: 32px 0 !important;
}
</style>';
    }
});

// 2. Editor styles for preview in block editor
add_action('enqueue_block_editor_assets', function() {
    wp_add_inline_style('wp-edit-blocks', '
        .editor-styles-wrapper h2 { color: #001F3F !important; font-weight: 700; border-bottom: 3px solid #D4AF37; padding-bottom: 10px; }
        .editor-styles-wrapper h3 { color: #1A365D !important; font-weight: 600; }
        .editor-styles-wrapper .wp-block-button .wp-block-button__link { background: #001F3F !important; border-radius: 6px; }
        .editor-styles-wrapper .epic-tip { background: #FFFBEB; border: 1px solid #FDE68A; border-radius: 6px; padding: 16px; color: #92400E; }
        .editor-styles-wrapper .epic-info { background: #EFF6FF; border: 1px solid #BFDBFE; border-radius: 6px; padding: 16px; color: #1E40AF; }
        .editor-styles-wrapper .epic-warning { background: #FEF2F2; border: 1px solid #FECACA; border-radius: 6px; padding: 16px; color: #991B1B; }
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
