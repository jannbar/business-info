<?php

namespace JannBar\BusinessInfo;

class Plugin
{
    public function init()
    {
        // Register the menu item
        add_action('admin_menu', function () {
            add_menu_page(
                'Business Info',
                'Business Info',
                'manage_options',
                'business-info',
                [$this, 'bi_page_callback'],
                null,
                99
            );
        });

        // Register plugin settings
        add_action('admin_init', function () {
            add_settings_section('bi-section', null, null, 'bi-options');

            add_settings_field(
                'email',
                'E-Mail',
                [$this, 'bi_text_input'],
                'bi-options',
                'bi-section',
                ['option' => 'email']
            );
            register_setting('bi-section', 'email');

            add_settings_field(
                'phone',
                'Telefon',
                [$this, 'bi_text_input'],
                'bi-options',
                'bi-section',
                ['option' => 'phone']
            );
            register_setting('bi-section', 'phone');

            add_settings_field(
                'whatsapp',
                'WhatsApp URL',
                [$this, 'bi_text_input'],
                'bi-options',
                'bi-section',
                ['option' => 'whatsapp']
            );
            register_setting('bi-section', 'whatsapp');

            add_settings_field(
                'instagram',
                'Instagram URL',
                [$this, 'bi_text_input'],
                'bi-options',
                'bi-section',
                ['option' => 'instagram']
            );
            register_setting('bi-section', 'instagram');

            add_settings_field(
                'youtube',
                'YouTube URL',
                [$this, 'bi_text_input'],
                'bi-options',
                'bi-section',
                ['option' => 'youtube']
            );
            register_setting('bi-section', 'youtube');
        });
    }

    public function bi_text_input($args)
    {
        $setting = get_option($args['option']);
        ?>
        <input type="text" style="width: 32ch;" name="<?= $args['option'] ?>" value="<?= isset($setting) ? $setting : '' ?>">
        <?php
    }

    public function bi_page_callback()
    {
        ?>
        <div class="wrap">
            <h1>Business Infos bearbeiten</h1>
            <form action="options.php" method="post">
        <?php
        settings_fields('bi-section');
        do_settings_sections('bi-options');
        submit_button();
        ?>
            </form>
        </div>
<?php
    }
}
