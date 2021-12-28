jQuery( document ).ready(function() {
    // options
    dynamic_title_repeater_accordion('contacts', 'title');

    // Contact
    dynamic_title_repeater_accordion('cta_box', 'title');

    // Blog
    dynamic_title_repeater_accordion('blog_helpful_links', 'title');

    // Careers
    dynamic_title_repeater_accordion('careers_features', 'title');
    dynamic_title_repeater_accordion('custom_activities', 'title');

    // About
    dynamic_title_repeater_accordion('values', 'title');
    dynamic_title_repeater_accordion('blockquote', 'name');
    dynamic_title_repeater_accordion('partners', 'title');

    // Solution
    dynamic_title_repeater_accordion('posts', 'title');
    dynamic_title_repeater_accordion('features', 'text');
    dynamic_title_repeater_accordion('content_block', 'title');
    dynamic_title_repeater_accordion('testimonial', 'name');
    dynamic_title_repeater_accordion('markets', 'title');

    // Home
    dynamic_title_repeater_accordion('services', 'title');
    dynamic_title_repeater_accordion('features', 'title');
    dynamic_title_repeater_accordion('stories', 'title');

});

function dynamic_title_repeater_accordion(repeater_name, field_name) {
    var information_tabs = jQuery("div[data-name='" + repeater_name + "']");

    if (information_tabs.length) {
        var selector = "tr:not(.acf-clone) td.acf-fields .acf-accordion-content div[data-name='" + field_name + "'] input";

        // add lister
        jQuery(information_tabs).on('input', selector, function() {
            var me = jQuery(this);
            var meValue = me.val() ? me.val() : 'Unknown';
            me.closest('td.acf-fields').find('.acf-accordion-title label').text(meValue);
        });

        // trigger the function on load
        information_tabs.find(selector).trigger('input');

    }
}