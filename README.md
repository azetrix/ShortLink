# ShortLink
[![GitHub release](https://img.shields.io/badge/Release-v0.1.5-blue.svg)](https://github.com/azetrix/ShortLink/releases/tag/v0.1.5)
[![AUR](https://img.shields.io/badge/License-GPL--3.0-blue.svg)](https://github.com/azetrix/ShortLink/blob/master/LICENSE)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7ZHJQTCW4UZ8A)

ShortLink is a simple URL Shortening script powered purely by PHP.
Check ShortLink: https://azetrix.xyz/

~ REINVENTING THE WHEEL ~

> Update: We currently have no funding to support the development of this application. We are suspending its development until further notice. This might take weeks in duration. (6/9/2017)

> Update: The development of this project is now active. We have reconstructed everything to comply with the common modern-PHP coding practices. (11/23/2018)

# Features

- It can create up to `15.625` billion unique URLs in 6 or less characters.
- It has the ability to create custom links up to 20 Characters.
- It has a beautiful modern UI. Powered by [Bulma CSS](http://bulma.io/).
- Domain blacklist with shell wildcard support.
- ShortLink blacklist with shell wildcard support.
- Predefined blacklist for inappropriate domains and custom ShortLinks.
- Google reCAPTCHA integration is now built-in.
- Supports link preview and force redirection.

# Prerequisites

- MySQL Database
- PHP
- Apache Server


# Installation

1. Upload all files to your web root.
2. Rename `sample.htaccess` to `.htaccess` if you're using Apache Server.
3. Create new MySQL Database.
4. Set your MySQL credentials at `inc/vars.php`.
5. Set your web root in `SHORTLINK_PREFIX` at `inc/vars.php`.
6. Set your contact email in `CONTACT_EMAIL` at `inc/vars.php`.
7. Optionally, you can modify the `$kw_blacklist` (keyword blackist) and `$dom_blacklist` (domain blacklist) at `inc/vars.php` to suit your needs.
