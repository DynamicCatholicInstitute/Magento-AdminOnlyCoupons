<?php

$installer = $this;
$installer->startSetup();
$installer->getConnection()
    ->addColumn(
        $installer->getTable('salesrule/rule'),
        'admin_only',
        array(
            'type'      => Varien_Db_Ddl_Table::TYPE_BOOLEAN,
            'visible'   => true,
            'default'   => 0,
            'required'  => false,
            'comment'   => 'Admin Usable Sales Rule Only',
        )
    );
$installer->endSetup();