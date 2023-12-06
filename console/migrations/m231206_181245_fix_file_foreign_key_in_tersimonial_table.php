<?php

use yii\db\Migration;

/**
 * Class m231206_181245_fix_file_foreign_key_in_tersimonial_table
 */
class m231206_181245_fix_file_foreign_key_in_tersimonial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      // drops foreign key for table `{{%file}}`
      $this->dropForeignKey(
        '{{%fk-testimonial-customer_image_id}}',
        '{{%testimonial}}'
      );

      // make the column nullable
      $this->alterColumn('{{%testimonial}}', 'customer_image_id', $this->integer());

      // add foreign key for table `{{%file}}`
      $this->addForeignKey(
        '{{%fk-testimonial-customer_image_id}}',
        '{{%testimonial}}',
        'customer_image_id',
        '{{%file}}',
        'id',
        'SET NULL'
      );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      // drops foreign key for table `{{%file}}`
      $this->dropForeignKey(
        '{{%fk-testimonial-customer_image_id}}',
        '{{%testimonial}}'
      );

      $this->alterColumn('{{%testimonial}}', 'customer_image_id', $this->integer()->notNull());

      // add foreign key for table `{{%file}}`
      $this->addForeignKey(
        '{{%fk-testimonial-customer_image_id}}',
        '{{%testimonial}}',
        'customer_image_id',
        '{{%file}}',
        'id',
        'CASCADE'
      );
    }
}
