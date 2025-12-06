import React from "react";

import Navbar from "../components/Navbar.js";
import EstudianteForm from "../components/EstudianteForm.js";

export default function EstudianteCreatePage() {
    return React.createElement(
        "div",
        null,
        React.createElement(Navbar),
        React.createElement("h2", null, "Crear Estudiante"),
        React.createElement(EstudianteForm)
    );
}
