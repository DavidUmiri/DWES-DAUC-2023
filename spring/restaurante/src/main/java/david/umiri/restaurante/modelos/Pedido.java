package david.umiri.restaurante.modelos;

import java.sql.Date;
import java.util.ArrayList;
import java.util.List;

public class Pedido {

    private Long id;
    private Date fecha;
    private Mesa mesa;
    private Cliente cliente;
    private List<DetallePedido> detalles;

    public Pedido() {
        detalles = new ArrayList<>();
    }

    public Pedido(Long id, Date fecha, Mesa mesa, Cliente cliente, List<DetallePedido> detalles) {
        this.id = id;
        this.fecha = fecha;
        this.mesa = mesa;
        this.cliente = cliente;
        this.detalles = detalles;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Date getFecha() {
        return fecha;
    }

    public void setFecha(Date fecha) {
        this.fecha = fecha;
    }

    public Mesa getMesa() {
        return mesa;
    }

    public void setMesa(Mesa mesa) {
        this.mesa = mesa;
    }

    public Cliente getCliente() {
        return cliente;
    }

    public void setCliente(Cliente cliente) {
        this.cliente = cliente;
    }

    public List<DetallePedido> getDetalles() {
        return detalles;
    }

    public void setDetalles(List<DetallePedido> detalles) {
        this.detalles = detalles;
    }

    public void agregarDetalle(DetallePedido detalle) {
        detalles.add(detalle);
    }

}
