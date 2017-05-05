# DhlIntrashipFix

**Prevents transmission of telephone number to DHL**

Module is build upon NetResearch DHL Intraship module and prevents sending customer telephone number to DHL.
This is only allowed with explicit customer confirmation. (Germany)

**Raises limit of simultaneous labels processed**

By default the module restricts label processing to twenty labels at the same time.
This fix raises this limit to 50. Attention: Internal Server Errors or Timeout Errors may occur due to php server limits

**Prefills the shipment edit form with default values**

In certain scenarios the backend edit form for shipment is not prefilled with default values for agecheck, profile, insurance and so on.
This occurs if these settings are not yet set within the shipment, then the first value of the combobox was selected, which might not be the set default value.
This fix corrects this and sets default values if no specific values are available within the shipment

**Additional check for Packstation format**

The edit form tries to recover packstation data from the street field. However, this is only done when edit form is called and not automatically.
This module corrects this and also tries to recover packstation data from street format "AccountId Packstation StationId" automatically.

**Allow "Packstation" in billing address**

M2e Pro creates same billing and shipping address from amazon order. If these contain "Packstation" in sreet address, DHL_Intraship module prevents M2e from creating a Magento order since billing street must not contain "Packststation".
Hint: Currently this fix also allows normal Magento frontend orders to contain "Packststaion" in billing street.
