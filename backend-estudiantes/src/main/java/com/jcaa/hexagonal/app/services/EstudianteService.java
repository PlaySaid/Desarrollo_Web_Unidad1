package com.jcaa.hexagonal.app.services;

import com.jcaa.hexagonal.app.ports.in.EstudianteServicePort;
import com.jcaa.hexagonal.app.ports.out.EstudianteRepositoryPort;
import com.jcaa.hexagonal.domain.entities.Estudiante;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class EstudianteService implements EstudianteServicePort {

    private final EstudianteRepositoryPort repository;

    public EstudianteService(EstudianteRepositoryPort repository) {
        this.repository = repository;
    }

    @Override
    public Estudiante crear(Estudiante estudiante) {
        return repository.guardar(estudiante);
    }

    @Override
    public Optional<Estudiante> obtenerPorId(Integer id) {
        return repository.buscarPorId(id);
    }

    @Override
    public List<Estudiante> listar() {
        return repository.listar();
    }

    @Override
    public Estudiante actualizar(Estudiante estudiante) {
        return repository.actualizar(estudiante);
    }

    @Override
    public void eliminar(Integer id) {
        repository.eliminar(id);
    }
}
