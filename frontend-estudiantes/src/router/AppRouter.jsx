import React from "react";

import HomePage from "../pages/HomePage.js";
import EstudianteListPage from "../pages/EstudianteListPage.js";
import EstudianteCreatePage from "../pages/EstudianteCreatePage.js";

export default function AppRouter() {
    const path = window.location.hash.replace("#", "") || "/";

    if (path === "/estudiantes") {
        return React.createElement(EstudianteListPage);
    }

    if (path === "/estudiantes/nuevo") {
        return React.createElement(EstudianteCreatePage);
    }

    return React.createElement(HomePage);
}
