<?php
class Product extends BaseModel{
    // trong bản products có thuộc tính status:
    // giá trị 0: ngừng kinh doanh
    // giá trị 1: đang kinh doanh

    // lấy ra tất cả bản ghi
    public function all(){
        // câu lệnh sql
        $sql = "SELECT * FROM products";
        // chuẩn bị thực thi
        $stmt = $this->conn->prepare($sql);
        // thực thi
        $stmt->execute();
        //trả về dữ liệu lấy được
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    // thêm mới sản phẩm
    public function create($data){
        $sql = "INSERT INTO products (name, image, price, quantity, description, category_id) VALUES (:name, :image, :price, :quantity, :description, :category_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
}