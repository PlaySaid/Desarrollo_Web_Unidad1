package com.jcaa.hexagonal.app.adapters.out.jpa;

import com.jcaa.hexagonal.app.ports.out.EstudianteRepositoryPort;
import com.jcaa.hexagonal.domain.entities.Estudiante;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.Optional;

@Component
public class EstudianteRepositoryAdapter implements EstudianteRepositoryPort {

    private final EstudianteJpaRepository repository;

    public EstudianteRepositoryAdapter(EstudianteJpaRepository repository) {
        this.repository = repository;
    }

    @Override
    public Estudiante guardar(Estudiante estudiante) {
        return repository.save(estudiante);
    }

    @Override
    public Optional<Estudiante> buscarPorId(Integer id) {
        return repository.findById(id);
    }

    @Override
    public List<Estudiante> listar() {
        return repository.findAll();
    }

    @Override
    public Estudiante actualizar(Estudiante estudiante) {
        return repository.save(estudiante);
    }

    @Override
    public void eliminar(Integer id) {
        repository.deleteById(id);
    }
}
