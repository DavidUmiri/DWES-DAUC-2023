package es.bonillo.esperanza.paises.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import es.bonillo.esperanza.paises.entity.PaisEntity;

public interface PaisRepository extends JpaRepository<PaisEntity, String> {

}

