# Volkova Theme

A professional and calming WordPress theme for psychologist Elena Georgievna Volkova.

## Description

Volkova Theme is a custom WordPress theme designed to provide a professional and calming online presence for a psychologist. It is built with a modular approach, making it easy to manage and customize content. The theme is optimized for performance and SEO, and it includes a number of features to enhance the user experience.

## Theme Setup

1.  **Installation:**
    *   Download the theme files and upload them to the `/wp-content/themes/` directory of your WordPress installation.
    *   Activate the theme through the 'Appearance' -> 'Themes' menu in your WordPress dashboard.

2.  **Required Plugins:**
    *   This theme is designed to work with a number of plugins to provide additional functionality. It is recommended that you install the following plugins:
        *   **Contact Form 7 or Gravity Forms:** For creating and managing forms.
        *   **Yoast SEO:** For advanced SEO management.
        *   **W3 Total Cache or WP Super Cache:** For caching and performance optimization.

3.  **Theme Options:**
    *   The theme includes a theme options page where you can manage sitewide settings. You can access this page through the 'Appearance' -> 'Theme Options' menu in your WordPress dashboard.
    *   The theme options page allows you to set the contact email address, phone number, and footer text.

## Custom Post Types

The theme includes the following custom post types:

*   **Services:** For managing the services offered by the psychologist. Each service can have a title, description, featured image, price, and duration.
*   **Videos:** For managing video lectures. Each video can have a title, description, featured image, and a URL to the video.
*   **Certificates:** For managing certificates and other documents. Each certificate can have a title and a featured image.

## Build Process

The theme includes a build process for minifying CSS and JavaScript files. To use the build process, you will need to have Node.js and npm installed on your local machine.

1.  **Installation:**
    *   Navigate to the theme directory in your terminal and run the following command to install the required dependencies:
        ```
        npm install
        ```

2.  **Build:**
    *   To minify the CSS and JavaScript files, run the following command:
        ```
        npm run build
        ```
    *   This will create minified versions of the `main.css` and `main.js` files in the `css` and `js` directories, respectively.

## Contributing

If you would like to contribute to the development of this theme, please feel free to fork the repository and submit a pull request.
