<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //

    public $items=null;
    
    public $totalQty=0;
    public $totalPrice=0;
    public function __construct($oldCart)
    {
        if($oldCart){

            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;
            $this->totalPrice=$oldCart->totalPrice;
        }
        else
        {
            $this->items=null;
        }
    }



    public function addProduct($item,$id)
    {
    
    
        $store=['qty'=>0,'price'=>$item->rate,'item'=>$item];
        if($this->items)
        {
           
            if(array_key_exists($id, $this->items ))
            {
                   $store= $this->items[$id];
            }
          
        }
        $store['qty']++;
        $store['price']=$item->rate * $store['qty']; 
        $this->items[$id]=$store;
        $this->totalQty++;
        $this->totalPrice+=$item->rate;
        
    }

            public function removeProduct($product,$id)
        {
            if($this->items)
            {
                if(array_key_exists($id, $this->items ))
                {
                       $removeProduct= $this->items[$id];
                       $this->totalQty-=$removeProduct['qty'];
                       $this->totalPrice-=$removeProduct['price'];
                       array_forget($this->items,$id);
                }
            }

        }

        public function addCart($item,$id)
        {
            $store=['qty'=>0,'price'=>$item->rate,'item'=>$item];
            if($this->items)
            {
               
                if(array_key_exists($id, $this->items ))
                {
                       $store= $this->items[$id];
                }
              
            }
            $store['qty']++;
            $store['price']=$item->rate * $store['qty']; 
            $this->items[$id]=$store;
            $this->totalQty;
            $this->totalPrice+=$item->rate;
        }
        public function minusCart($item,$id)
        {
            
            $store=['qty'=>0,'price'=>$item->rate,'item'=>$item];
        
            if($this->items)
            {
               
                if(array_key_exists($id, $this->items ))
                {
                       $store= $this->items[$id];
                }
              
            }
            $store['qty']--;
            if($store['qty'] >= 1)
            {
            $store['price']=$item->rate * $store['qty']; 
            $this->items[$id]=$store;
            $this->totalQty;
            
            $this->totalPrice+=$item->rate;
            }
            else
            {
                $store['qty']=1;
            }
        }

}
