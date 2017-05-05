<?php
/**
 * TK1_Dhlfix_Model_Quote_Address
 *
 * @category  Model
 * @package   TK1_Dhlfix
 * @author    Henning Kuntzschmann
 * @copyright Copyright (c) 2017 TK1 GmbH
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class TK1_Dhlfix_Model_Quote_Address extends Dhl_Account_Model_Quote_Address
{
    /**
     * validates the address
     *
     * @return boolean | array true if validation is passed, otherwise the error messages
     */
    public function validate()
    {
        $errors = parent::validate();
		// errros === true means validation passed
		if ($errors === true) return true;

        if ($this->getAddressType() == self::TYPE_BILLING) {
			$key = array_search(Mage::helper('customer')->__('No parcel pick up machines are allowed in billing address. To send to a parcel pick up machine you should enter it as shipping address.'), $errors);
			if ($key !== false)
			{
				unset($errors[$key]);
			}
        }
        
        if (empty($errors) || $this->getShouldIgnoreValidation()) {
                return true;
        }
        return $errors;
    }
}