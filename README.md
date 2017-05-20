# ShortLink
REINVENTING THE WHEEL

> [![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7ZHJQTCW4UZ8A)
>
> Please support the development of this application.

ShortLink is a simple URL Shortening script powered purely by PHP.
Check ShortLink: https://azetrix.xyz/


# Features

- It can  create 42 billion unique URLs in 6 or less characters.
- It has the ability to create custom links up to 20 Characters.
- It has a beautiful modern UI.
- Domain blacklist
- ShortLink blacklist


# Prerequisites

- MySQL Database
- PHP
- Apache Server


# Installation

1. Upload all files to your web root.
2. Create new MySQL Database.
3. Set your MySQL credentials at `inc/vars.php`.
4. Set your web root in `SHORTLINK_PREFIX` at `inc/vars.php`.
5. Set your contact email in `CONTACT_EMAIL` at `inc/vars.php`.
6. Optionally, you can modify the `$kw_blacklist` (keyword blackist) and `$dom_blacklist` (domain blacklist) at `inc/vars.php` to suit your needs.
