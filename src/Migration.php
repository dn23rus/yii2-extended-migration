<?php

namespace dmbur\migration;

class Migration extends \yii\db\Migration
{
    protected $unqPrefix = 'UNQ';
    protected $idxPrefix = 'IDX';
    protected $fkPrefix = 'FK';

    /**
     * @param string          $table
     * @param string|string[] $columns
     * @param bool            $unique
     *
     * @return string
     */
    public function getIndexName($table, $columns, $unique = false)
    {
        return sprintf(
            '%s_%s', $unique ? $this->unqPrefix : $this->idxPrefix,
            strtoupper(substr(md5($table . implode('', (array) $columns)), 0, 50))
        );
    }

    /**
     * @param string       $table
     * @param string|array $columns
     * @param string       $refTable
     * @param string|array $refColumns
     *
     * @return string
     */
    public function getFkName($table, $columns, $refTable, $refColumns)
    {
        return substr(strtoupper(sprintf(
            '%s_%s_%s_%s',
            $this->fkPrefix,
            str_replace(['{', '}', '%'], '', $table),
            str_replace(['{', '}', '%'], '', $refTable),
            md5($table . $refTable . implode('', (array) $columns) . implode('', (array) $refColumns))
        )), 0, 64);
    }

    /**
     * @return null|string
     */
    protected function getTableOptions()
    {
        switch ($this->db->driverName) {
            case 'mysql':
                return 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
            default:
                return null;
        }
    }
}
