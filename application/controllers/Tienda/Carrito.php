<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Carrito_Model');
		$this->load->model('Producto_Model');
        $this->load->model('Categoria_Model');
	}

  function index(){

    if($this->session->userdata('client_data'))  {
      $session_data = $this->session->userdata('client_data');
      $data['username'] = $session_data['nombre'];
      $data['apellido'] = $session_data['apellido'];
      $data['session_status'] = true;
    }
    else{
      $data['session_status'] = false;
    }

    $data['Categorias'] = $this->Categoria_Model->getCategorias();
    $data['Productos'] = $this->Producto_Model->getProductos();
    $data['titulo'] = "Mi Carrito";
    $data['carrito'] = $this->checkOut();

    $this->load->view('Tienda/Layout/Header', $data);
    $this->load->view('Tienda/Layout/Nav');
    //$this->load->view('Tienda/Layout/Carrusel');
    $this->load->view('Tienda/Pages/Carrito_Page');
    $this->load->view('Tienda/Layout/Footer');
    $this->load->view('Tienda/Layout/End');
  }

	public function addProducto(){
		if ($this->input->is_ajax_request()) {
			$idCliente = $this->input->post('idCliente');
			$idProducto = $this->input->post('idProducto');
			$cantidad = $this->input->post('cantidad');
			$fecha = date('d:m:Y');
			$data = array(
					'producto_id_Producto' => $idProducto,
					'cliente_id_Cliente' => $idCliente,
					'fecha' => $fecha,
					'cantidad' => $cantidad
				);
			if ($this->Carrito_Model->addItem($data)) {
				echo 1;
			}else{
				echo 2;
			}
		}else{
			echo "Acceso Denegado";
		}
	}

	public function getCarrito(){
		if ($this->input->is_ajax_request()) {
			$carrito = $this->cart->contents();
            $numProductos = $this->cart->total_items();
            $productos = "";
            foreach($carrito as $item){        
            $productos .="<span class='item'>".
                        "<span class='item-left'>".
                            "<span class='item-info'>".
                              "<span>".ucfirst($item['name'])."</span>".
                              "<span>Precio: $".number_format($item['price'],2)."</span>".
                              "<span>Cantidad: ".$item['qty']."</span>".
                            "</span>".
                        "</span>".
                    "</span>".
                    "<div class='dropdown-divider'></div>";
            }
            if($carrito != null){
             $productos .="<li class='divider'></li>".
                      "<li class='text-center'><strong>Total: ".number_format($this->cart->total(), 2). "$</strong></li>".
                      "<div class='dropdown-divider'></div>".
                      "<li class='row'>".
                        "<div class='col-xs-6 col-md-6 col-lg-6'>".
                          "<button type='button' class='btn btn-danger btn-sm btn-block' onclick='vaciarCarrito()'><i class='fa fa-trash'></i> Vaciar</button>".
                        "</div>".
                        "<div class='col-xs-6 col-md-6 col-lg-6'>".
                          "<a href=".base_url('Carrito')." class='btn btn-success btn-sm btn-block' role='button'><i class='fa fa-arrow-right'></i> Detalle</a>".
                        "</div>".
                      "</li>";
            }else{
             $productos .= "<li class='text-center'><strong> Sin Productos </strong></li>";
            }
            $canasta = array('productos' => $productos, 'num_productos' => $numProductos);
            echo json_encode($canasta);
		}else{
			echo "Acceso Denegado";
		}
	}

	public function checkCarrito(){
		if ($this->input->is_ajax_request()) {
			//$idCliente = $this->input->post('idCliente');
			$data = $this->Carrito_Model->checkCarrito();
			$encargo = array();
			$encargo[]=$data;
			echo json_encode($encargo);
		}else{
			echo "Acceso Denegado";
		}
	}

    function agregarProducto(){
        $id = $this->input->post('id_producto');
        $cantidad = $this->input->post('cantidad');

        $producto = $this->Producto_Model->porId($id);
        //$cantidad = 1;
        //obtenemos el contenido del carrito
        $carrito = $this->cart->contents();
 
        foreach ($carrito as $item) {
            //si el id del producto es igual que uno que ya tengamos
            //en la cesta le sumamos uno a la cantidad
            if ($item['id'] == $id) {
                $cantidad += $item['qty'];
                $to_update = $item['rowid'];
                $is_update = true;
            }
        }
        //cogemos los productos en un array para insertarlos en el carrito
        $insert = array(
            'id' => $id,
            'qty' => $cantidad,
            'price' => $producto->precio,
            'name' => $producto->nombre,
            'image' => $producto->imagen,
            'disponible' => true
        );
        //si hay opciones creamos un array con las opciones y lo metemos
        //en el carrito
        if ($producto->opcion) {
            $insert['options'] = array(
            $producto->opcion => $producto->opciones[$this->input->post($producto->opcion)]
            );
        }
        //insertamos al carrito
        if($is_update == true){
            $data = array(
                    'rowid' => $to_update,
                    'qty'   => $cantidad
            );
            $this->cart->update($data);
        }else{
            $this->cart->insert($insert);
        }
        //$this->cart->insert($insert);
        //cogemos la url para redirigir a la página en la que estabamos
        //$uri = $this->input->post('uri');
        //redirigimos mostrando un mensaje con las sesiones flashdata
        //de codeigniter confirmando que hemos agregado el producto
        //$this->session->set_flashdata('agregado', 'El producto fue agregado correctamente');
        //redirect('../catalogo/pagina/'.$uri, 'refresh');
    }

    function eliminarProducto(){
    	$rowid = $this->input->post('id');
        //para eliminar un producto en especifico lo que hacemos es conseguir su id
        //y actualizarlo poniendo qty que es la cantidad a 0
        $producto = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        //después simplemente utilizamos la función update de la librería cart
        //para actualizar el carrito pasando el array a actualizar
        $this->cart->update($producto);
        
        //$this->session->set_flashdata('productoEliminado', 'El producto fue eliminado correctamente');
        //redirect('../catalogo', 'refresh');
    }

    function vaciarCarrito(){
        $this->cart->destroy();
    }

    function checkOut(){
        $carrito = $this->cart->contents();
        foreach ($carrito as $item) {
           $disponiblles = $this->Producto_Model->checharCantidad($item['id']);
           //echo $disponiblles[0]->stock;
            if($disponiblles[0]->stock <= ($item['qty'])){
                $data = array(
                    'rowid' => $item['rowid'],
                    'disponible' => false
                );
                $this->cart->update($data);
            }
        }
        return $carrito;
    }

    public function Compra(){
        $orden = array();
        $carrito = $this->cart->contents();
        foreach($carrito as $prod){
            $producto = array("producto_id_Producto" => $prod['id'], "cantidad" => $prod['qty'], "precio" => $prod['price']);
            array_push($orden, $producto);
            //echo var_dump($prod);
        }
        $data = array(
            'fecha'=>date('Y-m-d'),
            'cliente_id_Cliente'=>$this->session->userdata('client_data')['id']);
        //$id_ticket = $this->Carrito_Model->crearDetalle($data);
        array_push($data, array("orden"=>$orden));
        $response = $this->Carrito_Model->generarOrden($data);
        echo var_dump(json_encode($response));
    }
}

/* End of file Carrito.php */
/* Location: ./application/controllers/Tienda/Carrito.php */