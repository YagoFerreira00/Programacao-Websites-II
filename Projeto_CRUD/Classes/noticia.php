<?php
class Noticia
{
    private $conn;
    private $table_name = "noticias";


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function registrar($idusu, $data, $titulo, $noticia)
    {
        $query = "INSERT INTO " . $this->table_name . " (idusu, data, titulo, noticia) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idusu, $data, $titulo, $noticia]);
        return $stmt;
    }

    public function criar($idusu, $data, $titulo, $noticia)
    {
        return $this->registrar($idusu, $data, $titulo, $noticia);
    }
    public function ler($search = '', $order_by = '') {
        $query = "SELECT n.idnot, u.nome  as usuario, n.titulo, n.noticia, n.data FROM usuario AS u INNER JOIN noticias AS n ON u.id = n.idusu ";   //"SELECT * FROM noticias";
        $conditions = [];
        $params = [];

        if ($search) {
           $conditions[] = "(titulo LIKE :search OR noticia LIKE :search)";
            $params[':search'] = '%' . $search . '%';
        }

        if ($order_by === 'titulo') {
            $query .= " ORDER BY titulo";
        } elseif ($order_by === 'data') {
            $query .= " ORDER BY data";
        }

        if (count($conditions) > 0) {
            $query .= " WHERE " . implode(' AND ', $conditions);
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
    public function lerNotUsu($idusu){
        $query = "SELECT * FROM " . $this->table_name . " WHERE idusu = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idusu]);
        return $stmt;
    }
    public function lerPorId($idnot)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idnot = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idnot]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($idusu, $data, $titulo, $noticia, $idnot)
    {
        $query = "UPDATE " . $this->table_name . " SET idusu = ?, data = ?, titulo = ?, noticia = ? WHERE idnot = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idusu, $data, $titulo, $noticia,$idnot]);
        return $stmt;
    }
    public function deletar($idnot)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE idnot = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idnot]);
        return $stmt;
    }
}