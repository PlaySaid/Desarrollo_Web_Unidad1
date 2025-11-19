package com.jcaa.hexagonal.domain.entities;

import jakarta.persistence.*;
import java.time.LocalDate;

@Entity
@Table(name = "estudiante")
public class Estudiante {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private String nombre;
    private String apellido;
    private LocalDate fechaNacimiento;
    private Integer semestre;
    private String email;
    private String genero;
    private String telefono;
    private String programa;
    private String universidad;

    // Constructor vacío
    public Estudiante() {}

    // Constructor con argumentos
    public Estudiante(Integer id, String nombre, String apellido, LocalDate fechaNacimiento,
                      Integer semestre, String email, String genero,
                      String telefono, String programa, String universidad) {
        this.id = id;
        this.nombre = nombre;
        this.apellido = apellido;
        this.fechaNacimiento = fechaNacimiento;
        this.semestre = semestre;
        this.email = email;
        this.genero = genero;
        this.telefono = telefono;
        this.programa = programa;
        this.universidad = universidad;
    }

    // Getters & setters
    // (Te los puedo generar todos automáticamente si quieres)
}
