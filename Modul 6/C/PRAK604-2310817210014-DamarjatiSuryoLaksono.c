#include <stdio.h>
#include <string.h>

int main() {
    char code[100], message[100];
    fgets(code, sizeof(code), stdin);
    code[strcspn(code, "\n")] = '\0';
    fgets(message, sizeof(message), stdin);
    message[strcspn(message, "\n")] = '\0';
    if (strlen(code) != strlen(message)) {
        printf("Panjang kalimat berbeda, pesan palsu\n");
        return 0;
    }
    int starCount = 0, hashCount = 0;
    for (int i = 0; i < strlen(message); i++) {
        if (message[i] == ' ' && code[i] == ' ' ) {
            continue;
        } if (message[i] == code[i]) {
            message[i] = '*';
            starCount++;
        } else {
            message[i] = '#';
            hashCount++;
        }
    }
    printf("%s\n", message);
    printf("* = %d\n", starCount);
    printf("# = %d\n", hashCount);
    if (starCount >= hashCount) {
        printf("Pesan Asli\n");
    } else {
        printf("Pesan Palsu\n");
    }

    return 0;
}
