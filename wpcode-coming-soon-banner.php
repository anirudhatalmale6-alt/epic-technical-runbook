// Coming Soon Banner + Replace # Menu Links
// Add as WPCode snippet: PHP Snippet, Run Everywhere, Site Wide Header location

// 1. Top banner
add_action('wp_body_open', function() {
    echo '<div id="epic-update-banner" style="background:#0b2a4a;color:#fff;text-align:center;padding:8px 40px 8px 16px;font-size:13px;position:relative;z-index:9999;font-family:-apple-system,BlinkMacSystemFont,sans-serif;">
        We are refreshing our website to serve you better. Some sections may be under construction.
        <button onclick="this.parentElement.style.display=\'none\'" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:#fff;font-size:18px;cursor:pointer;padding:4px;">&times;</button>
    </div>';
});

// 2. Replace # links in nav with /coming-soon/
add_filter('wp_nav_menu_objects', function($items) {
    foreach ($items as &$item) {
        if ($item->url === '#' || $item->url === '/#') {
            $item->url = '/coming-soon/';
        }
    }
    return $items;
});
