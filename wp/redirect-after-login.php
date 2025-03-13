<?php 
class WOWWP_Redirect_After_Login {

    // Define a mapping of roles to their respective redirect URLs
    private $role_redirects = array(
        'administrator' => '/admin-dashboard',
        'editor'        => '/editor-dashboard',
        'subscriber'    => '/subscriber-dashboard',
        'author'        => '/author-dashboard',
    );

    public function __construct() {
        add_filter('login_redirect', [$this, 'redirect_user_after_login'], 10, 3);
    }

    /**
     * Redirect users after login based on their role.
     *
     * @param string $redirect_to The URL to redirect to.
     * @param string $request The requested redirect URL.
     * @param object $user The logged-in user object.
     * @return string Redirect URL.
     */
    public function redirect_user_after_login($redirect_to, $request, $user) {
        // Ensure that the user object is valid
        if (!is_a($user, 'WP_User')) {
            return $redirect_to;  // Return the default redirect if user object is invalid
        }

        // Get the user's role
        $roles = $user->roles;

        // Check for the first role and redirect accordingly
        foreach ($roles as $role) {
            if (array_key_exists($role, $this->role_redirects)) {
                // Construct the full URL for the role-based redirection
                return home_url($this->role_redirects[$role]);
            }
        }

        // Default redirect if no role matches
        return $redirect_to;
    }
}

// Initialize the class
new WOWWP_Redirect_After_Login();
