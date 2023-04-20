# EjercicioBanco_2023_CFGS_DAM

# Práctica de Programación en PHP EjercicioBAnco

Este es un repositorio que contiene una práctica de programación en PHP.
En esta practica se ha creado una aplicacion de ejemplo con las funcionalidades 
exigidas en el enunciado de la practica.

## Funcionalidades

La aplicación web ofrece las siguientes funcionalidades:

- Permite crear **clientes** en el banco. La infomacion del cliente que el banco va a almacenar es: **nombre y dni**.
- Permite que el usuario pueda **crear una cuenta en el banco**. Estas cuentas pueden ser **cuenta ahorro o cuenta corriente**
- La informacion de la cuenta es : **numero de cuenta**, **saldo** y su **interes anual**. 
- Permite que un cliente pueda **ingresar** o **retirar** dinero siempre que haya suficiente en la cuenta
- Cada cuenta pertenece a un cliente y cada **cliente podra tener hasta 10 cuentas diferentes como maximo**. 
- La diferencia entre los dos tipos de cuentas reside en la forma de calcular el interes
    - Para las cuentas correintes el interes se calcula teniendo en cuenta el interes anual.
    - Para las cuentas de ahorro
        - Si el **saldo es menor** que el saldo minimo fijado en la cuenta de ahorro, **el interes aplicado sera la mitad del interes anual**.
        - Si el **saldo es mayor** que el saldo minimo fijado en la cuenta de ahorro, **el interes aplicado sera el doble del interes anual**.

## Requisitos

Para ejecutar la aplicación web, necesitarás lo siguiente:

- Un servidor web local, como XAMP o similar.

## Instrucciones de instalación

El ejercicio es abierto pudiendo crear tu propia base de datos y tambien los ficheros necesarios para que la aplicacion web funcione. 

## Contribuciones

Si deseas contribuir a este proyecto, puedes hacer lo siguiente:

- Realizar una bifurcación del repositorio y enviar una solicitud de extracción con tus cambios.
- Reportar errores o problemas en la sección de "Issues" del repositorio.

## Autores

Este proyecto ha sido desarrollado por Isaac Blazquez.
