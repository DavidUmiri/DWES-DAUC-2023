package es.bonillo.esperanza.paises.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import es.bonillo.esperanza.paises.model.Pais;
import es.bonillo.esperanza.paises.service.PaisesService;

@RestController
@RequestMapping("paises")
public class PaisesController {

	@Autowired
	private PaisesService service;

	@GetMapping
	public ResponseEntity<?> getAll() {
		ResponseEntity<?> response;

		try {
			List<Pais> todosLosPaises = service.getAll();

			if (todosLosPaises.size() > 0) {
				response = new ResponseEntity<List<Pais>>(todosLosPaises, HttpStatus.OK);
			} else {
				response = new ResponseEntity<Void>(HttpStatus.NOT_FOUND);
			}
		} catch (Exception e) {
			response = new ResponseEntity<Void>(HttpStatus.INTERNAL_SERVER_ERROR);
		}

		return response;
	}

	@GetMapping("{id}")
	public ResponseEntity<?> getPais(@PathVariable String id) {
		ResponseEntity<?> response;

		try {
			Pais pais = service.getPais(id); // el metodo del servicio esta sin terminar.
			if (pais != null) {
				response = new ResponseEntity<Pais>(pais, HttpStatus.OK);
			} else {
				response = new ResponseEntity<Void>(HttpStatus.NOT_FOUND);
			}
		} catch (Exception e) {
			response = new ResponseEntity<Void>(HttpStatus.INTERNAL_SERVER_ERROR);
		}
		return response;
	}

	@PostMapping
	public ResponseEntity<?> save(@RequestBody Pais pais) {
		// implementar POST, implementando en el servicio el metodo save e
		// invocandolo desde aqui.
		return null;
	}

	@PutMapping("{id}")
	public ResponseEntity<?> update(@RequestBody Pais pais) {
		// implementar PUT, llamando al metodo existente del servicio.
		return null;
	}

	@DeleteMapping("{id}")
	public ResponseEntity<?> delete(@PathVariable String id) {
		// implementar DELETE, llamando al metodo existente del servicio.
		return null;
	}
}
