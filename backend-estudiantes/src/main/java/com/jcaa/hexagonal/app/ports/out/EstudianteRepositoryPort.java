package com.jcaa.hexagonal.app.ports.out;

import com.jcaa.hexagonal.domain.entities.Estudiante;
import java.util.List;
import java.util.Optional;

public interface EstudianteRepositoryPort {

    Estudiante guardar(Estudiante estudiante);

    Optional<Estudiante> buscarPorId(Integer id);

    List<Estudiante> listar();

    Estudiante actualizar(Estudiante estudiante);

    void eliminar(Integer id);
}
