<?php

// Datos de entrada: comunidades (municipios) y su infraestructura de agua
$comunidades = [
    ["nombre" => "Paiporta", "poblacion" => 5000, "pozos" => 8, "acueducto" => true],
    ["nombre" => "Picanya", "poblacion" => 3000, "pozos" => 3, "acueducto" => false],
    ["nombre" => "Sedavi", "poblacion" => 7000, "pozos" => 12, "acueducto" => true],
];

// Función lambda para calcular el acceso a agua potable
$calcularAcceso = function ($comunidad) {
    $accesoBase = $comunidad["acueducto"] ? 0.9 : 0.4; // 90% o 40% de cobertura base
    $bonoPozos = min(0.3, $comunidad["pozos"] / $comunidad["poblacion"] * 1000); //SOLCUION 2, limitamos al 30%
    return min(1, $accesoBase + $bonoPozos); // SOLUCION 1, como no tiene sentido q haya un porcentaje mayor q 100, usando la funcion min forzamos a q sea 100% en caso de superarlo
};

// Calcular población total y con acceso
$poblacionTotal = 0;
$poblacionConAcceso = 0;
foreach ($comunidades as $comunidad) {
    $poblacionTotal += $comunidad["poblacion"];
    $acceso = max(0, $calcularAcceso($comunidad)); // SOLUCION 3, evitar q salga un resultado negativo
    $poblacionConAcceso += $comunidad["poblacion"] * $acceso;

    echo "Cálculo completado. " . round($poblacionConAcceso) . "<br>"; //SOLUCION 5, mostrar todos los calculos. SOLUCION 4, redondear 
}
// Error 1: La función lambda puede devolver un valor > 1 (ej. 1.2), lo que no tiene sentido para un porcentaje.
// Error 2: El bono por pozos no está limitado a un máximo (ej. no puede superar el 30%).
// Error 3: No se valida si $acceso es negativo (ej. si hay muy pocos pozos).
// Error 4: Falta redondear el porcentaje final para legibilidad.
// Error 5: No se muestra el resultado del cálculo (solo se acumula en $poblacionConAcceso).

?>