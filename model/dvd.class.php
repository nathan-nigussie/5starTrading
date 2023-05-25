<?php
include_once "../core/database.php";
include_once "../controller/interface.php";
include_once "../config/constants.php";
include_once "../controller/post.php";

class dvd extends DbConnector implements tasks
{
    public function __construct($sku, $name, $price, $size, $fileName)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
        $this->fileName = $fileName;
    }
    public function insert()
    {
        $pre_stmt = $this->con->prepare(
            "INSERT INTO `dvd`(`sku`, `name`, `price`, `size`,`file_name`) VALUES (?,?,?,?,?)"
        );
        $pre_stmt->bind_param(
            "ssiis",
            $this->sku,
            $this->name,
            $this->price,
            $this->size,
            $this->fileName,

        );
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            header(
                  "Location:http://localhost/5StarTrading/view/view.php"
            );
        } else {
            error_reporting(E_ERROR | E_PARSE);
        }
    }
    public function getDvd()
    {
        $con = $this->setConnection();
        $pre_stmt = $this->con->prepare("SELECT id,sku,price,name,size,file_name FROM dvd");
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            error_reporting(E_ERROR | E_PARSE);
        }
    }
    public function deleteRecord()
    {
        $con = new mysqli(HOST, USER, PASS, DB);
        if (isset($_POST["product-delete-id"])) {
            $all_id = $_POST["product-delete-id"];
            $extract_id = implode(",", $all_id);
            $query = "DELETE FROM dvd WHERE id  IN($extract_id)";
            $query_run = mysqli_query($con, $query);
            if ($query_run) {
                // $_SESSION["status"] =
                //     " <div id=\"delete-success-msg\"   class=\"alert alert-success\" role=\"alert\"><strong>Data Deleted Successfully</strong></div>";
                header(
  "Location:http://localhost/5StarTrading/view/view.php"
                );
            } else {
                // $_SESSION["status"] =
                //     " <div id=\"delete-note-msg\" class=\"alert alert-success\" role=\"alert\"><strong>Please select a product to handle delete operation!</strong></div>";
                header(

                      "Location:http://localhost/5StarTrading/view/view.php"
                );
                exit();
            }
        }
    }
}