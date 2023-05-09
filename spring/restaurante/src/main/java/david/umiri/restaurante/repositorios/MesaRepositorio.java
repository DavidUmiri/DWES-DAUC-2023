package david.umiri.restaurante.repositorios;

import org.springframework.data.jpa.repository.JpaRepository;

import david.umiri.restaurante.entidades.Producto;

public interface MesaRepositorio extends JpaRepository<Producto, Long> {

}
