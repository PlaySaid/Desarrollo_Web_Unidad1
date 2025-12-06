import React from "react";
import { createEstudiante } from "../api/estudianteApi.js";

export default function EstudianteForm() {
    const [form, setForm] = React.useState({
        nombre: "",
        apellido: "",
        correo: ""
    });

    const handleChange = (e) => {
        setForm({ ...form, [e.target.name]: e.target.value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        createEstudiante(form).then(() => {
            alert("Estudiante creado");
            window.location.hash = "/estudiantes";
        });
    };

    return React.createElement(
        "form",
        { onSubmit: handleSubmit },

        React.createElement("input", {
            type: "text",
            name: "nombre",
            placeholder: "Nombre",
            onChange: handleChange
        }),
        React.createElement("br"),

        React.createElement("input", {
            type: "text",
            name: "apellido",
            placeholder: "Apellido",
            onChange: handleChange
        }),
        React.createElement("br"),

        React.createElement("input", {
            type: "email",
            name: "correo",
            placeholder: "Correo",
            onChange: handleChange
        }),
        React.createElement("br"),

        React.createElement("button", { type: "submit" }, "Guardar")
    );
}
