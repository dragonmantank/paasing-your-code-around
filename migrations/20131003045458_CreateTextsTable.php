<?php

class CreateTextsTable extends Ruckusing_Migration_Base
{
    public function up()
    {
        $table = $this->create_table('drunk_texts');
        $table->column('phoneNumber', 'string');
        $table->column('message', 'string');
        $table->column('dateAdded', 'datetime');
        $table->column('approved', 'boolean');
        $table->finish();

    }//up()

    public function down()
    {
        $this->drop_table('drunk_texts');
    }//down()
}
