<?php
class WOWWP_Disable_Auto_Updates {

    public function __construct() {
        // Disable auto updates for themes and plugins
        add_filter('auto_update_plugin', [$this, 'disable_plugin_auto_updates']);
        add_filter('auto_update_theme', [$this, 'disable_theme_auto_updates']);
    }

    /**
     * Disable automatic updates for plugins.
     *
     * @param bool $update Whether to update the plugin.
     * @return bool
     */
    public function disable_plugin_auto_updates($update) {
        return false; // Disable auto update for plugins
    }

    /**
     * Disable automatic updates for themes.
     *
     * @param bool $update Whether to update the theme.
     * @return bool
     */
    public function disable_theme_auto_updates($update) {
        return false; // Disable auto update for themes
    }
}

// Initialize the class
new WOWWP_Disable_Auto_Updates();
?>
