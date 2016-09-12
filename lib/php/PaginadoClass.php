<?php


class Paginado {

    private $datos;
    private $offset;
    private $porPagina = 10;
    private $paginaActual;
    private $cantidad;
    private $url;
    public $count;

    function __construct($datos, $paginaActual = 1, $url, $porPagina=10) {

        $this->setPorPagina($porPagina);
        
        $this->setCantidad(count($datos));

        $this->setUrl($url);

        $this->setPaginaActual($paginaActual);
        
        $offset = ($this->getPaginaActual() * $this->getPorPagina()) - $this->getPorPagina();

        $this->count = $offset + 1;

        $datos = array_slice(
                $datos, $offset, $this->getPorPagina(), true
        );

        $this->setDatos($datos);
    }

    public function render() {
        $render = "";
        $cantidadPaginas = $this->getCantidad() / $this->getPorPagina();

        if ($this->getCantidad() % $this->getPorPagina() != 0) {
            $cantidadPaginas = $cantidadPaginas + 1;
        }

        if ($cantidadPaginas > 1) {
            $render = '<div class = "row">
            <div class = "center">
            <!--<div class = "dataTables_info" id = "data-table-simple_info" role = "status" aria-live = "polite">Showing 1 to 10 of 57 entries</div> -->

            <ul class = "pagination">
            ';

            if ($this->getPaginaActual() == 1) {
                $render .= '<li class="disabled"><a href = "#"><i class = "mdi-navigation-chevron-left"></i></a></li>';
            } else {
                $render .= '<li><a href = "' . $this->getUrl() . '?pagina=' . ($this->getPaginaActual() - 1) . '"><i class = "mdi-navigation-chevron-left"></i></a></li>';
            }

            for ($i = 1; $i <= $cantidadPaginas; $i++) {
                if ($i == $this->getPaginaActual()) {
                    $render .= '<li class = "active"><a href = "' . $this->getUrl() . '?pagina=' . $i . '">' . $i . '</a></li>';
                } else {
                    $render .= '<li class = "waves-effect"><a href = "' . $this->getUrl() . '?pagina=' . $i . '">' . $i . '</a></li>';
                }
            }

            if($this->getPaginaActual() == (int)$cantidadPaginas) {
                $render .= '<li class = "disabled"><a href = "#"><i class = "mdi-navigation-chevron-right"></i></a></li>';
            } else {
                $render .= '<li class = "waves-effect"><a href = "' . $this->getUrl() . '?pagina=' . ($this->getPaginaActual() + 1) . '"><i class = "mdi-navigation-chevron-right"></i></a></li>';
            }
            $render .= '</ul>
                </div>
            </div>';
        }

        echo $render;
    }

    function getUrl() {
        return $this->url;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function getPaginaActual() {
        return $this->paginaActual;
    }

    function setPaginaActual($paginaActual) {
        $this->paginaActual = $paginaActual;
    }

    function getDatos() {
        return $this->datos;
    }

    function getOffset() {
        return $this->offset;
    }

    function getPorPagina() {
        return $this->porPagina;
    }

    function setDatos($datos) {
        $this->datos = $datos;
    }

    function setOffset($offset) {
        $this->offset = $offset;
    }

    function setPorPagina($porPagina) {
        $this->porPagina = $porPagina;
    }

    function getCount() {
        return $this->count;
    }

    function setCount($count) {
        $this->count = $count;
    }

}
