<?php
class Pedido {
    private string $id;
    private string $cliente;
    private array $productos;
    private DateTime $fecha;

    public function __construct(string $cliente, array $productos) {
        date_default_timezone_set('Europe/Madrid'); // Por si el servidor no tiene zona horaria definida
        $this->id = uniqid();
        $this->cliente = $cliente;
        $this->productos = $productos;
        $this->fecha = new DateTime();
    }

    public function calcularTotal(): float {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto['precio'];
        }
        return $total;
    }

    public function mostrarPedido(): string {
        $html = "<h2>Pedido: {$this->id}</h2>";
        $html .= "<p><strong>Cliente:</strong> {$this->cliente}</p>";
        $html .= "<p><strong>Fecha:</strong> " . $this->fecha->format('Y-m-d H:i') . "</p>";
        $html .= "<h3>Productos:</h3><ul>";
        foreach ($this->productos as $producto) {
            $html .= "<li>{$producto['nombre']} - " . number_format($producto['precio'], 2) . "€</li>";
        }
        $html .= "</ul>";
        $html .= "<p><strong>Total:</strong> " . number_format($this->calcularTotal(), 2) . "€</p>";
        return $html;
    }
}