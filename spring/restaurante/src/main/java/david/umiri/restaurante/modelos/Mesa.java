package david.umiri.restaurante.modelos;

public class Mesa {

    private Long id;
    private int numero;
    private int capacidad;

    public Mesa() {
    }

    public Mesa(Long id, int numero, int capacidad) {
        this.id = id;
        this.numero = numero;
        this.capacidad = capacidad;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public int getNumero() {
        return numero;
    }

    public void setNumero(int numero) {
        this.numero = numero;
    }

    public int getCapacidad() {
        return capacidad;
    }

    public void setCapacidad(int capacidad) {
        this.capacidad = capacidad;
    }

}
