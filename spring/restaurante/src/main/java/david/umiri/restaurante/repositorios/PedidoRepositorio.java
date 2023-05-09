package david.umiri.restaurante.repositorios;

import org.springframework.data.jpa.repository.JpaRepository;

import david.umiri.restaurante.entidades.Pedido;

public interface PedidoRepositorio extends JpaRepository<Pedido, Long> {

}
