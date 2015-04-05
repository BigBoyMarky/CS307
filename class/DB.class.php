<?php
/**
 * Author: jay
 * Date: 2/25/15
 * Time: 6:38 PM
 */

class DB {

    // credentials to connect to the database
    protected $db_name = "mippsy";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $db_host = "localhost";
    protected $conn;

    /*
     * @param none    @return true if connected
     * Open a connection to the database. Must call this function before using the class!
     */
    public function connect() {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->conn->connect_error)
            die("Connection failed: ".$this->conn->connect_error);
        return true;
    }

    /*
     * @param mysql row set, boolean    @return array where keys are the column names
     * if singleRow is true, return a single row instead of an array of rows.
     * return null if not found.
     */
    public function processRow($rowset, $singleRow=false) {
        $resultArray = array();
        while ($row = $rowset->fetch_assoc()) {
            array_push($resultArray, $row);
        }
        if ($singleRow === true)
            return $resultArray[0];
        return $resultArray;
    }

    /*
     *  @param table, criteria  @return array of row or single row
     *  Obtain the data which satisfy the where criteria.
     *  $where should be in single quote
     *  return null if not found
     */
    public function select($table, $where, $singleRow=false) {

        $sql = "SELECT * FROM $table WHERE $where";
        $result = $this->conn->query($sql);
        if (!$result) return false;
        if (mysqli_num_rows($result) == 1 && $singleRow) {
            return $this->processRow($result, true);
        } else
            return $this->processRow($result);
    }

    /*
     *  @param data, table, where clause    @return true if success
     *  Update the data in the table. data contains the column name and values to be inserted.
     *  $where should be in single quote
     */
    public function update($data, $table, $where) {
        foreach($data as $column => $value) {
            $sql = "UPDATE $table SET $column = $value WHERE $where";
            if (!$this->conn->query($sql)) {
                echo "Error: ". $sql. "<br>". $this->conn->error;
            }
        }
        return true;
    }

    /*
     *  @param data, table   @return id after insertion
     *  insert data into table database. data contains column name and values to be inserted.
     */
    public function insert($data, $table) {
        $columns = "";
        $values = "";
        foreach($data as $column => $value) {
            $columns .= ($columns == "") ? "" : ",";
            $columns .= $column;
            $values .= ($values == "") ? "" : ",";
            $values .= $value;
        }
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        if (!$this->conn->query($sql)) {
            echo "Error: ". $sql. "<br>". $this->conn->error;
        }
        return $this->conn->insert_id;
    }

    /*
     * @param table, int    @return true if success
     * delete a row in the database using the primary key.
     */
    public function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id = '$id'";
        if (!$this->conn->query($sql)) {
            echo "Error: ". $sql,"<br>".$this->conn->error;
        }
        return true;
    }

    /*
     * @param none   @return true if success
     * close the connection to the database.
     */
    public function closeCon() {
        $this->conn->close();
        return true;
    }

}

?>