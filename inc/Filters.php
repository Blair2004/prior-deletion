<?php
namespace PriorDepletion\Inc;

use Tendoo_Module;

class Filters extends Tendoo_Module
{
    public function __construct()
    {
        parent::__construct();
    }

    public function consume_material_after_adding( $order_product_id, $data, $order, $item )
    {
        $this->load->module_model( 'nexo', 'NexoItems', 'item_model' );

        $recipe_id          =   $item[ 'REF_RECIPE' ];
        $material           =   new Material;
        $result             =   $material->depleteMaterialsFromRecipe( $recipe_id, floatval( $item[ 'QTE_ADDED' ] ), $item[ 'ID' ], $order_product_id );
    }
}