# wordpress-Nuke
This is a simple plugin to enable you to reduce your wordpress fingerprint to almost zero. Included here in is a : 
htaccess file that is a complementary to do some further hardening not done by the plugin and the bit for the plugin is handled by itself. 

Currently the plugin does some various modifications to wordpress on the frontend to reduce the fingerprint that you are using wordpress, It does this without you modifying your theme files. The things it does include: 
 * REMOVE wordpress emoji script
 * REMOVE RSD link header 
 * REMOVE feed links
 * REMOVE comments feed
 * REMOVE meta generator
 * REMOVE wordpress version appended in scripts
 * Disables wordpress REST API 
 * Disable wordpress user enumeration
 * Remove unnecessary Junk in header
 
 The articles that influenced this are as below: 
- [Hardening through htaccess](http://munir.skilledsoft.com/wordpress-hardening-via-htaccess/)
- [Hardening through Patching the theme](http://munir.skilledsoft.com/wordpress-hardening-patching-the-theme/)
-  [Hardening through Plugins](http://munir.skilledsoft.com/wordpress-hardening-using-plugins/)
