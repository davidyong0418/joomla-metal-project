<?php
/**
 * SEF component for Joomla!
 * 
 * @package   JoomSEF
 * @version   4.7.5
 * @author    ARTIO s.r.o., http://www.artio.net
 * @copyright Copyright (C) 2018 ARTIO s.r.o. 
 * @license   GNU/GPLv3 http://www.artio.net/license/gnu-general-public-license
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class TableMovedUrl extends JTable
{
    public $id;
    public $old;
    public $new;

    /**
     * Constructor
     *
     * @param JDatabaseDriver $db Database connector object
     */
    public function __construct($db) {
        parent::__construct('#__sefmoved', 'id', $db);
    }

}
