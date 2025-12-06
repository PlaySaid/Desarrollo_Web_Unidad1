package com.jcaa.hexagonal.app.adapters.out.jpa;

import com.jcaa.hexagonal.domain.entities.Estudiante;
import org.springframework.data.jpa.repository.JpaRepository;

public interface EstudianteJpaRepository extends JpaRepository<Estudiante, Integer> {
}
