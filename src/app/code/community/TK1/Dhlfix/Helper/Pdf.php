<?php
// Derive to allow to merge more than 20 documents
class TK1_Dhlfix_Helper_Pdf extends Dhl_Intraship_Helper_Pdf
{
     /**
     * Merge limit for documents
     *
     * @var integer
     */
    protected $_limit = 50;
}