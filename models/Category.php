<?php

class Category extends BaseModel
{
    // lấy tất cả danh mục
    public function list()
    {
        $sql = "SELECT * FROM categories WHERE soft_delete = 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    // thêm 1 bản ghi
    public function create($data)
    {
        $sql = "INSERT INTO categories (cate_name, type) VALUES (:cate_name, :type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // cập nhật
    public function update($id, $data)
    {
        $sql = "UPDATE categories SET cate_name = :cate_name, type=:type WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        // thêm vào mảng data
        $data['id'] = $id;
        $stmt->execute($data);
    }

    // xóa bản ghi (không xóa khỏi database)
    public function delete($id)
    {
        // chuyển trạng thái của soft_delete từ 0->1
        $sql = "UPDATE categories SET soft_delete = 1 WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // chi tiết 1 bản ghi
    public function show($id)
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
