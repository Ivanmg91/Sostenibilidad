
# 🏙️ Municipios – Mediana de Consumo Eléctrico

## 📋 Descripción del Proyecto

Este proyecto tiene como objetivo analizar los datos de **consumo eléctrico en viviendas** por municipio y mostrar de forma ordenada aquellos con **mayor mediana de consumo anual**.  
El programa lee un archivo CSV con información energética, filtra los registros válidos y permite al usuario seleccionar cuántos municipios desea visualizar en la consola.

Se trata de un ejercicio práctico de **procesamiento de datos en Java**, ideal para familiarizarse con la lectura de archivos, manejo de excepciones, estructuras de datos y ordenación personalizada.

---

## 🎯 Objetivos

- Leer un archivo CSV con datos de consumo eléctrico.  
- Filtrar registros incorrectos o incompletos.  
- Ordenar los municipios de mayor a menor mediana de consumo.  
- Permitir al usuario decidir cuántos resultados quiere ver.  

---

## 🧠 Lógica del Programa

El flujo principal del programa es el siguiente:

1. **Lectura del archivo CSV**  
   Se utiliza `BufferedReader` para recorrer las líneas del archivo.  

2. **Filtrado de datos válidos**  
   Se descartan filas con valores no numéricos o no correspondientes a municipios.  

3. **Conversión y almacenamiento**  
   Cada registro se guarda como un objeto `Municipio` con su territorio, código y valor.  

4. **Ordenación**  
   Los municipios se ordenan de forma descendente según su valor de mediana de consumo.  

5. **Interacción con el usuario**  
   Se solicita al usuario cuántos municipios desea visualizar, y se muestran los resultados ordenados.  

---

## 💻 Tecnologías Utilizadas

- ☕ **Java 17+** – Lenguaje de programación principal.  
- 📊 **CSV** – Formato de los datos de entrada.  
- 💬 **Consola / Terminal** – Interfaz de usuario para ejecución e interacción.  
- 📦 **JAR ejecutable (opcional)** – Facilita la distribución del programa.

---

## 🧩 Fragmento de Código Relevante

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

// Ordenar por mediana (descendente)
listaMunicipios.sort((m1, m2) -> Double.compare(m2.valor, m1.valor));

// Solicitar cantidad al usuario y mostrar resultados
Scanner scanner = new Scanner(System.in);
System.out.print("¿Cuántos municipios quieres ver?: ");
int cantidad = scanner.nextInt();
scanner.close();

for (int i = 0; i < cantidad && i < listaMunicipios.size(); i++) {
    System.out.println((i + 1) + ". " + listaMunicipios.get(i));
}

```
---

## 🚀 Ejecución del Programa

- Coloca el archivo CSV en el mismo directorio que el código fuente.


- Compila el programa:

javac Municipios.java


- Ejecuta el programa:

java Municipios


- Introduce el número de municipios que deseas visualizar.




---

## 🧾 Ejemplo de Salida

¿Cuántos municipios quieres ver?: 5

Los 5 municipios con mayor mediana:
1. Territorio: Madrid, Código: 28079, Valor: 4750.3
2. Territorio: Barcelona, Código: 08019, Valor: 4601.7
3. Territorio: Valencia, Código: 46250, Valor: 4478.9
...


---

## 🧭 Conclusión

Este proyecto demuestra cómo procesar y analizar datos estructurados de manera eficiente utilizando Java.
A través de un enfoque claro y modular, se consigue transformar un conjunto de datos en bruto en información útil y ordenada.

Además, este ejercicio refuerza habilidades clave como:

La lectura y validación de datos desde archivos externos.

El uso de clases y objetos para estructurar la información.

La ordenación personalizada mediante expresiones lambda.


Como posibles mejoras futuras:

Exportar los resultados a un nuevo archivo CSV.

Implementar una interfaz gráfica amigable (GUI).

Incluir métricas adicionales como la media o desviación estándar del consumo.


💡 En definitiva, un ejemplo práctico y didáctico de cómo combinar programación estructurada y análisis de datos en Java.


---

## 🧑‍💻 Autor

Iván Montiano González 
📧 montianogonzalezivan@gmail.com 
📅 2025

---
