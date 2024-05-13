<?php
namespace Services;

// Définition d'un trait `Response`.
trait Response {
    /**
     * Définition de la méthode render avec deux paramètres :
     * - $view (le nom de la vue à rendre).
     * - $data (les données à passer à la vue, optionnel).
     */
    public function render($view, $data = null) {
        if (!empty($data)) {
            extract($data);
        }

        // Inclut le fichier de la vue spécifiée par le paramètre $view
        include_once __DIR__ . '/../Views/' . $view . ".php";
    }
}
