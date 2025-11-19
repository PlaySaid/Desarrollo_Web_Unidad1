package com.jcaa.hexagonal.infrastructure.persistence;

import com.jcaa.hexagonal.app.ports.out.EstudianteRepositoryPort;
import com.jcaa.hexagonal.domain.entities.Estudiante;
import org.springframework.stereotype.Repository;

import java.util.List;
import java.util.Optional;

@Repository
public class MySQLEstudianteRepository implements EstudianteRepositoryPort {

    private final JpaEstudianteRepository jpaRepo;

    public MySQLEstudianteRepository(JpaEstudianteRepository jpaRepo) {
        this.jpaRepo = jpaRepo;
    }

    @Override
    public Estudiante guardar(Estudiante estudiante) {
        return jpaRepo.save(estudiante);
    }

    @Override
    public Optional<Estudiante> buscarPorId(Integer id) {
        return jpaRepo.findById(id);
    }

    @Override
    public List<Estudiante> listar() {
        return jpaRepo.findAll();
    }

    @Override
    public Estudiante actualizar(Estudiante estudiante) {
        return jpaRepo.save(estudiante);
    }

    @Override
    public void eliminar(Integer id) {
        jpaRepo.deleteById(id);
    }
}
