<?php

class FixingColumnNames extends Ruckusing_Migration_Base
{
    public function up()
    {
        $this->rename_column('drunk_texts', 'phoneNumber', 'phonenumber');
        $this->rename_column('drunk_texts', 'dateAdded', 'dateadded');
    }//up()

    public function down()
    {
        $this->rename_column('drunk_texts', 'phonenumber', 'phoneNumber');
        $this->rename_column('drunk_texts', 'dateadded', 'dateAdded');
    }//down()
}
