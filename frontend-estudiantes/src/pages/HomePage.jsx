import React from "react";

import Navbar from "../components/Navbar.js";

export default function HomePage() {
    return React.createElement(
        "div",
        null,
        React.createElement(Navbar),
        React.createElement("h1", null, "Bienvenido a Gestión de Estudiantes")
    );
}
