package com.jcaa.hexagonal.app.ports.in;

import com.jcaa.hexagonal.domain.entities.Estudiante;
import java.util.List;
import java.util.Optional;

public interface EstudianteServicePort {

    Estudiante crear(Estudiante estudiante);

    Optional<Estudiante> obtenerPorId(Integer id);

    List<Estudiante> listar();

    Estudiante actualizar(Estudiante estudiante);

    void eliminar(Integer id);
}
