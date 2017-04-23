<?php
/**
 * TK1_Dhlfix_Block_Adminhtml_Sales_Shipment_Edit_Form
 *
 * @category  Block
 * @package   TK1_Dhlfix
 * @author    Henning Kuntzschmann
 * @copyright Copyright (c) 2017 TK1 GmbH
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class TK1_Dhlfix_Block_Adminhtml_Sales_Shipment_Edit_Form
	extends Dhl_Intraship_Block_Adminhtml_Sales_Shipment_Edit_Form
{
	/**
	 * Fills the Edit-Form with default values, if shipment does not contain specific values
	 */
    protected function _prepareForm()
    {
        /** @var Dhl_Intraship_Model_Shipment $parcel */
        $parcel = Mage::registry('shipment');
		
		// Set default values at first, and if available, override with specific parcel settings in parent function, if not available, keep default settings
		$defaults = Mage::getModel('intraship/config')->getAutocreateSettings('');
		foreach($defaults as $key => $value):
			$parcel->setData('settings_' . $key, $value);
		endforeach;
		
		// Sicherheitshalber in die Registry zurückschreiben, obwohl $parcel ein Referenz-Typ sein müsste
		Mage::unregister('shipment');
		Mage::register('shipment', $parcel);

		return parent::_prepareForm();
    }
}
