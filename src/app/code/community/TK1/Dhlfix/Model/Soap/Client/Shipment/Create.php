<?php
/**
 * TK1_Dhlfix_Model_Soap_Client_Shipment_Create
 *
 * @category  Model
 * @package   TK1_Dhlfix
 * @author    Henning Kuntzschmann
 * @copyright Copyright (c) 2017 TK1 GmbH
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class TK1_Dhlfix_Model_Soap_Client_Shipment_Create extends Dhl_Intraship_Model_Soap_Client_Shipment_Create
{
    protected function _normalizeReceiverAddress(Mage_Sales_Model_Order_Address &$address)
    {
		/* @var $address Mage_Sales_Model_Order_Address */
		// Introduces an additional check for a special "Packstation" format like "AccountId Packstation StationId" and "Packstation StationId" when Conpany contains AccountID. 
		// Oddly enough this check is done when editing the address manually but not when the shipment is created without manual edit.
		if (false === $this->get('shipment')->hasCustomizedAddress()) {
			if (preg_match('/^(\d+)\s(packstation\s\d+)$/i', $address->getStreet(1), $match)) {
				$address->setIdNumber($match[1]);
				$address->setStationId($match[2]);					
			}
			elseif (preg_match('/^(\d+)$/i', $address->getCompany(), $match) && false !== stripos($address->getStreet(1), 'packstation'))
			{
				$address->setIdNumber($match[1]);
				$address->setStationId($address->getStreet(1));		
			}
			else
			{
				parent::_normalizeReceiverAddress($address);
			}
		}
		else
		{
			parent::_normalizeReceiverAddress($address);
		}
    }
}
