package com.jcaa.hexagonal.infrastructure.persistence;

import com.jcaa.hexagonal.domain.entities.Estudiante;
import org.springframework.data.jpa.repository.JpaRepository;

public interface JpaEstudianteRepository extends JpaRepository<Estudiante, Integer> {
}
