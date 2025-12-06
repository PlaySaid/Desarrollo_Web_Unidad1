import React from "react";
import { getAllEstudiantes } from "../api/estudianteApi.js";

export default function EstudianteTable() {
    const [estudiantes, setEstudiantes] = React.useState([]);

    React.useEffect(() => {
        getAllEstudiantes().then(data => setEstudiantes(data));
    }, []);

    return React.createElement(
        "table",
        { border: 1, cellPadding: 8 },
        React.createElement(
            "thead",
            null,
            React.createElement(
                "tr",
                null,
                React.createElement("th", null, "ID"),
                React.createElement("th", null, "Nombre"),
                React.createElement("th", null, "Apellido"),
                React.createElement("th", null, "Correo")
            )
        ),
        React.createElement(
            "tbody",
            null,
            estudiantes.map(e =>
                React.createElement(
                    "tr",
                    { key: e.id },
                    React.createElement("td", null, e.id),
                    React.createElement("td", null, e.nombre),
                    React.createElement("td", null, e.apellido),
                    React.createElement("td", null, e.correo)
                )
            )
        )
    );
}
