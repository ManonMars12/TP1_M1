<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // CORS pour front
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$products = [
    1 => ["id" => 1, "libelle" => "Ordinateur", "marque" => "Dell", "prix" => 800],
    2 => ["id" => 2, "libelle" => "Téléphone", "marque" => "Samsung", "prix" => 500],
];

// Gérer OPTIONS (prévol CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Récupérer l'ID si fourni
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Lire (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($id !== null) {
        if (isset($products[$id])) {
            echo json_encode($products[$id]);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Produit non trouvé"]);
        }
    } else {
        echo json_encode(array_values($products));
    }
}

// Ajouter (POST)
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $newId = max(array_keys($products)) + 1;
    $products[$newId] = ["id" => $newId] + $data;
    echo json_encode($products[$newId]);
}

// Modifier (PUT)
elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    if ($id === null || !isset($products[$id])) {
        http_response_code(404);
        echo json_encode(["error" => "Produit non trouvé"]);
        exit;
    }
    $data = json_decode(file_get_contents('php://input'), true);
    $products[$id] = ["id" => $id] + $data;
    echo json_encode($products[$id]);
}

// Supprimer (DELETE)
elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if ($id === null || !isset($products[$id])) {
        http_response_code(404);
        echo json_encode(["error" => "Produit non trouvé"]);
        exit;
    }
    unset($products[$id]);
    echo json_encode(["success" => true]);
}
?>