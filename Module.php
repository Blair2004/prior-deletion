<?php
namespace PriorDepletion;

use Tendoo_Module;
use PriorDepletion\Inc\Actions;
use PriorDepletion\Inc\Filters;

class Module extends Tendoo_Module
{
    public function __construct()
    {
        parent::__construct();

        $this->actions      =   new Actions;
        $this->filters      =   new Filters;

        $this->events->add_filter( 'raw_material_deplete_override', '__return_true' );
        $this->events->add_filter( 'raw_material_override_materials_depletion', '__return_true' );
        // $this->events->add_action( 'after_order_product_created', [ $this->actions, 'consume_material' ], 10, 4 );
        $this->events->add_filter( 'after_order_item_saved', [ $this->filters, 'consume_material_after_adding' ], 10, 4 );
    }
}

new Module;