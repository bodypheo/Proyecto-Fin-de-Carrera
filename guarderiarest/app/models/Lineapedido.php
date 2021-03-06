<?php
 
use Phalcon\Mvc\Model,
    Phalcon\Mvc\Model\Message,
    Phalcon\Mvc\Model\Validator\InclusionIn,
    Phalcon\Mvc\Model\Validator\Uniqueness;
 


class Lineapedido extends Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $articulo;

    /**
     *
     * @var integer
     */
    public $cantidad;

    /**
     *
     * @var integer
     */
    public $precio;

    /**
     *
     * @var integer
     */
    public $pedido;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('articulo', 'Articulo', 'id', array('alias' => 'Articulo'));
        $this->belongsTo('pedido', 'Pedido', 'id', array('alias' => 'Pedido'));
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'articulo' => 'articulo', 
            'cantidad' => 'cantidad', 
            'precio' => 'precio', 
            'pedido' => 'pedido'
        );
    }

}
