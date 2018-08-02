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

class TableSEFUrl extends JTable
{
    /** @var int */
    public $id = null;
    /** @var int */
    public $cpt = null;
    /** @var string */
    public $sefurl = null;
    /** @var string */
    public $origurl = null;
    /** @var int */
    public $Itemid = null;
    /** @var string */
    public $metadesc = null;
    /** @var string */
    public $metakey = null;
    /** @var string */
    public $metatitle = null;
    /** @var string */
    public $metalang = null;
    /** @var string */
    public $metarobots = null;
    /** @var string */
    public $metagoogle = null;
    /** @var string */
    public $metacustom = null;
    /** @var string */
    public $canonicallink = null;
    /** @var date */
    public $dateadd = null;
    /** @var priority */
    public $priority = null;
    /** @var enabled */
    public $enabled = null;
    /** @var locked */
    public $locked = null;
    /** @var sef */
    public $sef = null;
    /** @var sm_indexed */
    public $sm_indexed = null;
    /** @var sm_date */
    public $sm_date = null;
    /** @var sm_frequency */
    public $sm_frequency = null;
    /** @var sm_priority */
    public $sm_priority = null;
    /** @var int */
    public $showsitename = null;

    /**
	 * Constructor
	 *
	 * @param JDatabaseDriver $db Database connector object
	 */
    public function __construct(&$db)
    {
        parent::__construct('#__sefurls', 'id', $db);
    }

    public function check()
    {
        //initialize
        $this->_error = null;
        $this->sefurl = trim($this->sefurl);
        $this->origurl = trim($this->origurl);
        $this->metadesc = trim($this->metadesc);
        $this->metakey = trim($this->metakey);
        // check for valid URLs
        if ($this->origurl == '') {
            $this->_error .= JText::_('COM_SEF_ERROR_EMPTY_URL');
            return false;
        }
        //if (eregi("^\\/", $this->sefurl)) {
        if (preg_match("|^\\/|i", $this->sefurl)) {
            $this->_error .= JText::_('COM_SEF_ERROR_URL_LEADING_SLASH');
        }
        //if ((eregi("^index.php", $this->origurl)) === false) {
        if (!preg_match("/^index.php/i", $this->origurl)) {
            $this->_error .= JText::_('COM_SEF_ERROR_URL_MISSING_INDEX');
        }
        if (is_null($this->_error)) {
            // 15.5.2012 dajo: REMOVED, as duplicate SEF URLs can also be stored in database
            // check for existing URLS
            /*$this->_db->setQuery("SELECT id FROM #__sefurls WHERE `sefurl` LIKE " . $this->_db->Quote($this->sefurl) . " AND `origurl` LIKE " . $this->_db->Quote($this->origurl));
            $xid = intval($this->_db->loadResult());
            if ($xid && $xid != intval($this->id)) {
                $this->_error = JText::_('COM_SEF_ERROR_URL_EXISTS');
                return false;
            }*/
            
            return true;
        } else {
            return false;
        }
    }
}
