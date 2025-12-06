const API_URL = "http://localhost:5173/api/estudiantes";

export async function getAllEstudiantes() {
    const response = await fetch(API_URL);
    return response.json();
}

export async function createEstudiante(estudiante) {
    const response = await fetch(API_URL, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(estudiante)
    });
    return response.json();
}
