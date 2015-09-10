# IMAP Plugin #

## Description ##

This plugin uses the PEAR Net/POP3 package to emulate the php imap_xxx functions that are used by phplist for bounce processing.
Some hosting providers, such as GoDaddy shared hosting, do not provide the imap extension that is needed by the phplist bounce processing.

If your php configuration already includes the imap extension then you do not need this plugin.

## Installation ##

### Dependencies ###

Requires php version 5.3 or later.

### Set the plugin directory ###
You can use a directory outside of the web root by changing the definition of `PLUGIN_ROOTDIR` in config.php.
The benefit of this is that plugins will not be affected when you upgrade phplist.

### Install through phplist ###
Install on the Plugins page (menu Config > Plugins) using the package URL `https://github.com/bramley/phplist-plugin-imap/archive/master.zip`.

In phplist releases 3.0.5 and earlier there is a bug that can cause a plugin to be incompletely installed on some configurations (<https://mantis.phplist.com/view.php?id=16865>). 
Check that these files are in the plugin directory. If not then you will need to install manually. The bug has been fixed in release 3.0.6.

* the file ImapPlugin.php
* the directory ImapPlugin

### Install manually ###
Download the plugin zip file from <https://github.com/bramley/phplist-plugin-imap/archive/master.zip>

Expand the zip file, then copy the contents of the plugins directory to your phplist plugins directory.
This should contain

* the file ImapPlugin.php
* the directory ImapPlugin

## Donation ##

This plugin is free but if you install and find it useful then a donation to support further development is greatly appreciated.

[![Donate](https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W5GLX53WDM7T4)

## Version history ##

    version     Description
    2.0.1+20150912  Internal code change
    2014-12-21      Initial version
