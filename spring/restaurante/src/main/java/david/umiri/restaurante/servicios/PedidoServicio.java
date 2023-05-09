package david.umiri.restaurante.servicios;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import david.umiri.restaurante.entidades.Pedido;
import david.umiri.restaurante.repositorios.PedidoRepositorio;

@Service
public class PedidoServicio {

    @Autowired
    private PedidoRepositorio pedidoRepositorio;

    public List<Pedido> listarPedidos() {
        return pedidoRepositorio.findAll();
    }

    public Pedido buscarPedidoPorId(Long id) {
        Optional<Pedido> optionalPedido = pedidoRepositorio.findById(id);
        if (optionalPedido.isPresent()) {
            return optionalPedido.get();
        } else {
            throw new IllegalArgumentException("El pedido con id " + id + " no existe");
        }
    }

    public Pedido crearPedido(Pedido pedido) {
        return pedidoRepositorio.save(pedido);
    }

    public Pedido actualizarPedido(Long id, Pedido pedidoActualizado) {
        Pedido pedido = buscarPedidoPorId(id);
        pedido.setCliente(pedidoActualizado.getCliente());
        pedido.setMesa(pedidoActualizado.getMesa());
        pedido.setDetalles(pedidoActualizado.getDetalles());
        pedido.setFecha(pedidoActualizado.getFecha());
        return pedidoRepositorio.save(pedido);
    }

    public void borrarPedido(Long id) {
        Pedido pedido = buscarPedidoPorId(id);
        pedidoRepositorio.delete(pedido);
    }
}
