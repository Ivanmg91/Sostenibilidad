# Municipios – Mediana de Consumo Eléctrico

## Problema a resolver
El objetivo de este programa es **analizar datos de consumo eléctrico de viviendas por municipios** y mostrar los municipios con mayor mediana de consumo anual.  
El programa filtra los registros válidos, ordena los municipios según el valor de la mediana y permite al usuario decidir cuántos municipios desea visualizar.

---

## Tecnologías
- **Java 17+**: lenguaje de programación principal.
- **CSV**: formato de archivo para los datos de entrada.
- **Terminal / Consola**: interfaz de usuario para interacción con el programa.
- **JAR ejecutable**: permite distribuir el programa de manera sencilla.

---

## Código
El fragmento de código más importante es la **lectura y filtrado de los datos del CSV**, así como la ordenación y presentación al usuario:

```java
// Leer y filtrar los datos del CSV
while ((linea = br.readLine()) != null) {
    String[] values = linea.split(delimitador);

    if (values.length < 6) continue;
    if (!values[1].equalsIgnoreCase("Municipios")) continue;
    if (values[4].equals("-")) continue;

    double valor;
    try {
        valor = Double.parseDouble(values[4]);
    } catch (NumberFormatException e) {
        continue;
    }

    listaMunicipios.add(new Municipio(values[3], values[2], valor));
}

// Ordenar por mediana
listaMunicipios.sort((m1, m2) -> Double.compare(m2.valor, m1.valor));

// Pedir cantidad al usuario
Scanner scanner = new Scanner(System.in);
System.out.print("¿Cuántos municipios quieres ver?: ");
int cantidad = scanner.nextInt();
scanner.close();

for (int i = 0; i < cantidad && i < listaMunicipios.size(); i++) {
    System.out.println((i + 1) + ". " + listaMunicipios.get(i));
}