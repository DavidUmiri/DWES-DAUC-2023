package david.umiri.restaurante.modelos;

import java.math.BigDecimal;

public class Producto {

    private Long id;
    private String nombre;
    private String descripcion;
    private BigDecimal precio;

    public Producto() {
    }

    public Producto(Long id, String nombre, String descripcion, BigDecimal precio) {
        this.id = id;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.precio = precio;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public BigDecimal getPrecio() {
        return precio;
    }

    public void setPrecio(BigDecimal precio) {
        this.precio = precio;
    };

}
