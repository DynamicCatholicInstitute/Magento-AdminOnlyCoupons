<?php

class DCI_Adminonlycoupons_Block_Adminhtml_Tab extends Mage_Adminhtml_Block_Widget_Form
implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Return tab title
     *
     * @return string
     */
    public function getTabTitle() {
        return Mage::helper('salesrule')->__('Admin Only Coupon');
    }

    /**
     * Return tab label
     *
     * @return string
     */
    public function getTabLabel() {
        return Mage::helper('salesrule')->__('Admin Only Coupon');
    }

    public function canShowTab() {
        return true;
    }

    public function isHidden() {
        return false;
    }

    /**
     * Return section this tab will be after
     *
     * @return string
     */
    public function getAfter() {
        return 'conditions_section';
    }

    public function _prepareForm() {
        $model = Mage::registry('current_promo_quote_rule');
        $data = $model->getData();

        $form = new Varien_Data_Form();

        $form->setHtmlIdPrefix('rule_');

        $fieldset = $form->addFieldset('custom_fieldset', array(
            'legend'=>Mage::helper('salesrule')->__('Admin Only Coupon')
        ));

        $fieldset->addField('admin_only', 'checkbox', array(
            'label'     => Mage::helper('salesrule')->__('Admin Only'),
            'class'     => '',
            'required'  => false,
            'name'      => 'admin_only',
            'note'      => Mage::helper('salesrule')->__('Whether this rule can be only be used on the backend.'),
            'checked'   => (bool)$data['admin_only'],
            'value'     => $data['admin_only'],
            'after_element_html' => "<input type='hidden' value='" . $data['admin_only'] . "' name='admin_only'>",
            'onclick'   => "document.getElementsByName('admin_only').forEach(el => el.value = document.getElementById('rule_admin_only').checked ? 1 : 0);",
        ));

        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}