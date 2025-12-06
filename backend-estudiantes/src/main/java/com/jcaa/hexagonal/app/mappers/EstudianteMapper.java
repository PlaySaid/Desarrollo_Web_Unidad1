package com.jcaa.hexagonal.app.mappers;

import com.jcaa.hexagonal.app.dto.EstudianteDto;
import com.jcaa.hexagonal.domain.entities.Estudiante;

public class EstudianteMapper {

    public static EstudianteDto toDto(Estudiante e) {
        if (e == null) return null;
        EstudianteDto dto = new EstudianteDto();
        dto.setId(e.getId());
        dto.setNombre(e.getNombre());
        dto.setApellido(e.getApellido());
        dto.setFechaNacimiento(e.getFechaNacimiento());
        dto.setSemestre(e.getSemestre());
        dto.setEmail(e.getEmail());
        dto.setGenero(e.getGenero());
        dto.setTelefono(e.getTelefono());
        dto.setPrograma(e.getPrograma());
        dto.setUniversidad(e.getUniversidad());
        return dto;
    }

    public static Estudiante toEntity(EstudianteDto dto) {
        if (dto == null) return null;
        Estudiante e = new Estudiante();
        e.setId(dto.getId());
        e.setNombre(dto.getNombre());
        e.setApellido(dto.getApellido());
        e.setFechaNacimiento(dto.getFechaNacimiento());
        e.setSemestre(dto.getSemestre());
        e.setEmail(dto.getEmail());
        e.setGenero(dto.getGenero());
        e.setTelefono(dto.getTelefono());
        e.setPrograma(dto.getPrograma());
        e.setUniversidad(dto.getUniversidad());
        return e;
    }
}
