<?php

class User_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('users', $data);
        return $this->db;
    }

    public function getUser($where = false, $limit = false)
    {
        if ($where) {
            return $this->db->get_where('users', [$where => $limit])->row();
        }

        $this->db->select('*, users.id');
        $this->db->join('roles', 'roles.id = users.role_id', 'left');
        $this->db->from('users');
        return $this->db->get()->result();
    }

    public function getRole()
    {
        return $this->db->get('roles')->result();
    }

    public function delete($id)
    {
        $this->db->delete('users', ['id' => $id]);
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data);
    }

    public function insertCart($data)
    {
        $this->db->insert('carts', $data);
    }

    public function getCart($user_id)
    {
        return $this->db->get_where('carts', ['user_id' => $user_id])->row();
    }

    public function getItemCart($cart_id, $limit = false)
    {
        $this->db->select('*, cart_details.id');
        $this->db->join('products', 'products.id = cart_details.product_id', 'left');
        $this->db->from('cart_details');
        $this->db->where('cart_details.cart_id', $cart_id);
        if ($limit) {
            return $this->db->limit($limit)->get()->result();
        }
        return $this->db->get()->result();
    }

    public function checkItemCart($cart_id, $product_id)
    {
        return $this->db->get_where('cart_details', ['cart_id' => $cart_id, 'product_id' => $product_id])->row();
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
}
