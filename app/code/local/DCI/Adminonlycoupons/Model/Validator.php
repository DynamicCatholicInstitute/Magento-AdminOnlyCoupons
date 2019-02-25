<?php

class DCI_Adminonlycoupons_Model_Validator extends SubscribePro_Autoship_Model_SalesRule_Validator
{
    /**
     * Check if rule can be applied for specific address/quote/customer
     *
     * @param   Mage_SalesRule_Model_Rule $rule
     * @param   Mage_Sales_Model_Quote_Address $address
     * @return  bool
     */
    protected function _canProcessRule($rule, $address) {
        if ($rule->getAdminOnly() && !Mage::app()->getStore()->isAdmin()) {
            return false;
        }
        return parent::_canProcessRule($rule, $address);
    }
}