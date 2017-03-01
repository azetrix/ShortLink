# ShortLink

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7ZHJQTCW4UZ8A)

ShortLink is a simple URL Shortening script powered purely by PHP.
This is a modified snapshot of the https://azetrix.xyz/ URL shortening service. Check ShortLink: https://azetrix.xyz/


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
