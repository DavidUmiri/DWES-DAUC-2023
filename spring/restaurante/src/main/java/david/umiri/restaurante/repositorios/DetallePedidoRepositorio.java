package david.umiri.restaurante.repositorios;

import org.springframework.data.jpa.repository.JpaRepository;

import david.umiri.restaurante.entidades.DetallePedido;

public interface DetallePedidoRepositorio extends JpaRepository<DetallePedido, Long> {

}
