package david.umiri.restaurante.repositorios;

import org.springframework.data.jpa.repository.JpaRepository;

import david.umiri.restaurante.entidades.Mesa;

public interface ProductoRepositorio extends JpaRepository<Mesa, Long> {

}
