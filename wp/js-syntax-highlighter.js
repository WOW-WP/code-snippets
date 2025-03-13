// Place this inside your theme's footer.php before closing </body> -->
document.addEventListener("DOMContentLoaded", function () {
    // Check if there are any code blocks
    if (document.querySelector("pre code")) {
        // Lazy load Prism.js
        let script = document.createElement("script");
        script.src = "https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js";
        script.async = true;
        script.onload = function () {
            Prism.highlightAll();
        };
        document.body.appendChild(script);

        // Lazy load Prism.css for styling
        let link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = "https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css";
        document.head.appendChild(link);
    }
});
