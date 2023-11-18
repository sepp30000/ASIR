#include <unistd.h>
#include <stdio.h>

int main(int argc, const char *argv[]) {
    if (argc != 2) {
        fprintf(stderr, "Uso: %s <nombre-del-servicio>\n", argv[0]);
        return 1;
    }

    setuid(0);

    // Construye el comando systemctl
    char comando[100];
    snprintf(comando, sizeof(comando), "systemctl start %s", argv[1]);

    // Ejecuta el comando systemctl
    int resultado = system(comando);

    if (resultado == 0) {
        printf("El servicio se ha iniciado correctamente.\n");
    } else {
        fprintf(stderr, "Error al iniciar el servicio.\n");
    }

    return 0;
}
