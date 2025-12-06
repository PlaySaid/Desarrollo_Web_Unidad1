import React from "react";

export default function Navbar() {
    return React.createElement(
        "nav",
        { style: { background: "#333", padding: "10px" } },
        React.createElement(
            "a",
            { href: "#/", style: { color: "white", marginRight: "20px" } },
            "Inicio"
        ),
        React.createElement(
            "a",
            { href: "#/estudiantes", style: { color: "white", marginRight: "20px" } },
            "Estudiantes"
        ),
        React.createElement(
            "a",
            { href: "#/estudiantes/nuevo", style: { color: "white" } },
            "Nuevo"
        )
    );
}
