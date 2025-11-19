package com.jcaa.hexagonal.app.controllers;

import com.jcaa.hexagonal.app.ports.in.EstudianteServicePort;
import com.jcaa.hexagonal.domain.entities.Estudiante;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/estudiante")
public class EstudianteController {

    private final EstudianteServicePort service;

    public EstudianteController(EstudianteServicePort service) {
        this.service = service;
    }

    @PostMapping
    public Estudiante crear(@RequestBody Estudiante estudiante) {
        return service.crear(estudiante);
    }

    @GetMapping
    public List<Estudiante> listar() {
        return service.listar();
    }

    @GetMapping("/{id}")
    public Estudiante obtener(@PathVariable Integer id) {
        return service.obtenerPorId(id)
                .orElse(null);
    }

    @PutMapping
    public Estudiante actualizar(@RequestBody Estudiante estudiante) {
        return service.actualizar(estudiante);
    }

    @DeleteMapping("/{id}")
    public void eliminar(@PathVariable Integer id) {
        service.eliminar(id);
    }
}
