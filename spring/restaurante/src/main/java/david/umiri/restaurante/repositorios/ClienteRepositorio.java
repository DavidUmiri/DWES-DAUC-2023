package david.umiri.restaurante.repositorios;

import org.springframework.data.jpa.repository.JpaRepository;

import david.umiri.restaurante.entidades.Cliente;

public interface ClienteRepositorio extends JpaRepository<Cliente, Long> {
}
