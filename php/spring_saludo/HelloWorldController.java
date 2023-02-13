package com.example.demo;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController 
public class HelloWorldController {
    @GetMapping("/Saludo")
    public String saludos(@RequestParam(required = false, defaultValue = "") String nombre) {
        return "".equals(nombre) ? "GET Bienvenida: No me has pasado tu nombre" : "GET Bienvendida: " + nombre;
    }
    
    @PostMapping("/SaludoPost")
    public String envioSaludos(@RequestBody String nombre) {
        return "".equals(nombre) ? "POST Bienvenida no me has pasado tu nombre" : "POST Bienvenida: " + nombre;
    }
    
    
    @PostMapping("/SaludoJson")
    public String envioJson(@RequestBody Contacto persona) {
        return "".equals(persona.getNombre()) ? "BienvenidaJSON: " : "BienvenidaJSON: " + persona.getNombre() + " " + persona.getApellido();
        
    }

    @GetMapping("/SaludoJson2")
    public Contacto envioJson2(@RequestParam(required = false, defaultValue = "") String nombre) {
        return new Contacto("Hola Mundo",nombre);
    }
    
    @GetMapping("/SaludoJson3")
    public Contacto envioJson3() {
        //return "".equals(persona.getNombre()) ? "BienvenidaJSON: " : "BienvenidaJSON: " + persona.getNombre() + " " + persona.getApellido();
        return new Contacto("Hola","Mundo");
    }
    
    
    @PostMapping("/SaludoJson2")
    public Contacto envioJson2(@RequestBody Contacto persona) {
        return new Contacto("Hola Mundo",persona.getNombre() + "," + persona.getApellido());
    }
    
    @PostMapping("/SaludoJson3")
    public Contacto envioJson3(@RequestBody String nombre) {
        //return "".equals(persona.getNombre()) ? "BienvenidaJSON: " : "BienvenidaJSON: " + persona.getNombre() + " " + persona.getApellido();
        return new Contacto("Hola","Mundo");
    }
    
   
    
} // class
