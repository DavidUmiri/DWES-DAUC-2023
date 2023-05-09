package david.umiri.restaurante.modelos;

import java.math.BigDecimal;

public class DetallePedido {

    private Long id;
    private Producto producto;
    private int cantidad;
    private BigDecimal precio;

    public DetallePedido() {
    }

    public DetallePedido(Long id, Producto producto, int cantidad, BigDecimal precio) {
        this.id = id;
        this.producto = producto;
        this.cantidad = cantidad;
        this.precio = precio;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Producto getProducto() {
        return producto;
    }

    public void setProducto(Producto producto) {
        this.producto = producto;
    }

    public int getCantidad() {
        return cantidad;
    }

    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }

    public BigDecimal getPrecio() {
        return precio;
    }

    public void setPrecio(BigDecimal precio) {
        this.precio = precio;
    }

}
