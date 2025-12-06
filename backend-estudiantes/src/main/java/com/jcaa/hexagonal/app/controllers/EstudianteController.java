package com.jcaa.hexagonal.app.controllers;

import com.jcaa.hexagonal.app.dto.EstudianteDto;
import com.jcaa.hexagonal.app.mappers.EstudianteMapper;
import com.jcaa.hexagonal.app.ports.in.EstudianteServicePort;
import com.jcaa.hexagonal.domain.entities.Estudiante;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.stream.Collectors;

@RestController
@RequestMapping("/estudiante")
public class EstudianteController {

    private final EstudianteServicePort service;

    public EstudianteController(EstudianteServicePort service) {
        this.service = service;
    }

    @PostMapping
    public EstudianteDto crear(@RequestBody EstudianteDto dto) {
        Estudiante saved = service.crear(EstudianteMapper.toEntity(dto));
        return EstudianteMapper.toDto(saved);
    }

    @GetMapping
    public List<EstudianteDto> listar() {
        return service.listar().stream()
                .map(EstudianteMapper::toDto)
                .collect(Collectors.toList());
    }

    @GetMapping("/{id}")
    public EstudianteDto obtener(@PathVariable Integer id) {
        return service.obtenerPorId(id)
                .map(EstudianteMapper::toDto)
                .orElse(null);
    }

    @PutMapping("/{id}")
    public EstudianteDto actualizar(@PathVariable Integer id, @RequestBody EstudianteDto dto) {
        dto.setId(id);
        Estudiante updated = service.actualizar(EstudianteMapper.toEntity(dto));
        return EstudianteMapper.toDto(updated);
    }

    @DeleteMapping("/{id}")
    public void eliminar(@PathVariable Integer id) {
        service.eliminar(id);
    }
}
