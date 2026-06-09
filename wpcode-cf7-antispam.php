// Anti-Spam Honeypot for Contact Form 7
// Add as WPCode snippet: PHP Snippet, Run Everywhere

// 1. Add hidden honeypot field to all CF7 forms
add_filter('wpcf7_form_elements', function($content) {
    $honeypot = '<div style="position:absolute;left:-9999px;top:-9999px;height:0;width:0;overflow:hidden;" aria-hidden="true"><label>Leave this empty<input type="text" name="website_url_hp" value="" tabindex="-1" autocomplete="off"/></label></div>';
    $content = $honeypot . $content;
    return $content;
});

// 2. Block submission if honeypot is filled (bots fill all fields)
add_filter('wpcf7_validate', function($result, $tags) {
    if (!empty($_POST['website_url_hp'])) {
        $result->invalidate($tags[0], 'Spam detected.');
    }
    return $result;
}, 10, 2);

// 3. Block submissions that arrive too fast (under 3 seconds = bot)
add_action('wpcf7_init', function() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $_SESSION['cf7_load_time'] = time();
    }
});

add_filter('wpcf7_validate', function($result, $tags) {
    if (isset($_SESSION['cf7_load_time'])) {
        $elapsed = time() - $_SESSION['cf7_load_time'];
        if ($elapsed < 3) {
            $result->invalidate($tags[0], 'Please wait a moment before submitting.');
        }
    }
    return $result;
}, 20, 2);

// 4. Block common spam patterns in message body
add_filter('wpcf7_validate_textarea*', function($result, $tag) {
    $value = isset($_POST[$tag->name]) ? $_POST[$tag->name] : '';
    if (preg_match('/\[url[=\]]|crushon|casino|viagra|crypto.*invest/i', $value)) {
        $result->invalidate($tag, 'Your message was flagged as spam.');
    }
    return $result;
}, 10, 2);

add_filter('wpcf7_validate_textarea', function($result, $tag) {
    $value = isset($_POST[$tag->name]) ? $_POST[$tag->name] : '';
    if (preg_match('/\[url[=\]]|crushon|casino|viagra|crypto.*invest/i', $value)) {
        $result->invalidate($tag, 'Your message was flagged as spam.');
    }
    return $result;
}, 10, 2);
