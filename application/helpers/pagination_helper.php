<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function paginationConfig(){

    $config['total_rows'] = $this->Producto_Model->countProductos();
    $config['base_url'] = base_url('CPanel/Producto/pagina');
    $config['per_page'] = 10;
    $config['uri_segment'] = 4;
    $config['num_links'] = 20;
  $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
  $config['full_tag_close'] = '</ul>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';
  $config['cur_tag_open'] = '<li class="active"><span>';
  $config['cur_tag_close'] = '<span></span></span></li>';
  $config['prev_tag_open'] = '<li>';
  $config['prev_tag_close'] = '</li>';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['first_link'] = '«';
  $config['prev_link'] = '‹';
  $config['last_link'] = '»';
  $config['next_link'] = '›';
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';

  return $config;
}
