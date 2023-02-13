package es.bonillo.esperanza.paises.service;

import java.util.List;
import java.util.stream.Collectors;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.bind.annotation.PathVariable;

import es.bonillo.esperanza.paises.entity.PaisEntity;
import es.bonillo.esperanza.paises.model.Pais;
import es.bonillo.esperanza.paises.repository.PaisRepository;

@Service
public class PaisesService {
	
	@Autowired
	private PaisRepository repository;
	

	public List<Pais> getAll() {
		List<Pais> paises = null;
		
		List<PaisEntity> paisesBBDD = repository.findAll();
		if(paisesBBDD.size() > 0) {
			paises = paisesBBDD.stream()
					.map(PaisesService::mapToPais)
					.collect(Collectors.toList());
			
		} 
		return paises;
	}
	
	public Pais getPais(String id) {
		// TODO obtener la entidad con el id proporcionado y devolverla, transformandola en lo que espera el controlador.
		// utiliza findById. Con getById puedes tener problemas.
		return null;
	}
	
	// TODO implementar metodo save, para llamarlo desde el POST del controlador
	
	
	public boolean update(String id, Pais pais){
		boolean result = false;

		if(id != null && (pais.getId() == null || id.equals(pais.getId())) && repository.existsById(id)) {
			repository.save(mapToPaisEntity(pais));
			result = true;
		}

		return result;
	}
	
	public boolean delete(@PathVariable String id){
		boolean result = false;
		
		if(id != null && repository.existsById(id)) {
			repository.deleteById(id);
			result = true;
		}

		return result;
	}
	
	
	
	private static Pais mapToPais(PaisEntity entity) {
		Pais pais = new Pais();
		pais.setId(entity.getId());
		pais.setNombre(entity.getNombre());
		pais.setDescripcion(entity.getDescripcion());
		pais.setRutaFoto(entity.getRutaFoto());
		return pais;
	}
	
	private static PaisEntity mapToPaisEntity(Pais pais) {
		PaisEntity paisEntity = new PaisEntity();
		paisEntity.setId(pais.getId());
		paisEntity.setNombre(pais.getNombre());
		paisEntity.setDescripcion(pais.getDescripcion());
		paisEntity.setRutaFoto(pais.getRutaFoto());
		return paisEntity;
	}
}
