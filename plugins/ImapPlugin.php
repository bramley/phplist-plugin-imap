<?php
/**
 * ImapPlugin for phplist.
 * 
 * This file is a part of ImapPlugin.
 *
 * This plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * @category  phplist
 *
 * @author    Duncan Cameron
 * @copyright 2014 Duncan Cameron
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 */

/**
 * Registers the plugin with phplist.
 */
class ImapPlugin extends phplistPlugin
{
    const VERSION_FILE = 'version.txt';
    const PLUGIN = 'ImapPlugin';

    /*
     *  Inherited variables
     */
    public $name = 'IMAP Emulation';
    public $authors = 'Duncan Cameron';
    public $description = 'Uses the PEAR Net/POP3 package to emulate the php imap_* functions';
    public $enabled = 1;

    public function __construct()
    {
        $this->coderoot = dirname(__FILE__) . '/' . self::PLUGIN . '/';
        $this->version = (is_file($f = $this->coderoot . self::VERSION_FILE))
            ? file_get_contents($f)
            : '';
        parent::__construct();
    }

    public function activate()
    {
        parent::activate();
        require $this->coderoot . 'imap.php';
        set_include_path(get_include_path() . PATH_SEPARATOR . $this->coderoot . 'PEAR');
    }

    public function adminmenu()
    {
        return array();
    }
}
