<?php


class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function insertCart($param = null, $table = 'Cart')
    {
        if ($this->db->con != null) {
            if ($param != null) {
                $column = implode(',', array_keys($param));
                $value = implode(',', array_values($param));
                $query = sprintf("INSERT INTO %s (%s) VALUE (%s) ", $table, $column, $value);
                $insert = $this->db->con->query($query);
                return $insert;
            }
        }
    }

    public function addToCart($user_id, $item_id)
    {
        if (isset($user_id) && isset($item_id)) {
            $param = array(
                'user_id' => $user_id,
                'item_id' => $item_id
            );
        }
        $result = $this->insertCart($param);
        if ($result) {
            header("Location:cart.php");
        }
    }

    public function getSum($atr)
    {
        if (isset($atr)) {
            $sum = 0;
            foreach ($atr as $it) {
                $sum += floatval($it[0]);
            }
            return sprintf('%.2f', $sum);
//            return $sum;
        }
    }

    public function deleteCart($item_id = null, $table = "cart")
    {
        if (isset($item_id)) {
            $delete = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if ($delete) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $delete;
        }
    }

    public function getCartId($cartArray, $key = 'item_id')
    {
        if(isset($cartArray)){
            $cart_id = array_map(function($value) use ($key){
                return $value[$key];
            },$cartArray);
            return $cart_id;
        }
    }
}