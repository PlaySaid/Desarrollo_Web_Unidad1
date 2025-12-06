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


    // ----- Getters -----

    public Integer getId() {
        return id;
    }

    public String getNombre() {
        return nombre;
    }

    public String getApellido() {
        return apellido;
    }

    public LocalDate getFechaNacimiento() {
        return fechaNacimiento;
    }

    public Integer getSemestre() {
        return semestre;
    }

    public String getEmail() {
        return email;
    }

    public String getGenero() {
        return genero;
    }

    public String getTelefono() {
        return telefono;
    }

    public String getPrograma() {
        return programa;
    }

    public String getUniversidad() {
        return universidad;
    }


    // ----- Setters. -----

    public void setId(Integer id) {
        this.id = id;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public void setApellido(String apellido) {
        this.apellido = apellido;
    }

    public void setFechaNacimiento(LocalDate fechaNacimiento) {
        this.fechaNacimiento = fechaNacimiento;
    }

    public void setSemestre(Integer semestre) {
        this.semestre = semestre;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

    public void setPrograma(String programa) {
        this.programa = programa;
    }

    public void setUniversidad(String universidad) {
        this.universidad = universidad;
    }}
