<?php

class MyPDO extends PDO
{
    public function __construct($file = 'settings.ini')
    {
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');

        $dns = $settings['database']['driver'] .
            ':host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];
        parent::__construct($dns, $settings['database']['username'], $settings['database']['password'],array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
    }

    public function runQuery( $sql ) {
        try {
            $count = $this->exec($sql) or print_r($this->errorInfo());
        } catch(PDOException $e) {
            echo __LINE__.$e->getMessage();
        }
        return $count;
    }

    public function addFoodByClass($food, $table)
    {
        $query = "INSERT INTO " . strtolower($table) . " (food) VALUES (?)";
        if ($this->prepare($query)->execute([$food])) {
            return true;
        } else return false;
    }

    public function getMenuByClass($table)
    {
        $query = "SELECT food FROM " . strtolower($table);
        $stmt = $this->query($query)->fetchAll(PDO::FETCH_COLUMN);
        return $stmt;
    }
}
?>
