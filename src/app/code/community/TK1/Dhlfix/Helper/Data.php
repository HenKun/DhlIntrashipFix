<?php
// Derive to allow to override telephone number
class TK1_Dhlfix_Helper_Data extends Dhl_Intraship_Helper_Data
{
	protected function _setReceiverCommunication(Mage_Sales_Model_Order_Address $address, array &$receiver)
    {
		parent::_setReceiverCommunication($address, $receiver);
		// don't transfer telephone number due to legal restrictions
        $receiver['Communication']['phone'] = '0000000';
    }
}