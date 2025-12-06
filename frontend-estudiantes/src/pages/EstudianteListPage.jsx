import React from "react";

import Navbar from "../components/Navbar.js";
import EstudianteTable from "../components/EstudianteTable.js";

export default function EstudianteListPage() {
    return React.createElement(
        "div",
        null,
        React.createElement(Navbar),
        React.createElement("h2", null, "Lista de Estudiantes"),
        React.createElement(EstudianteTable)
    );
}
