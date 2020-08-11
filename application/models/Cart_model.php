<?php

class Cart_model extends CI_Model
{
    public function insertCart($data)
    {
        $this->db->insert('carts', $data);
        return $this->db;
    }

    public function getCart($user_id)
    {
        $result = $this->db->get_where('carts', ['user_id' => $user_id])->row();
        return $result;
    }


    public function getItemCart($cart_id, $limit = false)
    {
        $this->db->select('*, cart_details.id');
        $this->db->join('products', 'products.id = cart_details.product_id', 'left');
        $this->db->from('cart_details');
        $this->db->where('cart_details.cart_id', $cart_id);
        if ($limit) {
            $result = $this->db->limit($limit)->get()->result();
            return $result;
        }
        $result = $this->db->get()->result();
        return $result;
    }

    public function checkItemCart($cart_id, $product_id)
    {
        $result = $this->db->get_where('cart_details', ['cart_id' => $cart_id, 'product_id' => $product_id])->row();
        return $result;
    }

    public function insertItemToCart($data)
    {
        $item = $this->checkItemCart($data['cart_id'], $data['product_id']);
        if ($item->product_id == $data['product_id']) {
            $this->db->set('qty', $item->qty + $data['qty']);
            $this->db->where('id', $item->id);
            return $this->db->update('cart_details');
        }
        return $this->db->insert('cart_details', $data);
    }
    public function delete($id)
    {
        $this->db->delete('cart_details', ['id' => $id]);
    }
}
