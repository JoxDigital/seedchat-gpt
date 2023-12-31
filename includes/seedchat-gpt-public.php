<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue styles and scripts
function seedchat_gpt_enqueue_scripts() {
    wp_enqueue_style('seedchat-gpt-style', plugin_dir_url(__FILE__) . 'assets/css/SeedChat-GPT.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('seedchat-gpt-script', plugin_dir_url(__FILE__) . 'assets/js/SeedChat-GPT.js', array('jquery'), '1.0', true);
}

// Display chatbot interface
function seedchat_gpt_display_chatbot() {
    ?>
    <div id="seedchat-gpt-chatbot" class="seedchat-gpt-chatbot">
        <div id="seedchat-gpt-conversation" class="seedchat-gpt-conversation"></div>
        <div class="seedchat-gpt-input">
            <input type="text" id="seedchat-gpt-message" placeholder="Type your message...">
            <button id="seedchat-gpt-submit">Send</button>
        </div>
    </div>
    <?php
}

// Create shortcode for displaying chatbot
function seedchat_gpt_chatbot_shortcode() {
    ob_start();
    seedchat_gpt_display_chatbot();
    return ob_get_clean();
}
add_shortcode('seedchat_gpt_chatbot', 'seedchat_gpt_chatbot_shortcode');
