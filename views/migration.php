<?php
echo '<?php' . PHP_EOL;
?>

use yii\db\Schema;
use dmbur\migration\ExtendedMigration;

/**
 * {@inheritdoc}
 */
class <?= $className ?> extends ExtendedMigration
{
    protected $table = '{{%...}}';

    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable($this->table, [
            // ...
        ], $this->getTableOptions());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable($this->table);
    }
}
